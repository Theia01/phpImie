<?php 

class Person{
	private $prenom;
	private $nom;
	private $monLoup;

	/*Creation mutateur*/
	public function setPrenom($name){
		$this->prenom = $name;
	}

	/*Creation d'un */
	public function getPrenom(){
		return $this->prenom;
	}

	public function speak(): string{
		return "Je m'appelle ".$this->prenom.", enchanté j'ai un loup nommée ".$this->monLoup->getPrenom();
	}

	public function __construct($prenom, $nom){
		$this->prenom = $nom;
		$this->nom = $nom;
	}
	public function meet($nameLoup){
		$this->monLoup = $nameLoup;
		$this->monLoup->setPropio($this->prenom);
	}

}

class Loup{
	private $NomLoup;
	private $proprietaire;

	public function getPrenom(){
		return $this->NomLoup;
	}

	public function setPropio($proprio){
		$this->proprietaire = $proprio;
	}

	public function __construct(string $NomLoup){
		$this->NomLoup = $NomLoup;
	}

	public function speak(){
		return "Mon nom est ".$this->NomLoup." et mon maître est ".$this->proprietaire;
	}
}

$eric = new Person("Eric", "GIGONDAN");
$loup = new Loup("Doug");
$eric->meet($loup);

var_dump($eric);
var_dump($loup->speak());