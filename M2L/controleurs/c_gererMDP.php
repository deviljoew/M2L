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
		$adressemail=$_POST['adressemail'];

		$mdp=$pdo->retrouverMdp($adressemail);
		if($adressemail!=null)
		{
			// Préparation du mail contenant le lien d'activation
			$destinataire = $adressemail;
			$sujet = "Retrouvez votre mot de passe" ;
			$entete = "From: maisondesliguesde@lorraine.com" ;

			// Le lien d'activation est composé du login(log) et de la clé(cle)
			$message = 'MAIL : Voici votre mot de passe récupéré : ' . $mdp[0];
			include("./vues/v_mailretrouve.php");
		}
		else{
			include("./vues/v_mauvaismail.php");
		}
		break;
	}
}
?>
