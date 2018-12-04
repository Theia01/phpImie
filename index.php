<?php 

class Person {
	private $firstname;
	private $lastname;

	public function setName($pFirstName, $pLastname){
		$this->firstname = $pFirstName;
		$this->lastname = $pLastname;
	}
}
$person1 = new Person;
//$person1->firstname = "John";
//$person1->lastname = "Snow";
$person1->setName("John", "Snow");
var_dump($person1);

$person2 = new Person;
var_dump($person2);