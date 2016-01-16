<?php
    class Categories_model extends CI_Model 
    {
        public function __construct()
        {
           parent::__construct();
        }
        public function getallmaincategories()
        {
            $query = $this->db->get_where('categories', array('parent_id' => 0));
            if($query->num_rows() > 0){
                return $query->result();
            }
        }
        public function getallsubcategories($parent_id)
        {
            $query = $this->db->get_where('categories', array('parent_id' => $parent_id));
            if($query->num_rows() > 0){
                return $query->result();
            }
        }
        public function getonecategory($id)
        {
            $query = $this->db->get_where('categories', array('cat_id' => $id));
            if($query->num_rows() > 0){
                return $query->result();
            }
        }
        
		public function check_parent_id($cat_id){
			$this -> db -> select('parent_id');
			$this -> db -> from('categories');
			$this -> db -> where('cat_id', $cat_id);
			$this -> db -> limit(1);

			$query = $this -> db -> get();

			if($query -> num_rows() == 1)
			{
				foreach($query->result() as $row)
				return $row->parent_id;
			}
			else
			{
				return false;
			}
		}
    }