<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load database
    }
    public function get_site_data()
    {
        $query = $this->db->get('site_details');
        return $query->row();
    }
    public function get_header_data()
    {
        $this->db->where('navigation_status', '1');
        $this->db->where_in('navigation_display', ['header', 'both']);
        $this->db->order_by('navigation_order');
        $query = $this->db->get('navigation');
        return $query->result();
    }
    public function get_footer_data()
    {
        $this->db->where('navigation_status', '1');
        $this->db->where_in('navigation_display', ['footer', 'both']);
        $this->db->order_by('navigation_order');
        $query = $this->db->get('navigation');
        return $query->result();
    }
    public function get_multiheader_data()
    {
        $this->db->where('multilevel_status', '1');
        $this->db->order_by('multilevel_order');
        $query = $this->db->get('multilevel_navigation');
        return $query->result();
    }
    public function get_banner_data()
    {
        $this->db->select('component.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'banner');

        $query = $this->db->get();
        return $query->row(); // Use `row()` if you expect a single result
    }
    public function get_block_data1()
    {
        $this->db->select('component.*, component_details.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->join('component_details', 'component_details.component_id = component.id', 'left');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'block_section_1');
        
        $query = $this->db->get();
        return $query->result();
    }
    public function get_block_data2()
    {
        $this->db->select('component.*, component_details.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->join('component_details', 'component_details.component_id = component.id', 'left');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'block_section_2');
        
        $query = $this->db->get();
        return $query->result();
    }
    public function get_block_data3()
    {
        $this->db->select('component.*, component_details.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->join('component_details', 'component_details.component_id = component.id', 'left');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'block_section_3');
        
        $query = $this->db->get();
        return $query->result();
    }
    public function get_block_data4()
    {
        $this->db->select('component.*, component_details.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->join('component_details', 'component_details.component_id = component.id', 'left');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'block_section_4');
        
        $query = $this->db->get();
        return $query->result();
    }
    public function get_clients()
    {
        $this->db->select('component.*, component_details.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->join('component_details', 'component_details.component_id = component.id', 'left');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'clients_section');
        
        $query = $this->db->get();
        return $query->result();
    }
    public function get_faqs()
    {
        $this->db->select('component.*, component_details.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->join('component_details', 'component_details.component_id = component.id', 'left');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'faq_section');
        
        $query = $this->db->get();
        return $query->result();
    }
    public function get_schedule()
    {
        $this->db->select('component.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'schedule_section');

        $query = $this->db->get();
        return $query->row(); // Use `row()` if you expect a single result
    }
    // page data
    public function get_page_banner_data($slug)
    {
        $this->db->select('component.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->join('multilevel_navigation', 'multilevel_navigation.navigation_id = pages.id', 'left');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'banner');
        $this->db->where('component.component_type', 'banner');
        $this->db->group_start(); // Open parentheses for OR condition
        $this->db->where('pages.page_slug', '/'.$slug);
        $this->db->or_where('multilevel_navigation.multilevel_slug', '/'.$slug);
        $this->db->group_end();

        $query = $this->db->get();
        return $query->row(); // Use `row()` if you expect a single result
    }
    public function get_page_block_data1($slug)
    {
        $this->db->select('component.*, component_details.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->join('component_details', 'component_details.component_id = component.id', 'left');
        $this->db->join('multilevel_navigation', 'multilevel_navigation.navigation_id = pages.id', 'left');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'block_section_1');
        $this->db->group_start(); // Open parentheses for OR condition
        $this->db->where('pages.page_slug', '/'.$slug);
        $this->db->or_where('multilevel_navigation.multilevel_slug', '/'.$slug);
        $this->db->group_end();
        
        $query = $this->db->get();
        return $query->result();
    }
    public function get_page_block_data2($slug)
    {
        $this->db->select('component.*, component_details.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->join('component_details', 'component_details.component_id = component.id', 'left');
        $this->db->join('multilevel_navigation', 'multilevel_navigation.navigation_id = pages.id', 'left');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'block_section_2');
        $this->db->group_start(); // Open parentheses for OR condition
        $this->db->where('pages.page_slug', '/'.$slug);
        $this->db->or_where('multilevel_navigation.multilevel_slug', '/'.$slug);
        $this->db->group_end();
        
        $query = $this->db->get();
        return $query->result();
    }
    public function get_page_block_data3($slug)
    {
        $this->db->select('component.*, component_details.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->join('component_details', 'component_details.component_id = component.id', 'left');
        $this->db->join('multilevel_navigation', 'multilevel_navigation.navigation_id = pages.id', 'left');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'block_section_3');
        $this->db->group_start(); // Open parentheses for OR condition
        $this->db->where('pages.page_slug', '/'.$slug);
        $this->db->or_where('multilevel_navigation.multilevel_slug', '/'.$slug);
        $this->db->group_end();
        
        $query = $this->db->get();
        return $query->result();
    }
    public function get_page_block_data4($slug)
    {
        $this->db->select('component.*, component_details.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->join('component_details', 'component_details.component_id = component.id', 'left');
        $this->db->join('multilevel_navigation', 'multilevel_navigation.navigation_id = pages.id', 'left');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'block_section_4');
        $this->db->group_start(); // Open parentheses for OR condition
        $this->db->where('pages.page_slug', '/'.$slug);
        $this->db->or_where('multilevel_navigation.multilevel_slug', '/'.$slug);
        $this->db->group_end();
        
        $query = $this->db->get();
        return $query->result();
    }
    public function get_page_clients($slug)
    {
        $this->db->select('component.*, component_details.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->join('component_details', 'component_details.component_id = component.id', 'left');
        $this->db->join('multilevel_navigation', 'multilevel_navigation.navigation_id = pages.id', 'left');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'clients_section');
        $this->db->group_start(); // Open parentheses for OR condition
        $this->db->where('pages.page_slug', '/'.$slug);
        $this->db->or_where('multilevel_navigation.multilevel_slug', '/'.$slug);
        $this->db->group_end();
        
        $query = $this->db->get();
        return $query->result();
    }
    public function get_page_faqs($slug)
    {
        $this->db->select('component.*, component_details.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->join('component_details', 'component_details.component_id = component.id', 'left');
        $this->db->join('multilevel_navigation', 'multilevel_navigation.navigation_id = pages.id', 'left');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'faq_section');
        $this->db->group_start(); // Open parentheses for OR condition
        $this->db->where('pages.page_slug', '/'.$slug);
        $this->db->or_where('multilevel_navigation.multilevel_slug', '/'.$slug);
        $this->db->group_end();
        
        $query = $this->db->get();
        return $query->result();
    }
    public function get_page_schedule($slug)
    {
        $this->db->select('component.*');
        $this->db->from('component');
        $this->db->join('pages', 'FIND_IN_SET(component.id, pages.component_id) > 0', 'inner');
        $this->db->join('multilevel_navigation', 'multilevel_navigation.navigation_id = pages.id', 'left');
        $this->db->where('component.component_status', '1');
        $this->db->where('component.component_type', 'schedule_section');
        $this->db->group_start(); // Open parentheses for OR condition
        $this->db->where('pages.page_slug', '/'.$slug);
        $this->db->or_where('multilevel_navigation.multilevel_slug', '/'.$slug);
        $this->db->group_end();

        $query = $this->db->get();
        return $query->row(); // Use `row()` if you expect a single result
    }
    public function get_social_data()
    {
        $this->db->where('social_status', '1');
        $query = $this->db->get('social');
        return $query->result();
    }
}
?>