<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function checkdatabase()
    {	
		$username = trim(stripslashes(htmlspecialchars($this->input->post('username', TRUE))));
		$password = trim(stripslashes(htmlspecialchars($this->input->post('password', TRUE))));
		$result = $this->users_model->getuser($username, $password);
		if($result)
		{
        $user_id;
        foreach($result as $row)
        {
            $user_id = $row->id;       
        }		
		$this->session->set_userdata('logged_in', $user_id);
		$role = $this->users_model->check_role($user_id);	
        switch($role){
            case 'admin':
            case 'moderator':
            case 'agent':
                redirect(base_url('manageoffers/display/'), 'refresh');
                break;
            default: 'Access denied!';
        }
       //echo "Successfuly logged in";
        return TRUE;
      }
      else
      {
        echo 'Invalid username or password';
        return false;
      }
      
    }   
    public function logout()
    {
      $this->session->unset_userdata('logged_in');
      $this->session->sess_destroy();
      redirect(base_url(), 'refresh');
    }
}