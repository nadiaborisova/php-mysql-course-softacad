<?php 

include ('person.php');

$newStd1 = new Student;
	$newStd1->setName('Maria');
	$newStd1->setSurname('Petrova');
	$newStd1->setFamilyName('Ivanova');
	$newStd1->setPersonalId(456789786);
	$newStd1->setSpecialty('Informatics');
	$newStd1->setCourse('1st');
	$newStd1->store();	
	$newStd1->displayInfo();	
$newStd2 = new Student;
	$newStd2->setName('Peter');
	$newStd2->setSurname('Petrov');
	$newStd2->setFamilyName('Petrov');
	$newStd2->setPersonalId(123456789);
	$newStd2->setSpecialty('Informatics');
	$newStd2->setCourse('2nd');
	$newStd2->store();
	$newStd2->displayInfo();
$newStd3 = new Student;
	$newStd3->setName('Ivan');
	$newStd3->setSurname('Ivanov');
	$newStd3->setFamilyName('Ivanov');
	$newStd3->setPersonalId(234567893);
	$newStd3->setSpecialty('Public administriation');
	$newStd3->setCourse('3rd');
	$newStd3->store();
	$newStd3->setSpecialty('Finance');
	$newStd3->store();
	$newStd3->displayInfo();
$newStd4 = new Student;
	$newStd4->setName('Todor');
	$newStd4->setSurname('Todorov');
	$newStd4->setFamilyName('Todorov');
	$newStd4->setPersonalId(345678904);
	$newStd4->setSpecialty('Tourism');
	$newStd4->setCourse('3rd');
	$newStd4->store();
	$newStd4->displayInfo();
$newStd5 = new Student;
	$newStd5->setName('Kiril');
	$newStd5->setSurname('Kirilov');
	$newStd5->setFamilyName('Kirilov');
	$newStd5->setPersonalId(456789011);
	$newStd5->setSpecialty('Economics');
	$newStd5->setCourse('4th');
	$newStd5->store();
	$newStd5->displayInfo();
	

$newTchr1 = new Teacher;
	$newTchr1->setName('Todor');
	$newTchr1->setSurname('Ivanov');
	$newTchr1->setFamilyName('Todorov');
	$newTchr1->setPersonalId(901234561);
	$newTchr1->setItem('Sport');
	$newTchr1->store();
	$newTchr1->setItem('Biology');
	$newTchr1->store();
	$newTchr1->displayInfo();
$newTchr2 = new Teacher;
	$newTchr2->setName('Dimiter');
	$newTchr2->setSurname('Ivanov');
	$newTchr2->setFamilyName('Kirilov');
	$newTchr2->setPersonalId(678901233);
	$newTchr2->setItem('Geo');
	$newTchr2->store();
	$newTchr2->setItem('Biology');
	$newTchr2->store();
	$newTchr2->displayInfo();
$newTchr3 = new Teacher;	
	$newTchr3->setName('Ivan');
	$newTchr3->setSurname('Ivanov');
	$newTchr3->setFamilyName('Todorov');
	$newTchr3->setPersonalId(789012134);
	$newTchr3->setItem('Math');
	$newTchr3->store();
	$newTchr3->displayInfo();
	

$newEmpl1 = new Employee;
	$newEmpl1->setName('Milena');
	$newEmpl1->setSurname('Todorova');
	$newEmpl1->setFamilyName('Todorova');
	$newEmpl1->setPersonalId(233456789);
	$newEmpl1->setPosition('Librarist');
	$newEmpl1->store();
	$newEmpl1->displayInfo();
$newEmpl2= new Employee;	
	$newEmpl2->setName('Petia');
	$newEmpl2->setSurname('Ivanova');
	$newEmpl2->setFamilyName('Todorova');
	$newEmpl2->setPersonalId(890412345);
	$newEmpl2->setPosition('Cleaner');
	$newEmpl2->store();
	$newEmpl2->setPosition('Accountant');
	$newEmpl2->store();
	$newEmpl2->displayInfo();

echo "Total students: ".Student::$addNewStudent."<br/>";
echo "Total lectors: ".Teacher::$addNewTeacher."<br/>";
echo "Total employees: ".Employee::$addNewEmployee."<br/><hr/>";
