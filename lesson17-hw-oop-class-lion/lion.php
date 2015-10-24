<?php

class Lion {
	private $name;
	private $dateOfBirth;
	public $lastFeeding;
	
	public function setName($name){
		$this->name = $name;
	}
    public function getName(){
		$this->name;
	}	
	
	public function setDateOfBirth($dateOfBirth){
		$this->dateOfBirth = $dateOfBirth;
	}
    public function getDateOfBirth(){
		$this->dateOfBirth;
	}	
	
	public function sayName(){
		echo "Hello. My name is: <strong>".$this->name."</strong>. I'm a lion!<br/>";
	}
	public function sayDob(){
		echo "My date of birth is: <strong>".$this->dateOfBirth."</strong><br/>";
	}
	public function sayAge() {
		$dateOfBirth = $this->dateOfBirth;
		$age = date('Y-m-d')-$dateOfBirth;
		echo "I'm <strong>".$age."</strong> years old!<br/>";
    }	
	public function cry(){
		echo "Lion <strong>".$this->name."</strong> is crying!<br/>";
	}
	public function sayLastFeedingPeriod() {
		$now = date('Y-m-d, H:i:s');
		echo "My last feeding was <strong>".$this->lastFeeding."</strong>. So this is <strong>".floor((strtotime($now) - strtotime($this->lastFeeding))/3600). "</strong> hours ago! I'm hungry!!!<br/>";
    }

	public function feeding(){
		$this->lastFeeding = date('Y-m-d, H:i:s');
		echo "Now it is: <strong>".$this->lastFeeding."</strong> and I was just feeded! Thank you! Bye bye.<br/><br/><br/>";
	}
	
}