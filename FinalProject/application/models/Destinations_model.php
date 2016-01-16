<?php
class Destinations_model extends CI_Model 
{
	public function __construct()
	{
	   parent::__construct();
	}
	
	public function getalldestinations()
	{
		$this->db->select('*');
		$this->db->from('countries');
		$this->db->order_by('country_name', 'asc'); 
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	public function getonedestination($id)
	{
		$query = $this->db->get_where('countries', array('cntr_id' => $id));
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	public function getdestinationsoffers($id)
    {
		$this->db->select('*');
		$this->db->from('offers');
		$this->db->join('countries', 'offers.country_id = countries.cntr_id', 'left');
		$this->db->where('cntr_id', $id); 
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
    } 
		
	public function get_num_rows()
	{
		$q = $this->db->get('countries');
		return $q->num_rows();
	}
	
	public function search ($sort_by, $sort_order, $per_page, $offset)
	{
		$this->db->order_by($sort_by, $sort_order);

		$query = $this->db->get('countries', $per_page, $offset);
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	
	public function add_destination($info){
		$this->db->insert('countries', $info); 
	}
	
	public function update_destination($id, $info){
		$this->db->where('cntr_id', $id);
		$this->db->update('countries', $info); 
	}
	
	
	public function delete_destination_in_db ($cntr_id) 
	{
		$this->db->where('cntr_id', $cntr_id);
		$this->db->delete('countries'); 
	}
}