<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manageagents extends MY_Controller 
{
    public function __construct()
    {
       parent::__construct();
    }
	
    public function display($sort_by='company_name', $sort_order='asc')
    {
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id); 
		$data['role'] = $role;
		if ($this->session->userdata('logged_in')&&($role == 'admin' || $role == 'moderator')) {
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			$data['role'] = $role;
			$data['title'] = 'Администраторски панел - туристически агенции';
			$total_rows = $this->users_model->get_num_rows();
			
			$config['base_url'] = base_url().'manageagents/display/'.$sort_by.'/'.$sort_order.'/page/';
			$config['total_rows'] = $total_rows;
			$config['per_page'] = '10';
			$config['uri_segment'] = 6;
			$config['next_link'] = 'Следваща страница &gt;';
			$config['prev_link'] = '&lt; Предишна страница';
			$config['first_link'] = '&lt;&lt;';
			$config['last_link'] = '&gt;&gt;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
			$this->pagination->initialize($config);
			$str_links = $this->pagination->create_links();
			$data['pages'] = explode('&nbsp;',$str_links );
			$data['sort_by'] = $sort_by;
			$data['sort_order'] = $sort_order;
			$data['total_rows'] = $total_rows;
			
			$data['rows'] = $this->users_model->search($sort_by, $sort_order, $config['per_page'], $this->uri->segment($config['uri_segment']));
			
		
			$this->load->view('templates/header', $data);
			$this->load->view('templates/admin-menu', $data);
			$this->load->view('admin/admin-agencies', $data);
			$this->load->view('templates/footer', $data);
		}else{
			redirect(base_url(), 'refresh');
		}
    
    }
	
	public function manage_agent_form($id)
    {				
        
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id); 
		$data['role'] = $role;
		if ($this->session->userdata('logged_in')&&($role == 'admin' || $role == 'moderator')) {
			$data['title'] = 'Редакция на потребителски профил';
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			
			$data['user_info'] = $this->users_model->get_user_profile($id);  
	
			$this->load->view('templates/header.php', $data);
			$this->load->view('templates/admin-menu.php', $data);
			$this->load->view('admin/manage-agent', $data);
			$this->load->view('templates/footer', $data);
		}
		else {
			redirect(base_url(), 'refresh');
		}
    }
	
	public function manage($id) 
	{
		if ($this->session->userdata('logged_in')&&($role == 'admin' || $role == 'moderator')) {
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			
			$data['user_info'] = $this->users_model->get_user_profile($id);  
			
			$username = trim(stripslashes(htmlspecialchars($this->input->post('username', TRUE))));
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
			
			$info = array(
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

			$this -> users_model -> update_user_profile($id, $info);
			
			redirect(base_url('manageagents/display'), 'refresh');
		}
		else {
			redirect(base_url(), 'refresh');
		}
	}
	
	public function delete_user_in_db ($id)
	{
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id);
		if ($this->session->userdata('logged_in')&& $role == 'admin') {
			$this -> users_model -> delete_user_in_db($id);	
			redirect(base_url('manageagents/display'), 'refresh');
		} else {
			echo 'Access denied';
		}
	}
}
