<?php
session_start();
require_once '../framework/Config.php';

use framework\Config as C;

$clients = array();
try {
	$connexion = sprintf("mysql:host=%s;port=%s;dbname=%s",
		C::HOST,
		C::PORT, 
		C::DATABASE
		);
	$bdd = new PDO($connexion, C::LOGIN, C::PASSWORD);

        if(isset($_POST['addbook'])){

         $livre = htmlspecialchars($_POST['nomlibre']);

            if(!empty($livre)){

                $nomlibre = htmlspecialchars($_POST['nomlibre']);
                $id = $_SESSION['id'];

                $stmt= $bdd->prepare("INSERT INTO book(id_utilisateur, book_name) VALUES (:pid_utilisateur, :nomlivre);");

                $stmt->bindParam(':pid_utilisateur', $id);
                $stmt->bindParam(':nomlivre', $nomlibre);
                    
                $stmt->execute();

        }

        header("Location:dashboard.php?id=".$_SESSION['id']);
    }

} catch (Exception $e) {
	var_dump($e->getMessage());
}finally{
	$bdd=null;
}

?>


<?php include("head.php");?>
<h2>Ajouter un book</h2>
<h3>Bienvenue <?php ?></h3>
<br/>
<form method="POST" action="" >
        <label>Nom du livre<input type="text" name="nomlibre" placeholder="your book" /></label><br/>
    <input class="btn btn-primary" type="submit" name="addbook" value="Add">
</form>
<?php include("end.php");?>