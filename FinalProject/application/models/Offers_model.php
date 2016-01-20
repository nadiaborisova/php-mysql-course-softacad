<?php
class Offers_model extends CI_Model 
{
	public function __construct()
	{
	   parent::__construct();
	}

	public function get_offers_of_category($cat, $a=2147483647, $b=0)
	{
	$this->db->select('*');
	$this->db->from('offers');
	$this->db->join('categories_offers', 'offers.id = categories_offers.offer_id', 'left');
	$this->db->join('categories', 'categories.cat_id = categories_offers.category_id', 'left');
	$this->db->where('category_id', $cat); 
	$this->db->where('is_deleted_from_user', 0);
	$this->db->where('is_active', 1);
	$this->db->where('expiry_date >=', date('Y-m-d'));
	$this->db->order_by("offer_id", "desc"); 
	$this->db->limit($a, $b);
	$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	} 
	
	public function get_offers ($sort_by, $sort_order, $per_page, $offset)
	{
		$this->db->select('*');
		$this->db->from('offers');
		$this->db->join('users_profiles', 'offers.user_id = users_profiles.user_id', 'left');
		
		$this->db->where('expiry_date >=', date('Y-m-d'));
		
		$this->db->order_by($sort_by, $sort_order);
		$this->db->limit($per_page, $offset);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
		
	public function getoneoffer($id)
	{
	$this->db->select('*');
	$this->db->from('offers');
	$this->db->join('countries', 'offers.country_id = countries.cntr_id', 'left');
	$this->db->join('users_profiles', 'offers.user_id = users_profiles.user_id', 'left');
	$this->db->join('categories_offers', 'offers.id = categories_offers.offer_id', 'left');
	$this->db->join('categories', 'categories.cat_id = categories_offers.category_id', 'left');
	$this->db->where('is_deleted_from_user', 0);
	$this->db->where('expiry_date >=', date('Y-m-d'));
	$this->db->where('id', $id); 
	$this->db->limit(1); 
	$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	} 
	
	public function getoneofferofcategory($id)
	{
	$this->db->select('*');
	$this->db->from('offers');
	$this->db->join('countries', 'offers.country_id = countries.cntr_id', 'left');
	$this->db->join('categories_offers', 'offers.id = categories_offers.offer_id', 'left');
	$this->db->join('categories', 'categories.cat_id = categories_offers.category_id', 'left');
	$this->db->where('is_deleted_from_user', 0);
	$this->db->where('expiry_date >=', date('Y-m-d'));
	$this->db->where('offer_id', $id); 
	$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	} 
	
	public function get_num_total_offers()
	{
		$q = $this->db->get('offers');
		return $q->num_rows();
	}
	
	public function get_num_offers_of_category($cat)
	{
		$this->db->select('*');
		$this->db->from('offers');
		$this->db->join('categories_offers', 'offers.id = categories_offers.offer_id', 'left');
		$this->db->join('categories', 'categories.cat_id = categories_offers.category_id', 'left');
		$this->db->where('category_id', $cat); 
		$q = $this->db->get();
		return $q->num_rows();
	}
	
	public function get_num_agencies()
	{
		$this->db->select('*');
		$this->db->from('users_profiles');
		$this->db->where('user_type', 'tour agency');
		$q = $this->db->get();
		return $q->num_rows();
	}
	

	public function get_num_offers_of_agent($id)
	{
		$this->db->select('*');
		$this->db->from('offers');
		$this->db->where('user_id', $id); 
		$this->db->where('is_deleted_from_user', '0');
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	public function get_agent_offers ($id, $per_page, $offset)
	{
		$this->db->select('*');
		$this->db->from('offers');
		$this->db->where('user_id', $id);
		$this->db->where('is_deleted_from_user', '0');
		$this->db->order_by('publishing_date', 'desc');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	public function add_offer($info){
		$this->db->insert('offers', $info); 
	}
	
	public function add_categories_offers($id_info){
		$this->db->insert_batch('categories_offers', $id_info);
	}
	
	public function check_last_id(){
		$this->db->trans_start();
		$this->db->select('id');
		$this->db->from('offers');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		$row = $query->row();
		$this -> db -> trans_complete();
		return $row -> id;	
	}
	
	public function update_offer($id, $info){
		$this->db->where('id', $id);
		$this->db->update('offers', $info); 
	}
	
	
	public function delete_offer_in_db ($offer_id) {
		$this->db->where('id', $offer_id);
		$this->db->delete('offers'); 
	}
	
	public function search($keyword) 
	{
		$this->db->where('MATCH (offer_programm) AGAINST ("'.$keyword.'")', NULL);
		$this->db->or_where('MATCH (title) AGAINST ("'.$keyword.'")', NULL);
		
		$this->db->where('is_active', 1);
		$this->db->where('is_deleted_from_user', 0);
		$this->db->where('expiry_date >=', date('Y-m-d'));
		$query = $this->db->get('offers');
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	public function full_search($keyword, $transport, $country, $category) 
	{
		$this->db->select('*');
		$this->db->from('offers');
		$this->db->where('is_active', 1);
		$this->db->where('is_deleted_from_user', 0);
		$this->db->where('expiry_date >=', date('Y-m-d'));
		
		$this->db->join('countries', 'offers.country_id = countries.cntr_id', 'left');
		$this->db->join('categories_offers', 'offers.id = categories_offers.offer_id', 'left');
		$this->db->join('categories', 'categories.cat_id = categories_offers.category_id', 'left');
		
		$this->db->where('MATCH (offer_programm) AGAINST ("'.$keyword.'" IN BOOLEAN MODE)', NULL);
		$this->db->or_where('MATCH (title) AGAINST ("'.$keyword.'" IN BOOLEAN MODE)', NULL);
		$this->db->where('MATCH (country_name) AGAINST ("'.$country.'" IN BOOLEAN MODE)', NULL);
		$this->db->or_where('MATCH (category_name) AGAINST ("'.$category.'" IN BOOLEAN MODE)', NULL);
		$this->db->where('MATCH (transport) AGAINST ("'.$transport.'" IN BOOLEAN MODE)', NULL);
		
		$this->db->group_by('offer_id');

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	
}
