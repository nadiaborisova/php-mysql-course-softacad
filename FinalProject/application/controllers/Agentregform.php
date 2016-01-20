<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agentregform extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->helper('string');

    }
	
    public function index()
    {		
        $data['title'] = 'Форма за регистрация';
		
		if($this->session->userdata('logged_in')){
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/left-sidebar', $data);
		$this->load->view('agent-reg-form', $data);
		$this->load->view('templates/right-sidebar', $data);
		$this->load->view('templates/footer', $data);
    }
	
	public function registration() 
	{
		$data['title'] = 'Регистрация на потребител';
		
			$username = trim(stripslashes(htmlspecialchars($this->input->post('username', TRUE))));
			$password = trim(stripslashes(htmlspecialchars($this->input->post('password', TRUE))));
			
			$companyName = trim(stripslashes(htmlspecialchars($this->input->post('companyName', TRUE))));
			$city = trim(stripslashes(htmlspecialchars($this->input->post('city', TRUE))));
			$address = trim(stripslashes(htmlspecialchars($this->input->post('address', TRUE))));
			$phone = trim(stripslashes(htmlspecialchars($this->input->post('phone', TRUE))));
			$phone2 = trim(stripslashes(htmlspecialchars($this->input->post('phone2', TRUE))));
			$email = trim(stripslashes(htmlspecialchars($this->input->post('email', TRUE))));
			$website = trim(stripslashes(htmlspecialchars($this->input->post('website', TRUE))));
			$contactPerson = trim(stripslashes(htmlspecialchars($this->input->post('contactPerson', TRUE))));
			$description = trim(stripslashes(htmlspecialchars($this->input->post('description', TRUE))));
			
			$config['upload_path'] = 'assets/images/logos/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
		
				
			if($this->upload->do_upload('logo')){
				$uploaded_file = $this->upload->data(); 
				if($uploaded_file['file_ext']=='gif' || $uploaded_file['file_ext']=='jpg' || $uploaded_file['file_ext']=='png' || $uploaded_file['file_ext']=='jpeg') {
					$logo = $uploaded_file['file_name'];
				}
				else {
					$logo = 'logo-default-img.jpg';
				}
			}
			else {
				$logo = 'logo-default-img.jpg';
			}
			
			$check = $this->users_model->doubleinsert_check($username, $companyName);
			if($check){
			
				$user_info = array(
				   'username' => $username,
				   'password' => md5($password),
				   'role' => 'agent'
				);

				$profile_info = array(
				   'company_name' => $companyName,  
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

				$this->users_model->registration($user_info, $profile_info);
				
				$user_id = $this->users_model->check_last_id();
				
				$info = array(
				   'user_id' => $user_id
				);
				$this->users_model->update_user_profile($username, $info);
				
				$this->load->view('templates/header', $data);
				$this->load->view('templates/left-sidebar', $data);
				$this->load->view('registration-success', $data);
				$this->load->view('templates/right-sidebar', $data);
				$this->load->view('templates/footer', $data);
				

			}
			else{	
				$data['title'] = 'Грешка';
				
				$data['username'] = $username;
				$data['companyName'] = $companyName;
			
				$this->load->view('templates/header', $data);
				$this->load->view('templates/left-sidebar', $data);
				$this->load->view('registration-error', $data);
				$this->load->view('templates/right-sidebar', $data);
				$this->load->view('templates/footer', $data);
				
			}

	}
}