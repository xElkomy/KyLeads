<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $model_list = [
            'authtoken/Token_model' => 'MToken',
            ];
            $this->load->model($model_list);
    }

    /**
     * Get single user by id
     *
     * @param  integer  $user_id
     * @return array    $data
     */
    public function get_by_id($user_id)
    {
      
    }


    /**
     * Get all contacts
     *
     * @return array    $data
     */
    public function get_all($type = NULL, $status = NULL)
    {
        
    }

    /**
     * Get single user by email
     *
     * @param  string   $email
     * @return array    $data
     */
    public function get_by_email($email)
    {
       
    }

    public function newContact($data)
    {
        $table = "contacts";
        $data = array(
            'user_token'=> $data->userid,
            'first_name' => $data->fname,
            'last_name' => $data->lname,
            'email' => $data->email,
            
        );
        $this->db->insert($table, $data);
        
        $new_contact_id = $this->db->insert_id();

        $token = $this->MToken->generatetoken($new_contact_id);
        //update row with token
        $this->db->set('auth_token',$token);
        $this->db->where('id', $new_contact_id);
        $this->db->update($table);

    return $token;
      
    }


}