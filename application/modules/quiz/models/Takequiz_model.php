<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Takequiz_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
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
    
    /**
     * updates the apps settings settings
     * @param  array    $value
     */
    public function update($value) {

	    //elements_dir
	    $data = array(
        	'value' => $value['elements_dir']
        );

        $this->db->where('id', 1);
        $this->db->update('apps_settings', $data);


        //images_dir
	    $data = array(
        	'value' => $value['images_dir']
        );

        $this->db->where('id', 2);
        $this->db->update('apps_settings', $data);


        //images_uploadDir
	    $data = array(
        	'value' => $value['images_uploadDir']
        );

        $this->db->where('id', 3);
        $this->db->update('apps_settings', $data);


        //upload_allowed_types
	    $data = array(
        	'value' => $value['upload_allowed_types']
        );

        $this->db->where('id', 4);
        $this->db->update('apps_settings', $data);


        //upload_max_size
	    $data = array(
        	'value' => $value['upload_max_size']
        );

        $this->db->where('id', 5);
        $this->db->update('apps_settings', $data);


        //images_allowedExtensions
	    $data = array(
        	'value' => $value['images_allowedExtensions']
        );

        $this->db->where('id', 8);
        $this->db->update('apps_settings', $data);


        //export_pathToAssets
	    $data = array(
        	'value' => $value['export_pathToAssets']
        );

        $this->db->where('id', 9);
        $this->db->update('apps_settings', $data);


        //export_fileName
	    $data = array(
        	'value' => $value['export_fileName']
        );

        $this->db->where('id', 10);
        $this->db->update('apps_settings', $data);


        //language
	    $data = array(
        	'value' => $value['language']
        );

        $this->db->where('id', 11);
        $this->db->update('apps_settings', $data);


        //language
        $data = array(
            'value' => $value['google_api']
        );

        $this->db->where('id', 12);
        $this->db->update('apps_settings', $data);

    }
    
    public function submitresult($results,$contactresultid,$quizid){
        // $title = "Quiz";
        // $description = "Another Quiz";
        $table = "results";
        foreach ($results as $key => $data) {
            $data = array(
                'contacts_results_id' => $contactresultid,
                'quiz_id' => $quizid,
                'question_id' => $data->questionid,
                'answer_id' => $data->answerid,
            );
            $this->db->insert($table, $data);
        }
    }

    public function Addcontacts_results($contactid,$quizid,$outcomeid){
        // $title = "Quiz";
        // $description = "Another Quiz";
        $table = "contacts_results";
        $data = array(
            'contact_id' => $contactid,
            'quiz_id' => $quizid,
            'outcome_id' => $outcomeid,  
        );
        $this->db->insert($table, $data);
        $new_contacts_results_id = $this->db->insert_id();
        return $new_contacts_results_id;
    }

    public function GetOutcomeDetails($outcomeid,$outcometable){
        
        $table = $outcometable;
        $query  = $this->db->get_where($table,array('id'=>$outcomeid));
            
        return $query->first_row();
    }

    public function get_outcome_info($id,$table){
        $query = $this->db->get_where($table,array('id'=>$id));
                    
        return $query->result();
        
    }


}