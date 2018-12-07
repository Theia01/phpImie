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

	if(isset($_POST['Remplacer'])){
	$nouveau_nom = htmlspecialchars($_POST['nomLivre']);

	$stmt = $bdd->prepare("UPDATE book SET book_name = :nomlivre WHERE id_book = :idLivre;");
	$stmt->bindParam(':nomlivre', $nouveau_nom);
    $stmt->bindParam(':idLivre', $_GET['idB']);
    $stmt->execute();

    header("Location:dashboard.php?id=".$_SESSION['id']);
    }

} catch (Exception $e) {
	var_dump($e->getMessage());
}finally{
	$bdd=null;
}

?>

<?php include("head.php");?>
<h2>Modifier le nom du book</h2>
<br/>
<form method="POST" action="">
    <label>Nom du livre<input type="text" name="nomLivre" value="<?php echo $_GET['nom'];?>" /></label><br/>

    <input type="submit" name="Remplacer" value="Remplacer">
</form>
<?php include("end.php");?>
