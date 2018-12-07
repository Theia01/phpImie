<?php 
session_start();
require_once '../framework/config.php';
require_once '../framework/client.php';
require_once '../framework/book.php';


use framework\Client;
use framework\Book;
use framework\Config as C;

$books = array();
try {
	$connexion = sprintf("mysql:host=%s;port=%s;dbname=%s",
		C::HOST,
		C::PORT, 
		C::DATABASE
		);
	$bdd = new PDO($connexion, C::LOGIN, C::PASSWORD);

	$stmt2 = $bdd->query("SELECT * FROM book;");

    //$stmt2 = $bdd->query("SELECT book_name, id_book FROM book WHERE id_utilisateur LIKE ':iduser';");
    //$stmt2->bindParam(':iduser', '20');


	while (($row = $stmt2->fetch(PDO::FETCH_ASSOC)) !== false) {
        $book = new Book(
            $row['id_book'],
            $row['book_name']
        );
        $books[] = $book;
    }

    if(isset($_POST["modifier"])){
    	header("Location:modifierBook.php?id=".$_SESSION['id']);
    }

    if(isset($_POST["add"])){
    	header("Location:addBook.php?id=".$_SESSION['id']);
    }


} catch (Exception $e) {
	var_dump($e->getMessage());
}finally{
	$bdd=null;
}

?>

<?php include("head.php");?>	
<p>Cette opération n'est pas possible pour le moment <a href="dashboard.php">Revenir sur le dahboard</a></p>
<?php include("end.php");?>	