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
	
	public function selectAll($products){
		$this->query = mysqli_query($this->link, "SELECT * FROM ".$products);
		$this->rowsNum = mysqli_num_rows($this->query);
	}
	public function selectOne ($id, $products){
		$this->query = mysqli_query($this->link, "SELECT * FROM ".$products." WHERE id=".$id);
		$this->rowsNum = mysqli_num_rows($this->query);
	}
	public function selectUser($username, $password){
		$this->query = mysqli_query($this->link, "SELECT * FROM users WHERE username='$username' AND password='$password'");
		$this->rowsNum = mysqli_num_rows($this->query);
	}
	public function deleteProduct ($id, $products){
		$this->query = mysqli_query($this->link, "DELETE FROM ".$products." WHERE id=".$id);	
	}
	public function updateProduct ($id, $products, $make, $model, $year, $price){
		$this->query = mysqli_query($this->link, "UPDATE ".$products." SET `make`='$make',`model`='$model',`year`='$year',`price`='$price' WHERE id=".$id);	
	}
	public function addComp ($products, $make, $model, $year, $price, $ram, $processor, $videocard){
		$this->query = mysqli_query($this->link, "INSERT INTO ".$products." (make, model, year, price, ram, processor, videocard) VALUES ('$make','$model', '$year', '$price', '$ram', '$processor', '$videocard')");
	}
	public function addPrinter ($products, $make, $model, $year, $price, $type, $numPages){
		$this->query = mysqli_query($this->link, "INSERT INTO ".$products." (make, model, year, price, type, numPages) VALUES ('$make','$model', '$year', '$price', '$type', '$numPages')");
	}
	public function addRouter ($products, $make, $model, $year, $price, $frequency){
		$this->query = mysqli_query($this->link, "INSERT INTO ".$products." (make, model, year, price, frequency) VALUES ('$make','$model', '$year', '$price', '$frequency')");
	}
}