<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'envoimdp':
	{
		
		include("./vues/v_mdpoublie.php");
		break;
	}
	case 'mail':
	{	
		$adressemail=$_REQUEST['adressemail'];
		
		$mail=$pdo->retrouverMail($adressemail);
		if($mail!=null)
		{
			//$stringmail="Bonjour, voici votre mot de passe : ".$mail[0]." Merci de votre confiance;
			//Envoie d'un email
			//mail($mail, "Oublie du mot de passe", $stringmail, "From: M2L@gmail.com");
		
			include("./vues/v_mailretrouve.php");}
		else{
			include("./vues/v_mauvaismail.php");
		}
		break;
	}
}
?>
