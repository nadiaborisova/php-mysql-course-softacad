<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }
	
    public function view($cat)
    {       
		if($this->session->userdata('logged_in')){
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
		}
		
		$total_rows = $this->offers_model->get_num_offers_of_category($cat);
		
		$config['base_url'] = base_url().'category/view/'.$cat.'/page/';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = '9';
		$config['uri_segment'] = 5;
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
	
        $data['category'] = $this->categories_model -> getonecategory($cat);
        $data['offers'] = $this->offers_model->get_offers_of_category($cat, $config['per_page'], $this->uri->segment($config['uri_segment']));
    
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/left-sidebar.php', $data);
        $this->load->view('category', $data);
        $this->load->view('templates/right-sidebar.php', $data);
        $this->load->view('templates/footer.php', $data);
    
    }
}
