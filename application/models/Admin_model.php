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
    public function get_multilevels($navigation_id)
    {
        $this->db->where('navigation_id', $navigation_id);
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
    public function get_pages()
    {
        $query = $this->db->get('pages');
        return $query->result();
    }
    public function get_page_count()
    {
        return $this->db->count_all_results('pages');
    }
    public function add_page($data)
    {
        $this->db->insert('pages', $data);
    }
    public function get_pagebyid($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('pages');
        return $query->row();
    }
    public function update_page($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('pages', $data);
    }
    public function delete_page($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('pages');
    }
    public function add_navigation_page($data)
    {
        $page_data = [
            'page_title' => $data['navigation_name'], // Assuming `title` column stores the name
            'page_slug' => $data['navigation_slug'], 
            'page_status' => $data['navigation_status'], 
            'created_at' => date("Y-m-d H:i:s")
        ];
        $this->db->insert('pages', $page_data);
    }
    public function update_navigation_page($id, $data)
    {
        $page_data = [
            'page_title' => $data['navigation_name'],
            'page_slug' => $data['navigation_slug'],
            'page_status' => $data['navigation_status'],
            'created_at' => date("Y-m-d H:i:s")
        ];
        $this->db->where('page_slug', $data['navigation_slug']);
        $this->db->update('pages', $page_data);
    }
    public function get_components()
    {
        $query = $this->db->get('component');
        return $query->result();
    }
    public function get_component_count()
    {
        return $this->db->count_all_results('component');
    }
    public function get_pagecomponents()
    {
        $this->db->where('component_status', '1');
        $query = $this->db->get('component');
        return $query->result();
    }
    public function add_component($data)
    {
        $this->db->insert('component', $data);
    }
    public function get_componentbyid($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('component');
        return $query->row();
    }
    public function update_component($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('component', $data);
    }
    public function delete_component($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('component');
    }
    public function get_componentdetails($id)
    {
        $this->db->where('component_id', $id);
        $query = $this->db->get('component_details');
        return $query->result();
    }
    public function add_component_detail($data)
    {
        $this->db->insert('component_details', $data);
    }
    public function update_component_detail($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('component_details', $data);
    }
    public function delete_component_detail($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('component_details');
    }
    public function get_componentdetailbyid($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('component_details');
        return $query->row();
    }
    public function get_settings()
    {
        $query = $this->db->get('site_details');
        return $query->row();
    }
    public function add_settings($data)
    {
        $this->db->insert('site_details', $data);
    }
    public function update_settings($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('site_details', $data);
    }
    public function add_social($data)
    {
        $this->db->insert('social', $data);
    }
    public function update_social($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('social', $data);
    }
    public function get_social()
    {
        $this->db->where('social_status', '1');
        $query = $this->db->get('social');
        return $query->result();
    }
    public function get_socialbyid($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('social');
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