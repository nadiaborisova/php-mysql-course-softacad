<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managenews extends MY_Controller {
    public function __construct()
    {
       parent::__construct();
	   $this->load->model('news_model');
    }
    public function display($sort_by='publishing_date', $sort_order='desc')
    {
			$user_id = $this->session->userdata('logged_in');
			$role = $this->users_model->check_role($user_id);  
			$data['role'] = $role;
		if ($this->session->userdata('logged_in')&&($role == 'admin' || $role == 'moderator')){
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			$data['role'] = $role;
			$data['title'] = 'Администраторски панел - новини';
			$total_rows = $this->news_model->get_num_rows();
			
			$config['base_url'] = base_url().'managenews/display/'.$sort_by.'/'.$sort_order.'/page/';
			$config['total_rows'] = $total_rows;
			$config['per_page'] = '5';
			$config['uri_segment'] = 6;
			$config['next_link'] = 'Следваща страница &gt;&gt;';
			$config['prev_link'] = '&lt;&lt; Предишна страница';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
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
			
			$data['rows'] = $this->news_model->search($sort_by, $sort_order, $config['per_page'], $this->uri->segment($config['uri_segment']));
			
		
			$this->load->view('templates/header.php', $data);
			$this->load->view('templates/admin-menu.php', $data);
			$this->load->view('admin/admin-news', $data);
			$this->load->view('templates/footer.php', $data);
		}
		else{
			redirect(base_url(), 'refresh');
		}
    
    }
	
	public function addnewsform()
	{
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id);  
		$data['role'] = $role;
		if ($this->session->userdata('logged_in')&&($role == 'admin' || $role == 'moderator')){
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
		
		$this->load->view('templates/header.php', $data);
		$this->load->view('templates/admin-menu.php', $data);
		$this->load->view('add-news', $data);
		$this->load->view('templates/footer', $data);
		}
		else{
			redirect(base_url(), 'refresh');
		}
		
	}
	
	public function addnews(){
		
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id);  
		$data['role'] = $role;
		if ($this->session->userdata('logged_in')&&($role == 'admin' || $role == 'moderator')){
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
		
			if($this->input->post('submit')){
				$title = trim(stripslashes(htmlspecialchars($this->input->post('title', TRUE))));
				$subtitle = trim(stripslashes(htmlspecialchars($this->input->post('subtitle', TRUE))));
				$news_description = trim(stripslashes(htmlspecialchars($this->input->post('news_description', TRUE))));
				$expiry_date = trim(stripslashes(htmlspecialchars($this->input->post('expiry_date', TRUE))));
				$is_active = trim(stripslashes(htmlspecialchars($this->input->post('is_active', TRUE))));

			$path = 'assets/images/'.$user_id.'/';
			if(!file_exists($path)) {
				mkdir($path,0777);
			}
			$config['upload_path'] = $path; 
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']    = '300';
			$this->load->library('upload', $config);

			$image = '';
			if($this->upload->do_upload('image')){
				$uploaded_file = $this->upload->data(); 
				$image = $uploaded_file['raw_name'];
			}
			
				$info = array(
				   'title' => $title,  
				   'subtitle' => $subtitle,
				   'news_description' => $news_description,	   
				   'expiry_date' => $expiry_date,
				   'is_active' => $is_active,
				   'image' => $image,
				   'user_id' => $user_id
				);
				
				$this -> news_model -> add_news($info);
						
				redirect(base_url('managenews/display'), 'refresh');
			}
		}
		else{
			redirect(base_url(), 'refresh');
		}
	}
	
	public function manage_news_form($id)
    {
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id);  
		$data['role'] = $role;
		if ($this->session->userdata('logged_in')&&($role == 'admin' || $role == 'moderator')){
			$data['title'] = 'Редакция на новина';
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			$data['news_info'] = $this->news_model->getsinglenews($id);  
	
			$this->load->view('templates/header.php', $data);
			$this->load->view('templates/admin-menu.php', $data);
			$this->load->view('manage-news', $data);
			$this->load->view('templates/footer', $data);
		}
		else {
			redirect(base_url(), 'refresh');
		}
    }
	
	public function manage($news_id) {
	
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id);  
		$data['role'] = $role;
		if ($this->session->userdata('logged_in')&&($role == 'admin' || $role == 'moderator')){
	
			$data['title'] = 'Редакция на новина';
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			
			$data['news_info'] = $this->news_model->getsinglenews($news_id); 
			
			$title = trim(stripslashes(htmlspecialchars($this->input->post('title', TRUE))));
			$subtitle = trim(stripslashes(htmlspecialchars($this->input->post('subtitle', TRUE))));
			$news_description = trim(stripslashes(htmlspecialchars($this->input->post('news_description', TRUE))));
			$expiry_date = trim(stripslashes(htmlspecialchars($this->input->post('expiry_date', TRUE))));
			$is_active = trim(stripslashes(htmlspecialchars($this->input->post('is_active', TRUE))));
			
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
				'title' => $title,  
				'subtitle' => $subtitle,
				'news_description' => $news_description,	   
				'expiry_date' => $expiry_date,
				'is_active' => $is_active,
				'image' => $image
			);
			

			$this -> news_model -> update_news($news_id, $info);
			
			redirect(base_url('managenews/display'), 'refresh');
		}
		else {
			redirect(base_url(), 'refresh');
		}
}

	public function delete_news_in_db ($news_id)
	{
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id);
		if ($this->session->userdata('logged_in')&&$role == 'admin') {
			$this -> news_model -> delete_news_in_db($news_id);
			redirect(base_url('managenews/display'), 'refresh');
		} else {
			echo 'Access denied';
		}
	}
	
}
