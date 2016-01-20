<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managedestinations extends MY_Controller {
    public function __construct()
    {
       parent::__construct();
    }
    public function display($sort_by='country_name', $sort_order='asc')
    {		
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id); 
		$data['role'] = $role;			
		if ($this->session->userdata('logged_in')&& ($role == 'admin' || $role == 'moderator')) {
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			$data['role'] = $role;
			$data['title'] = 'Администраторски панел - дестинации';
			$total_rows = $this->destinations_model->get_num_rows();
			
			$config['base_url'] = base_url().'managedestinations/display/'.$sort_by.'/'.$sort_order.'/page/';
			$config['total_rows'] = $total_rows;
			$config['per_page'] = '20';
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
			
			$data['rows'] = $this->destinations_model->search($sort_by, $sort_order, $config['per_page'], $this->uri->segment($config['uri_segment']));
			
		
			$this->load->view('templates/header.php', $data);
			$this->load->view('templates/admin-menu.php', $data);
			$this->load->view('admin/admin-destinations', $data);
			$this->load->view('templates/footer.php', $data);
		}else{
			redirect(base_url(), 'refresh');
		}
    
    }
	
	
	public function add_dest_form(){
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id); 
		$data['role'] = $role;	
		if ($this->session->userdata('logged_in')&& ($role == 'admin' || $role == 'moderator')) {
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			$data['title'] = 'Добавяне на дестинация';
		
		$this->load->view('templates/header.php', $data);
		$this->load->view('templates/admin-menu.php', $data);
		$this->load->view('add-destination', $data);
		$this->load->view('templates/footer', $data);
		}
	}
	
	public function add_destination(){
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id); 
		$data['role'] = $role;	
		if ($this->session->userdata('logged_in')&& ($role == 'admin' || $role == 'moderator')) {
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
		
			if($this->input->post('submit')){
				$country_name = trim(stripslashes(htmlspecialchars($this->input->post('country_name', TRUE))));
				$description = trim(stripslashes(htmlspecialchars($this->input->post('description', TRUE))));
		
				$info = array(
					'country_name' => $country_name,  
					'description' => $description		   
				);
				
				$this -> destinations_model -> add_destination($info);
						
				redirect(base_url('managedestinations/display'), 'refresh');
			}
		}
		else {
			redirect(base_url(), 'refresh');
		}
	}
	
	public function manage_dest_form($id)
    {		
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id); 
		$data['role'] = $role;	
        $data['title'] = 'Редакция на държава';
		
		if ($this->session->userdata('logged_in')&& ($role == 'admin' || $role == 'moderator')) {
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			
			$data['user_id'] = $user_id;
			$data['destination_info'] = $this->destinations_model->getonedestination($id);  
	
			$this->load->view('templates/header.php', $data);
			$this->load->view('templates/admin-menu.php', $data);
			$this->load->view('manage-destination', $data);
			$this->load->view('templates/footer', $data);
		}
		else {
			redirect(base_url(), 'refresh');
		}
    }
	
	public function manage($cntr_id) 
	{
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id); 
		$data['role'] = $role;	
		if ($this->session->userdata('logged_in')&& ($role == 'admin' || $role == 'moderator')) {
		
			$data['title'] = 'Редакция на държава';
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			$data['user_id'] = $user_id;
			
			$data['destination_info'] = $this->destinations_model->getonedestination($id); 
			
			$country_name = trim(stripslashes(htmlspecialchars($this->input->post('country_name', TRUE))));
			$description = trim(stripslashes(htmlspecialchars($this->input->post('description', TRUE))));
			
			$path = 'assets/images/'.$user_id.'/';
			if(!file_exists($path)) {

				mkdir($path,0777);
			}
			$config['upload_path'] = $path; 
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']    = '300';
			$this->load->library('upload', $config);
		
			if($this->upload->do_upload('image')){
				$uploaded_file = $this->upload->data();  
				$image = $uploaded_file['raw_name'];
			}
			else {
				$image = $this->input->post('current_image', TRUE);
			}
			
			$info = array(
				'country_name' => $country_name,  
				'description' => $description,	  
				'country_image' => $image
			);
			

			$this -> destinations_model -> update_destination($cntr_id, $info);
			
			redirect(base_url('managedestinations/display'), 'refresh');
		}
		else {
			redirect(base_url(), 'refresh');
		}	
}
	
	
	public function delete_destination_in_db ($cntr_id)
	{
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id);
		if ($this->session->userdata('logged_in')&&$role == 'admin') {
			$this -> destinations_model -> delete_destination_in_db($cntr_id);		
			redirect(base_url('managedestinations/display'), 'refresh');
		} else {
			echo 'Access denied';
		}
	}
}
