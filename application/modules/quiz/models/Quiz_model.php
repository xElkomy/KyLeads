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
    
    public function createquiz($title,$description){
        // $title = "Quiz";
        // $description = "Another Quiz";
        
        $data = array(
            'title' => $title,
            'description' => $description,
        );
        $this->db->insert('quizzes', $data);
        
        $new_quiz_id = $this->db->insert_id();

        return $new_quiz_id;
    }

    public function view_quizzes(){

        $query  = $this->db->get('quizzes');
            
        return $query->result();

    }

    public function view_questions($quizID){
        
        $query = $this->db->get_where('questions',array('quiz_id'=>$quizID));
                    
        return $query->result();
        
    }

    public function view_choices($questionID){
        
        $query = $this->db->get_where('choices',array('question_id'=>$questionID));
                    
        return $query->result();
        
    }
    
    public function get_quiz_info($id){

        $query = $this->db->get_where('quizzes',array('id'=>$id));

        return $query->first_row();
        
    }

    public function get_question_info($id){
        
        $query = $this->db->get_where('questions',array('id'=>$id));
        
        return $query->first_row();
                
    }
    public function get_choice_info($id){
        
        $query = $this->db->get_where('choices',array('id'=>$id));
        
        return $query->first_row();
                
    }

    public function get_question_answers($id){
        
        $query = $this->db->get_where('questions',array('quiz_id'=>$quizID));
                    
        return $query->result();
        
    }
    
    public function delete_quiz($id){
        $this->db->delete('quizzes', array('id' => $id));
        // delete all questions of the quiz
        $this->db->where('quiz_id', $id);
        $this->db->delete('questions');  

    }

    public function delete_question($id){
        $this->db->delete('questions', array('id' => $id));
        $this->db->where('question_id', $id);
        $this->db->delete('choices');  
    }

    public function delete_choice($id){
        $this->db->delete('choices', array('id' => $id)); 
    }
    public function update_quiz($id,$title,$description){
        $data = array(
            'title' => $title,
            'description' => $description,
        );
        $this->db->where('id', $id);
        $this->db->update('quizzes', $data);
    }
    public function save_question($title,$description,$quizID,$typeID){

        $data = array(
            'title' => $title." ?",
            'description' => $description,
            'quiz_id' => $quizID,
            'type_id' => $typeID,
        );

        $this->db->insert('questions', $data);
    }

    public function save_answer($val,$questionID){

        $data = array(
            'value' => $val,
            'question_id' => $questionID,
        );
        $this->db->insert('choices', $data);
    }

    public function get_category(){

        // return all categories
    }
    
}