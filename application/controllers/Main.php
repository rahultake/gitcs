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
		// Load login view
		$this->load->view('home');
	}
}
?>