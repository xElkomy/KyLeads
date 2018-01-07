<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_Report_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
       
        $CI =& get_instance();
    }

    /**
     * Get all apps settings values from the DB
     * @return object   $q->result
     */
    public function get_all()
    {
	    $q = $this->db->get('apps_settings');
	    return $q->result();
    }

    public function addViews(){
        $CI =& get_instance();
        $data = $CI->data['quizid'];
    //    echo "test";
        // var_dump($data);

        // $table  = "quiz_views";
        // $data = array(
        //     'quiz_id' => 1,
        //     'user_id' => 1,
        // );
        // $this->db->insert($table, $data);
        
        // $new_quiz_id = $this->db->insert_id();
    }
    
   
}