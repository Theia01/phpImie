<?php 

session_start();

require_once 'framework/Config.php';
require_once 'framework/Client.php';


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

	if(isset($_POST['formconnexion'])){
	$mailconnect = htmlspecialchars($_POST['mailconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);
	if(!empty($mailconnect) AND !empty($mdpconnect)){

		$requser = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ? AND mdp = ?");
		$requser-> execute(array($mailconnect, $mdpconnect));
		$userexist = $requser->rowCount();

		if($userexist == 1){

			$userinfo = $requser->fetch();
			$_SESSION['id'] = $userinfo['id_utilisateur'];
			$_SESSION['mail'] = $userinfo['email'];
			$_SESSION['mdp'] = $userinfo['mdp'];
			header("Location:pagePhp/dashboard.php?id=".$_SESSION['id']); //on ajoute unevariable qui va transiter dans l'url

		}else{
			$erreur = "Mauvaise identité";
		}

	}else{
	$erreur = "Tous les champs doivent être compléter !";
	}
}	
	
} catch (Exception $e) {
	var_dump($e->getMessage());
}finally{
	$bdd=null;
}






include("pagePhp/head.php");?>			

<h2>Connexion</h2>
<br/>
<form method="POST" action="">
	<input type="text" name="mailconnect" placeholder="your email" />
	<br/>
	<input type="password" name="mdpconnect" />
	<br/>
	<input type="submit"  name="formconnexion" value="Sign In">
	<br/>
	<?php  
					if (isset($erreur)) {
						echo  '<font color="red">'.$erreur.'</font>';
					}
				?>
</form>
<p>Pas encore de compte ? <a href="pagePhp/inscription.php">Inscrivez vous ici</a></p>
<?php include("pagePhp/end.php");?>