<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller 
{

	public function view($page = 'home')
	{
			if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
			{
					show_404();
			}
		
			if($this->session->userdata('logged_in')){
				$user_id = $this->session->userdata('logged_in');
				$username = $this->users_model->check_username($user_id);  
				$data['username'] = $username;
			}
			
			$data['holiday_offers'] = $this->offers_model->get_offers_of_category(2);
			$data['excursions'] = $this->offers_model->get_offers_of_category(3);
			$data['top_offers'] = $this->offers_model->get_offers_of_category(1);
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/left-sidebar', $data);
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/right-sidebar', $data);
			$this->load->view('templates/footer', $data);
	}
}
