<!-- Controleur pour la connexion du demandeur -->
<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'connexion':
	{
		if(isset($_POST["Valider"]))
		{
			$mail=$_REQUEST['emailconnexion'];
			$mdp=$_REQUEST['motdepasseconnexion'];
			$demandeur=$pdo->identification($mail,$mdp);
			$tresorier=$pdo->recupTresorier($mail,$mdp);
			$tarifkm=$pdo->recupTarifKM();
			// Si l'identification a échoué pour le demandeur...
			if($demandeur==null && $tresorier==null)
			{
				//... on réaffiche le formulaire
				$erreurs="Votre email ou votre mot de passe est incorrect.<br/>Recommencez SVP...";
				$_SESSION['demandeur'] = "non";
				$_SESSION['tresorier'] = "non";
				header("Location: index.php?uc=accueil&action=accueil&erreurs= $erreurs;",true);
			}
			else if($demandeur!=null)
				{
					$_SESSION['demandeur'] = "ok";
					$_SESSION['tresorier'] = "non";
					$lien=$pdo->recupLien($mail);
					$message= "".$lien[0];
					if($lien[0]==null)
					{
						$_SESSION['type']='Demandeur';
					}
					else {
						$_SESSION['type']='Adhérent';
						$_SESSION['licence']=$lien['NUMERO_LICENCE'];
					}
					$_SESSION['tarif']=$tarifkm[0];
					$_SESSION['mail'] = $demandeur['ADRESSE_MAIL'];
					$_SESSION['nom'] = $demandeur['NOM'];
					$_SESSION['mdp']=$demandeur['MDP'];
					$_SESSION['prenom'] = $demandeur['PRENOM'];
					$_SESSION['rue'] = $demandeur['RUE'];
					$_SESSION['cp'] = $demandeur['CP'];
					$_SESSION['ville'] = $demandeur['VILLE'];
					$_SESSION['sexe'] = $demandeur['SEXE'];
					$_SESSION['daten'] = strftime('%d-%m-%Y',strtotime($demandeur['DATEN']));
					$fraisAttente = $pdo->recupLigneFrais($mail);
					header("Location: index.php?uc=formulaire&action=formdon&message=$message",true);
				}else{
					$_SESSION['tresorier'] = "ok";
					$_SESSION['demandeur'] = "non";
					$_SESSION['mail'] = $tresorier['ADRESSE_MAIL'];
					$licence=$tresorier['NUMERO_LICENCE'];
					$tresorier=$pdo->RecupAdherent($licence);
					$_SESSION['tarif']=$tarifkm[0];
					$_SESSION['type']='Trésorier';

					$_SESSION['nom'] = $tresorier['NOM'];
					$_SESSION['mdp']=$tresorier['MDP'];
					$_SESSION['prenom'] = $tresorier['PRENOM'];
					$_SESSION['rue'] = $tresorier['RUE'];
					$_SESSION['cp'] = $tresorier['CP'];
					$_SESSION['ville'] = $tresorier['VILLE'];
					$_SESSION['sexe'] = $tresorier['SEXE'];
					$_SESSION['daten'] = strftime('%d-%m-%Y',strtotime($tresorier['DATEN']));
					$fraisAttente = $pdo->recupLigneFraisTre();
					header("Location: index.php?uc=formulaire&action=fraisAttenteTre",true);
				}
		}
		else { //Si formulaire non envoyé, on retourne une erreur
			$_SESSION['demandeur'] = "non";
			$_SESSION['tresorier'] = "non";
			$erreurs="Veuillez vous identifier pour continuer";

		}
		break;
	}
	case 'deconnexion':
	{
		$_SESSION['demandeur'] = "non";
		$_SESSION['tresorier'] = "non";
		$_SESSION = array();
		//Détruit le tableau session
		session_destroy();
		echo "<script type='text/javascript'>window.top.location='index.php?uc=gererAccueil&action=accueil';</script>";
		exit;
		break;
	}
}
?>
