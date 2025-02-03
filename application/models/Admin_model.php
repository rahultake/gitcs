<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load database
    }

    public function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->row();
    }
    public function get_users()
    {
        $this->db->where('role!=', '1');
        $query = $this->db->get('users');
        return $query->result();
    }
    public function get_usersbyid($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }
    public function add_user($data)
    {
        $this->db->insert('users', $data); // Replace 'users' with your table name
    }
    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data); // Replace 'users' with your table name
    }
    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users'); // Replace 'users' with your table name
    }
    public function get_user_count()
    {
        $this->db->where('role !=', '1'); // Add the WHERE condition
        return $this->db->count_all_results('users'); // Replace 'users' with your actual users table name
    }
    public function get_navigations()
    {
        $this->db->order_by('navigation_order');
        $query = $this->db->get('navigation');
        return $query->result();
    }
    public function get_navigationbyid($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('navigation');
        return $query->row();
    }
    public function add_navigation($data)
    {
        $this->db->insert('navigation', $data);
    }
    public function update_navigation($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('navigation', $data);
    }
    public function delete_navigation($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('navigation');
    }
    public function get_navigation_count()
    {
        $this->db->where('navigation_status', '1');
        return $this->db->count_all_results('navigation');
    }
    public function get_multilevels()
    {
        $this->db->order_by('multilevel_order');
        $query = $this->db->get('multilevel_navigation');
        return $query->result();
    }
    public function add_multilevel($data)
    {
        $this->db->insert('multilevel_navigation', $data);
    }
    public function update_multilevel($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('multilevel_navigation', $data);
    }
    public function get_subnavigationbyid($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('multilevel_navigation');
        return $query->row();
    }
    public function get_headers()
    {
        $this->db->where('navigation_status', '1');
        $this->db->where_in('navigation_display', ['header', 'both']);
        $this->db->order_by('navigation_order');
        $query = $this->db->get('navigation');
        return $query->result();
    }
    public function get_footers()
    {
        $this->db->where('navigation_status', '1');
        $this->db->where_in('navigation_display', ['footer', 'both']);
        $this->db->order_by('navigation_order');
        $query = $this->db->get('navigation');
        return $query->result();
    }
}
?>