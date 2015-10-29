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
	
	public function selectAllNews (){
		$this->query = mysqli_query($this->link, "SELECT * FROM news");
		$this->rowsNum = mysqli_num_rows($this->query);
	}
	public function selectOneNews ($id){
		$this->query = mysqli_query($this->link, "SELECT * FROM news WHERE id='$id'");
	}
	public function insertOneNews ($title, $description, $autor){
		$this->query = mysqli_query($this->link, "INSERT INTO news (title, description, autor) VALUES ('$title','$description', '$autor')");
	}
	public function deleteNews ($id){
		$this->query = mysqli_query($this->link, "DELETE FROM news WHERE id='$id'");	
	}
	public function updateNews ($id, $title, $description, $autor){
		$this->query = mysqli_query($this->link, "UPDATE `news` SET `title`='$title',`description`='$description',`autor`='$autor' WHERE id='$id'");	
	}
}