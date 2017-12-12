<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sites extends MY_Controller {

    /**
     * Class constructor
     *
     * Loads required models, check if user has right to access this class, load the hook class and add a hook point
     *
     * @return  void
     */
    public function __construct()
    {
        parent::__construct();

        $model_list = [
        'user/Users_model' => 'MUsers',
        'package/Packages_model' => 'MPackages',
        'settings/Payment_settings_model' => 'MPayments',
        'sites/Sites_model' => 'MSites',
        'sites/Pages_model' => 'MPages',
        'shared/Revision_model' => 'MRevisions',
        'shared/Ftp_model' => 'MFtp'
        ];
        $this->load->model($model_list);

        if ( ! $this->session->has_userdata('user_id') && $this->uri->segment(1) != 'loadsinglepage')
        {
            redirect('auth', 'refresh');
        }

        $this->hooks =& load_class('Hooks', 'core');

        /** Hook point */
        $this->hooks->call_hook('sites_construct');
    }

    /**
     * Loads site's dashboard
     *
     * @return  void
     */
    public function index()
    {
        /** Hook point */
        $this->hooks->call_hook('sites_index_pre');

        $this->data['title'] = $this->lang->line('sites_index_title');
        $this->data['content'] = 'sites';
        $this->data['page'] = 'site';
        /** Grab us some sites */
        $this->data['sites'] = $this->MSites->all();
        /** Get all users */
        $this->data['users'] = $this->MUsers->get_all();
        $gateway = $this->MPayments->get_by_name('payment_gateway');
        $this->data['packages'] = $this->MPackages->get_all($gateway[0]->value);
        $package = $this->MPackages->get_by_id($this->session->userdata('package_id'));
        $sites = $this->MSites->site_by_user($this->session->userdata('user_id'));
        if (count($package) > 0)
        {
            $user_sites = count($sites);
            $package_sites = (int)$package['sites_number'];
            if ($user_sites > 0)
            {
                /** User's site is more or equal to its package number */
                if ($user_sites >= $package_sites)
                {
                    $this->data['site_limitation'] = $this->lang->line('sites_index_reach_site_number');
                }
                else if ($user_sites + 2 >= $package_sites)
                {
                    $this->data['site_limitation'] = $this->lang->line('sites_index_almost_reach_site_number');
                }
            }
        }

        /** Hook point */
        $this->hooks->call_hook('sites_index_post');

        $this->load->view('layout', $this->data);
    }

    /**
     * Loads page builder
     *
     * @return  void
     */
    public function create()
    {
        /** Hook point */
        $this->hooks->call_hook('sites_create_pre');

        /** Check if it is admin or normal user */
        if ($this->session->userdata('user_type') == "Admin")
        {
            /** Create a new, empty site */
            $site_id = $this->MSites->createNew();
        }
        else
        {
            /** Check if user package support create new site */
            $package = $this->MPackages->get_by_id($this->session->userdata('package_id'));
            $sites = $this->MSites->site_by_user($this->session->userdata('user_id'));

            /** User has some sites */
            if (count($sites) > 0)
            {
                /** User's site is more or equal its package number */
                if (count($sites) >= $package['sites_number'])
                {
                    $this->session->set_flashdata('error', $this->lang->line('sites_create_site_exceed'));
                    redirect('sites', 'refresh');
                }
                else
                {
                    /** Create a new, empty site */
                    $site_id = $this->MSites->createNew();
                }
            }
            else
            {
                /** Create a new, empty site */
                $site_id = $this->MSites->createNew();
            }
        }

        /** Hook point */
        $this->hooks->call_hook('sites_create_post');

        redirect('sites/' . $site_id, 'refresh');
    }

    /**
     * Saves page as a template for future use
     *
     * @return  json    $return
     */
    public function tsave()
    {
        /** Hook point */
        $this->hooks->call_hook('sites_tsave_pre');

        /** Do we have some frames to save? */
        if ( ! isset($_POST['pages']) && $_POST['pages'] != '')
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_tsave_no_page_error_heading');
            $temp['content'] = $this->lang->line('sites_tsave_no_page_error_message');

            $this->return = array();
            $this->return['responseCode'] = 0;
            $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

            die(json_encode($this->return));
        }

        $templateID = $this->MPages->saveTemplate($_POST['pages'], $_POST['fullPage'], $_POST['templateID']);

        // $this->return = array();

        /** All good */
        if ($templateID)
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_tsave_template_save_success_heading');
            $temp['content'] = $this->lang->line('sites_tsave_template_save_success_message');

            $this->return = array();
            $this->return['responseCode'] = 1;
            $this->return['templateID'] = $templateID;
            $this->return['responseHTML'] = $this->load->view('shared/success', array('data'=>$temp), TRUE);
        }
        /** Not good */
        else
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_tsave_template_save_fail_heading');
            $temp['content'] = $this->lang->line('sites_tsave_template_save_fail_message');

            $this->return = array();
            $this->return['responseCode'] = 0;
            $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);
        }

        /** Hook point */
        $this->hooks->call_hook('sites_tsave_post');

        die(json_encode($this->return));
    }

    /**
     * Used to create new sites AND save existing ones
     *
     * @param  integer  $forPublish
     * @return json     $return
     */
    public function save($forPublish = 0)
    {
        /** Hook point */
        $this->hooks->call_hook('sites_save_pre');

        /** Do we have the required data? */
        if ( ! isset($_POST['siteData']))
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_save_no_data_error_heading');
            $temp['content'] = $this->lang->line('sites_save_no_data_error_message');

            $this->return = array();
            $this->return['responseCode'] = 0;
            $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

            die(json_encode($this->return));
        }

        /** Do we have some frames to save? */
        if (( ! isset($_POST['pages']) || $_POST['pages'] == '') && ( ! isset($_POST['toDelete'])))
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_save_no_frame_error_heading');
            $temp['content'] = $this->lang->line('sites_save_no_frame_error_message');

            $this->return = array();
            $this->return['responseCode'] = 0;
            $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

            die(json_encode($this->return));
        }

        /** Should we save an existing site or create a new one? */
        $this->MSites->update($_POST['siteData'], $_POST['pages']);

        /** Delete any pages? */
        if (isset($_POST['toDelete']) && is_array($_POST['toDelete']) && count($_POST['toDelete']) > 0)
        {
            foreach ($_POST['toDelete'] as $page)
            {
                $this->MPages->delete($_POST['siteData']['sites_id'], $page);
            }
        }

        $this->return = array();

        /** Regular site save */
        if ($forPublish == 0)
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_save_after_publish_success_heading');
            $temp['content'] = $this->lang->line('sites_save_after_publish_success_message');
        }
        /** Saving before publishing, requires different message */
        else if ($forPublish == 1)
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_save_before_publish_success_heading');
            $temp['content'] = $this->lang->line('sites_save_before_publish_success_message');
        }

        $this->return['responseCode'] = 1;
        $this->return['responseHTML'] = $this->load->view('shared/success', array('data'=>$temp), TRUE);

        /** Hook point */
        $this->hooks->call_hook('sites_save_post');

        die(json_encode($this->return));
    }

    /**
     * Loads some configuration data with ajax call
     *
     * @return json     $return
     */
    public function siteData()
    {
        /** Hook point */
        $this->hooks->call_hook('sites_siteData_pre');

        $this->return = $this->MSites->getSite($this->session->userdata('siteID'));

        /** Delete unneeded stuff */
        unset($this->return['assetFolders']);

        /** Admin or no? */
        if ($this->session->userdata('user_type') == "Admin")
        {
            $this->return['is_admin'] = 1;
        }
        else
        {
            $this->return['is_admin'] = 0;
        }

        if ($this->config->item('google_api') !== '')
        {
            $this->return['google_api'] = $this->config->item('google_api');
        }

        /** Hook point */
        $this->hooks->call_hook('sites_siteData_post');

        echo json_encode($this->return);
    }

    /**
     * Get and retrieve single site data
     *
     * @param  integer  $siteID
     * @return void
     */
    public function site($siteID)
    {
        /** Hook point */
        $this->hooks->call_hook('sites_site_pre');

        $this->load->helper('thumb');

        /** Store the session ID with this session */
        $this->session->set_userdata('siteID', $siteID);

        /** If user is not an admin, we'll need to check of this site belongs to this user */
        if ($this->session->userdata('user_type') != "Admin")
        {
            if ( ! $this->MSites->isMine($siteID))
            {
                redirect('/sites');
            }

            // $hosting = $this->MPackages->get_by_id($this->session->userdata('package_id'));
            // $this->data['hosting_option'] = json_decode($hosting['hosting_option']);
            // print_r($this->data['hosting_option']);
            // die();
        }

        $siteData = $this->MSites->getSite($siteID);
        if ($siteData == FALSE)
        {
            /** Site could not be loaded, redirect to /sites, with error message */
            $this->session->set_flashdata('error', $this->lang->line('sites_site_could_not_load_error'));
            redirect('/sites', 'refresh');
        }
        else
        {
            $this->data['siteData'] = $siteData;

            /** Get page data */
            $pagesData = $this->MPages->getPageData($siteID);
            if ($pagesData)
            {
                $this->data['pagesData'] = $pagesData;
            }

            /** Collect data for the image library */
            $userID = $this->session->userdata('user_id');;
            $userImages = $this->MUsers->getUserImages($userID);
            if ($userImages)
            {
                $this->data['userImages'] = $userImages;
            }
            else
            {
                $this->data['userImages'] = [];
            }

            $adminImages = $this->MSites->adminImages();
            if ($adminImages)
            {
                $this->data['adminImages'] = $adminImages;
            }
            else
            {
                $this->data['adminImages'] = [];
            }

            /** Pre-build templates */
            if ($this->session->userdata('user_type') == 'Admin')
            {
                $pages = $this->MPages->getAllTemplates();
            }
            else
            {
                $package = $this->MPackages->get_by_id($this->session->userdata('package_id'));
                if (json_decode($package['templates']) == NULL)
                {
                    $pages = NULL;
                }
                else
                {
                    $pages = $this->MPages->getAllTemplates(json_decode($package['templates'], TRUE));
                }
            }

            if ($pages)
            {
                $this->data['templates'] = $this->load->view('shared/templateframes', array('pages'=>$pages), TRUE);
            }

            /** Grab all revisions */
            $this->data['revisions'] = $this->MRevisions->getForSite($siteID, 'index');
            // Grab pacakge details
            $this->data['package'] = $this->MPackages->get_by_id($this->session->userdata('package_id'));
            //print_r($this->data['package']); die();

            $this->data['builder'] = TRUE;
            $this->data['page'] = "site_builder";
            $this->data['content'] = "create";

            /** Hook point */
            $this->hooks->call_hook('sites_site_post');

            $this->load->view('layout', $this->data);
        }
    }

    /**
     * Get and retrieve single site data with ajax
     *
     * @param  string   $siteID
     * @return json     $return
     */
    public function siteAjax($siteID = '')
    {
        /** Hook point */
        $this->hooks->call_hook('sites_siteAjax_pre');

        /** If siteID is missing */
        if ($siteID == '' || $siteID == 'undefined')
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_siteAjax_siteID_missing_error_heading');
            $temp['content'] = $this->lang->line('sites_siteAjax_siteID_missing_error_message');

            $this->return = array();
            $this->return['responseCode'] = 0;
            $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

            die(json_encode($this->return));
        }

        $siteData = $this->MSites->getSite($siteID);

        /** All did not go well */
        if ($siteData == FALSE)
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_siteAjax_site_save_error_heading');
            $temp['content'] = $this->lang->line('sites_siteAjax_site_save_error_message');

            $this->return = array();
            $this->return['responseCode'] = 0;
            $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

            /** Hook point */
            $this->hooks->call_hook('sites_siteAjax_error');

            echo json_encode($this->return);
        }
        /** All went well */
        else
        {
            $this->return = array();
            $this->return['responseCode'] = 1;
            $this->return['responseHTML'] = $this->load->view('shared/sitedata', array('data' => $siteData), TRUE);

            /** Hook point */
            $this->hooks->call_hook('sites_siteAjax_success');

            echo json_encode($this->return);
        }
    }

    /**
     * Updates site details, submitting through ajax
     *
     * @return json     $return
     */
    public function siteAjaxUpdate()
    {
        /** Hook point */
        $this->hooks->call_hook('sites_siteAjaxUpdate_pre');

        $this->form_validation->set_rules('siteID', 'Site ID', 'required');
        $this->form_validation->set_rules('siteSettings_siteName', 'Site name', 'required');
        /** All did not go well */
        if ($this->form_validation->run() == FALSE)
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_siteAjaxUpdate_validation_error_heading');
            $temp['content'] = $this->lang->line('sites_siteAjaxUpdate_validation_error_message') . validation_errors();

            $this->return = array();
            $this->return['responseCode'] = 0;
            $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

            echo json_encode($this->return);
        }
        /** All good with the data, let's update */
        else
        {
            /** check if sub folder already exist */
            if (trim($this->input->post('sub_folder')) != "")
            {
                $sub_folder = $this->MSites->get_by_field_value('sub_folder', trim($this->input->post('sub_folder')));
                if (count($sub_folder) > 0)
                {
                    $arr = array_filter($sub_folder, function($ar)
                    {
                        return ($ar['sites_id'] != $this->input->post('siteID'));
                    });
                    if (count($arr) > 0)
                    {
                        $temp = array();
                        $temp['header'] = $this->lang->line('sites_siteAjaxUpdate_sub_folder_error_heading');
                        $temp['content'] = $this->lang->line('sites_siteAjaxUpdate_sub_folder_error_message') . validation_errors();

                        $this->return = array();
                        $this->return['responseCode'] = 0;
                        $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

                        echo json_encode($this->return);
                        die();
                    }
                }
            }

            /** check if sub domain already exist */
            if (trim($this->input->post('sub_domain')) != "")
            {
                $sub_domain = $this->MSites->get_by_field_value('sub_domain', trim($this->input->post('sub_domain')));
                if (count($sub_domain) > 0)
                {
                    $arr = array_filter($sub_domain, function($ar)
                    {
                        return ($ar['sites_id'] != $this->input->post('siteID'));
                    });
                    if (count($arr) > 0)
                    {
                        $temp = array();
                        $temp['header'] = $this->lang->line('sites_siteAjaxUpdate_sub_domain_error_heading');
                        $temp['content'] = $this->lang->line('sites_siteAjaxUpdate_sub_domain_error_message') . validation_errors();

                        $this->return = array();
                        $this->return['responseCode'] = 0;
                        $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

                        echo json_encode($this->return);
                        die();
                    }
                }
            }

            /** check if custom domain already exist */
            if (trim($this->input->post('custom_domain')) != "")
            {
                $custom_domain = $this->MSites->get_by_field_value('custom_domain', trim($this->input->post('custom_domain')));
                if (count($custom_domain) > 0)
                {
                    $arr = array_filter($custom_domain, function($ar)
                    {
                        return ($ar['sites_id'] != $this->input->post('siteID'));
                    });
                    if (count($arr) > 0)
                    {
                        $temp = array();
                        $temp['header'] = $this->lang->line('sites_siteAjaxUpdate_custom_domain_error_heading');
                        $temp['content'] = $this->lang->line('sites_siteAjaxUpdate_custom_domain_error_message') . validation_errors();

                        $this->return = array();
                        $this->return['responseCode'] = 0;
                        $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

                        echo json_encode($this->return);
                        die();
                    }
                }
            }

            if ($this->MSites->updateSiteData($this->input->post()))
            {
                $temp = array();
                $temp['header'] = $this->lang->line('sites_siteAjaxUpdate_save_success_heading');
                $temp['content'] = $this->lang->line('sites_siteAjaxUpdate_save_success_message');

                $this->return = array();
                $this->return['responseCode'] = 1;
                $this->return['responseHTML'] = $this->load->view('shared/success', array('data'=>$temp), TRUE);

                /** We'll send back the updated site data as well */
                $siteData = $this->MSites->getSite($this->input->post('siteID'));
                $this->return['responseHTML2'] = $this->load->view('shared/sitedata', array('data'=>$siteData), TRUE);
                $this->return['siteName'] = $siteData['site']->sites_name;
                $this->return['siteID'] = $siteData['site']->sites_id;
                $this->return['siteSubFolder'] = $siteData['site']->sub_folder;

                /** Hook point */
                $this->hooks->call_hook('sites_siteAjaxUpdate_success');

                echo json_encode($this->return);
            }
            else
            {
                $temp = array();
                $temp['header'] = $this->lang->line('sites_siteAjaxUpdate_save_error_heading');
                $temp['content'] = $this->lang->line('sites_siteAjaxUpdate_save_error_message');

                $this->return = array();
                $this->return['responseCode'] = 0;
                $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

                /** Hook point */
                $this->hooks->call_hook('sites_siteAjaxUpdate_error');

                echo json_encode($this->return);
            }
        }
    }

    /**
     * Gets the content of a saved frame and sends it back to the browser
     *
     * @param  integer  $frameID
     * @return void
     */
    public function getframe($frameID)
    {
        $frame = $this->MSites->getSingleFrame($frameID);
        echo $frame->frames_content;
    }

    /**
     * Publishes a site via FTP
     *
     * @param  string $type
     * @return void
     */
    public function publish_ftp($type = 'page')
    {
        $this->load->helper('file');
        $this->load->helper('directory');
        /** Some error prevention first */
        /** siteID ok? */
        $siteDetails = $this->MSites->getSite($_POST['siteID']);
        if ($siteDetails == FALSE)
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_publish_ftp_no_site_error_heading');
            $temp['content'] = $this->lang->line('sites_publish_ftp_no_site_error_message');

            $this->return = array();
            $this->return['responseCode'] = 0;
            $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

            die(json_encode($this->return));
        }

        /** Do we have anythin to publish at all? */
        /** Nothing to upload */
        if ( ! isset($_POST['item']) || $_POST['item'] == '')
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_publish_ftp_noting_to_upload_error_heading');
            $temp['content'] = $this->lang->line('sites_publish_ftp_noting_to_upload_error_message');

            $this->return = array();
            $this->return['responseCode'] = 0;
            $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

            die(json_encode($this->return));
        }

        $theSite = $this->MSites->siteData($_POST['siteID']);

        /** Establish FTP connection, needs error reporting */
        $this->load->library('ftp');
        $config['hostname'] = $siteDetails['site']->ftp_server;
        $config['username'] = $siteDetails['site']->ftp_user;
        $config['password'] = $siteDetails['site']->ftp_password;
        $config['port'] = $siteDetails['site']->ftp_port;
        /** Connection details are messed up */
        if ( ! $this->ftp->connect($config))
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_publish_ftp_connection_error_heading');
            $temp['content'] = $this->lang->line('sites_publish_ftp_connection_error_message');

            $this->return = array();
            $this->return['responseCode'] = 0;
            $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

            die(json_encode($this->return));
        }

        /** Uploading */
        /** Asset publishing */
        if ($type == 'asset')
        {
            /** Prevent timeout */
            set_time_limit(0);
            if ($_POST['item'] == 'images')
            {
                /** Create the /imaged folder? */
                if ( ! $this->ftp->list_files($siteDetails['site']->ftp_path . "/images/"))
                {
                    $this->ftp->mkdir($siteDetails['site']->ftp_path . "/images/");
                }
                $dirMap = directory_map('./elements/images/', 2);
                foreach ($dirMap as $key => $entry)
                {
                    if (is_array($entry))
                    {
                        /** Folder, do all but take special care of /uploads */
                        if ($key != 'uploads/')
                        {
                            $this->ftp->mirror('./elements/images/' . $key, $siteDetails['site']->ftp_path . "/images/" . $key);
                        }
                        /** Take special care of the uploads folder */
                        else
                        {
                            $userID = $this->session->userdata('user_id');

                            $uploadsMap = directory_map( './elements/images/uploads/', 1 );
                            foreach ($uploadsMap as $userIDFolder)
                            {
                                if ($userIDFolder == $userID . "/")
                                {
                                    /** Create the /imaged folder? */
                                    if ( ! $this->ftp->list_files( $siteDetails['site']->ftp_path . "/images/uploads/"))
                                    {
                                        $this->ftp->mkdir($siteDetails['site']->ftp_path . "/images/uploads/");
                                    }
                                    $this->ftp->mirror('./elements/images/uploads/' . $userIDFolder, $siteDetails['site']->ftp_path . "/images/uploads/" . $userIDFolder);
                                }
                            }
                        }
                    }
                    else
                    {
                        /** File */
                        $sourceFile = '/elements/images/' . $entry;
                        $destinationFile = $siteDetails['site']->ftp_path . "/images/" . $entry;
                        $this->ftp->upload('.' . $sourceFile, $destinationFile);
                    }
                }
            }
            else
            {
                $this->ftp->mirror('./elements/' . $_POST['item'] . '/', $siteDetails['site']->ftp_path . "/" . $_POST['item'] . "/");
            }
        }
        /** Page publishing */
        else if ($type == 'page')
        {
            /** Create temp files */
            /** Check to make sure the /tmp folder is writable */
            if ( ! is_writable('./tmp/'))
            {
                $temp = array();
                $temp['header'] = $this->lang->line('sites_publish_ftp_tmp_not_writable_error_heading');
                $temp['content'] = $this->lang->line('sites_publish_ftp_tmp_not_writable_error_message');

                $this->return = array();
                $this->return['responseCode'] = 0;
                $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

                die(json_encode($this->return));
            }
            /** Get page meta */
            $meta = '';
            $pageMeta = $this->MPages->getSinglePage($_POST['siteID'], $_POST['item']);
            if ($pageMeta)
            {
                /** Insert title, meta keywords and meta description */
                $meta .= '<title>' . $pageMeta->pages_title . '</title>' . "\r\n";
                $meta .= '<meta name="description" content="' . $pageMeta->pages_meta_description . '">' . "\r\n";
                $meta .= '<meta name="keywords" content="' . $pageMeta->pages_meta_keywords . '">';

                $pageContent = str_replace('<!--pageMeta-->', $meta, $_POST['pageContent']);

                /** Insert header includes; */
                $includesPlusCss = '';
                if ($pageMeta->pages_header_includes != '')
                {
                    $includesPlusCss .= $pageMeta->pages_header_includes;
                }
                if ($pageMeta->pages_css != '')
                {
                    $includesPlusCss .= "\n<style>" . $pageMeta->pages_css . "</style>\n";
                }
                if ($theSite->global_css != '')
                {
                    $includesPlusCss .= "\n<style>" . $theSite->global_css . "</style>\n";
                }
                $pageContent = str_replace("<!--headerIncludes-->", $includesPlusCss, $pageContent);
                /** Remove frameCovers */
                $pageContent = str_replace('<div class="frameCover" data-type="video"></div>', "", $pageContent);
            }
            else
            {
                $pageContent = $_POST['pageContent'];
            }
            if ( ! write_file('./tmp/' . $_POST['item'] . ".html", "<!-- DOCTYPE html -->" . $pageContent))
            {
                // echo 'Unable to write the file';
            }
            else
            {
                // echo 'File written!';
            }
            /** Upload temp files */
            /** Prevent timeout */
            set_time_limit(0);
            $this->ftp->mirror('./tmp/', $siteDetails['site']->ftp_path . "/");
            /** Remove all temp fiels */
            delete_files('./tmp/');
        }
        // All went well
        $this->MSites->published($_POST['siteID']);
        $this->return = array();
        $this->return['responseCode'] = 1;

        die(json_encode($this->return));
    }

    /**
     * Publishes a site
     *
     * @param  string   $type
     * @return void
     */
    public function publish($type = 'page')
    {
        $this->load->helper('file');
        $this->load->helper('directory');
        /** Some error prevention first */
        /** siteID ok? */
        $siteDetails = $this->MSites->getSite($_POST['siteID']);
        if ($siteDetails == FALSE)
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_publish_no_site_error_heading');
            $temp['content'] = $this->lang->line('sites_publish_no_site_error_message');

            $this->return = array();
            $this->return['responseCode'] = 0;
            $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

            die(json_encode($this->return));
        }

        /** Do we have anythin to publish at all? */
        /** Nothing to upload */
        if ( ! isset($_POST['item']) || $_POST['item'] == '')
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_publish_noting_to_upload_error_heading');
            $temp['content'] = $this->lang->line('sites_publish_noting_to_upload_error_message');

            $this->return = array();
            $this->return['responseCode'] = 0;
            $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

            die(json_encode($this->return));
        }

        $theSite = $this->MSites->siteData($_POST['siteID']);

        /** Uploading */
        /** Asset publishing */
        if ($type == 'asset')
        {
            /** Prevent timeout */
            set_time_limit(0);
            if ($_POST['item'] == 'images')
            {
                /** Copy all the files from site creators uploads folder */
                recursive_copy('./elements/images/uploads/' . $theSite->users_id, './published-sites/' . $_POST['siteID'] . '/images/uploads/' . $theSite->users_id);

                /** Copy all the files from uploads folder */
                $files = glob('./elements/images/uploads/*.*');
                foreach($files as $file)
                {
                    $file_to_go = str_replace('./elements/images/uploads/', './published-sites/' . $_POST['siteID'] . '/images/uploads/', $file);
                    copy($file, $file_to_go);
                }
            }
            else
            {
                recursive_copy('./elements/' . $_POST['item'], './published-sites/' . $_POST['siteID'] . '/' . $_POST['item']);
            }
        }
        /** Page publishing */
        else if ($type == 'page')
        {
            /** Get page meta */
            $meta = '';
            $pageMeta = $this->MPages->getSinglePage($_POST['siteID'], $_POST['item']);
            if ($pageMeta)
            {
                /** Insert title, meta keywords and meta description */
                $meta .= '<title>' . $pageMeta->pages_title . '</title>' . "\r\n";
                $meta .= '<meta name="description" content="' . $pageMeta->pages_meta_description . '">' . "\r\n";
                $meta .= '<meta name="keywords" content="' . $pageMeta->pages_meta_keywords . '">';

                $pageContent = str_replace('<!--pageMeta-->', $meta, $_POST['pageContent']);

                /** Insert header includes; */
                $includesPlusCss = '';
                if ($pageMeta->pages_header_includes != '')
                {
                    $includesPlusCss .= $pageMeta->pages_header_includes;
                }
                if ($pageMeta->pages_css != '')
                {
                    $includesPlusCss .= "\n<style>" . $pageMeta->pages_css . "</style>\n";
                }
                if ($theSite->global_css != '')
                {
                    $includesPlusCss .= "\n<style>" . $theSite->global_css . "</style>\n";
                }
                /** Insert header includes */
                $pageContent = str_replace("<!--headerIncludes-->", $includesPlusCss, $pageContent);
                /** Remove frameCovers */
                $pageContent = str_replace('<div class="frameCover" data-type="video"></div>', "", $pageContent);
            }
            else
            {
                $pageContent = $_POST['pageContent'];
            }
            if ( ! write_file('./published-sites/'. $_POST['siteID'] . '/' . $_POST['item'] . ".html", "<!-- DOCTYPE html -->" . $pageContent))
            {
                // echo 'Unable to write the file';
            }
            else
            {
                // echo 'File written!';
            }
        }
        /** All went well */
        $this->MSites->published($_POST['siteID']);
        $this->return = array();
        $this->return['responseCode'] = 1;

        die(json_encode($this->return));
    }

    /**
     * Exports a site
     *
     * @return void
     */
    public function export()
    {
        /** Hook point */
        $this->hooks->call_hook('sites_export_pre');

        $userID = $this->session->userdata('user_id');

        $zip = new ZipArchive();
        $zip->open("./tmp/" . $this->config->item('export_fileName'), ZipArchive::CREATE);

        /** Add folder structure */
        /** Prep path to assets array */
        $temp = explode("|", $this->config->item('export_pathToAssets'));

        foreach ($temp as $thePath)
        {
            /** Create recursive directory iterator */
            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator( $thePath ),
                RecursiveIteratorIterator::LEAVES_ONLY
                );
            foreach ($files as $name => $file)
            {
                if ($file->getFilename() != '.' && $file->getFilename() != '..')
                {
                    /** Get real path for current file */
                    $filePath = $file->getRealPath();

                    if (strpos($file,'images/') === FALSE) {
                        $temp = explode("/", $name);
                        array_shift( $temp );
                        $newName = implode("/", $temp);
                    } else {
                        $newName = $name;
                    }

                    if ($thePath == 'images')
                    {
                        /** Check if this is a user file */
                        if (strpos($file,'/uploads') !== FALSE)
                        {
                            if (strpos($file,'/uploads/' . $userID . '/') !== FALSE || $this->session->userdata('user_type') == "Admin")
                            {
                                /** Add current file to archive */
                                $zip->addFile($filePath, $newName);
                            }
                        }
                        else
                        {
                            /** Add current file to archive */
                            $zip->addFile($filePath, $newName);
                        }
                    }
                    else
                    {
                        /** Add current file to archive */
                        $zip->addFile($filePath, $newName);
                    }
                }
            }
        }

        $theSite = $this->MSites->siteData($_POST['siteID']);
        foreach ($_POST['pages'] as $page=>$content)
        {
            /** Get page meta */
            $pageMeta = $this->MPages->getSinglePage($_POST['siteID'], $page);

            /** fix up bits in the <head> */
            $pageContent = str_replace('<html><head>', "<html>\n<head>", $content);
            $pageContent = str_replace('</head>', "\n</head>", $pageContent);
            $pageContent = str_replace('<style', "\n\t<style", $pageContent);
            $pageContent = str_replace('</style><link', "</style>\n\t<link", $pageContent);

            if ($pageMeta)
            {
                /** Insert title, meta keywords and meta description */
                $meta = '<title>' . $pageMeta->pages_title . '</title>' . "\r\n";
                $meta .= "\t".'<meta name="description" content="' . $pageMeta->pages_meta_description . '">' . "\r\n";
                $meta .= "\t".'<meta name="keywords" content="' . $pageMeta->pages_meta_keywords . '">';
                $pageContent = str_replace('<!--pageMeta-->', $meta, $pageContent);

                /** Insert header includes; */
                $includesPlusCss = '';
                if ($pageMeta->pages_header_includes != '')
                {
                    $includesPlusCss .= $pageMeta->pages_header_includes;
                }
                if ($pageMeta->pages_css != '')
                {
                    $includesPlusCss .= "\n\t<style>" . $pageMeta->pages_css . "</style>\n";
                }
                if ($theSite->global_css != '')
                {
                    $includesPlusCss .= "\n\t<style>" . $theSite->global_css . "</style>\n";
                }
                /** Insert header includes */
                $pageContent = str_replace('<!--headerIncludes-->', $includesPlusCss, $pageContent);
            }
            else
            {
                $pageContent = $content;
            }

            /** Remove frameCovers */
            $pageContent = str_replace('<div class="frameCover" data-type="video"></div>', "", $pageContent);

            /** This is needed for correct exports */
            $pageContent = str_replace('src="../', 'src="', $pageContent);
            $pageContent = str_replace("src='../", "src='", $pageContent);
            $pageContent = str_replace('url(../', 'url(', $pageContent);
            $pageContent = str_replace("url('../", "url('", $pageContent);
            $pageContent = str_replace('url("../', 'url("', $pageContent);
            $pageContent = str_replace('&quot;../bundles/', '&quot;bundles/', $pageContent);//FF needs this

            if ($this->config->item('google_api') !== '')
            {
                $pageContent = str_replace('</body>', '<script async defer src="https://maps.googleapis.com/maps/api/js?key=' . $this->config->item('google_api') . '&callback=initMap"></script>' . '</body>' . "\n", $pageContent);
            }

            /** setup of htmLawed helper */
            $this->load->helper('htmlawed');

            $config = array(
                'tidy' => '1t1n',
                'direct_nest_list' => 1,
                'keep_bad' => 0,
                'css_expression' => 1,
                'elements' => '*',
                'lc_std_val' => 0,
                'make_tag_strict' => 0,
                'no_deprecated_attr' => 0,
                'style_pass' => 1,
                'unique_ids' => 0,
                'parent' => 'body',
                'hook_tag' => 'my_tag_function'
                );


            /** simle html dom library */
            $this->load->library('Simple_html_dom');
            $raw = str_get_html($pageContent, true, true, DEFAULT_TARGET_CHARSET, false);

            /** body first */
            $body = $raw->find('body')[0];
            $sanitzedBody = htmLawed($body, $config);
            $raw->find('body')[0]->innertext = $sanitzedBody;

            /** last minute clean up of <script> tags */
            $raw = str_replace("\n\t\t \n\t</script>", "</script>", $raw);
            $raw = str_replace("\t</body>", "</body>", $raw);

            // die($raw);

            $zip->addFromString($page . ".html", $_POST['doctype'] . "\n" . stripslashes($raw));
            // echo $content;
        }

        function my_tag_function($element, $attribute_array=0)
        {
            if (is_numeric($attribute_array))
            {
                if ($element == 'script')
                {
                    return "</$element>";
                }
                else
                {
                    return "</$element>";
                }
            }

            $string = '';
            foreach ($attribute_array as $k=>$v)
            {
                $string .= " {$k}=\"{$v}\"";
            }

            if ($element == 'script')
            {
                return "<{$element}{$string}> ";
            }
            else
            {
                return "<{$element}{$string}>";
            }
        }

        $zip->close();
        $yourfile = $this->config->item('export_fileName');
        $file_name = basename($yourfile);

        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: Binary");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Length: " . filesize("./tmp/" . $yourfile));

        readfile("./tmp/" . $yourfile);

        unlink('./tmp/' . $yourfile);

        /** Hook point */
        $this->hooks->call_hook('sites_export_post');

        exit;
    }

    /**
     * Moves a single site to the trash bin
     *
     * @param  string   $site_id
     * @return json     $return
     */
    public function trash($site_id = '')
    {
        /** Hook point */
        $this->hooks->call_hook('sites_trash_pre');

        if ($site_id == '' || $site_id == 'undefined')
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_trash_no_site_error_heading');
            $temp['content'] = $this->lang->line('sites_trash_no_site_error_message');

            $this->return = array();
            $this->return['responseCode'] = 0;
            $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

            die(json_encode($this->return));
        }

        /** All good, move to trash */
        $this->MSites->trash($site_id);

        $temp = array();
        $temp['header'] = $this->lang->line('sites_trash_success_heading');
        $temp['content'] = $this->lang->line('sites_trash_success_message');

        $this->return = array();
        $this->return['responseCode'] = 1;
        $this->return['responseHTML'] = $this->load->view('shared/success', array('data'=>$temp), TRUE);

        /** Hook point */
        $this->hooks->call_hook('sites_trash_post');

        die(json_encode($this->return));
    }

    /**
     * Updates page meta data with ajax call
     *
     * @return json     $return
     */
    public function updatePageData()
    {
        /** Hook point */
        $this->hooks->call_hook('sites_updatePageData_pre');

        if ($_POST['siteID'] == '' || $_POST['siteID'] == 'undefined' || ! isset($_POST))
        {
            $temp = array();
            $temp['header'] = $this->lang->line('sites_updatePageData_no_site_error_heading');
            $temp['content'] = $this->lang->line('sites_updatePageData_no_site_error_message');

            $this->return = array();
            $this->return['responseCode'] = 0;
            $this->return['responseHTML'] = $this->load->view('shared/error', array('data'=>$temp), TRUE);

            die(json_encode($this->return));
        }

        /** Update page data */
        $this->pagemodel->updatePageData($_POST);

        /** Return page data as well */
        $this->return = array();
        $pagesData = $this->pagemodel->getPageData($_POST['siteID']);
        if ($pagesData)
        {
            $this->return['pagesData'] = $pagesData;
        }

        $temp = array();
        $temp['header'] = $this->lang->line('sites_updatePageData_success_heading');
        $temp['content'] = $this->lang->line('sites_updatePageData_success_message');

        $this->return['responseCode'] = 1;
        $this->return['responseHTML'] = $this->load->view('shared/success', array('data'=>$temp), TRUE);

        /** Hook point */
        $this->hooks->call_hook('sites_updatePageData_post');

        die(json_encode($this->return));
    }

    /**
     * Function generates a live preview of current changes
     *
     * @return void
     */
    public function livepreview()
    {
        /** Hook point */
        $this->hooks->call_hook('sites_livepreview_pre');

        if (isset($_POST['siteID']) && $_POST['siteID'] != '')
        {
            $siteData = $this->MSites->siteData($_POST['siteID']);
        }

        $meta = '';
        /** Page title */
        if (isset($_POST['meta_title']) && $_POST['meta_title'] != '')
        {
            $meta .= '<title>' . $_POST['meta_title'] . '</title>' . "\n";
        }
        /** Page meta description */
        if (isset($_POST['meta_description']) && $_POST['meta_description'] != '')
        {
            $meta .= '<meta name="description" content="' . $_POST['meta_description'] . '"/>' . "\n";
        }
        /** Page meta keywords */
        if (isset($_POST['meta_keywords']) && $_POST['meta_keywords'] != '')
        {
            $meta .= '<meta name="keywords" content="' . $_POST['meta_keywords'] . '"/>' . "\n";
        }
        /** Replace meta value */
        $content = str_replace('<!--pageMeta-->', $meta, "<!DOCTYPE html>\n" . $_POST['page']);

        /** Replace both inline css image url and image tag src */
        $content = str_replace('../bundles', 'bundles', $content);

        $head = '';
        /** Page header includes */
        if (isset($_POST['header_includes']) && $_POST['header_includes'] != '')
        {
            $head .= $_POST['header_includes'] . "\n";
        }
        /** Page css */
        if (isset($_POST['page_css']) && $_POST['page_css'] != '')
        {
            $head .= "\n<style>" . $_POST['page_css'] . "</style>\n";
        }
        /** Global css */
        if ($siteData->global_css != '')
        {
            $head .= "\n<style>" . $siteData->global_css . "</style>\n";
        }

        /** Custom header to deal with XSS protection */
        header("X-XSS-Protection: 0");

        /** Hook point */
        $this->hooks->call_hook('sites_livepreview_post');

        echo str_replace('<!--headerIncludes-->', $head, $content);
    }

    /**
     * Delete template
     *
     * @param  integer  $site_id
     * @param  integer  $page_id
     * @return void
     */
    public function deltempl($site_id, $page_id)
    {
        /** Hook point */
        $this->hooks->call_hook('sites_deltempl_pre');

        if ($this->session->userdata('user_type') != "Admin")
        {
            die($this->lang->line('admin_permission_error'));
        }
        $this->MPages->deleteTemplate($site_id, $page_id);
        $return = array();
        $this->session->set_flashdata('success', $this->lang->line('sites_deltempl_delete_success'));

        /** Hook point */
        $this->hooks->call_hook('sites_deltempl_post');

        redirect('sites/' . $site_id, 'refresh');
    }

    /**
     * Attempts to retrieve a preview for a revision
     *
     * @param  string   $siteID
     * @param  string   $revisionStamp
     * @return void
     */
    public function rpreview( $siteID = '', $revisionStamp = '')
    {
        /** Hook point */
        $this->hooks->call_hook('sites_rpreview_pre');

        if ($siteID == '' || $revisionStamp == '' || $_GET['p'] == '')
        {
            die($this->lang->line('sites_rpreview_error'));
        }
        $page = $_GET['p'];
        $this->revisionOutput = $this->MRevisions->buildRevision($siteID, $revisionStamp, $page);

        /** Hook point */
        $this->hooks->call_hook('sites_rpreview_post');

        echo $this->revisionOutput;
    }

    /**
     * Updates revisions for a certain page with ajax call
     *
     * @param  string   $siteID
     * @param  string   $page
     * @return void
     */
    public function getRevisions($siteID = '', $page = '')
    {
        /** Hook point */
        $this->hooks->call_hook('sites_getRevisions_pre');

        if ($siteID != '' && $page != '')
        {
            $this->revisions = $this->MRevisions->getForSite( $siteID, $page );

            /** Hook point */
            $this->hooks->call_hook('sites_getRevisions_post');

            $this->load->view('shared/revisions', array('revisions'=>$this->revisions, 'page'=>$page, 'siteID'=>$siteID));
        }
    }

    /**
     * Deletes a revision with ajax call
     *
     * @param  string   $siteID
     * @param  string   $timestamp
     * @param  string   $page
     * @return json     $return
     */
    public function deleterevision($siteID = '', $timestamp = '', $page = '')
    {
        /** Hook point */
        $this->hooks->call_hook('sites_deleterevision_pre');

        $this->return = array();
        if ($siteID == '' || $timestamp == '' || $page == '')
        {
            $this->return['code'] = 0;
            $this->return['message'] = $this->lang->line('sites_deleterevision_delete_error');
            die(json_encode($this->return));
        }
        $this->MRevisions->delete($siteID, $timestamp, $page);
        $this->return['code'] = 1;
        $this->return['message'] = $this->lang->line('sites_deleterevision_delete_success');

        /** Hook point */
        $this->hooks->call_hook('sites_deleterevision_post');

        echo json_encode($this->return);
    }

    /**
     * Restores a revision for a specific page
     *
     * @param  string   $siteID
     * @param  string   $timestamp
     * @param  string   $page
     * @return void
     */
    public function restorerevision($siteID = '', $timestamp = '', $page = '')
    {
        /** Hook point */
        $this->hooks->call_hook('sites_restorerevision_pre');

        if ($siteID == '' || $timestamp == '' || $page == '')
        {
            die($this->lang->line('sites_restorerevision_error'));
        }
        $this->MRevisions->restore($siteID, $timestamp, $page);

        /** Hook point */
        $this->hooks->call_hook('sites_restorerevision_post');

        redirect('sites/' . $siteID . "?p=" . $page, 'location');
    }

    /**
     * Loads a single page so a screenshot can be generated
     *
     * @param  string   $pageID
     * @return void
     */
    public function loadsinglepage($pageID)
    {
        die($this->MPages->load_page($pageID));
    }

    /**
     * Controller desctruct method for custom hook point
     *
     * @return void
     */
    public function __destruct()
    {
        /** Hook point */
        $this->hooks->call_hook('sites_destruct');
    }

}