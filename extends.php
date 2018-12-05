<?php

class Mama {
	private $years;

	public function __construct($years){
		$this->years = $years;
	}

	public function sayAge(){
		return $this->years;
	}



}

class Person extends Mama{
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

class Lion extends Mama{
	private $nameLion;

	public function __construct(string $pNameLion, $pYears){
		parent::__construct($pYears);
		$this->nameLion = $pNameLion;
	}
}

$person1 = new Person("John", "Snow", 22);
$lion1 = new Lion("Rodolf", 4);
var_dump($lion1);
