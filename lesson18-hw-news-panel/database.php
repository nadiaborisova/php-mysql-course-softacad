<?php
class Database {
	protected $host = 'localhost';
	protected $username = 'root';
	protected $password = '';
	protected $db = 'news';
	protected $link;
	protected $selectedDb;
	
	public function __construct(){
		$this->link = mysqli_connect($this->host, $this->username,$this->password);
		$this->selectedDb = mysqli_select_db($this->link,$this->db);
		
		if(!$this->link){
		die('Could not connect:'. mysqli_error($this->link));
		} else {
			//echo 'Connected successfully <br/>';
		}
		if(!$this->selectedDb){
			die('Cannot select DB :'. mysqli_error($this->link));
		}
		else{
			//echo 'Database selected successfully';
		}
		
	}
	public function disconnect(){
		mysqli_close($this->link);
	}
}
	