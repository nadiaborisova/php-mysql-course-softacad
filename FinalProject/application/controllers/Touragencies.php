<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Touragencies extends MY_Controller {
    public function __construct()
    {
       parent::__construct();
    }
    public function index()
    {
		if($this->session->userdata('logged_in')){
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
		}
		
        $data['agencies'] = $this->users_model->get_all_agencies();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/left-sidebar.php', $data);
        $this->load->view('touragencies', $data);
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
		
        $data['agency'] = $this->users_model->get_user_profile($id);
		
		$data['agency_offers'] = $this->offers_model->get_agent_offers($id, 50, 0);
				
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/left-sidebar.php', $data);
        $this->load->view('touragency', $data);
        $this->load->view('templates/right-sidebar.php', $data);
        $this->load->view('templates/footer.php', $data);
    }
}
