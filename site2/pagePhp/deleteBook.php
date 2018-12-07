<?php
session_start();
require_once '../framework/config.php';

use framework\Config as C;

try {
	$connexion = sprintf("mysql:host=%s;port=%s;dbname=%s",
		C::HOST,
		C::PORT, 
		C::DATABASE
		);
	$bdd = new PDO($connexion, C::LOGIN, C::PASSWORD);

	$stmt = $bdd->prepare("DELETE FROM book WHERE book.id_book = :idBook");
    $stmt->bindParam(':idBook', $_GET['id']);
    $stmt->execute();

    header("Location:dashboard.php?id=".$_SESSION['id']);


} catch (Exception $e) {
	var_dump($e->getMessage());
}finally{
	$bdd=null;
}

?>
