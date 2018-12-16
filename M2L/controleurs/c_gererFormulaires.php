<?php
$action = $_REQUEST['action'];
$tarifkm=$_SESSION['tarif']; //convertit en float
switch($action)
{
	case 'formdon':
	{
		$motifs = $pdo->recupMotifs();
		include("./vues/v_form_dons.php");
  		break;
	}
	case 'formvalider':
	{
		$mail=$_SESSION['mail'];
		$dateform=$_REQUEST['date'];

		if($_REQUEST['motif'] == "autre")
			$motif = $_REQUEST['motifA'];
		else
			$motif=$_REQUEST['motif'];

		$km=$_REQUEST['km'];
		$peage=$_REQUEST['peage'];
		$hebergement=$_REQUEST['hebergement'];
		$repas=$_REQUEST['repas'];
		$trajet=$_REQUEST['depart']."_".$_REQUEST['arrivee'];
		$motifs = $pdo->recupMotifs();
		$dateform= strftime('%Y-%m-%d',strtotime($dateform));
		$lignefrais = $pdo->ajouterLigneFrais($mail,$dateform,$motif,$trajet,$km,$peage,$repas,$hebergement);
		include("./vues/v_form_valider.php");
		break;
	}
	case 'fraisAttente':
	{
		$mail=$_SESSION['mail'];

		$fraisAttente = $pdo->recupLigneFrais($mail);

		include("./vues/v_demandeattente.php");
		break;
	}
	case 'modifierfrais':
	{
		$date=substr($_REQUEST['date'],0,10);
		$motifs = $pdo->recupMotifs();
		include("./vues/v_modif_frais.php");
		break;
	}
	case 'misAjoursFrais' :
	{
		$mail=$_SESSION['mail'];

			$date=strftime('%Y-%m-%d',strtotime($_REQUEST['date']));
			$motif=$_REQUEST['motif'];
			$trajet=$_REQUEST['trajet'];
			$km=$_REQUEST['km'];
			$peage=$_REQUEST['peage'];
			$repas=$_REQUEST['repas'];
			$hebergement=$_REQUEST['hebergement'];
			//Récupere la ligne de frais actuelle concerné pour pouvoir utiliser les valeur de la ligne existante
			$lignefraisactuelle=$pdo->recupLigneFrais2($mail,$date);
			$motif2=$lignefraisactuelle['LIBELLE'];
			$trajet2=$lignefraisactuelle['TRAJET'];
			$km2=$lignefraisactuelle['KM'];
			$peage2=$lignefraisactuelle['COUT_PEAGE'];
			$repas2=$lignefraisactuelle['COUT_REPAS'];
			$hebergement2=$lignefraisactuelle['COUT_HEBERGEMENT'];
			//Permet de savoir si l'administrateur a réalisé des modifications
			if($motif!=$motif2||$trajet!=$trajet2||$km!=$km2||$peage!=$peage2||$repas!=$repas2||$hebergement!=$hebergement2)
			{
				$ligneFrais=$pdo->modifierFrais($mail,$date,$motif,$trajet,$km,$peage,$repas,$hebergement);

				$message="Les modifications ont bien été enregistré";
			}
			else{
				$message="Aucune modification effectuée";
			}
		$fraisAttente = $pdo->recupLigneFrais($mail);
		include("./vues/v_demandeattente.php");
		break;
	}
	case 'supprimerfrais':
	{
		$date =strftime('%Y-%m-%d',strtotime($_REQUEST['date']));
		$mail=$_SESSION['mail'];
		$requete= $pdo->supprimerFrais($mail,$date);
		$message="La ligne de frais a bien été supprimé";
		$fraisAttente = $pdo->recupLigneFrais($mail);
		include("./vues/v_demandeattente.php");
		break;
	}
	case 'supprimerfraisTre':
	{
		$date =strftime('%Y-%m-%d',strtotime($_REQUEST['date']));
		$mail=$_REQUEST['mail'];
		$requete= $pdo->supprimerFraisTre($mail,$date);
		$message="La ligne de frais a bien été supprimé";
		$fraisAttente = $pdo->recupLigneFraisTre();
		include("./vues/v_demandeattenteTre.php");
		break;
	}
	case 'fraisConfirmer':
	{
		$mail=$_SESSION['mail'];
			 $fraisAttente =$pdo->recupLigneFraisValide($mail);

			 //Recupère l'année du bordereau
			 $date = date('Y-m-d');
			 $date = date_parse($date);
			 $jour = $date['day'];
			 $mois = $date['month'];
			 $annee = $date['year'];
			 if($mois==12&&$jour>=24)
					 $annee++;
		if(isset($_SESSION['demandeur']) && $_SESSION['demandeur'] == 'ok')
		{
			$adherents =$pdo->RecupAdherentSR();
		}
			 include("./vues/v_demandeverifie.php");
			 break;
	}
//Trésorier ----------------------------------------------------------------------------
	case 'fraisAttenteTre':
	{
		$mail=$_SESSION['mail'];

		$fraisAttente = $pdo->recupLigneFraisTre();
		include("./vues/v_demandeattenteTre.php");
		break;
	}

	case 'fraisConfirmerTre':
	{
		$mail=$_SESSION['mail'];
		$fraisValides = $pdo->recupLigneFraisValideTre();
		$fraisDemandeur = $pdo->recupNomPrenomDemandeursTre();
		Include("./vues/v_demandeverifieTre.php");
		break;
	}

	case 'validerFrais' :
	{
		$date = $_REQUEST['date'];
		$mail = $_REQUEST['adressemail'];
		$validation = $pdo->fraisValidation($mail,$date);
		$message="La validation de cette ligne a bien été enregistrée";
		$fraisAttente = $pdo->recupLigneFraisTre();

		include("./vues/v_demandeattenteTre.php");
		break;
	}

	case 'genererpdf' :
	{
		$nom = $_REQUEST['nom'];
		$prenom = $_REQUEST['prenom'];
		include('./vues/v_pdfCERFA.php');
		break;
	}

	case 'afficherBordereau' :
	{
		$mail = $_REQUEST['mail'];
		if($_SESSION['type']="Demandeur")
		{
			$adherents =$_POST['adh'];

			for($i=0;$i<Count($adherents);$i++)
			{
				$lesadh[$i]=$pdo->RecupAdherent($adherents[$i]);
			}
		} else {
				$licence=$_SESSION['licence'];

		}
		$annee=$_REQUEST['annee'];
        $fraisValide =$pdo->recupLigneFraisAnnee($mail,$annee);

        $club =$pdo->recupClub($licence);
        $association=$club[0].', '.$club[1].', '.$club[2].' '.$club[3];
        $fraisTotal = 0;
        foreach($fraisValide as $unfrais)
        {
        	$fraisTotal += ($unfrais['COUT_HEBERGEMENT']+$unfrais['COUT_REPAS']+$unfrais['COUT_PEAGE']+$unfrais['KM']*$tarifkm);
        }

        include("./vues/v_bordereau.php");
        break;
	}


}
?>
