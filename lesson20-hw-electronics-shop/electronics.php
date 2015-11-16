<?php 

require ('db/database.php');

class Electronics{
	protected $make='';
	protected $model='';
	protected $year='';
	protected $image='';
	protected $price='';
	
	public function setMake($make){
		$this->make = $make;
	}
	public function getMake(){
		return $this->make;
	}
	public function setModel($model){
		$this->model = $model;
	}
	public function getModel(){
		return $this->model;
	}
	public function setYear($year){
		$this->year = $year;
	}
	public function getYear(){
		return $this->year;
	}
	public function setImage($image){
		$this->image = $image;
	}
	public function getImage(){
		return $this->image;
	}
	public function setPrice($price){
		$this->image = $image;
	}
	public function getPrice(){
		return $this->price;
	}
	public function displayInfo(){
		echo "Make: ".$this->make."<br/>";
		echo "Model: ".$this->model."<br/>";
		echo "Year: ".$this->year."<br/>";
		echo "Image: ".$this->image.".jpg <br/>";
		echo "Price: ".$this->price."<br/>";
	}
	
}




class Computer extends Electronics{
	protected $ram='';
	protected $processor='';
	protected $videocard='';
	
	public function setRam($ram){
		$this->ram = $ram;
	}
	public function getRam(){
		return $this->ram;

	}
	public function setProcessor($processor){
		$this->processor = $processor;
	}
	public function getProcessor(){
		return $this->processor;

	}
	public function setVideocard($videocard){
		$this->videocard = $videocard;
	}
	public function getVideocard(){
		return $this->videocard;

	}
	public function displayInfo(){
		parent::displayInfo();
		echo "RAM: ".$this->ram."<br/>";
		echo "Processor: ".$this->processor."<br/>";
		echo "Videocard: ".$this->videocard."<hr/><br/>";
	}
	
	public function store(){
		$db = new Database;
		if($this->cnt == 0){
			$db->sendQuery("INSERT INTO `students`(`name`, `surname`, `familyName`, `personalId`, `specialty`, `course`) VALUES ('$this->name','$this->surname','$this->familyName','$this->personalId','$this->specialty','$this->course')");
		}
		if($this->cnt==1){
			$db->sendQuery("UPDATE students SET name='$this->name',surname='$this->surname',familyName='$this->familyName',specialty='$this->specialty',course='$this->course' WHERE personalId='$this->personalId'");
		}
		$this->cnt++;
	}
}




class Printer extends Electronics{
	protected $type;
	protected $numPages;
	
	public function __construct(){
	}
	public function setNumPages($numPages){
		$this->numPages = $numPages;
	}
	public function getNumPages(){
		return $this->numPages;
	}
	public function setType($type){
		$this->type = $type;
	}
	public function getType(){
		return $this->type;
	}
	public function displayInfo(){
		parent::displayInfo();
		echo "Type: ".$this->type."<br/>";
		echo "Number of pages: ".$this->numPages."<hr/><br/>";
	}
	public function store(){
		$db = new Database;
		if($this->cnt == 0){
			$db->sendQuery("INSERT INTO `teachers`(`name`, `surname`, `familyName`, `personalId`, `item`) VALUES ('$this->name','$this->surname','$this->familyName','$this->personalId','$this->item')");
		} else {
			$db->sendQuery("UPDATE `teachers` SET `name`='$this->name',`surname`='$this->surname',`familyName`='$this->familyName',`item`='$this->item' WHERE `personalId`='$this->personalId'");
		}
		$this->cnt++;
	}
	
}




class Router extends Electronics{
	protected $frequency ='';
	
	public function __construct(){
	}
	public function setFrequency ($frequency ){
		$this->frequency  = $frequency ;
	}
	public function getFrequency (){
		return $this->frequency ;

	}
	public function displayInfo(){
		parent::displayInfo();
		echo "Frequency: ".$this->frequency."<hr/><br/>";
	}
	public function store(){
		$db = new Database;
		if($this->cnt==0){
			$db->sendQuery("INSERT INTO `employees`(`name`, `surname`, `familyName`, `personalId`, `position`) VALUES ('$this->name','$this->surname','$this->familyName','$this->personalId','$this->position')");
		} else {
			$db->sendQuery("UPDATE `employees` SET `name`='$this->name',`surname`='$this->surname',`familyName`='$this->familyName',`position`='$this->position' WHERE `personalId`='$this->personalId'");
		}
		$this->cnt++;
	}
}