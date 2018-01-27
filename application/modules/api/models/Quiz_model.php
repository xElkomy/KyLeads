<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_model extends CI_Model {

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
    
  
    

    public function view_quizzes(){

        $query  = $this->db->get_where('quizzes');
        return $query->result();
    }

    public function view_quiz($id,$table){
        $data = array('id'=>$id);
        $query = $this->db->get_where($table,$data);

        return $query->first_row();
    }


    public function view_all_choices(){
        
        $query  = $this->db->get('choices');
                    
        return $query->result();
        
    }

    public function view_questions($quizID,$table){
        
        $query = $this->db->get_where($table,array('quiz_id'=>$quizID));

        return $query->result();
        
    }


    public function view_question_data($quizID){
        $results = $this->db->get_where('questions',array('quiz_id'=>$quizID))->result(); 
        foreach($results as $key => $val){
            $results[$key]->choices = $this->view_choices($val->id,'choices'); 
        } 
        return $results;
    }
    public function view_choices($questionID,$table){
        
        $query = $this->db->get_where($table,array('question_id'=>$questionID));
                    
        return $query->result();
        
    }

    public function get_quiz_info($id,$table){
        $data = array('id'=>$id,'user_id'=>$this->session->userdata('user_id'));
        $query = $this->db->get_where($table,$data);

        return $query->first_row();
        
    }

    public function get_question_info($id,$table){
        
        $query = $this->db->get_where($table,array('id'=>$id));
        
        return $query->first_row();
                
    }
    public function get_choice_info($id,$table){
        
        $query = $this->db->get_where($table,array('id'=>$id));
        
        return $query->first_row();
                
    }

    public function get_question_answers($id){
        
        $query = $this->db->get_where('questions',array('quiz_id'=>$quizID));
                    
        return $query->result();
        
    }
    
    public function save_question($title,$description,$quizID,$table){

        $data = array(
            'title' => $title." ?",
            'description' => $description,
            'quiz_id' => $quizID,
        );
        $this->db->insert($table, $data);
        $new_questions_id = $this->db->insert_id();
        return $new_questions_id;
    }

    public function save_answer($val,$questionID,$table){

        $data = array(  
            'value' => $val,
            'question_id' => $questionID,
        );
        $this->db->insert($table, $data);
    }

    public function save_question_answer($questionID,$answerID){
        $data = array(
            'question_id' => $questionID,
            'answer_id' => $answerID,
            'create_at' => time()
        );

        $this->db->insert('questions', $data);
    }
    // --------------PROJECT REPORTS--------------------------
    public function get_all_projects(){
        $userID = $this->session->userdata('user_id');
        
        $table = "quiz_projects";
        $query = $this->db->get_where($table,array('user_token'=>$userID));
        return $query->result();
    }
    
    // ------------------QUIZ REPORTS--------------------------
    public function get_all_quiz($projectID){
        $userID = $this->session->userdata('user_id');
        
        $table = "quizzes";
        $this->db->order_by('id', 'desc');
        $query = $this->db->get_where($table,array('user_token'=>$userID,'parent_token' => $projectID));
        return $query->result();
    }
    public function get_quiz_report($id,$table,$startdate,$enddate){

        // ------------
        // quiz_id to quiz_token
        // $data = array(
        //     // 'user_token' => $this->session->userdata('user_id');
        //     'quiz_token' => $id,
        //     // 'create_at' => $startdate
        // );
        // $query = $this->db->get_where($table,$data);

        // ----------
        
        $this->db->where('quiz_token =',$id);
        $this->db->where('create_at >=',$startdate);
        $this->db->where('create_at <=',$enddate);
        $query = $this->db->get($table);
        
        return count($query->result());
    }
    
    public function get_quiz_outcome_report($quizid,$outcomeid,$table,$startdate,$enddate){

        // ----------
        // $data = array(
        //     'quiz_token' => $quizid,
        //     'outcome_token' => $outcomeid,
        // );
        
        // $query = $this->db->get_where($table,$data);
        // -----------
        $this->db->where('quiz_token =',$quizid);
        $this->db->where('outcome_token =',$outcomeid);
        $this->db->where('create_at >=',$startdate);
        $this->db->where('create_at <=',$enddate);
        $query = $this->db->get($table);
        return count($query->result());
    }

    public function get_quiz_question_report($questionid,$startid,$endid){
        $table = "choices";
        $data = array(
            'question_token' => $questionid,
        );
        $result = array();
        
        $results = $this->db->get_where($table,$data)->result();
        foreach ($results as $key => $value) {
            $data =  $this->count_answers($questionid,$value->auth_token,$startid,$endid);
            $indexname = "choice".($key+1);
            $result[$indexname] = $data;
        }
        return $result;
    }
    

    public function get_contacts_results_data($id,$table,$startdate,$enddate){
        
        $this->db->where('quiz_token =',$id);
        $this->db->where('create_at >=',$startdate);
        $this->db->where('create_at <=',$enddate);
        $query = $this->db->get($table);
        
        return $query->result();
    }
    // -----private functions -------
    private function count_answers($questionid,$answerid,$startid,$endid){
        $table = "results";
        // $data = array(
        //     'question_token' => $questionid,
        //     'answer_token' => $answerid,
        // );
        // $query = $this->db->get_where($table,$data);

        $this->db->where('question_token =',$questionid);
        $this->db->where('answer_token =',$answerid);
        $this->db->where('contacts_results_id >=',$startid);
        $this->db->where('contacts_results_id <=',$endid);
        $query = $this->db->get($table);
        
        return count($query->result());
    }
//    --------------VALIDATIONS-------------------
    public function isMyQuiz($id){
        $query = $this->db->get_where('quizzes',array('user_token' => $this->session->userdata('user_id'),'auth_token' => $id));
        
        if($query->first_row() > 0){
            return true;
        }else{
            return false;
        }
        
    }
    
    public function isQuestionExist($quizid,$id){
        $query = $this->db->get_where('questions',array('quiz_token' => $quizid,'auth_token' => $id));
        if($query->first_row() > 0){
            return true;
        }else{
            return false;
        }
        
    }
    
}