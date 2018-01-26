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
        $quizid = $CI->data['quizid'];
        $quizinfo = $CI->data['quiz'][0];
        //   echo "test";
        //  var_dump($quizinfo->user_id);

        $table  = "quiz_views";
        $data = array(
            'quiz_token' => $quizinfo->auth_token,
            'user_token' => $quizinfo->user_token,
        );
        $this->db->insert($table, $data);
        
        // $new_quiz_id = $this->db->insert_id();
    }
    
    public function startquiz(){
        $CI =& get_instance();
        $quizinfo = $CI->data['quizdata'];
        //   echo "test";
        //  var_dump($quizinfo->user_id);

        $table  = "quiz_starts";
        $data = array(
            'quiz_token' => $quizinfo->quizid,
            'user_token' => $quizinfo->user_id,
        );
        $this->db->insert($table, $data);
        
        // $new_quiz_id = $this->db->insert_id();
    }

    public function completequiz(){
        $CI =& get_instance();
        $quizinfo = $CI->data['quizdata'];
        //   echo "test";
        //  var_dump($quizinfo->user_id);

        $table  = "quiz_completions";
        $data = array(
            'quiz_token' => $quizinfo->quizid,
            'user_token' => $quizinfo->user_id,
        );
        $this->db->insert($table, $data);
        
        // $new_quiz_id = $this->db->insert_id();
    }

    
   
}