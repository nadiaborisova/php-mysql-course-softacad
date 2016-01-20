<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends MY_Controller {
    public function __construct()
    {
       parent::__construct();
    }
    public function view($id)
    {
		
		if($this->session->userdata('logged_in')){
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
		}

        $data['offer'] = $this->offers_model->getoneoffer($id);
    
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/left-sidebar.php', $data);
        $this->load->view('offer', $data);
        $this->load->view('templates/right-sidebar.php', $data);
        $this->load->view('templates/footer.php', $data);
    
    }
}
