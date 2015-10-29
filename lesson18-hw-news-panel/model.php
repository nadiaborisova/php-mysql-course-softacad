<?php
require ('database.php'); 

class Model extends Database {
	public $rowsNum;
	public $rows;
	public $query;
	
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