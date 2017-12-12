<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get single package by id
     * @param  integer  $id
     * @return array    $data
     */
    public function get_by_id($package_id)
    {
        $data = array();
        $this->db->where('id', $package_id);
        $this->db->limit(1);
        $q = $this->db->get('packages');
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
     * Get all packages
     * @param   string  $gateway
     * @return  array   $data
     */
    public function get_all($gateway = NULL)
    {
        $data = array();
        if ($gateway)
        {
            $this->db->where('gateway', $gateway);
        }
        $this->db->order_by('price', 'ASC');
        $q = $this->db->get('packages');
        if ($q->num_rows() > 0)
        {
            foreach ($q->result_array() as $row)
            {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    /**
     * Create new package
     * @param   string  $string
     * @return  integer auto increment id
     */
    public function create($gateway)
    {
        $data = array(
            'gateway'           => $gateway,
            'name'              => $this->input->post('name'),
            'sites_number'      => $this->input->post('sites_number'),
            'hosting_option'    => json_encode($this->input->post('hosting_option')),
            'export_site'       => $this->input->post('export_site'),
            'disk_space'        => $this->input->post('disk_space'),
            'templates'         => json_encode($this->input->post('templates')),
            'price'             => $this->input->post('price'),
            'currency'          => $this->input->post('currency'),
            'subscription'      => $this->input->post('subscription'),
            'status'            => $this->input->post('status'),
            'created_at'        => date('Y-m-d H:i:s', time())
            );
        $this->db->insert('packages', $data);

        return $this->db->insert_id();
    }

    /**
     * Update existing package
     * @return boolean  TRUE/FALSE
     */
    public function update()
    {
        $data = array(
            'name'              => $this->input->post('name'),
            'sites_number'      => $this->input->post('sites_number'),
            'hosting_option'    => json_encode($this->input->post('hosting_option')),
            'export_site'       => $this->input->post('export_site'),
            'disk_space'        => $this->input->post('disk_space'),
            'templates'         => json_encode($this->input->post('templates')),
            'status'            => $this->input->post('status'),
            'modified_at'       => date('Y-m-d H:i:s', time())
            );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('packages', $data);

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
     * Update a specific field value
     * @param  integer  $package_id
     * @param  string   $name
     * @param  mixed    $value
     * @return boolean  TRUE/FALSE
     */
    public function update_field($package_id, $name, $value)
    {
        $data = array(
            $name => $value,
            'modified_at' => date('Y-m-d H:i:s', time())
            );

        $this->db->where('id', $package_id);
        $this->db->update('packages', $data);

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
     * Update status of package
     * @deprecated Toggle package status option is not using any more
     * @param string    $status
     * @param integer   $package_id
     * @return boolean  TRUE/FALSE
     */
    public function update_status($status, $package_id)
    {
        $data = array(
            'status'        => $status,
            'modified_at'   => date('Y-m-d H:i:s', time())
            );

        $this->db->where('id', $package_id);
        $this->db->update('packages', $data);

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
     * Delete package by id
     * @param  integer  $package_id
     * @return boolean  TRUE/FALSE
     */
    public function delete($package_id)
    {
        $this->db->where('id', $package_id);
        $this->db->delete('packages');

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