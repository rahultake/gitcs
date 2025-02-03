<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); // Load the URL helper
		$this->load->library('form_validation'); // Load form validation library
		$this->load->library('session');
        $this->load->model('Admin_model');
		$excluded_methods = ['login'];
		if (!in_array($this->router->fetch_method(), $excluded_methods)) {
			if (!$this->session->userdata('logged_in')) {
				// Redirect to login page
				redirect('admin/login');
			}
		}
	}

	public function login()
	{
		if ($this->session->userdata('logged_in')) {
            redirect('admin');
        }
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Set validation rules
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() === FALSE) {
                // Validation failed, reload login view with errors
                $this->load->view('admin/login');
            } else {
                // Retrieve input
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                // Check credentials
                $user = $this->Admin_model->get_user_by_email($email);
				
                if ($user && password_verify($password, $user->password)) {
                    // Set session data
                    $this->session->set_userdata([
                        'user_id' => $user->id,
                        'email' => $user->email,
                        'logged_in' => TRUE
                    ]);

                    // Redirect to dashboard or another page
                    redirect('admin');
                } else {
                    // Invalid credentials, reload login with error message
                    $data['error'] = 'Invalid email or password.';
                    $this->load->view('admin/login', $data);
                }
            }
        } else {
            // Load login view
            $this->load->view('admin/login');
        }
	}
	public function logout()
	{
		// Clear all session data
		$this->session->sess_destroy();
		// Redirect to login page
		redirect('admin/login');
	}
	public function index()
	{
		$data['user_count'] = $this->Admin_model->get_user_count();
		$data['page_count'] = $this->Admin_model->get_user_count();
		$data['component_count'] = $this->Admin_model->get_user_count();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/includes/footer');
	}
	public function users()
	{
		$data['users'] = $this->Admin_model->get_users();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$user_id = $this->input->post('user_id'); // For updating existing user
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			// Prepare data for insertion/updation
			$user_data = [
				'name' => $name,
				'email' => $email,
				'password' => $password,
			];

			if ($user_id) {
				// Update user data if ID is provided
				$this->Admin_model->update_user($user_id, $user_data);
				$this->session->set_flashdata('success', 'User updated successfully.');
			} else {
				// Add new user if no ID is provided
				$this->Admin_model->add_user($user_data);
				$this->session->set_flashdata('success', 'User added successfully.');
			}

			// Redirect back to the user list
			redirect('admin/users');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/userlist',$data);
		$this->load->view('admin/includes/footer');
	}
	public function get_userbyid($id)
	{
		$user = $this->Admin_model->get_usersbyid($id);
		if ($user) {
			// Return the user data as JSON
			echo json_encode($user);
		} else {
			// Return an error response if user not found
			echo json_encode(['error' => 'User not found']);
		}
	}
	public function delete_user($id)
	{

		if ($this->Admin_model->delete_user($id)) {
			$this->session->set_flashdata('success', 'User deleted successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete the user.');
		}

		// Redirect back to the user list
		redirect('admin/users');
	}
	public function navigation()
	{
		$data['navigations'] = $this->Admin_model->get_navigations();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$navigation_id = $this->input->post('navigation_id'); // For updating existing user
			$navigation_name = $this->input->post('navigation_name');
			if (strtolower($navigation_name) === 'home') {
				$navigation_slug = '/';
			} else {
				$navigation_slug = '/' . strtolower(url_title($navigation_name, '-', TRUE));
			}
			$navigation_order = $this->input->post('navigation_order');
			$navigation_display = $this->input->post('navigation_display');
			$navigation_target = $this->input->post('navigation_target');
			$navigation_type = $this->input->post('navigation_type');
			$custom_link = $this->input->post('custom_link');
			$custom_url = $this->input->post('custom_url') ?? 0;
			$navigation_status = $this->input->post('navigation_status') ?? 0;
			$now = date("Y-m-d H:i:s");
			// Prepare data for insertion/updation
			$navigation_data = [
				'navigation_name' => $navigation_name,
				'navigation_slug' => $navigation_slug,
				'navigation_order' => $navigation_order,
				'navigation_display' => $navigation_display,
				'navigation_target' => $navigation_target,
				'navigation_type' => $navigation_type,
				'custom_link' => $custom_link,
				'custom_url' => $custom_url,
				'navigation_status' => $navigation_status,
				'created_at' => $now,
			];

			if ($navigation_id) {
				// Update user data if ID is provided
				$this->Admin_model->update_navigation($navigation_id, $navigation_data);
				$this->session->set_flashdata('success', 'Navigation updated successfully.');
			} else {
				// Add new user if no ID is provided
				$this->Admin_model->add_navigation($navigation_data);
				$this->session->set_flashdata('success', 'Navigation added successfully.');
			}

			// Redirect back to the user list
			redirect('admin/navigation');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/navigationlist',$data);
		$this->load->view('admin/includes/footer');
	}
	public function get_navigationbyid($id)
	{
		$navigation = $this->Admin_model->get_navigationbyid($id);
		if ($navigation) {
			// Return the navigation data as JSON
			echo json_encode($navigation);
		} else {
			// Return an error response if navigation not found
			echo json_encode(['error' => 'Navigation not found']);
		}
	}
	public function delete_navigation($id)
	{

		if ($this->Admin_model->delete_navigation($id)) {
			$this->session->set_flashdata('success', 'Navigation deleted successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete the user.');
		}

		// Redirect back to the user list
		redirect('admin/navigation');
	}
	public function multilevel_navigation($navigation_id)
	{
		$data['multilevels'] = $this->Admin_model->get_multilevels();
		$data['navigation'] = $this->Admin_model->get_navigationbyid($navigation_id);
		$data['navigation_id'] = $navigation_id;
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$multilevel_id = $this->input->post('multilevel_id');
			$multilevel_name = $this->input->post('multilevel_name');
			$multilevel_slug = '/' . strtolower(url_title($multilevel_name, '-', TRUE));
			$multilevel_order = $this->input->post('multilevel_order');
			$multilevel_svg = $this->input->post('multilevel_svg');
			$multilevel_status = $this->input->post('multilevel_status') ?? 0;
			$now = date("Y-m-d H:i:s");
			// Prepare data for insertion/updation
			$navigation_data = [
				'navigation_id' => $navigation_id,
				'multilevel_name' => $multilevel_name,
				'multilevel_slug' => $multilevel_slug,
				'multilevel_order' => $multilevel_order,
				'multilevel_svg' => $multilevel_svg,
				'multilevel_status' => $multilevel_status,
				'created_at' => $now,
			];

			if ($multilevel_id) {
				// Update user data if ID is provided
				$this->Admin_model->update_multilevel($multilevel_id, $navigation_data);
				$this->session->set_flashdata('success', 'Sub Navigation updated successfully.');
			} else {
				// Add new user if no ID is provided
				$this->Admin_model->add_multilevel($navigation_data);
				$this->session->set_flashdata('success', 'Sub Navigation added successfully.');
			}

			// Redirect back to the user list
			redirect('admin/multilevel_navigation/'.$navigation_id);
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/multilevellist',$data);
		$this->load->view('admin/includes/footer');
	}
	public function get_subnavigationbyid($id)
	{
		$navigation = $this->Admin_model->get_subnavigationbyid($id);
		if ($navigation) {
			// Return the navigation data as JSON
			echo json_encode($navigation);
		} else {
			// Return an error response if navigation not found
			echo json_encode(['error' => 'Navigation not found']);
		}
	}
	public function page_seo()
	{
		$data['page_seo'] = $this->Admin_model->get_page_seo();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/page_seo',$data);
		$this->load->view('admin/includes/footer');
	}
	public function header()
	{
		$data['headers'] = $this->Admin_model->get_headers();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/headerlist',$data);
		$this->load->view('admin/includes/footer');
	}
	public function footer()
	{
		$data['footers'] = $this->Admin_model->get_footers();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/footerlist',$data);
		$this->load->view('admin/includes/footer');
	}
}
?>