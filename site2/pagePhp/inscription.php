<?php
require_once '../framework/config.php';

use framework\Config as C;

try {
	$connexion = sprintf("msql:host=%s;port=%s;dbname=%s, ",
		C::HOST,
		C::PORT, 
		C::DATABASE
		);
	$bdd = new PDO($connexion, C::LOGIN, C::PASSWORD);
	var_dump("Le dernier ID est : " . $pdo->lastInsertId());

} catch (Exception $e) {
	var_dump($e->getMessage());
}finally{
	$bdd=null;
}

?>


<?php include("head.php");?>
<h2>Connexion</h2>
<br/>
<form method="POST" action="">
	<label for="pseudo">Pseudo : </label>
	<input type="text" name="pseudo" id="pseudo" placeholder="your pseudo" />
	<br/>
	<label for="mail">Mail : </label>
	<input type="text" name="mail" id="mail" placeholder="your email" />
	<br/>
	<label for="mailconfirm">Confirm mail</label>
	<input type="text" name="mailconfirm" id="mailconfirm" placeholder="confirm your email" />
	<br/>
	<label for="password">Password : </label>
	<input type="password" name="password" id="password" />
	<br/>
	<input type="submit" name="Sign Up">
</form>
<p>Vous avez un compte ? <a href="../index.php">Connectez vous ici</a></p>
<?php include("end.php");?>