<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manageprofile extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {			
		if($this->session->userdata('logged_in')){
			$data['title'] = 'Потребителски профил';
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			$data['profile_info'] = $this->users_model->get_user_profile($user_id); 
	
			$this->load->view('templates/header', $data);
			$this->load->view('templates/left-sidebar', $data);
			$this->load->view('manage-profile', $data);
			$this->load->view('templates/right-sidebar', $data);
			$this->load->view('templates/footer', $data);
		}
		else {
			redirect(base_url(), 'refresh');
		}
    }
	
	public function manage($id) 
	{
		if($this->session->userdata('logged_in')){	
			$data['title'] = 'Потребителски профил - редакция';
			
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			$data['profile_info'] = $this->users_model->get_user_profile($user_id); 
			
			$username = trim(stripslashes(htmlspecialchars($this->input->post('username', TRUE))));
			$password = trim(stripslashes(htmlspecialchars($this->input->post('password', TRUE))));
			$newpass = trim(stripslashes(htmlspecialchars($this->input->post('newpass', TRUE))));
			
			$city = trim(stripslashes(htmlspecialchars($this->input->post('city', TRUE))));
			$address = trim(stripslashes(htmlspecialchars($this->input->post('address', TRUE))));
			$phone = trim(stripslashes(htmlspecialchars($this->input->post('phone', TRUE))));
			$phone2 = trim(stripslashes(htmlspecialchars($this->input->post('phone2', TRUE))));
			$email = trim(stripslashes(htmlspecialchars($this->input->post('email', TRUE))));
			$website = trim(stripslashes(htmlspecialchars($this->input->post('website', TRUE))));
			$contactPerson = trim(stripslashes(htmlspecialchars($this->input->post('contactPerson', TRUE))));
			$description = trim(stripslashes(htmlentities($this->input->post('description', TRUE))));
			
			$config['upload_path'] = 'assets/images/logos/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
		
				
			if($this->upload->do_upload('logo')){
				$uploaded_file = $this->upload->data();  
				$logo = $uploaded_file['raw_name'];
			}
			else {
				$logo = $this->input->post('current_logo', TRUE);
			}
			
			$user_id = $this->session->userdata('logged_in');
			$check = $this -> users_model -> password_check($user_id, $password);
			
			if($check){
			
				$info = array(
				   'user_type' => 'tour agency',  
				   'city' => $city,
				   'address' => $address,	   
				   'phone' => $phone,
				   'phone2' => $phone2,		   
				   'email' => $email,
				   'website' => $website,
				   'contact_person' => $contactPerson,		   
				   'description' => $description,
				   'logo' => $logo		   
				);

				$this -> users_model -> update_user_profile($user_id, $info);
				
				if(isset($newpass)){
				
					$newpass = md5($newpass);
					$info = array(
					   'password' => $newpass		   
					);

					$this -> users_model -> update_user_pass($user_id, $info);
				}
				
				$this->load->view('templates/header', $data);
				$this->load->view('templates/left-sidebar', $data);
				$this->load->view('update-success', $data);
				$this->load->view('templates/right-sidebar', $data);
				$this->load->view('templates/footer', $data);
				
			}
			else {	
				$this->session->set_flashdata('pass_error', 'Невалидна парола');
				
				$data['pass_error'] = $this->session->flashdata('pass_error');
				
				$this->load->view('templates/header', $data);
				$this->load->view('templates/left-sidebar', $data);
				$this->load->view('manage-profile', $data);
				$this->load->view('templates/right-sidebar', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		else {
			redirect(base_url(), 'refresh');
		}
	}
}