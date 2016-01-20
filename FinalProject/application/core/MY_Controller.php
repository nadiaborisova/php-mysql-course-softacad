<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    private $items ;
    
    public function __construct()
    {
        parent::__construct() ;
        $this->init() ;
        $this->load->vars($this->items );
    }
    
    private function init()
    {
		$destinations=$this->destinations_model->getalldestinations(); 
		$categories=$this->categories_model->getallmaincategories();
		
		for($i=2; $i<count($categories)+1; $i++){
            $subcategories[$i]=$this->categories_model->getallsubcategories($i);
        }
		
		$topoffers1=$this->offers_model->get_offers_of_category(1, 4, 0);
		$topoffers2=$this->offers_model->get_offers_of_category(1, 4, 4);
		$topoffers3=$this->offers_model->get_offers_of_category(1, 1, 0);
		$topoffers4=$this->offers_model->get_offers_of_category(1, 4, 1);
			
        $this->items = array('destinations' => $destinations,
                     'categories' => $categories,
					 'subcategories' => $subcategories,
					 'topoffers1' => $topoffers1,
					 'topoffers2' => $topoffers2,
					 'topoffers3' => $topoffers3,
					 'topoffers4' => $topoffers4
					 ) ;
					 			 
    }    
} 