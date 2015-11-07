<?php 

require ('database.php');

class Person{
	protected $name='';
	protected $surname='';
	protected $familyName='';
	protected $personalId=0;
	protected $cnt=0;
	
	public function setName($name){
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}
	public function setSurname($surname){
		$this->surname = $surname;
	}
	public function getSurname(){
		return $this->surname;
	}
	public function setFamilyName($familyName){
		$this->familyName = $familyName;
	}
	public function getFamilyName(){
		return $this->familyName;
	}
	public function setPersonalId($personalId){
		$this->personalId = $personalId;
	}
	public function getPersonalId(){
		return $this->personalId;
	}
	
	public function displayInfo(){
		echo "Full name: ".$this->name." ".$this->surname." ".$this->familyName."<br/>";
		echo "Personal ID: ".$this->personalId."<br/>";
	}
	
}




class Student extends Person{
	static public $addNewStudent = 0;
	protected $specialty='';
	protected $course='';
	
	public function __construct(){
		Student::$addNewStudent ++;
	}
	
	public function setSpecialty($specialty){
		$this->specialty = $specialty;
	}
	public function getSpecialty(){
		return $this->specialty;

	}
	public function setCourse($course){
		$this->course = $course;
	}
	public function getCourse(){
		return $this->course;

	}
	public function displayInfo(){
		parent::displayInfo();
		echo "Specialty: ".$this->specialty."<br/>";
		echo "Course: ".$this->course."<hr/><br/>";
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




class Teacher extends Person{
	static public $addNewTeacher = 0;
	protected $item;
	
	public function __construct(){
		Teacher::$addNewTeacher ++;
	}
	public function setItem($item){
		$this->item = $item;
	}
	public function getItem(){
		return $this->item;

	}
	public function displayInfo(){
		parent::displayInfo();
		echo "Item: ".$this->item."<hr/><br/>";
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




class Employee extends Person{
	static public $addNewEmployee = 0;
	protected $position='';
	
	public function __construct(){
		Employee::$addNewEmployee ++;
	}
	public function setPosition($position){
		$this->position = $position;
	}
	public function getPosition(){
		return $this->position;

	}
	public function displayInfo(){
		parent::displayInfo();
		echo "Position: ".$this->position."<hr/><br/>";
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