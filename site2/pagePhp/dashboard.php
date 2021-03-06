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
<h2>DASHBOARD</h2>
<h3>Bienvenue </h3>
<br/>

<table class="table">
    <thead>
    <tr>
        <th>Book</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($books as $book): ?>
    <tr>
        <td><?php echo $book->getBook();?></td>
        <td>
            <a href="deleteBook.php?id=<?php echo $book->getId();?>">Delete</a>
        </td>
        <td>
            <a href="modifierBook.php?idB=<?php echo $book->getId();?>&nom=<?php echo $book->getBook();?>">Modifier</a>
        </td>
        <td>
            <a href="consulterBook.php">Consulter</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

 <form action="" method="POST">
    <input class="btn btn-primary" value="add" name="add" type="submit"/>
</form>
<?php include("end.php");?>