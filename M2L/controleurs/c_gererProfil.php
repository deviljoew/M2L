<?php // Controleur pour gerer le profil M2L
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirProfil':
	{
		$mail=$_SESSION['mail'];
		if($_SESSION['sexe']=='F')
		{
			$civ="Madame";
			$sexe="Féminin";
		}
		else{
			$civ="Monsieur";
			$sexe="Masculin";
		}
		include("vues/v_profil.php");
  		break;
	}
	case 'modifierProfil' :
	{
		$mail=$_SESSION['mail'];
		if($_SESSION['sexe']=='F')
		{
			$civ="Madame";
			$sexe="Féminin";
		}
		else{
			$civ="Monsieur";
			$sexe="Masculin";
		}
		include("vues/v_modifprofil.php");
		break;
	}
	case 'misAjoursProfil' :
	{

			$cp=$_REQUEST['cp'];
			if(!estUnCp($cp))
			{
				$erreurs="Veuillez saisir un code postal valide";
			}else
			{
				$mail=$_SESSION['mail'];
				$nom=$_REQUEST['nom'];
				$prenom=$_REQUEST['prenom'];
				$rue=$_REQUEST['rue'];
				$ville=$_REQUEST['ville'];
				if($_REQUEST['mdp1']=="")
				{	//s'il le nouveau mdp n'est pas renseigné, on met l'actuel
					$mdp=$_SESSION['mdp'];
				}
				else { //sinon on met le nouveau
					$mdp=$_REQUEST['mdp1'];
				}

				if($_SESSION['type']!="Trésorier")
				{
					//Récupere le demandeur actuel concerné pour pouvoir utiliser les valeurs de la ligne existante
					$demandeur=$pdo->RecupDemandeur($mail);

					$nom2=$demandeur['NOM'];
					$prenom2=$demandeur['PRENOM'];
					$rue2=$demandeur['RUE'];
					$cp2=$demandeur['CP'];
					$ville2=$demandeur['VILLE'];
					$mdp2=$demandeur['MDP'];
					if($nom!=$nom2||$prenom!=$prenom2||$rue!=$rue2||$cp!=$cp2||$ville!=$ville2||$mdp!=$mdp2)
					{
						$ligne=$pdo->modifierProfilD($mail,$nom,$prenom,$rue,$cp,$ville,$mdp);
						$lien=$pdo->recupLien($mail);
						$ligne2=$pdo->modifierProfilA($lien['NUMERO_LICENCE'],$nom,$prenom,$rue,$cp,$ville);
						$message="Les modifications ont bien été enregistré";
						$_SESSION['nom'] =$nom;
						$_SESSION['mdp']=$mdp;
						$_SESSION['prenom'] = $prenom;
						$_SESSION['rue'] = $rue;
						$_SESSION['cp'] = $cp;
						$_SESSION['ville'] = $ville;
					}
					else{
						$message="Aucune modification effectuée pour votre profil";
					}
				}else
				{
					//Récupere le demandeur actuel concerné pour pouvoir utiliser les valeurs de la ligne existante
					$lien=$pdo->recupLien($mail);
					$licence =$lien['NUMERO_LICENCE'];
					$tresorier=$pdo->RecupAdherent($licence);
					$nom2=$tresorier['NOM'];
					$prenom2=$tresorier['PRENOM'];
					$rue2=$tresorier['RUE'];
					$cp2=$tresorier['CP'];
					$ville2=$tresorier['VILLE'];
					$mdp2=$tresorier['MDP'];
					if($nom!=$nom2||$prenom!=$prenom2||$rue!=$rue2||$cp!=$cp2||$ville!=$ville2||$mdp!=$mdp2)
					{

						$ligne2=$pdo->modifierProfilA($licence,$nom,$prenom,$rue,$cp,$ville);
						$ligne3=$pdo->modifierProfilT($licence,$mdp);
						$message="Les modifications ont bien été enregistré";
						$_SESSION['nom'] =$nom;
						$_SESSION['mdp']=$mdp;
						$_SESSION['prenom'] = $prenom;
						$_SESSION['rue'] = $rue;
						$_SESSION['cp'] = $cp;
						$_SESSION['ville'] = $ville;
					}
					else{
						$message="Aucune modification effectuée";
					}
				}
			}
			if($_SESSION['sexe']=='F')
			{
				$civ="Madame";
				$sexe="Féminin";
			}
			else{
				$civ="Monsieur";
				$sexe="Masculin";
			}
			include("vues/v_profil.php");
			break;
	}
}
?>
