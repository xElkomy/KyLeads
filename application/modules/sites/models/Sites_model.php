<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sites_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get site details by ID
     *
     * @param  integer  $id
     * @return array    $data
     */
    public function get_by_id($id)
    {
        $data = [];
        $this->db->where('sites_id', $id);
        $this->db->where('sites_trashed', 0);
        $query = $this->db->get('sites');
        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $row)
            {
                $data = $row;
            }
        }

        $query->free_result();
        return $data;
    }

    /**
     * Get site details by any field value
     *
     * @param  string   $field
     * @param  string   $value
     * @return array    $data
     */
    public function get_by_field_value($field, $value)
    {
        $data = [];
        $this->db->where($field, $value);
        $this->db->where('sites_trashed', 0);
        $query = $this->db->get('sites');
        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $row)
            {
                $data[] = $row;
            }
        }

        $query->free_result();
        return $data;
    }

    /**
     * Returns all available sites
     *
     * @param  integer  $user_id
     * @return array    $allSites
     */
    public function all($user_id = '')
    {
    	// If $user_id is set, this means we're looking for the sites belonging to a specific user
    	if ($user_id == '')
        {
            if ($this->session->userdata('user_type') != 'Admin')
            {
                $this->db->where('users_id', $this->session->userdata('user_id'));
            }
        }
        else
        {
            $this->db->where('users_id', $user_id);
        }

        $this->db->from('sites');
        $this->db->where('sites_trashed', 0);
        $this->db->join('users', 'sites.users_id = users.id');
        $query = $this->db->get();
        $res = $query->result();

        // Array holding all sites and associated data
        $allSites = array();

        foreach ($res as $site)
        {
            $temp = array();
            $temp['siteData'] = $site;

			// Get the number of pages
            $query = $this->db->from('pages')->where('sites_id', $site->sites_id)->get();
            $res = $query->result();

            $temp['nrOfPages'] = $query->num_rows();

            $this->db->flush_cache();

			// Grab the first frame for each site, if any
            $q = $this->db->from('pages')->where('pages_name', 'index')->where('sites_id', $site->sites_id)->get();

            if ($q->num_rows() > 0)
            {
                $res = $q->result();
                $indexPage = $res[0];

                $q = $this->db->from('frames')->where('pages_id', $indexPage->pages_id)->where('revision', 0)->order_by('frames_id', 'asc')->limit(1)->get();

                if ($q->num_rows() > 0)
                {
                    $res = $q->result();
                    $temp['lastFrame'] = $res[0];
                }
                else
                {
                    $temp['lastFrame'] = '';
                }
            }
            else
            {
                $temp['lastFrame'] = '';
            }

            $allSites[] = $temp;
        }

        return $allSites;
    }

    /**
     * Site count by user
     *
     * @param  integer  $user_id
     * @return array    $query->result_array()
     */
    public function site_by_user($user_id)
    {
        $this->db->where('users_id', $user_id);
        $this->db->where('sites_trashed', 0);
        $this->db->from('sites');
        $query = $this->db->get();

        return $query->result_array();
    }

    /**
     * Checks to see if a site belongs to this user
     *
     * @param  integer  $siteID
     * @return boolean  TRUE/FALSE
     */
    public function isMine($site_id)
    {
    	$user_id = $this->session->userdata('user_id');
    	$q = $this->db->from('sites')->where('sites_id', $site_id)->get();
    	if ($q->num_rows() > 0)
        {
            $res = $q->result();
            if ($res[0]->users_id != $user_id)
            {
                return FALSE;
            }
            else
            {
                return TRUE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Creates a new, empty shell site
     *
     * @return integer  $new_site_id;
     */
    public function createNew()
    {
    	$user_id = $this->session->userdata('user_id');

    	// Create site
    	$data = array(
            'sites_name'        => 'My New Site',
            'users_id'          => $user_id,
            'sites_created_on'  => time()
            );
    	$this->db->insert('sites', $data);

    	$new_site_id = $this->db->insert_id();

    	// Create empty index page
        $data = array(
            'sites_id'          => $new_site_id,
            'pages_name'        => 'index',
            'pages_timestamp'   => time()
            );
        $this->db->insert('pages', $data);

        return $new_site_id;
    }

    /**
     * Creates a new site item, including pages and frames
     *
     * @param  string   $site_name
     * @param  string   $site_data
     * @return integer
     */
    public function create($site_name, $site_data)
    {
    	$user_id = $this->session->userdata('user_id');

    	// Create the site item first
    	$data = array(
    		'users_id' => $user_id,
    		'sites_name' => $site_name,
            'sites_created_on' => time()
            );
    	$this->db->insert('sites', $data);

    	$site_id = $this->db->insert_id();

    	// Next we create the pages and frames
    	foreach ($site_data as $page_name => $frames)
        {
            $data = array(
                'sites_id'          => $site_id,
                'pages_name'        => $page_name,
                'pages_timestamp'   => time()
                );
            $this->db->insert('pages', $data);

            $page_id = $this->db->insert_id();

    		//page is done, now all the frames for this page
            foreach ($frames as $frame_data)
            {
                $data = array(
                    'pages_id'              => $page_id,
                    'sites_id'              => $site_id,
                    'frames_content'        => $frame_data['frameContent'],
                    'frames_height'         => $frame_data['frameHeight'],
                    'frames_original_url'   => $frame_data['originalUrl'],
                    'frames_sandbox'        => $frame_data['frameSandbox'],
                    'frames_loaderfunction' => $frame_data['frameLoaderfunction'],
                    'frames_timestamp'      => time()
                    );
                $this->db->insert('frames', $data);
            }
        }

        return $site_id;
    }

    /**
     * Updates an existing site item, including pages and frames
     *
     * @param  array    $siteData
     * @param  string   $pages
     * @return [type]           [description]
     */
    public function update($siteData, $pages)
    {

       	// Update the site details first
        $data = array(
            'sites_name'            => $siteData['sites_name'],
            'sites_lastupdate_on'   => time(),
            'viewmode'              => $siteData['responsiveMode']
            );
        $this->db->where('sites_id', $siteData['sites_id']);
        $this->db->update('sites', $data);

        // Update the pages
        foreach ($pages as $page => $pageData)
        {
            if ($pageData['status'] == 'changed') //dealing with a changed page
            {
                if ( ! isset($pageData['pageID']) || $pageData['pageID'] == 0)
                {
                    $query = $this->db->from('pages')->where('sites_id', $siteData['sites_id'])->where('pages_name', $page)->get();
                    $pageDataOld = $query->result();
                    $pageID = $pageDataOld[0]->pages_id;
                }
                else
                {
                    $pageID = $pageData['pageID'];
                }

                $data = array(
                    'pages_name'                => $page,
                    'pages_timestamp'           => time(),
                    'pages_title'               => $pageData['pageSettings']['title'],
                    'pages_meta_keywords'       => $pageData['pageSettings']['meta_keywords'],
                    'pages_meta_description'    => $pageData['pageSettings']['meta_description'],
                    'pages_header_includes'     => $pageData['pageSettings']['header_includes'],
                    'pages_css'                 => $pageData['pageSettings']['page_css']
                    );
                $this->db->where('pages_id', $pageID);
                $this->db->update('pages', $data);
            }
            elseif ($pageData['status'] == 'new')
            {
                $data = array(
                    'sites_id'                  => $siteData['sites_id'],
                    'pages_name'                => $page,
                    'pages_timestamp'           => time(),
                    'pages_title'               => $pageData['pageSettings']['title'],
                    'pages_meta_keywords'       => $pageData['pageSettings']['meta_keywords'],
                    'pages_meta_description'    => $pageData['pageSettings']['meta_description'],
                    'pages_header_includes'     => $pageData['pageSettings']['header_includes'],
                    'pages_css'                 => $pageData['pageSettings']['page_css']
                    );
                $this->db->insert('pages', $data);
                $pageID = $this->db->insert_id();
            }

            // Page done, onto the blocks
            // Push existing frames into revision

            $data = array(
                'revision' => 1
                );
            $this->db->where('pages_id', $pageID);
            $this->db->update('frames', $data);

            if (isset($pageData['blocks']))
            {
            	foreach ($pageData['blocks'] as $block)
                {
                	$data = array(
                        'pages_id'              => $pageID,
                        'sites_id'              => $siteData['sites_id'],
                        'frames_content'        => $this->processFrameContent($block['frameContent']),
                        'frames_height'         => $block['frameHeight'],
                        'frames_original_url'   => $block['originalUrl'],
                        'frames_sandbox'        => ($block['sandbox'] == 'TRUE') ? 1 : 0,
                        'frames_loaderfunction' => $block['loaderFunction'],
                        'frames_timestamp'      => time(),
                        'frames_global'         => (isset($block['frames_global']))? 1: 0,
                        );

                	$this->db->insert('frames', $data);
                }
            }

            //screenshot of index page
            if ( $page == 'index' )
            {
                $screenshotUrl = base_url() . 'loadsinglepage/' . $pageID;
                $filename = 'sitethumb_' . $siteData['sites_id'] . '.jpg';

                $this->load->library('screenshot_library');
                $screenshot = $this->screenshot_library->make_screenshot($screenshotUrl, $filename, '520x440', '400');

                if ( $screenshot )
                {
                    $data = array(
                        'sitethumb' => $this->config->item('screenshot_sitethumbs_folder').$screenshot
                    );
                    $this->db->where('sites_id', $siteData['sites_id']);
                    $this->db->update('sites', $data);
                }

            }
            
        }
    }

    /**
     * Updates a site's meta data (name, ftp details, etc)
     *
     * @param  string    $frameContent
     * @return string    $raw
     */
    public function processFrameContent($frameContent)
    {

        $this->load->library('Simple_html_dom');

        $raw = str_get_html($frameContent, true, true, DEFAULT_TARGET_CHARSET, false);

        //remove data-selector attributes
        foreach($raw->find('*[data-selector]') as $element) {
            $element->removeAttribute("data-selector"); //remove attribute
        }

        //remove builder scripts (these are injected when loading the iframes)
        foreach($raw->find('script.builder') as $element) {
            $element->outertext = '';
        }

        return $raw;

    }

    /**
     * Updates a site's meta data (name, ftp details, etc)
     *
     * @param  array    $site_data
     * @return boolean  TRUE/FALSE
     */
    public function updateSiteData($site_data)
    {
  		//test the FTP data
        // $path = ($site_data['siteSettings_ftpPath'] != '') ? $site_data['siteSettings_ftpPath'] : "/";

        // $result = $this->MFtp->test($site_data['siteSettings_ftpServer'], $site_data['siteSettings_ftpUser'], $site_data['siteSettings_ftpPassword'], $site_data['siteSettings_ftpPort'], $path);

        // $ftpOk = 0;

        // if ($result['connection'])
        // {
        //     $ftpOk = 1;
        // }

        $data = array(
            'sites_name'    => $site_data['siteSettings_siteName'],
            'custom_domain' => $site_data['custom_domain'],
            'sub_domain'    => $site_data['sub_domain'],
            'sub_folder'    => $site_data['sub_folder'],
            'global_css'    => $site_data['siteSettings_siteCSS']
            );

        $this->db->where('sites_id', $site_data['siteID']);
        $this->db->update('sites', $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Returns a single site, without pages/frames
     *
     * @param  integer  $site_id
     * @return array    $res[0]
     * @return boolean  FALSE
     */
    public function siteData($site_id)
    {
        $query = $this->db->from('sites')->where('sites_id', $site_id)->get();
        if ($query->num_rows() > 0)
        {
            $res = $query->result();
            return $res[0];
        }
        else
        {
            return FALSE;
        }
    }


    /**
     * Takes a site ID and returns all the site data, or FALSE is the site doesn't exist
     *
     * @param  integer  $site_id
     * @return boolean  FALSE
     * @return array    $siteArray
     */
    public function getSite($site_id)
    {
    	$query = $this->db->from('sites')->where('sites_id', $site_id)->get();
    	if ($query->num_rows() == 0)
        {
            return FALSE;
        }

        $res = $query->result();

        $site = $res[0];

        $siteArray = array();
        $siteArray['site'] = $site;

    	// Get the pages + frames
        $query = $this->db->from('pages')->where('sites_id', $site->sites_id)->get();
        $res = $query->result();
        $pageFrames = array();
        foreach ($res as $page)
        {
    		// Get the frames for each page
            $query = $this->db->from('frames')->where('pages_id', $page->pages_id)->where('revision', 0)->order_by('frames_id')->get();

            $pageDetails = array();
            $pageDetails['blocks'] = $query->result();
            $pageDetails['page_id'] = $page->pages_id;
            $pageDetails['pages_title'] = $page->pages_title;
            $pageDetails['meta_description'] = $page->pages_meta_description;
            $pageDetails['meta_keywords'] = $page->pages_meta_keywords;
            $pageDetails['header_includes'] = $page->pages_header_includes;
            $pageDetails['page_css'] = $page->pages_css;

            $pageFrames[$page->pages_name] = $pageDetails;
        }

        $siteArray['pages'] = $pageFrames;

    	// Grab the assets folders as well
        $this->load->helper('directory');

        $folderContent = directory_map($this->config->item('elements_dir'), 2);
        $assetFolders = array();

        if (is_array($folderContent))
        {
            foreach ($folderContent as $key => $item)
            {
                if (is_array($item))
                {
                    array_push($assetFolders, $key);
                }
            }
        }

        $siteArray['assetFolders'] = $assetFolders;

        // Site hosting option for user
        if ($this->session->userdata('user_type') != "Admin")
        {
            $hosting = $this->MPackages->get_by_id($this->session->userdata('package_id'));
            $siteArray['hosting_option'] = json_decode($hosting['hosting_option']);
        }

        return $siteArray;
    }

    /**
     * Grabs a single frame and returns it
     *
     * @param  integer  $frame_id
     * @return array    $res[0]
     */
    public function getSingleFrame($frame_id)
    {
        $query = $this->db->from('frames')->where('frames_id', $frame_id)->get();
        $res = $query->result();
        return $res[0];
    }

    /**
     * Gets the assets and pages of a site
     *
     * @param  integer  $site_id
     * @return array    $return
     */
    public function getAssetsAndPages($site_id)
    {
        // Get the asset folders first, we only grab the first level folders inside $this->config->item('elements_dir')

        $this->load->helper('directory');

        $folderContent = directory_map($this->config->item('elements_dir'), 2);
        $assetFolders = array();

        foreach ($folderContent as $key => $item)
        {
            if (is_array($item))
            {
                array_push($assetFolders, $key);
            }
        }

    	// Now we get the pages
        $query = $this->db->from('pages')->where('sites_id', $site_id)->get();
        $pages = $query->result();

        $return = array();
        $return['assetFolders'] = $assetFolders;
        $return['pages'] = $pages;

        return $return;
    }

    /**
     * Moves a site to the trash
     *
     * @param  integer $site_id
     */
    public function trash($site_id)
    {
    	$data = array(
            'sites_trashed' => 1
            );

    	$this->db->where('sites_id', $site_id);
    	$this->db->update('sites', $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Returns all admin images
     *
     * @return mixed    $adminImages/FALSE
     */
    public function adminImages()
    {
        $folderContent = directory_map($this->config->item('images_dir'), 2);

        if ($folderContent)
        {
            //print_r( $folderContent );
            $adminImages = array();
            foreach ($folderContent as $key => $item)
            {
                if ( ! is_array($item))
                {
                    //check the file extension
                    $ext = pathinfo($item, PATHINFO_EXTENSION);
    				//prep allowed extensions array
                    $temp = explode("|", $this->config->item('images_allowedExtensions'));

                    if (in_array($ext, $temp))
                    {
                        array_push($adminImages, $item);
                    }
                }
            }

            return $adminImages;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Trashes a users' sites
     *
     * @param  integer  $user_id
     */
    public function deleteAllFor($user_id)
    {
        $data = array(
            'sites_trashed' => 1
            );

        $this->db->where('users_id', $user_id);
        $this->db->update('sites', $data);
    }

    /**
     * Grabs a singlepage for preview
     *
     * @param  integer  $site_id
     * @param  string   $page_name
     * @return array    $q/FALSE
     */
    public function getPage($site_id, $page_name)
    {
        $q = $this->db->from('pages')->where('sites_id', $site_id)->where('pages_name', $page_name)->order_by('pages_timestamp', 'asc')->get()->row();

        if ($q->pages_preview != '')
        {
            return $q;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Marks site as published
     *
     * @param  integer  $site_id
     */
    public function published($site_id)
    {
        $data = array(
            'ftp_published'     => 1,
            'publish_date'      => time()
            );

        $this->db->where('sites_id', $site_id);
        $this->db->update('sites', $data);
    }

}