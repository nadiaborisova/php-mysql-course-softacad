<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manageoffers extends MY_Controller {
    public function __construct()
    {
       parent::__construct();
    }

    public function display($sort_by='publishing_date', $sort_order='desc')
    {		
			$user_id = $this->session->userdata('logged_in');
			$role = $this->users_model->check_role($user_id); 
			$data['role'] = $role;
		if ($this->session->userdata('logged_in')&&($role == 'admin' || $role == 'moderator')) {
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			$data['title'] = 'Администраторски панел';
			
			$total_rows = $this->offers_model->get_num_total_offers();
			
			$config['base_url'] = base_url().'manageoffers/display/'.$sort_by.'/'.$sort_order.'/page/';
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
			
			$data['rows'] = $this->offers_model->get_offers($sort_by, $sort_order, $config['per_page'], $this->uri->segment($config['uri_segment']));
			
			$data['num_agencies'] = $this->offers_model->get_num_agencies();
		
			$this->load->view('templates/header.php', $data);
			$this->load->view('templates/admin-menu.php', $data);
			$this->load->view('admin/admin-offers', $data);
			$this->load->view('templates/footer.php', $data);
		}
		elseif ($role == 'agent') {
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			$total_rows = $this->offers_model->get_num_offers_of_agent($user_id);
			$data['title'] = 'Агентски панел';
			$config['base_url'] = base_url().'manageoffers/display/'.$sort_by.'/'.$sort_order.'/page/';
			$config['total_rows'] = $total_rows;
			$config['per_page'] = '10';
			$config['uri_segment'] = 6;
			$config['prev_link'] = '&lt; Предишна страница';
			$config['next_link'] = 'Следваща страница &gt;';
			
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
			
			$data['total_rows'] = $total_rows;
			
			$data['rows'] = $this->offers_model->get_agent_offers($user_id, $config['per_page'], $this->uri->segment($config['uri_segment']));
			
            $this->load->view('templates/header', $data);
            $this->load->view('templates/left-sidebar', $data);
            $this->load->view('agent-offers', $data);
            $this->load->view('templates/right-sidebar', $data);
            $this->load->view('templates/footer', $data);
        }
        else {
            redirect(base_url(), 'refresh');
        }
    
    }
	
	public function addofferform()
	{		
		if($this->session->userdata('logged_in')){
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
		
			$this->load->view('templates/header', $data);
			$this->load->view('templates/left-sidebar', $data);
			$this->load->view('add-offer', $data);
			$this->load->view('templates/right-sidebar', $data);
			$this->load->view('templates/footer', $data);
		}
		else {
            redirect(base_url(), 'refresh');
        }
	}
	
	public function addoffer(){
		
		if($this->session->userdata('logged_in')){
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
		
			if($this->input->post('submit')){
				$category1 = trim(stripslashes(htmlspecialchars($this->input->post('category1', TRUE))));
				$category2 = trim(stripslashes(htmlspecialchars($this->input->post('category2', TRUE))));
				$selectCountry = trim(stripslashes(htmlspecialchars($this->input->post('selectCountry', TRUE))));
				$expiry_date = trim(stripslashes(htmlspecialchars($this->input->post('expiry_date', TRUE))));
				$selectTransport = trim(stripslashes(htmlspecialchars($this->input->post('selectTransport', TRUE))));
				$duration = trim(stripslashes(htmlspecialchars($this->input->post('duration', TRUE))));
				$min_price = trim(stripslashes(htmlspecialchars($this->input->post('min_price', TRUE))));
				$currency = trim(stripslashes(htmlspecialchars($this->input->post('currency', TRUE))));
				$title = trim(stripslashes(htmlspecialchars($this->input->post('title', TRUE))));
				$offer_programm = trim(stripslashes(htmlentities($this->input->post('offer_programm', TRUE))));

			$path = 'assets/images/'.$user_id.'/';
			if(!file_exists($path)) {

				mkdir($path,0777);
			}
			$config['upload_path'] = $path; 
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']    = '600';
			$this->load->library('upload', $config);

			$image1 = '';
			$image2 = '';
			$image3 = '';
			$image4 = '';
			if($this->upload->do_upload('image1')){
				$uploaded_file = $this->upload->data(); 
				$image1 = $uploaded_file['file_name'];
			}
			if($this->upload->do_upload('image2')){
				$uploaded_file = $this->upload->data(); 
				$image2 = $uploaded_file['file_name'];

			}
			if($this->upload->do_upload('image3')){
				$uploaded_file = $this->upload->data(); 
				$image3 = $uploaded_file['file_name'];
			}
			if($this->upload->do_upload('image4')){
				$uploaded_file = $this->upload->data(); 
				$image4 = $uploaded_file['file_name'];

			}
			
				$info = array(
				   'country_id' => $selectCountry,  
				   'expiry_date' => $expiry_date,
				   'transport' => $selectTransport,	   
				   'duration' => $duration,
				   'min_price' => $min_price,		   
				   'currency' => $currency,
				   'title' => $title,	   
				   'offer_programm' => $offer_programm,
				   'is_active' => '0',
				   'is_deleted_from_user' => '0',
				   'user_id' => $user_id,
				   'image1' => $image1,  
				   'image2' => $image2, 
				   'image3' => $image3, 
				   'image4' => $image4  
				);
				
				$this -> offers_model -> add_offer($info);
				
				$id = $this->offers_model->check_last_id();
				
				$parent_id1 = $this->categories_model->check_parent_id($category1);
				
				$id_info = array(
					array(
					   'category_id' => $category1, 
					   'offer_id' => $id
					),
					array(
					   'category_id' => $parent_id1, 
					   'offer_id' => $id
					)
				);
				
				$this -> offers_model -> add_categories_offers($id_info);
				
				if($category1!=$category2){
					$parent_id2 = $this->categories_model->check_parent_id($category2);
				
					$id_info2 = array(
						array(
						   'category_id' => $category2, 
						   'offer_id' => $id
						),
						array(
						   'category_id' => $parent_id2, 
						   'offer_id' => $id
						)
					);
					
					$this -> offers_model -> add_categories_offers($id_info2);
				}
				
				$this->load->view('templates/header', $data);
				$this->load->view('templates/left-sidebar', $data);
				$this->load->view('addoffer-success', $data);
				$this->load->view('templates/right-sidebar', $data);
				$this->load->view('templates/footer', $data);
			}
		}
		else {
            redirect(base_url(), 'refresh');
        }
	}
	
	public function manage_offer_form($id)
    {			
        $data['title'] = 'Редакция на оферта';
		
		if($this->session->userdata('logged_in')){
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			$data['offer_info'] = $this->offers_model->getoneofferofcategory($id);  
	
			$this->load->view('templates/header', $data);
			$this->load->view('templates/left-sidebar', $data);
			$this->load->view('manage-offer', $data);
			$this->load->view('templates/right-sidebar', $data);
			$this->load->view('templates/footer', $data);
		}
		else {
			redirect(base_url(), 'refresh');
		}
    }
	
	public function manage($id) {
		if($this->session->userdata('logged_in')){
			$data['title'] = 'Редакция на оферта';
			
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			
			$data['offer_info'] = $this->offers_model->getoneoffer($id); 
			
			$category1 = trim(stripslashes(htmlspecialchars($this->input->post('category1', TRUE))));
			$category2 = trim(stripslashes(htmlspecialchars($this->input->post('category2', TRUE))));
			$selectCountry = trim(stripslashes(htmlspecialchars($this->input->post('selectCountry', TRUE))));
			$expiry_date = trim(stripslashes(htmlspecialchars($this->input->post('expiry_date', TRUE))));
			$selectTransport = trim(stripslashes(htmlspecialchars($this->input->post('selectTransport', TRUE))));
			$duration = trim(stripslashes(htmlspecialchars($this->input->post('duration', TRUE))));
			$min_price = trim(stripslashes(htmlspecialchars($this->input->post('min_price', TRUE))));
			$currency = trim(stripslashes(htmlspecialchars($this->input->post('currency', TRUE))));
			$title = trim(stripslashes(htmlspecialchars($this->input->post('title', TRUE))));
			$offer_programm = trim(stripslashes(htmlentities($this->input->post('offer_programm', TRUE))));	
			
			$info = array(
				   'country_id' => $selectCountry,  
				   'expiry_date' => $expiry_date,
				   'transport' => $selectTransport,	   
				   'duration' => $duration,
				   'min_price' => $min_price,		   
				   'currency' => $currency,
				   'title' => $title,	   
				   'offer_programm' => $offer_programm,
				   'is_active' => '0',
				   'is_deleted_from_user' => '0',
			);

			$this -> offers_model -> update_offer($id, $info);
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/left-sidebar', $data);
			$this->load->view('update-success', $data);
			$this->load->view('templates/right-sidebar', $data);
			$this->load->view('templates/footer', $data);
		}
		else {
			redirect(base_url(), 'refresh');
		}
	}
	
	public function delete_from_agent($offer_id)
	{
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id);
		if ($this->session->userdata('logged_in')&&$role=='agent') {
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
			$data['title'] = 'Изтриване на оферта';
			$deleted = trim(stripslashes(htmlspecialchars($this->input->post('deleted', TRUE))));
			
			$info = array(
			   'is_deleted_from_user' => $deleted	
			);

			$this -> offers_model -> update_offer($offer_id, $info);
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/left-sidebar', $data);
			$this->load->view('update-success', $data);
			$this->load->view('templates/right-sidebar', $data);
			$this->load->view('templates/footer', $data);
		} 
		else {
			echo 'Access denied';
		}
	}
	
	public function activate_offer ($offer_id)
	{
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id);
		if ($this->session->userdata('logged_in')&&($role=='admin'||$role=='moderator')) {
			$activated = trim(stripslashes(htmlspecialchars($this->input->post('activated', TRUE))));
			$info = array(
			   'is_active' => $activated	
			);
			$this -> offers_model -> update_offer($offer_id, $info);
			redirect(base_url('manageoffers/display'), 'refresh');
		}
		else {
			redirect(base_url(), 'refresh');
		}
	}
	
	public function reject_offer ($offer_id)
	{
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id);
		if ($this->session->userdata('logged_in')&&($role=='admin'||$role=='moderator')) {
			$rejected = trim(stripslashes(htmlspecialchars($this->input->post('rejected', TRUE))));
		
			$info = array(
				'is_active' => $rejected	
				);

			$this -> offers_model -> update_offer($offer_id, $info);
			redirect(base_url('manageoffers/display'), 'refresh');
		}
		else {
			redirect(base_url(), 'refresh');
		}
	}
	
	public function delete_offer_in_db ($offer_id)
	{
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id);
		if ($this->session->userdata('logged_in')&&$role == 'admin') {
			$this -> offers_model -> delete_offer_in_db($offer_id);
			redirect(base_url('manageoffers/display'), 'refresh');
		} else {
			echo 'Access denied';
		}
	}
	
	public function add_topoffer ($offer_id)
	{
		$user_id = $this->session->userdata('logged_in');
		$role = $this->users_model->check_role($user_id);
		if ($this->session->userdata('logged_in')&&($role=='admin'||$role=='moderator')) {
			$cat_info = array(
				array(
				   'category_id' => 1, 
				   'offer_id' => $offer_id
				   )
				);
			
			$this -> offers_model -> add_categories_offers($cat_info);

			$offer_info = array(
			   'is_topoffer' => 1	
			);

			$this -> offers_model -> update_offer($offer_id, $offer_info);
			redirect(base_url('manageoffers/display'), 'refresh');
		}
		else {
			redirect(base_url(), 'refresh');
		}
	}
	
	public function search()
	{
		$user_id = $this->session->userdata('logged_in');
		$username = $this->users_model->check_username($user_id);  
		$data['username'] = $username;
		
		$keyword = $this->input->get('search', TRUE);
		
		$data['keyword'] = $keyword;
		$data['search_res'] = $this->offers_model->search($keyword);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/left-sidebar', $data);
		$this->load->view('search-results', $data);
		$this->load->view('templates/right-sidebar', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function full_search()
	{
		if($this->session->userdata('logged_in')){
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
		}
		
		$keyword = trim($this->input->get('keyword', TRUE));
		$transport = trim($this->input->get('transport', TRUE));
		$country = trim($this->input->get('country', TRUE));
		$cat = trim($this->input->get('category', TRUE));
			
		$data['keyword'] = $keyword;
		$data['transport'] = $transport;
		$data['country'] = $country;
		$data['cat'] = $cat;
		$data['search_res'] = $this->offers_model->full_search($keyword, $transport, $country, $cat);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/left-sidebar', $data);
		$this->load->view('search-results', $data);
		$this->load->view('templates/right-sidebar', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function full_search_form()
	{
		$data['title'] = 'Разширено търсене';
		$data['top_offers'] = $this->offers_model->get_offers_of_category(1);
		
		if($this->session->userdata('logged_in')){
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/left-sidebar', $data);
		$this->load->view('full-search-form', $data);
		$this->load->view('templates/right-sidebar', $data);
		$this->load->view('templates/footer', $data);
	}
	
}
