<?php

abstract class Terrien{
		private $years;

	public function __construct($years){
		$this->years = $years;
	}

	public function sayAge(){
		return $this->years;
	}

}

/*-------------------------SOUS CLASS--------------------------*/

abstract class Animal extends Terrien{

}

abstract class Mama extends Terrien{


}

/*--------------------------SOUS SOUS CLASS---------------------*/
class Enfant extends Mama{
	private $firstname;
	private $lastname;

	public function __construct(string $pfirstname, string $plastname, $years){
		parent::__construct($years);/*Permet de passer la variable à la méthode parent*/
		$this->lastname = $plastname;
		$this->firstname = $pfirstname;
	}

	public function sayAge(){
		return $this->years;
	}
}

final class Lion extends Mama{
	private $nameLion;

	public function __construct(string $pNameLion, $pYears){
		parent::__construct($pYears);
		$this->nameLion = $pNameLion;
	}
}

class Tortue extends Animal{

}

$person1 = new Enfant("John", "Snow", 22);
$lion1 = new Lion("Rodolf", 4);
var_dump($person1);
var_dump($lion1);
