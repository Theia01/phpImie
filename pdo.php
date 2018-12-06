<?php

$host ="localhost";
$port ="3306";
$database ="test";

class Client{
	private $id;
	private $firstname;
	private $lastname;

	public function __construct(int $id, string $firstname, string $lastname)
	{
		$this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
	}

}

try {
	$pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", "root", "");

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$pdo->exec("INSERT INTO clients (firstname, lastname) VALUES ('john', 'doe');");
    //var_dump("Le dernier ID est : " . $pdo->lastInsertId());
	//var_dump($pdo);
	//pour faire une requete

	$statement = $pdo->query("SELECT * FROM clients");
	while (($row = $statement->fetch(PDO::FETCH_ASSOC)) !== false ) {
		var_dump($row);
		$client = new Client(
			$row['id'],
			$row['firstname'],
			$row['lastname']
		);
	 $clients[] = $client;
	}

	var_dump($clients);

} catch (Exception $e) {
	var_dump($e->getMessage());
	//var_dump("Bad credentials")
}finally{
	$pdo=null;
}
