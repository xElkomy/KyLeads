<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller
{
    public function index()
    {
        // Only Change version in future
        // $option = array(
        //                 'migration_enabled' => TRUE,
        //                 'migration_path' => APPPATH.'migrations/',
        //                 'migration_version' => 001
        //             );
        // $this->load->library('migration', $option);

        $this->load->library('migration');

        if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        }
        else
        {
            echo $this->lang->line('migrate_success');
        }
    }
}
