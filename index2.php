<?php 
class Terrien{
	public function speak(){
		echo "bonjour";
	}
}

class Person extends Terrien{
	private $prenom;
	private $nom;

	private $mesLoups;

	/*Creation mutateur*/
	public function setPrenom($name){
		$this->prenom = $name;
	}

	/*Creation d'un */
	public function getPrenom(){
		return $this->prenom;
	}

	public function speak(){
		$listeloup =array();
		foreach ($this->mesLoups as $key) {
			$listeloup[] = $key->getPrenom();
		}

		return "Je m'appelle ".$this->prenom.", enchanté j'ai plusieurs loups nommée ".implode(', ', $listeloup);
	}

	public function __construct($prenom, $nom){
		$this->prenom = $nom;
		$this->nom = $nom;
	}
	public function meet($nameLoup){
		$this->mesLoups[] = $nameLoup;
		$nameLoup->setPropio($this->prenom);
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
$loup2 = new Loup("Gin");

$eric->meet($loup);
$eric->meet($loup2);

var_dump($eric->speak());
