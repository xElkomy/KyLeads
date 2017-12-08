<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get page meta data for an entire site
     *
     * @param  integer 	$siteID
     * @return mixed 	$return/FALSE
     */
    public function getPageData($siteID)
    {
    	$query = $this->db->from('pages')->where('sites_id', $siteID)->get();

    	if ($query->num_rows() > 0)
    	{
    		$res = $query->result();
    		$return = array();
    		foreach ($res as $page)
    		{
                // Include all frames for this page
                $query = $this->db->from('frames')->where('pages_id', $page->pages_id)->where('revision', 0)->get();
                if ($query->num_rows() > 0)
                {
                    $page->frames = $query->result();
                }
                else
                {
                    $page->frames = NULL;
                }
    			$return[$page->pages_name] = $page;
    		}

    		return $return;
    	}
    	else
    	{
    		return FALSE;
    	}

    }

    /**
     * Retrieves meta data for single page, using the siteID and page name
     *
     * @param  integer 	$siteID
     * @param  string 	$pageName
     * @return mixed 	$res/FALSE
     */
    public function getSinglePage($siteID, $pageName)
    {
    	$query = $this->db->from('pages')->where('sites_id', $siteID)->where('pages_name', $pageName)->get();
    	if ($query->num_rows() > 0)
    	{
    		$res = $query->result();
    		return $res[0];
    	}
    	// No match found
    	else
    	{
    		return FALSE;
    	}
    }

    /**
     * Updates page meta data
     *
     * @param  	array 	$pageData
     * @return 	void
     */
    public function updatePageData($pageData)
    {
    	// Do we have a pageID?
    	if ($pageData['pageID'] != '')
    	{
    		$data = array(
				'pages_title' 				=> $pageData['pageData_title'],
				'pages_meta_keywords' 		=> $pageData['pageData_metaKeywords'],
				'pages_meta_description' 	=> $pageData['pageData_metaDescription'],
				'pages_header_includes' 	=> $pageData['pageData_headerIncludes'],
				'pages_css' 				=> $pageData['pageData_headerCss']
   			);
    		$this->db->where('pages_id', $pageData['pageID']);
    		$this->db->update('pages', $data);
    	}
    	else
    	{
    		// No pageID given, create a new page in the db
    		$data = array(
    		   'sites_id' 				=> $pageData['siteID'],
    		   'pages_name' 			=> $pageData['pageName'],
    		   'pages_timestamp' 		=> time(),
    		   'pages_title' 			=> $pageData['pageData_title'],
    		   'pages_meta_keywords' 	=> $pageData['pageData_metaKeywords'],
    		   'pages_meta_description' => $pageData['pageData_metaDescription'],
    		   'pages_header_includes' 	=> $pageData['pageData_headerIncludes'],
			   'pages_css' 				=> $pageData['pageData_headerCss']
    		);
    		$this->db->insert('pages', $data);
    	}
    }

	/**
	 * Deletes a single page
	 *
	 * @param  	integer 	$siteID
	 * @param  	string 		$page
	 * @return 	void
	 */
	public function delete($siteID, $page)
	{
		$query = $this->db->from('pages')->where('sites_id', $siteID)->where('pages_name', $page)->get();

		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			$page = $res[0];
			// Remove frames
			$this->db->where('pages_id', $page->pages_id);
			$this->db->delete('frames');
			// Delete page
			$this->db->where('pages_id', $page->pages_id);
			$this->db->delete('pages');
		}

	}

	/**
	 * Creates a new page template or saves existing one
	 *
	 * @param  	array 		$siteData
	 * @param  	string 		$contents
	 * @param  	integer 	$templateID
	 * @return 	mixed 		$pageID/$templateID
	 */
	public function saveTemplate($siteData, $contents = '', $templateID = 0)
	{
		reset($siteData);
		$pageName = key($siteData);

		// Cerate new template
		if ($templateID == 0)
		{
			$pagePreview = ($contents != '') ? $contents : '';

			$data = array(
				'pages_name' 				=> $pageName,
				'pages_timestamp' 			=> time(),
				'pages_preview' 			=> $pagePreview,
				'pages_template' 			=> 1,
                'pages_title' 				=> $siteData[$pageName]['pageSettings']['title'],
                'pages_meta_keywords' 		=> $siteData[$pageName]['pageSettings']['meta_keywords'],
                'pages_meta_description' 	=> $siteData[$pageName]['pageSettings']['meta_description'],
                'pages_header_includes' 	=> $siteData[$pageName]['pageSettings']['header_includes'],
                'pages_css' 				=> $siteData[$pageName]['pageSettings']['page_css']
			);


			$this->db->insert('pages', $data);

			if ($this->db->affected_rows() == 1)
			{
				$pageID = $this->db->insert_id();
				$frames = $siteData[$pageName]['blocks'];

    			// Page is done, now all the frames for this page
    			if (is_array($frames))
    			{
    				foreach ($frames as $frameData)
    				{
    					$data = array(
    						'pages_id' 				=> $pageID,
    						'frames_content' 		=> $frameData['frameContent'],
    						'frames_height' 		=> $frameData['frameHeight'],
    						'frames_original_url' 	=> $frameData['originalUrl'],
							'frames_sandbox' 		=> ($frameData['sandbox'])? 1: 0,
							'frames_loaderfunction' => $frameData['loaderFunction'],
    						'frames_timestamp' 		=> time()
    					);

    					$this->db->insert('frames', $data);
    				}
    			}

    			//thumbnail
    			$screenshotUrl = base_url() . 'loadsinglepage/' . $pageID;
                $filename = 'templatethumb_' . $pageID . '.jpg';

                $this->load->library('screenshot_library');
                $screenshot = $this->screenshot_library->make_screenshot($screenshotUrl, $filename, '520x440', '400');

                if ( $screenshot )
                {
                    $data = array(
                        'pagethumb' => $this->config->item('screenshot_sitethumbs_folder').$screenshot
                    );
                    $this->db->where('pages_id', $pageID);
                    $this->db->update('pages', $data);
                }

			}
			else
			{
				$pageID = FALSE;
			}

			return $pageID;
		}
		// Update existing template
		else
		{
			$pagePreview = ($contents != '') ? $contents : '';

			$data = array(
				'pages_name' 				=> $pageName,
				'pages_timestamp' 			=> time(),
				'pages_preview' 			=> $pagePreview,
				'pages_template' 			=> 1,
                'pages_title' 				=> $siteData[$pageName]['pageSettings']['title'],
                'pages_meta_keywords' 		=> $siteData[$pageName]['pageSettings']['meta_keywords'],
                'pages_meta_description' 	=> $siteData[$pageName]['pageSettings']['meta_description'],
                'pages_header_includes' 	=> $siteData[$pageName]['pageSettings']['header_includes'],
                'pages_css' 				=> $siteData[$pageName]['pageSettings']['page_css']
			);

			$this->db->where('pages_id', $templateID);
			$this->db->update('pages', $data);
			// Delete old frames
			$this->db->where('pages_id', $templateID);
			$this->db->delete('frames');
			// Insert new frames
			$frames = $siteData[$pageName]['blocks'];

			if (is_array($frames))
			{
				foreach ($frames as $frameData)
				{
					$data = array(
						'pages_id' 				=> $templateID,
                        'frames_content' 		=> $frameData['frameContent'],
						'frames_height' 		=> $frameData['frameHeight'],
						'frames_original_url' 	=> $frameData['originalUrl'],
						'frames_sandbox' 		=> ($frameData['sandbox'] == 'true') ? 1 : 0,
						'frames_loaderfunction' => $frameData['loaderFunction'],
						'frames_timestamp' 		=> time()
					);

					$this->db->insert('frames', $data);
				}
			}

			//thumbnail
			$screenshotUrl = base_url() . 'loadsinglepage/' . $templateID;
            $filename = 'templatethumb_' . $templateID . '.jpg';

            $this->load->library('screenshot_library');
            $screenshot = $this->screenshot_library->make_screenshot($screenshotUrl, $filename, '520x440', '400');

            if ( $screenshot )
            {
                $data = array(
                    'pagethumb' => $this->config->item('screenshot_sitethumbs_folder').$screenshot
                );
                $this->db->where('pages_id', $templateID);
                $this->db->update('pages', $data);
            }

			return $templateID;
		}
	}

	/**
	 * Get all templates
	 *
	 * @param 	array 	$pages_id
	 * @return mixed 	$templates/FALSE
	 */
	public function getAllTemplates($pages_id = NULL)
	{
		$templates = array();
		if ($pages_id)
		{
			$this->db->where_in('pages_id', $pages_id);
		}
		$q = $this->db->from('pages')->where('pages_template', '1')->get();

		if ($q->num_rows() > 0)
		{
			$pages = $q->result();

    		// Now we need all frames for each page
    		foreach ($pages as $page)
    		{
    			$pageFrames = array();
    			$q = $this->db->from('frames')->where('pages_id', $page->pages_id)->where('revision', 0)->get();

    			foreach ($q->result() as $f)
    			{
	    			$frame = array();
					$frame['pageName'] = $page->pages_name;
					$frame['pageID'] = $page->pages_id;
	    			$frame['id'] = $f->frames_id;
	    			$frame['height'] = $f->frames_height;
	    			$frame['original_url'] = $f->frames_original_url;
	    			$frame['thumb'] = $page->pagethumb;
	    			$pageFrames[] = $frame;
	    		}

	    		$templates[$page->pages_id] = $pageFrames;
			}

			return $templates;
		}
		else
		{
			return FALSE;
		}

	}

	/**
	 * Get all templates
	 *
	 * @return 	mixed 	result object / FALSE
	 */
	public function get_templates($pages_id = NULL)
	{
		if ($pages_id)
		{
			$this->db->where_in('pages_id', $pages_id);
		}
		$q = $this->db->from('pages')->where('pages_template', '1')->get();

		if ($q->num_rows() > 0)
		{
			return $q->result();
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * Delete page template
	 *
	 * @param 	integer 	$siteID
	 * @param 	integer 	$pageID
	 * @return 	void
	 */
	public function deleteTemplate($siteID, $pageID)
	{
		// Start by deleting the frames
		$this->db->where('pages_id', $pageID);
		$this->db->delete('frames');

		// Delete the page itself
		$this->db->where('pages_id', $pageID);
		$this->db->delete('pages');
	}

	/**
	 * Grabs all the blocks on this page, mixes them into a single HTML document and return the result
	 *
	 * @todo 		remove in version 2+
	 * @deprecated 	Use load_page function instead
	 * @param 		integer 	$page_id
	 * @return 		string 	$str
	 */
    public function loadPage($page_id)
    {
	    $this->load->library('simple_html_dom');

	    // Grab the frames
	    $q = $this->db->from('frames')->where('pages_id', $page_id)->get();
	    if ($q->num_rows() > 0)
	    {
	    	//get the skeleton
	    	$theSkeleton = file_get_html('./elements/skeleton.html');
		    foreach ($q->result() as $frame)
		    {
			    $html = str_get_html($frame->frames_content);
			    $block = $html->find('div[id=page]', 0)->innertext;
			    $theSkeleton->find('div[id=page]', 0)->innertext .= $block;
		    }
		    $str = $theSkeleton;

		    $str = str_replace("../", "", $str);

		    echo $str;
	    }
    }

    /**
	 * Grabs all the blocks on this page, mixes them into a single HTML document and return the result
	 *
	 * @param 	integer 	$page_id
	 * @return 	string 		$str
	 */
    public function load_page($page_id)
    {
	    $this->load->library('simple_html_dom');

	    // Grab the frames
	    $this->db->where('pages_id', $page_id);
	    $this->db->where('revision', 0);
	    $q = $this->db->get('frames');
	    if ($q->num_rows() > 0)
	    {
	    	// Get the skeleton
	    	//$theSkeleton = file_get_html('./elements/skeleton.html');
	    	$theSkeleton = str_get_html(file_get_contents('./elements/skeleton.html'), true, true, DEFAULT_TARGET_CHARSET, false);
		    foreach ($q->result() as $frame)
		    {
			    $html = str_get_html($frame->frames_content, true, true, DEFAULT_TARGET_CHARSET, false);
			    $block = $html->find('div[id=page]', 0)->innertext;
			    $theSkeleton->find('div[id=page]', 0)->innertext .= $block;
		    }
		    $str = $theSkeleton;

		    // Replace both inline css image url and image tag src
			$str = str_replace('../bundles', 'bundles', $str);

			// Google Maps API
			if ($this->config->item('google_api') !== '')
			{
				$str = str_replace('</body>', '<script async defer src="https://maps.googleapis.com/maps/api/js?key=' . $this->config->item('google_api') . '&callback=initMap"></script></body>', $str);
			}

		    return $str;
	    }
    }

}