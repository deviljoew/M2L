<?php // Controleur pour contacter M2L
$action = $_REQUEST['action'];
switch($action)
{
	case 'accueil':
	{
		include("./vues/v_inscription.php");
		break;
	}
	case  'attente' :
	{
		include("./vues/v_demandeattente.php");
		break;
	}
	case 'informations':
	{
		include("./vues/v_informations.php");
		break;
	}
	case 'inscription':
	{
		$mail=$_REQUEST['adressemail'];
		if(isset($_REQUEST['checkboxlicence']))
		{
			$licence=$_REQUEST['licence'];
			$demandeurinfos=$pdo->RecupAdherent($licence);
			$mail=$pdo->RecupDemandeur($mail);
			//On test l'existance du numéro de licence dans la bdd
			if($demandeurinfos[0]==null)
			{
				$erreurs="Le numéro de licence n'est pas attribué";
				include("./vues/v_erreurs.php");
				include("./vues/v_inscription.php");
			} //On test la non existance de l'adresse mail dans la bdd
			else if($mail[0]!=null)
				{

					$erreurs="L'adresse mail est déjà utilisé";
					include("./vues/v_erreurs.php");
					include("./vues/v_inscription.php");
				} 
				else
				{
					$motdepasse1 = $_REQUEST['motdepasse1'];
					$num_recu=0;
					//Récupère les infos adhérent
					
					$nom = $demandeurinfos[0];
					$prenom = $demandeurinfos[1];
					$civilite = $demandeurinfos[2];
					if($civilite=="F")
						$civ="Madame";
					else
						$civ="Monsieur";
					$rue = $demandeurinfos[3];
					$codepostal = $demandeurinfos[4];
					$ville = $demandeurinfos[5];
					$daten = $demandeurinfos[6];
					//$stringmail="Bonjour, "+$civ+" "+$nom+", veuillez confirmer votre email pour confirmer votre inscription";
					//Envoie d'un email
					//mail($mail, "Confirmation d'inscription", $stringmail, "From: M2L@gmail.com");
					//Ajoute au demandeur ses infos
					$demandeur=$pdo->ajouterDemandeur($mail,$nom,$prenom,$rue,$codepostal,$ville,$num_recu,$motdepasse1,$civilite,$daten);
					//Fait le lien entre les deux
					$lien=$pdo->DemandeurVersAdherent($licence,$mail);
					include("./vues/v_verif_mail.php");
				}
		}
		else if($mail[0]!=null)
				{

					$erreurs="L'adresse mail est déjà utilisé";
					include("./vues/v_erreurs.php");
					include("./vues/v_inscription.php");
				} 
				else
				{	//On récupere les infos du formulaire
					$num_recu=0;
					$prenom = $_REQUEST['prenom'];
					$nom=$_REQUEST['nom'];
					$civilite = $_REQUEST['civilite'];
					$date=$_REQUEST['datenaissance'];
					$motdepasse1 = $_REQUEST['motdepasse1'];
					
					$daten= strftime('%Y-%m-%d',strtotime($date));
					$rue=$_REQUEST['rue'];
					$ville=$_REQUEST['ville'];
					//Permet de savoir si le code postal est valide
					if(!estUnCp($_REQUEST['codepostal']))
					{
						$erreurs="Veuillez saisir un code postaleee valide";
						include("./vues/v_erreurs.php");
						include("./vues/v_inscription.php");
					}
					else {

					$codepostal = $_REQUEST['codepostal'];
					if($civilite=="F")
						$civ="Madame";
					else
						$civ="Monsieur";
					//$stringmail="Bonjour, "+$civ+" "+$nom+", veuillez confirmer votre email pour confirmer votre inscription";
					//Envoie d'un email
					//mail($mail, "Confirmation d'inscription", $stringmail, "From: M2L@gmail.com");
					//On insert un nouveau demandeur dans la bdd
					$demandeur=$pdo->ajouterDemandeur($mail,$nom,$prenom,$rue,$codepostal,$ville,$num_recu, $motdepasse1,$civilite,$daten );
					include("./vues/v_verif_mail.php");
				}
		}

  		break;
	}
	case  'connexion' :
	{
		break;
	}
}
?>
