<?php 

class Person {
	private $firstname;
	private $lastname;
	private $wolf;

	public function __construct($pFirstName, $pLastname){
		$this->firstname = $pFirstName;
		$this->lastname = $pLastname;
	}

	/*Creation d'un mutateur*/
	public function setName(string $pFirstName, string $pLastname){
		$this->firstname = $pFirstName;
		$this->lastname = $pLastname;
	}

	/*Creation d'un getteur (accesseur)*/
	public function getName(){
		return $this->firstname;
	}

	/*John se presente*/
	public function speak(): string{
		return "Hello, my name is ".$this->firstname." ".$this->lastname." et mon loup se nomme ".$this->wolf->getNameWolf();
	}

	public function meetWolf($pWolf){
		$this->wolf = $pWolf;
	}
}

class Wolf{
	private $nameWolf;
	/*methode qui s'exécute lors de la creation de l'objet donc: $person1 = new Person;*/
	public function __construct(string $name){
		$this->nameWolf = $name;
	}

	/*Creation d'un mutateur*/
	public function setName(string $pnameWolf){
		$this->nameWolf = $pnameWolf;
	}

	/*Creation d'un getteur (accesseur)*/
	public function getNameWolf(){
		return $this->nameWolf;
	}
}


//$person1->firstname = "John";
//$person1->lastname = "Snow";
//$person1->setName("John", "Snow");
//var_dump($person1->getName());


$person1 = new Person("John", "Snow");

$wolf = new Wolf("Doug");

$person1->meetWolf($wolf);

var_dump($person1->speak());




//var_dump($wolf); 

//$person2 = new Person;
//$person2->setName("Aria", "Stark");
//var_dump($person2);