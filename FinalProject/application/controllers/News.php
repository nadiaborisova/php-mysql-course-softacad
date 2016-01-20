<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
	   
    }
    public function index()
    {		
		if($this->session->userdata('logged_in')){
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
		}
        $data['news'] = $this->news_model->getallnews();
		
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/left-sidebar.php', $data);
        $this->load->view('news', $data);
        $this->load->view('templates/right-sidebar.php', $data);
        $this->load->view('templates/footer.php', $data);
    }
	public function view($id)
    {		
		if($this->session->userdata('logged_in')){
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
		}
		
	    $data['single_news'] = $this->news_model->getsinglenews($id);
		
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/left-sidebar.php', $data);
        $this->load->view('single-news', $data);
        $this->load->view('templates/right-sidebar.php', $data);
        $this->load->view('templates/footer.php', $data);
    }
}
