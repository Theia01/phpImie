<?php 

class Person {
	private $firstname;
	private $lastname;

	/*Creation d'un mutateur*/
	public function setName($pFirstName, $pLastname){
		$this->firstname = $pFirstName;
		$this->lastname = $pLastname;
	}

	/*Creation d'un getteur (accesseur)*/
	public function getName(){
		return $this->firstname;
	}

	/*John se presente*/
	public function speak(){
		return "Hello, my name is ".$this->firstname." ".$this->lastname;
	}
}
$person1 = new Person;
//$person1->firstname = "John";
//$person1->lastname = "Snow";
$person1->setName("John", "Snow");
//var_dump($person1->getName());
var_dump($person1->speak());


//$person2 = new Person;
//$person2->setName("Aria", "Stark");
//var_dump($person2);