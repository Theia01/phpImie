<?php
class NoDogWithPersonException extends Exception { }
interface IActions {
    public function seMarier($p);
}
class Person implements IActions {
    private $partner;
    private $firstname;
    private $lastname;
    public function __construct($pFirstname, $pLastname) {
        $this->firstname = $pFirstname;
        $this->lastname = $pLastname;
    }
    public function setLastname($p) {
        $this->lastname = $p;
    }
    public function seMarier($p) {
        if(!$p instanceof Person) {
            throw new NoDogWithPersonException("On ne peut pas marier une Person avec un Dog.");
        }
        $p->setLastname($this->lastname);
        $this->partner = $p;
    }
}
class Dog implements IActions {
    private $partner;
    private $name;
    public function __construct($pName) {
        $this->name = $pName;
    }
    public function seMarier($p) {
    }
}
$boby = new Dog("Boby");
$john = new Person("John", "Doe");
$jane = new Person("Jane", "Die");
try {
    $john->seMarier($boby);
} catch (NoDogWithPersonException $e) {
    var_dump($e->getMessage());
} catch (Exception $e) {
    var_dump($e->getMessage());
} finally {
    var_dump("Mon pote à fait une erreur !!!!");
}
try {
    $john->seMarier($jane);
} catch (NoDogWithPersonException $e) {
    var_dump($e->getMessage());
}
var_dump($john);

