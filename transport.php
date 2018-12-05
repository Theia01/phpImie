<?php

abstract class Vehicule{
	private $typeMoteur;
	private $typeCarburant;
	private $nbPassager;
	private $nbVitesse; 

	public function avancer(){
		return "Vehicule";
	}
}
/*SOUS CLASS*/
abstract class Terre extends Vehicule {
	private $nbRoues;
}

abstract class Mer extends Vehicule{

}
/*SOUS SOUS CLASS*/
final class Bateau extends Mer{
	public function avancer(){
		return "bateau1";
	}
}

final class Moto extends Terre{

}

final class Voiture extends Terre{

} 

/*$bateau1 = new Bateau;
var_dump($bateau1->avancer());*/










/*AUTRE*/
/*On oblige qu'il existe une fonction avancer*/
interface IAction {
	public function avancer();
}

abstract class Veh implements IAction{
	public function avancer(){
		var_dump("J'avance");
	}
}

class Bike extends Veh{

}

class User{
	private $vehicule;

	public function setVehicule($veh){
		$this->vehicule = $veh;
	}
	public function avancer(){
		$this->vehicule->avancer();
	}

}

$car = new Bike;
$user = new User();
$user->setVehicule($car);
$user->avancer();































