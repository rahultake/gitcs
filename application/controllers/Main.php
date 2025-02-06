<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); // Load the URL helper
		$this->load->library('form_validation'); // Load form validation library
		$this->load->library('session');
        $this->load->model('Main_model');
		$excluded_methods = ['index', 'login'];
		if (!in_array($this->router->fetch_method(), $excluded_methods)) {
			if (!$this->session->userdata('logged_in')) {
				// Redirect to login page
				redirect('');
			}
		}
	}

	public function index()
	{
		$data['site_data'] = $this->Main_model->get_site_data();
		$data['header_data'] = $this->Main_model->get_header_data();
		$data['footer_data'] = $this->Main_model->get_footer_data();
		$data['social_data'] = $this->Main_model->get_social_data();
		$data['multiheader_data'] = $this->Main_model->get_multiheader_data();
		$data['banner_data'] = $this->Main_model->get_banner_data();
		$data['block_data1'] = $this->Main_model->get_block_data1();
		$data['block_data2'] = $this->Main_model->get_block_data2();
		$data['block_data3'] = $this->Main_model->get_block_data3();
		$data['block_data4'] = $this->Main_model->get_block_data4();
		$data['clients'] = $this->Main_model->get_clients();
		$data['faqs'] = $this->Main_model->get_faqs();
		$data['schedule'] = $this->Main_model->get_schedule();
		// Load login view
		$this->load->view('includes/header',$data);
		$this->load->view('home',$data);
		$this->load->view('includes/footer',$data);
	}
	public function show_page($slug)
    {
		$data['site_data'] = $this->Main_model->get_site_data();
		$data['header_data'] = $this->Main_model->get_header_data();
		$data['footer_data'] = $this->Main_model->get_footer_data();
		$data['social_data'] = $this->Main_model->get_social_data();
		$data['multiheader_data'] = $this->Main_model->get_multiheader_data();
		$data['banner_data'] = $this->Main_model->get_page_banner_data($slug);
		$data['block_data1'] = $this->Main_model->get_page_block_data1($slug);
		$data['block_data2'] = $this->Main_model->get_page_block_data2($slug);
		$data['block_data3'] = $this->Main_model->get_page_block_data3($slug);
		$data['block_data4'] = $this->Main_model->get_page_block_data4($slug);
		$data['clients'] = $this->Main_model->get_page_clients($slug);
		$data['faqs'] = $this->Main_model->get_page_faqs($slug);
		$data['schedule'] = $this->Main_model->get_page_schedule($slug);
		// Load login view
		$this->load->view('includes/header',$data);
		$this->load->view('dynamic_page',$data);
		$this->load->view('includes/footer',$data);
    }
}
?>