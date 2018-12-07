<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'envoimdp':
	{
		//$stringmail="Bonjour, voici le lien pour saisir un nouveau mot de passe ";
		//Envoie d'un email
		//mail($mail, "Confirmation d'inscription", $stringmail, "From: M2L@gmail.com");
		include("./vues/v_mdpoublie.php");
		break;
	}
	case 'mail':
	{
		$adressemail=$_REQUEST['adressemail'];
		$mail=$pdo->retrouverMail($adressemail);
		if($mail!=null)
		{
			include("./vues/v_mailretrouve.php");}
		else{
			include("./vues/v_mauvaismail.php");
		}
		break;
	}
}
?>
