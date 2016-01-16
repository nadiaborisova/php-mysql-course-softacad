<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destination extends MY_Controller 
{

    public function __construct()
    {
       parent::__construct();     
    }
	
    public function view($id=false)
	{
		if($this->session->userdata('logged_in')){
			$user_id = $this->session->userdata('logged_in');
			$username = $this->users_model->check_username($user_id);  
			$data['username'] = $username;
		}
		
        $data['dest']=$this->destinations_model->getonedestination($id);        
		$data['dest_offers'] = $this->destinations_model->getdestinationsoffers($id);
		
		$this->load->view('templates/header', $data);
        $this->load->view('templates/left-sidebar', $data);
        $this->load->view('destination', $data);
        $this->load->view('templates/right-sidebar', $data);
        $this->load->view('templates/footer', $data);
    }
}
