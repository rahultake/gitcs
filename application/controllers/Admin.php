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
		$data['page_count'] = $this->Admin_model->get_page_count();
		$data['component_count'] = $this->Admin_model->get_component_count();
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
				$this->Admin_model->update_navigation_page($navigation_id, $navigation_data);
				$this->session->set_flashdata('success', 'Navigation updated successfully.');
			} else {
				// Add new user if no ID is provided
				$this->Admin_model->add_navigation($navigation_data);
				$this->Admin_model->add_navigation_page($navigation_data);
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
		$data['multilevels'] = $this->Admin_model->get_multilevels($navigation_id);
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
	public function pagelist()
	{
		$data['pages'] = $this->Admin_model->get_pages();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/pagelist',$data);
		$this->load->view('admin/includes/footer');
	}
	public function add_page()
	{
		$data['components'] = $this->Admin_model->get_pagecomponents();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$page_title = $this->input->post('page_title');
			$page_slug = $this->input->post('page_slug');
			if (!empty($page_slug)) {
				$page_slug = '/' . ltrim($page_slug, '/');
			}
			$meta_title = $this->input->post('meta_title');
			$meta_description = $this->input->post('meta_description');
			$meta_keywords = $this->input->post('meta_keywords');
			$page_status = $this->input->post('page_status') ?? 0;
			$component_id = $this->input->post('component_id');  // This is an array    
            // Convert component_id array to a comma-separated string
            $component_id_string = implode(',', $component_id);
			$now = date("Y-m-d H:i:s");
			$upload_path = './uploads/meta_image/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true); // Create directory with permissions
            }
    
            // Handle file upload for meta_image
            $meta_image_path = '';
            if (!empty($_FILES['meta_image']['name'])) {
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png|pdf|webp';
                $config['file_name'] = time() . '_' . $_FILES['meta_image']['name'];
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('meta_image')) {
                    $meta_image_data = $this->upload->data();
                    $meta_image_path = 'uploads/meta_image/' . $meta_image_data['file_name'];
                } else {
                    $meta_image_path = $this->input->post('existing_meta_image');
                }
            }
			// Prepare data for insertion/updation
			$page_data = [
				'component_id' => $component_id_string,
				'page_title' => $page_title,
				'page_slug' => $page_slug,
				'meta_title' => $meta_title,
				'meta_description' => $meta_description,
				'meta_keywords' => $meta_keywords,
				'meta_image' => $meta_image_path,
				'page_status' => $page_status,
				'created_at' => $now,
			];

			$this->Admin_model->add_page($page_data);
			$this->session->set_flashdata('success', 'Page added successfully.');

			// Redirect back to the user list
			redirect('admin/pagelist/');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/add_page',$data);
		$this->load->view('admin/includes/footer');
	}
	public function edit_page($id)
	{
		$data['page'] = $this->Admin_model->get_pagebyid($id);
		$data['components'] = $this->Admin_model->get_pagecomponents();
		$data['page_id'] = $id;
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$page_title = $this->input->post('page_title');
			$page_slug = $this->input->post('page_slug');
			if (!empty($page_slug)) {
				$page_slug = '/' . ltrim($page_slug, '/');
			}
			$meta_title = $this->input->post('meta_title');
			$meta_description = $this->input->post('meta_description');
			$meta_keywords = $this->input->post('meta_keywords');
			$page_status = $this->input->post('page_status') ?? 0;
			$component_id = $this->input->post('component_id');  // This is an array    
            // Convert component_id array to a comma-separated string
            $component_id_string = implode(',', $component_id);
			$now = date("Y-m-d H:i:s");
			$upload_path = './uploads/meta_image/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true); // Create directory with permissions
            }
    
            // Handle file upload for meta_image
            $meta_image_path = '';
            if (!empty($_FILES['meta_image']['name'])) {
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png|pdf|webp';
                $config['file_name'] = time() . '_' . $_FILES['meta_image']['name'];
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('meta_image')) {
                    $meta_image_data = $this->upload->data();
                    $meta_image_path = 'uploads/meta_image/' . $meta_image_data['file_name'];
                } else {
                    $meta_image_path = $this->input->post('existing_meta_image');
                }
            } else {
				$meta_image_path = $this->input->post('existing_meta_image');
			}
			// Prepare data for insertion/updation
			$page_data = [
				'component_id' => $component_id_string,
				'page_title' => $page_title,
				'page_slug' => $page_slug,
				'meta_title' => $meta_title,
				'meta_description' => $meta_description,
				'meta_keywords' => $meta_keywords,
				'meta_image' => $meta_image_path,
				'page_status' => $page_status,
				'created_at' => $now,
			];

			$this->Admin_model->update_page($id, $page_data);
			$this->session->set_flashdata('success', 'Page updated successfully.');

			// Redirect back to the user list
			redirect('admin/pagelist/');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/edit_page',$data);
		$this->load->view('admin/includes/footer');
	}
	public function delete_page($id)
	{

		if ($this->Admin_model->delete_page($id)) {
			$this->session->set_flashdata('success', 'Page deleted successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete the page.');
		}

		// Redirect back to the user list
		redirect('admin/pagelist');
	}
	public function componentlist()
	{
		$data['components'] = $this->Admin_model->get_components();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/componentlist',$data);
		$this->load->view('admin/includes/footer');
	}
	public function add_component()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$component_name = $this->input->post('component_name');
			$component_type = strtolower(url_title($component_name, '_', TRUE));
			$component_heading = $this->input->post('component_heading');
			$component_sub = $this->input->post('component_sub');
			$component_content = $this->input->post('component_content');
			$component_status = $this->input->post('component_status') ?? 0;
			$now = date("Y-m-d H:i:s");
			$upload_path = './uploads/component_icon/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true); // Create directory with permissions
            }
    
            // Handle file upload for component_icon
            $component_icon_path = '';
            if (!empty($_FILES['component_icon']['name'])) {
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png|pdf|webp';
                $config['file_name'] = time() . '_' . $_FILES['component_icon']['name'];
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('component_icon')) {
                    $component_icon_data = $this->upload->data();
                    $component_icon_path = 'uploads/component_icon/' . $component_icon_data['file_name'];
                } else {
                    $component_icon_path = $this->input->post('existing_component_icon');
                }
            }
			// Prepare data for insertion/updation
			$component_data = [
				'component_name' => $component_name,
				'component_heading' => $component_heading,
				'component_sub' => $component_sub,
				'component_type' => $component_type,
				'component_content' => $component_content,
				'component_status' => $component_status,
				'component_icon' => $component_icon_path,
				'component_status' => $component_status,
				'created_at' => $now,
			];

			$this->Admin_model->add_component($component_data);
			$this->session->set_flashdata('success', 'Component added successfully.');

			// Redirect back to the user list
			redirect('admin/componentlist/');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/add_component');
		$this->load->view('admin/includes/footer');
	}
	public function edit_component($id)
	{
		$data['component'] = $this->Admin_model->get_componentbyid($id);
		$data['component_details'] = $this->Admin_model->get_componentdetails($id);
		$data['component_id'] = $id;
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$component_name = $this->input->post('component_name');
			$component_type = strtolower(url_title($component_name, '_', TRUE));
			$component_heading = $this->input->post('component_heading');
			$component_sub = $this->input->post('component_sub');
			$component_content = $this->input->post('component_content');
			$component_status = $this->input->post('component_status') ?? 0;
			$now = date("Y-m-d H:i:s");
			$upload_path = './uploads/component_icon/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true); // Create directory with permissions
            }
    
            // Handle file upload for component_icon
            $component_icon_path = '';
            if (!empty($_FILES['component_icon']['name'])) {
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png|pdf|webp';
                $config['file_name'] = time() . '_' . $_FILES['component_icon']['name'];
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('component_icon')) {
                    $component_icon_data = $this->upload->data();
                    $component_icon_path = 'uploads/component_icon/' . $component_icon_data['file_name'];
                } else {
                    $component_icon_path = $this->input->post('existing_component_icon');
                }
            } else {
				$component_icon_path = $this->input->post('existing_component_icon');
			}
			// Prepare data for insertion/updation
			$component_data = [
				'component_name' => $component_name,
				'component_heading' => $component_heading,
				'component_sub' => $component_sub,
				'component_type' => $component_type,
				'component_content' => $component_content,
				'component_status' => $component_status,
				'component_icon' => $component_icon_path,
				'component_status' => $component_status,
				'created_at' => $now,
			];

			$this->Admin_model->update_component($id,$component_data);
			$this->session->set_flashdata('success', 'Component added successfully.');

			// Redirect back to the user list
			redirect('admin/componentlist/');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/edit_component',$data);
		$this->load->view('admin/includes/footer');
	}
	public function delete_component($id)
	{

		if ($this->Admin_model->delete_component($id)) {
			$this->session->set_flashdata('success', 'Component deleted successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete the component.');
		}

		// Redirect back to the component list
		redirect('admin/componentlist');
	}
	public function component_details($component_id)
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$component_details_id = $this->input->post('component_details_id');
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$long_description = $this->input->post('long_description');
			$upload_path = './uploads/detail_image/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true); // Create directory with permissions
            }
    
            // Handle file upload for detail_image
            $detail_image_path = '';
            if (!empty($_FILES['detail_image']['name'])) {
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png|pdf|webp';
                $config['file_name'] = time() . '_' . $_FILES['detail_image']['name'];
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('detail_image')) {
                    $detail_image_data = $this->upload->data();
                    $detail_image_path = 'uploads/detail_image/' . $detail_image_data['file_name'];
                }
            }
			$now = date("Y-m-d H:i:s");
			// Prepare data for insertion/updation
			$page_data = [
				'component_id' => $component_id,
				'name' => $name,
				'description' => $description,
				'long_description' => $long_description,
				'detail_image' => $detail_image_path,
				'created_at' => $now,
			];
			if ($component_details_id) {
				$this->Admin_model->update_component_detail($component_details_id, $page_data);
				$this->session->set_flashdata('success', 'Updated successfully.');
			} else {
				$this->Admin_model->add_component_detail($page_data);
				$this->session->set_flashdata('success', 'Added successfully.');
			}

			redirect('admin/edit_component/'.$component_id);
		}
	}
	public function delete_component_detail($id,$component_id)
	{

		if ($this->Admin_model->delete_component_detail($id)) {
			$this->session->set_flashdata('success', 'Deleted successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete.');
		}

		// Redirect back to the component list
		redirect('admin/edit_component/'.$component_id);
	}
	public function get_componentdetailbyid($id)
	{
		$Component = $this->Admin_model->get_componentdetailbyid($id);
		if ($Component) {
			// Return the Component data as JSON
			echo json_encode($Component);
		} else {
			// Return an error response if Component not found
			echo json_encode(['error' => 'Component not found']);
		}
	}
	public function settings()
	{
		$data['settings'] = $this->Admin_model->get_settings();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$site_id = $this->input->post('site_id');
			$site_name = $this->input->post('site_name');
			$site_email = $this->input->post('site_email');
			$site_phone = $this->input->post('site_phone');
			$copyright_text = $this->input->post('copyright_text');
			$opening_hours = $this->input->post('opening_hours');
			$upload_path = './uploads/site_logo/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true); // Create directory with permissions
            }
    
            // Handle file upload for site_logo
            $site_logo_path = '';
            if (!empty($_FILES['site_logo']['name'])) {
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png|pdf|webp';
                $config['file_name'] = time() . '_' . $_FILES['site_logo']['name'];
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('site_logo')) {
                    $site_logo_data = $this->upload->data();
                    $site_logo_path = 'uploads/site_logo/' . $site_logo_data['file_name'];
                }
            }
            // Handle file upload for site_favicon
            $site_favicon_path = '';
            if (!empty($_FILES['site_favicon']['name'])) {
                $config['upload_path'] = $upload_path2;
                $config['allowed_types'] = 'jpg|jpeg|png|pdf|webp';
                $config['file_name'] = time() . '_' . $_FILES['site_favicon']['name'];
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('site_favicon')) {
                    $site_favicon_data = $this->upload->data();
                    $site_favicon_path = 'uploads/site_logo/' . $site_favicon_data['file_name'];
                }
            }
			$now = date("Y-m-d H:i:s");
			// Prepare data for insertion/updation
			$site_data = [
				'site_logo' => $site_logo_path,
				'site_favicon' => $site_favicon_path,
				'site_name' => $site_name,
				'site_email' => $site_email,
				'site_phone' => $site_phone,
				'copyright_text' => $copyright_text,
				'opening_hours' => $opening_hours,
				'created_at' => $now,
			];
			if ($site_id) {
				$this->Admin_model->update_settings($site_id, $site_data);
				$this->session->set_flashdata('success', 'Updated successfully.');
			} else {
				$this->Admin_model->add_settings($site_data);
				$this->session->set_flashdata('success', 'Added successfully.');
			}

			redirect('admin/settings/');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/settings',$data);
		$this->load->view('admin/includes/footer');
	}
	public function social()
	{
		$data['socials'] = $this->Admin_model->get_social();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$social_id = $this->input->post('social_id');
			$social_name = $this->input->post('social_name');
			$social_svg = $this->input->post('social_svg');
			$social_target = $this->input->post('social_target');
			$social_url = $this->input->post('social_url');
			$social_status = $this->input->post('social_status') ?? 0;
			$now = date("Y-m-d H:i:s");
			// Prepare data for insertion/updation
			$site_data = [
				'social_name' => $social_name,
				'social_svg' => $social_svg,
				'social_target' => $social_target,
				'social_url' => $social_url,
				'social_status' => $social_status,
				'created_at' => $now,
			];
			if ($social_id) {
				$this->Admin_model->update_social($social_id, $site_data);
				$this->session->set_flashdata('success', 'Updated successfully.');
			} else {
				$this->Admin_model->add_social($site_data);
				$this->session->set_flashdata('success', 'Added successfully.');
			}

			redirect('admin/social/');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/sociallist',$data);
		$this->load->view('admin/includes/footer');
	}
	public function get_socialbyid($id)
	{
		$social = $this->Admin_model->get_socialbyid($id);
		if ($social) {
			// Return the social data as JSON
			echo json_encode($social);
		} else {
			// Return an error response if social not found
			echo json_encode(['error' => 'social link not found']);
		}
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