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
		$dateform=$_REQUEST['date'];
		$dateactuelle = date('Y-m-d');
		$mail=$_SESSION['mail'];


		$motif=$_REQUEST['motif'];

		$km=$_REQUEST['km'];
		$peage=$_REQUEST['peage'];
		$hebergement=$_REQUEST['hebergement'];
		$repas=$_REQUEST['repas'];
		$trajet=$_REQUEST['depart']."_".$_REQUEST['arrivee'];
		$motifs = $pdo->recupMotifs();
		if($dateform>$dateactuelle)
		{
			$erreurs="Veuillez saisir une date valide";
			include("./vues/v_form_dons.php");
		} else {
		$total = $km*$_SESSION['tarif']+$repas+$peage+$hebergement;
		$dateform= strftime('%Y-%m-%d',strtotime($dateform));
		$lignefrais = $pdo->ajouterLigneFrais($mail,$dateform,$motif,$trajet,$km,$peage,$repas,$hebergement,$total);
		include("./vues/v_form_valider.php");
	}
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
			//Fait les test pour mettre la valeur 0
			if($_REQUEST['km']=="")
			{
				$km=0;
			} else {
				$km=$_REQUEST['km'];
			}
			if($_REQUEST['peage']=="")
			{
				$peage=0;
			} else {
				$peage=$_REQUEST['peage'];
			}
			if($_REQUEST['repas']=="")
			{
				$repas=0;
			} else {
				$repas=$_REQUEST['repas'];
			}
			if($_REQUEST['hebergement']=="")
			{
				$hebergement=0;
			} else {
				$hebergement=$_REQUEST['hebergement'];
			}
			//Récupere la ligne de frais actuelle concerné pour pouvoir utiliser les valeurs de la ligne existante
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
				$total = ($km*$_SESSION['tarif'])+$repas+$peage+$hebergement;
				$ligneFrais=$pdo->modifierFrais($mail,$date,$motif,$trajet,$km,$peage,$repas,$hebergement,$total);

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
		if($_SESSION['type']=="Demandeur")
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
		include("./vues/v_demandeverifieTre.php");
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
		$mail = $_REQUEST['mail'];
		$demandeur = $pdo->RecupDemandeur($mail);
		$nom = $demandeur['NOM'];
		$prenom = $demandeur['PRENOM'];
		$ville = $demandeur['VILLE'];
		$cp = $demandeur['CP'];
		$adresse = $demandeur['RUE'];
		$numrecu = $demandeur['NUM_RECU'];
		$resTotal = $pdo->recupLigneFrais($mail);
		$lien=$pdo->recupLien($mail);

		if($lien[0]==null) //Si demandeur alors
		{
			$num = $demandeur['NUMCLUBA'];
			$club=$pdo->recupClubNum($num);
			$adresseclub = $club['RUE'];
			$nomclub = $club['NOM'];
		}
		else//Sinon si adhérents
		{
			$adherent=$pdo->RecupAdherent($lien[0]);
			$club=$pdo->recupClubNum($adherent['NUM_CLUB']);
			$adresseclub = $club['RUE'];
			$nomclub = $club['NOM'];
		}

		//Récupération de la date d'aujourd'hui
		$date= date('d/m/Y');

		$totalEnLettre = enlettres($total);
		include('./vues/v_pdfCERFA.php');
		break;
	}


	case 'afficherBordereau' :
	{
		$mail = $_REQUEST['mail'];
		if($_SESSION['type']=="Demandeur")
		{
			$adherents =$_POST['adh'];
			$club =$pdo->recupClub($adherents[0]);
		}
		else {
			$licence=$_SESSION['licence'];
			$club =$pdo->recupClub($licence);
		}
		$annee=$_REQUEST['annee'];
        $fraisValide =$pdo->recupLigneFraisAnnee($mail,$annee);

        $association=$club[0].', '.$club[1].', '.$club[2].' '.$club[3];
        $fraisTotal = 0;
        foreach($fraisValide as $unfrais)
        {
        	$fraisTotal += $unfrais['cout_total'];
        }

        include("./vues/v_bordereau.php");
        break;
	}


}
?>
