<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Login verification
     *
     * @param  string   $email
     * @param  string   $password
     * @return boolean  TRUE/FALSE
     */
    public function verify($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('status', 'Active');
        $this->db->limit(1);
        $q = $this->db->get('users');
        if ($q->num_rows() > 0)
        {
            $row = $q->row_array();
            // $data['user_id'] = $row['id'];
            $data['user_id'] = $row['auth_token'];
            $data['package_id'] = $row['package_id'];
            $data['user_fname'] = $row['first_name'];
            $data['user_lname'] = $row['last_name'];
            $data['user_email'] = $row['email'];
            $data['user_type'] = $row['type'];
            $data['cquiz_id'] = null;
            $data['quizproj_id'] = null;
            $this->session->set_userdata($data);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Get single user by id
     *
     * @param  integer  $user_id
     * @return array    $data
     */
    public function get_by_id($user_id)
    {
        $data = array();
        $this->db->select('users.*, packages.stripe_id as package_stripe_id, packages.name as package_name, packages.sites_number as package_sites_number, packages.price as package_price, packages.currency as package_currency, packages.subscription as package_subscription');
        $this->db->from('users');
        $this->db->join('packages', 'users.package_id = packages.id', 'left');
        $this->db->where('users.id', $user_id);
        $this->db->limit(1);
        $q = $this->db->get();
        if ($q->num_rows() > 0)
        {
            foreach ($q->result_array() as $row)
            {
                $data = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    /**
     * Get single user by site id
     *
     * @param  integer  $site_id
     * @return array    $data
     */
    public function get_by_site_id($site_id)
    {
        $data = array();
        $this->db->select('users.*, sites.sites_id');
        $this->db->from('users');
        $this->db->join('sites', 'users.id = sites.users_id', 'left');
        $this->db->where('sites.sites_id', $site_id);
        $this->db->limit(1);
        $q = $this->db->get();
        if ($q->num_rows() > 0)
        {
            foreach ($q->result_array() as $row)
            {
                $data = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    /**
     * Get all users
     *
     * @return array    $data
     */
    public function get_all($type = NULL, $status = NULL)
    {
        $data = array();
        if ($type)
        {
            $this->db->where('type', $type);
        }
        if ($status)
        {
            $this->db->where('status', $status);
        }
        $q = $this->db->get('users');
        if ($q->num_rows() > 0)
        {
            $data = $q->result_array();
        }

        $q->free_result();
        return $data;
    }

    /**
     * Get single user by email
     *
     * @param  string   $email
     * @return array    $data
     */
    public function get_by_email($email)
    {
        $data = array();
        $this->db->where('email', $email);
        $this->db->limit(1);
        $q = $this->db->get('users');
        if ($q->num_rows() > 0)
        {
            $data = $q->row_array();
        }

        $q->free_result();
        return $data;
    }

    /**
     * Get single user by activation code
     *
     * @param  string   $code
     * @return array    $data
     */
    public function get_by_activation_code($code)
    {
        $data = array();
        $this->db->where('activation_code', $code);
        $this->db->limit(1);
        $q = $this->db->get('users');
        if ($q->num_rows() > 0)
        {
            $data = $q->row_array();
        }

        $q->free_result();
        return $data;
    }

    /**
     * Get all users by type
     *
     * @deprecated Use get_all function instead, there is a param for type
     * @param  string   $type
     * @return array    $data
     */
    public function get_by_type($type)
    {
        $data = array();
        $this->db->where('type', $type);
        $q = $this->db->get('users');
        if ($q->num_rows() > 0)
        {
            $data = $q->result_array();
        }

        $q->free_result();
        return $data;
    }

    /**
     * Get user by stripe customer id
     *
     * @param  string   $cus_id
     * @return array    $data
     */
    public function get_by_stripe_cus_id($cus_id)
    {
        $data = array();
        $this->db->where('stripe_cus_id', $cus_id);
        $this->db->limit(1);
        $q = $this->db->get('users');
        if ($q->num_rows() > 0)
        {
            $data = $q->row_array();
        }

        $q->free_result();
        return $data;
    }

    /**
     * Get single user by email
     *
     * @param  string   $email
     * @return array    $data
     */
    public function get_by_reset_link($email, $forgot_code)
    {
        $data = array();
        $this->db->where('email', $email);
        $this->db->where('forgot_code', $forgot_code);
        $this->db->limit(1);
        $q = $this->db->get('users');
        if ($q->num_rows() > 0)
        {
            $data = $q->row_array();
        }

        $q->free_result();
        return $data;
    }


    /**
     * Get single user by paypal paymen token
     *
     * @param  string   $token
     * @return array    $data
     */
    public function get_by_paypal_token($token)
    {
        $data = array();
        $this->db->select('users.*, packages.stripe_id as package_stripe_id, packages.name as package_name, packages.sites_number as package_sites_number, packages.price as package_price, packages.currency as package_currency, packages.subscription as package_subscription');
        $this->db->from('users');
        $this->db->join('packages', 'users.package_id = packages.id', 'left');
        $this->db->where('users.paypal_token', $token);
        $this->db->limit(1);
        $q = $this->db->get();
        
        if ($q->num_rows() > 0)
        {
            $data = $q->row_array();
        }

        $q->free_result();
        return $data;
    }

    /**
     * Get Next Billing Date
     *
     * @param  array   $data
     * @param  integer $user_id
     * @return array    $data
     */
    public function get_by_next_billing_date($date, $user_id)
    {
        $data = array();
        $this->db->select('id');
        $this->db->like('paypal_next_payment_date', $date);
        $this->db->where('paypal_profile_status', "Cancel");
        $this->db->where('id', $user_id);
        $q = $this->db->get("users");
        
        if ($q->num_rows() > 0)
        {
            $data = $q->row_array();
        }

        $q->free_result();
        return $data;
    }    


    /**
     * Check if email exist
     *
     * @param  string   $email
     * @return boolean  TRUE/FALSE
     */
    public function is_email_exist($email)
    {
        $this->db->where('email', $email);
        $this->db->limit(1);
        $q = $this->db->get('users');
        if ($q->num_rows() > 0)
        {
            $q->free_result();
            return TRUE;
        }
        else
        {
            $q->free_result();
            return FALSE;
        }
    }

    /**
     * Returns all images belonging to user
     *
     * @param  integer  $user_id
     * @return array    $userImages or bool/FALSE
     */
    public function getUserImages($user_id)
    {
        if (is_dir( $this->config->item('images_uploadDir') . "/" . $user_id))
        {
            $folderContent = directory_map($this->config->item('images_uploadDir') . "/" . $user_id, 2);

            //die( print_r($folderContent) );
            if ($folderContent)
            {
                $userImages = array();
                foreach ($folderContent as $key => $item)
                {
                    if ( ! is_array($item))
                    {
                        //check the file extension
                        $ext = pathinfo($item, PATHINFO_EXTENSION);
                        //prep allowed extensions array
                        $temp = explode("|", $this->config->item('images_allowedExtensions'));
                        if (in_array($ext, $temp))
                        {
                            array_push($userImages, $item);
                        }
                    }
                }

                return $userImages;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }

    }

    /**
     * Get all users including their sites
     *
     * @param  string   $user_id
     * @return array    $return
     */
    public function getUsersPlusSites($user_id = '')
    {
        $return = array();
        //get the app users
        if ($user_id == '')
        {
            $users = $this->MUsers->get_all();
        }
        else
        {
            $users[] = $this->MUsers->get_by_id($user_id);
        }

        foreach ($users as $user)
        {
            $temp = array();
            $temp['userData'] = $user;
            if ($user['type'] == "Admin")
            {
                $temp['is_admin'] = 'yes';
            }
            else
            {
                $temp['is_admin'] = 'no';
            }

            //get this user's sites
            $temp['sites'] = $this->MSites->all( $user['id'] );
            //push into the final array
            $return[] = $temp;
        }

        return $return;
    }

    /**
     * Create new user
     *
     * @param string    $type
     * @param string    $streip_id
     * @param string    $status
     * @return integer  id
     */
    public function create($type, $streip_cus_id = NULL, $status, $current_subscription_gateway = '')
    {
        $data = array(
            // 'package_id'                    => $this->input->post('package_id'),
            'package_id'                    => '1',
            'username'                      => $this->input->post('email'),
            'email'                         => $this->input->post('email'),
            'password'                      => substr(do_hash($this->input->post('password')), 0, 32),
            'first_name'                    => $this->input->post('first_name'),
            'last_name'                     => $this->input->post('last_name'),
            'stripe_cus_id'                 => $streip_cus_id,
            'current_subscription_gateway'  => $current_subscription_gateway,
            'type'                          => $type,
            'status'                        => $status,
            // 'activation_code'               => substr(do_hash($this->input->post('email')), 0, 32),
            'activation_code'               => NULL,
            'created_at'                    => date('Y-m-d H:i:s', time())
            );
        $this->db->insert('users', $data);

        return $this->db->insert_id();
    }

    /**
     * Update existing user info
     * @param integer $user_id
     * @param string  $type
     * @return boolean  TRUE/FALSE
     */
    public function update($user_id, $type)
    {
        if ($this->input->post('password') != "")
        {
            $data = array(
                'package_id'    => $this->input->post('package_id'),
                'email'         => $this->input->post('email'),
                'password'      => substr(do_hash($this->input->post('password')), 0, 32),
                'type'          => $type,
                'modified_at'   => date('Y-m-d H:i:s', time())
                );
        }
        else
        {
            $data = array(
                'package_id'    => $this->input->post('package_id'),
                'email'         => $this->input->post('email'),
                'type'          => $type,
                'modified_at'   => date('Y-m-d H:i:s', time())
                );
        }

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Update user details
     *
     * @return boolean TRUE/FALSE
     */
    public function details_update()
    {
        $data = array(
            'first_name'    => $this->input->post('first_name'),
            'last_name'     => $this->input->post('last_name'),
            'modified_at'   => date('Y-m-d H:i:s', time())
            );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Update user login details
     *
     * @return boolean  TRUE/FALSE
     */
    public function login_update()
    {
        $data = array(
            'email'         => $this->input->post('email'),
            'password'      => substr(do_hash($this->input->post('password')), 0, 32),
            'modified_at'   => date('Y-m-d H:i:s', time())
            );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Update status of user
     *
     * @param string    $status
     * @param integer   $user_id
     * @return boolean  TRUE/FALSE
     */
    public function update_status($status, $user_id)
    {
        $data = array(
            'status'        => $status,
            'modified_at'   => date('Y-m-d H:i:s', time())
            );

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Activa account from email activation
     *
     * @param integer   $user_id
     * @return boolean  TRUE/FALSE
     */
    public function update_active($user_id)
    {
        $data = array(
            'status'            => 'Active',
            'activation_code'   => '',
            'modified_at'       => date('Y-m-d H:i:s', time())
            );

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
    * To Update the Fields
    * @param integer $user_id
    * @param string $field
    * @param array $value
    * @return boolean TRUE/FALSE
    */
    public function update_field($user_id, $field, $value)
    {
        $data = array(
            $field          => $value,
            'modified_at'   => date('Y-m-d H:i:s', time())
            );
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
    * To Update Custom Fields 
    * @param array $where
    * @param array $value
    * @param boolean TRUE/FALSE
    */
    public function update_custom_field($where, $value)
    {
        $field = $value['field'];
        $val = $value['value'];
        $data = array(
            $field => $val,
            'modified_at'   => date('Y-m-d H:i:s', time())
        );

        $condfield = $where['field'];
        $condvalue = $where['value'];
        $this->db->where($condfield, $condvalue);
        $this->db->update('users', $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Delete user by id
     *
     * @param  integer  $user_id
     * @return boolean  TRUE/FALSE
     */
    public function delete($user_id)
    {
        $this->db->where('id', $user_id);
        $this->db->delete('users');

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}