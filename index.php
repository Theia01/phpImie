<?php 

class Person {
	private $firstname;
	private $lastname;
	private $wolf;
	private $wolfs;

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
		/*for(i = 0, $this->wolfs, i++) {
			echo $key;
		}*/
		return "Hello, my name is ".$this->firstname." ".$this->lastname." et mon loup se nomme ".$this->wolf->getNameWolf()." Mes loup sont ";
	}

	public function meetWolf($pWolf){
		$this->wolf = $pWolf;
		$this->wolfs[] = $pWolf;
		$this->wolf->setNomProprio($this->firstname);
	}
}

class Wolf{
	private $nameWolf;
	private $nomProprietaire;
	/*methode qui s'exécute lors de la creation de l'objet donc: $person1 = new Person;*/
	public function __construct(string $name){
		$this->nameWolf = $name;
	}

	/*Creation d'un mutateur*/
	public function setName(string $pnameWolf){
		$this->nameWolf = $pnameWolf;
	}

	public function setNomProprio(string $pProprio){
		$this->nomProprietaire = $pProprio;
	}

	/*Creation d'un getteur (accesseur)*/
	public function getNameWolf(){
		return $this->nameWolf;
	}

	public function speak(){
		return "Mon maître est ".$this->nomProprietaire." aboya ".$this->nameWolf;
	}

}


//$person1->firstname = "John";
//$person1->lastname = "Snow";
//$person1->setName("John", "Snow");
//var_dump($person1->getName());


$person1 = new Person("John", "Snow");

$wolf = new Wolf("Doug");
$cat = new Wolf("Misti");

$person1->meetWolf($wolf);
$person1->meetWolf($cat);

var_dump($person1->speak());
var_dump($wolf->speak());



//var_dump($wolf); 

//$person2 = new Person;
//$person2->setName("Aria", "Stark");
//var_dump($person2);