<?php
require ('database.php'); 

class Model extends Database {
	protected $rowsNum;
	protected $rows;
	protected $query;
	
	public function setRowsNum($rowsNum){
		$this->rowsNum = $rowsNum;
	}
	public function getRowsNum(){
		return $this->rowsNum;
	}
	
	public function setRows($rows){
		$this->rows = $rows;
	}
	public function getRows(){
		return $this->rows;
	}
	
	public function setQuery($query){
		$this->query = $query;
	}
	public function getQuery(){
		return $this->query;
	}
	
	public function selectAll(){
		$this->query = mysqli_query($this->link, "SELECT * FROM animals");
		$this->rowsNum = mysqli_num_rows($this->query);
	}
	public function selectOneAnimal ($animal){
		$this->query = mysqli_query($this->link, "SELECT * FROM animals WHERE animal=".$animal);
		$this->rowsNum = mysqli_num_rows($this->query);
	}
	public function selectUser($username, $password){
		$this->query = mysqli_query($this->link, "SELECT * FROM users WHERE username='$username' AND password='$password'");
		$this->rowsNum = mysqli_num_rows($this->query);
	}
	public function updateAnimal ($animal, $meal, $quantity){
		$now = date('Y-m-d h:i:s');
		$this->query = mysqli_query($this->link, "UPDATE animals SET `meal`='$meal',`mealQty`='$quantity',`feedingTime`='$now' WHERE animal='$animal'");	
	}

}