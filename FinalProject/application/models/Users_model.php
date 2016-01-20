<?php

class Users_model extends CI_Model {
	public function __construct()
	{
	   parent::__construct();
	}
    public function getuser($username, $password)
    {
      $this -> db -> select('*');
      $this -> db -> from('users');
      $this -> db -> where('username', $username);
      $this -> db -> where('password', md5($password));
      $this -> db -> limit(1);

      $query = $this -> db -> get();

      if($query -> num_rows() == 1)
      {
        return $query->result();
      }
      else
      {
        return false;
      }
    }
	
	public function get_user_profile($id)
    {
      $this -> db -> select('*');
      $this -> db -> from('users');
	  $this -> db -> join('users_profiles', 'users.id = users_profiles.user_id', 'left');
      $this -> db -> where('user_id', $id);
      $this -> db -> limit(1);

      $query = $this -> db -> get();

      if($query -> num_rows() == 1)
      {
        return $query->result();
      }
      else
      {
        return false;
      }
    }
	
	public function get_all_agencies()
	{
		$query = $this->db->get_where('users_profiles', array('user_type' => 'tour agency'));
		if($query->num_rows() > 0){
			return $query->result();
		}
	} 
	
	public function check_role($id){
		$this -> db -> select('role');
        $this -> db -> from('users');
        $this -> db -> where('id', $id);
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            foreach($query->result() as $row)
			return $row->role;
        }
        else
        {
            return false;
        }
	}
	public function check_username($id){
		$this -> db -> select('username');
        $this -> db -> from('users');
        $this -> db -> where('id', $id);
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            foreach($query->result() as $row)
			return $row->username;
        }
        else
        {
            return false;
        }
	}

	public function registration($user_info, $profile_info){
		$this->db->insert('users', $user_info); 
		$this->db->insert('users_profiles', $profile_info); 
	}
	
	public function password_check($id, $password){
		$this -> db -> select('password');
        $this -> db -> from('users');
        $this -> db -> where('id', $id);
        $this -> db -> where('password', md5($password));
		$query = $this->db->get();
		if($query -> num_rows() == 1)
        {
			return true;
        }
        else
        {
            return false;
        }
	}
	
	public function update_user_profile($user_id, $info){
		$this->db->where('user_id', $user_id);
		$this->db->update('users_profiles', $info); 
	}
	
	public function update_user_pass($user_id, $info){
		$this->db->where('id', $user_id);
		$this->db->update('users', $info); 
	}
	
	public function doubleinsert_check($username, $companyName){
		$this -> db -> select('*');
        $this -> db -> from('users');
		$this->db->join('users_profiles', 'users.id = users_profiles.user_id', 'left');
        $this -> db -> where('username', $username);
        $this -> db -> or_where('company_name', $companyName);
		$query = $this->db->get();
		if($query -> num_rows() == 0)
        {
			return true;
        }
        else
        {
            return false;
        }
		
	}
	
	public function check_last_id(){
		$this->db->trans_start();
		$this->db->select('id');
		$this->db->from('users');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		$row = $query->row();
		$this -> db -> trans_complete();
		return $row -> id;	
	}
	
	public function get_num_rows()
	{
		$q = $this->db->get('users_profiles');
		return $q->num_rows();
	}
	
	public function search ($sort_by, $sort_order, $per_page, $offset)
	{
		$this->db->order_by($sort_by, $sort_order);

		$query = $this->db->get('users_profiles', $per_page, $offset);
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	public function delete_user_in_db ($user_id) 
	{
		$this->db->where('user_id', $user_id);
		$this->db->delete('users_profiles'); 
		
		$this->db->where('id', $user_id);
		$this->db->delete('users'); 
	}
	



}