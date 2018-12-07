<?php
session_start();

require_once '../framework/Config.php';
require_once '../framework/Client.php';


use framework\Client;
use framework\Config as C;

try {
	$connexion = sprintf("mysql:host=%s;port=%s;dbname=%s",
		C::HOST,
		C::PORT, 
		C::DATABASE
		);

	$bdd = new PDO($connexion, C::LOGIN, C::PASSWORD);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if(isset($_POST['signup'])){
		$mail = htmlspecialchars($_POST['mail']);
		$password = sha1($_POST['password']);
		
		echo "ok";

		$stmt = $bdd->prepare("INSERT INTO utilisateur(email, mdp) VALUES (:unMail, :unMotDePasse)");

		$stmt->bindParam(':unMail', $mail);
		$stmt->bindParam(':unMotDePasse', $password);
		
		$stmt->execute();

	}

} catch (Exception $e) {
	var_dump($e->getMessage());
}finally{
	$bdd=null;
}

?>


<?php include("head.php");?>
<h2>Inscription</h2>
<br/>

<form method="POST" action="">
	<label>Mail :<input type="text" name="mail" placeholder="your email" /></label><br/>

	<label>Confirm mail : <input type="text" name="mailconfirm" placeholder="confirm your email" /></label><br/>

	<label>Password :<input type="password" name="password" /></label><br/>

	<input type="submit" name="signup" value="Sign Up">
</form>
<p>Vous avez un compte ? <a href="../index.php">Connectez vous ici</a></p>
<?php include("end.php");?>