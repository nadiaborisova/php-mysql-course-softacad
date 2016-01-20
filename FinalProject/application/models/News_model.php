<?php
    class News_model extends CI_Model 
    {
        public function __construct()
        {
           parent::__construct();
        }
        public function getallnews()
        {
		$this->db->select('*');
		$this->db->from('news');
		$this->db->join('users_profiles', 'news.user_id = users_profiles.user_id', 'left');
		$this->db->order_by("news_id", "asc"); 
		$query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result();
            }
        } 
		public function getsinglenews($id)
        {
		$this->db->select('*');
		$this->db->from('news');
		$this->db->where("news_id", $id); 
		$query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result();
            }
        } 
        public function get_num_rows()
		{
			$q = $this->db->get('news');
			return $q->num_rows();
		}
		
		public function search ($sort_by, $sort_order, $per_page, $offset)
		{
			$this->db->order_by($sort_by, $sort_order);

			$query = $this->db->get('news', $per_page, $offset);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
		
		public function add_news($info){
			$this->db->insert('news', $info); 
		}
		
		public function update_news($id, $info){
			$this->db->where('news_id', $id);
			$this->db->update('news', $info); 
		}
		
		public function delete_news_in_db ($news_id) {
			$this->db->where('news_id', $news_id);
			$this->db->delete('news'); 
		}
    }