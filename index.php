<?php 

class Person {
	private $firstname;
	private $lastname;

	public function __construct($pFirstName, $pLastname){
		$this->firstname = $pFirstName;
		$this->lastname = $pLastname;
	}

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

class Wolf{
	private $nameWolf;
	/*methode qui s'exécute lors de la creation de l'objet donc: $person1 = new Person;*/
	public function __construct($name){
		$this->nameWolf = $name;
		echo "Woaf dit ".$name;
	}

	/*Creation d'un mutateur*/
	public function setName($pnameWolf){
		$this->nameWolf = $pnameWolf;
	}

	/*Creation d'un getteur (accesseur)*/
	public function getName(){
		return $this->nameWolf;
	}
}

$person1 = new Person("John", "Scena");
//$person1->firstname = "John";
//$person1->lastname = "Snow";
//$person1->setName("John", "Snow");
//var_dump($person1->getName());
var_dump($person1->speak());

$wolf = new Wolf("Bidule");
//var_dump($wolf); 
//$person2 = new Person;
//$person2->setName("Aria", "Stark");
//var_dump($person2);