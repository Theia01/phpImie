<?php include("pagePhp/head.php");?>
<h2>Connexion</h2>
<br/>
<form method="POST" action="">
	<input type="text" name="mailconnect" placeholder="your email" />
	<br/>
	<input type="password" name="passwordconnect" />
	<br/>
	<input type="submit" name="Sign In">
</form>
<p>Pas encore de compte ? <a href="pagePhp/inscription.php">Inscrivez vous ici</a></p>
<?php include("pagePhp/end.php");?>