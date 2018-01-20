<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Token_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function generatetoken($id){
        
        // return substr(do_hash($data), 0, 32);
        $hash1 = bin2hex(random_bytes(10));
        $hash2 = bin2hex(random_bytes(5));
        $token =  $hash1 . $id . $hash2;

        return  $token; 
    }


}