<?php

/**
 * Classe d'accès aux données.
 * Utilise les services de la classe PDO
 * pour l'application M2L
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO
 * $monPdoM2L qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author Couturier Cortacero
 * @version    1.0

 */

 class PdoM2L
 {
       	private static $monPdo;
 		private static $monPdoM2L = null;
 /**
  * Constructeur privé, crée l'instance de PDO qui sera sollicitée
  * pour toutes les méthodes de la classe
  **/
 	private function __construct()
 	{
     	PdoM2L::$monPdo = new PDO('mysql:host=localhost;dbname=m2l', 'root', '');
 			PdoM2L::$monPdo->query("SET CHARACTER SET utf8");
 	}
 	public function _destruct(){
 		PdoM2L::$monPdo = null;
 	}
 /**
  * Fonction statique qui crée l'unique instance de la classe
  *
  * Appel : $instancePdoVanille = PdoVanille::getPdoVanille();
  * @return l'unique objet de la classe PdoVanille
  */
 	public  static function getPdoM2L()
 	{
 		if(PdoM2L::$monPdoM2L == null)
 		{
 			PdoM2L::$monPdoM2L= new PdoM2L();
 		}
 		return PdoM2L::$monPdoM2L;
 	}

  /**
 * Retourne le demandeur s'il est trouvé si le mail et le mot de passe correspondent
 *
 * @param $login : chaîne, l'email du demandeur
 * @param $mdp : chaîne, le mot de passe du demandeur
 * @return l'administrateur s'il est trouvé, vide sinon
*/
public function identification($mail,$mdp)
{
  $req = "Select * from demandeurs where ADRESSE_MAIL='$mail' and MDP='$mdp';";
  $res = PdoM2L::$monPdo->query($req) or die ("L'identification a échoué");
  $demandeur=$res->fetch();
  return $demandeur;
}

  /**
 * Retourne le club
 *
 * @param
 * @param
 * @return le club
*/
public function recupClub($licence)
{
  $req = "Select clubs.NOM,clubs.RUE,clubs.CP,clubs.VILLE from clubs,adherents where clubs.NUM_CLUB=adherents.NUM_CLUB and NUMERO_LICENCE='$licence';";
  $res = PdoM2L::$monPdo->query($req) or die ("La recup du club a échoué");
  $club=$res->fetch();
  return $club;
}
 /**
 * Retourne le tarif km
 *
 * @param
 * @param
 * @return  le tarif km
*/
public function recupTarifKM()
{
  $req = "Select tarifKM from tresorier where ADRESSE_MAIL='estelle@gmail.com';";
  $res = PdoM2L::$monPdo->query($req) or die ("La recup du tarif a échoué");
  $tarif=$res->fetch();
  return $tarif;
}



 /**
  * Insert un nouveau demandeur dans la bdd
  *
  * @return le demandeur créé
 */

 	public function ajouterDemandeur($mail,$nom,$prenom,$rue,$codepostal,$ville,$num_recu,$motdepasse,$civ,$daten)
	{
		$req="Insert into demandeurs values ('$mail','$nom','$prenom','$rue','$codepostal','$ville',$num_recu,'$motdepasse','$civ','$daten');";
		$res = PdoM2L::$monPdo->query($req) or die ("L'insertion du demandeur à échoué".$req);

	}

  /**
  * Insert une nouvelle ligne de frais dans la bdd
  *
  * @return la ligne ajouté
 */

  public function ajouterLigneFrais($mail,$date,$motif,$trajet,$km,$peage,$repas,$hebergement)
  {
    $req="Insert into lignes_frais values ('$mail','$date','$motif','$trajet',$km,$peage,$repas,$hebergement,0);";
    $res = PdoM2L::$monPdo->query($req) or die ("L'insertion de ligne frais à échoué ".$req);

  }


/**
 * Modification du demandeur connecté
 *
 * @param
 * @param
 * @param
 * @return le demandeur avec ses modifications apportées
*/
	public function modifierProfilD($mail,$nom,$prenom,$rue,$codepostal,$ville,$motdepasse)
	{
		$req="Update demandeurs set NOM='$nom', PRENOM='$prenom', RUE='$rue',CP='$codepostal',VILLE='$ville', MDP='$motdepasse' where ADRESSE_MAIL='$mail';";
		$res = PdoM2L::$monPdo->query($req) or die ("La modification du profil d à échoué".$req);

	}

  /**
 * Modification du trésorier connecté
 *
 * @param
 * @param
 * @param
 * @return le trésorier avec ses modifications apportées
*/
  public function modifierProfilA($licence,$nom,$prenom,$rue,$codepostal,$ville)
  {
    $req="Update adherents set NOM='$nom', PRENOM='$prenom', RUE='$rue',CP='$codepostal',VILLE='$ville' where NUMERO_LICENCE='$licence';";
    $res = PdoM2L::$monPdo->query($req) or die ("La modification du profil a  à échoué".$req);

  }

/**
 * Modification du trésorier connecté
 *
 * @param
 * @param
 * @param
 * @return le trésorier avec ses modifications apportées
*/
  public function modifierProfilT($licence,$motdepasse)
  {
    $req="Update tresorier set MDP='$motdepasse' where NUMERO_LICENCE='$licence';";
    $res = PdoM2L::$monPdo->query($req) or die ("La modification du mdp t à échoué".$req);

  }


  /**
  * Récupere le lien pour savoir si c'est un adhérent
  * @param $mail
  * @return un achérent ou rien
 */
  public function recupLien($mail)
  {
      $req="select NUMERO_LICENCE from lien where ADRESSE_MAIL= '$mail';";
    $res = PdoM2L::$monPdo->query($req)or die ("La récup de l'adherent à échoué".$req);
    $renvoi = $res->fetch();
    return $renvoi;
  }

  /**
  * Récupere le mail si c'est un trésorier
  * @param $mail
  * @return un trésorier ou rien
 */
  public function recupTresorier($mail,$mdp)
  {
    $req="select * from tresorier where ADRESSE_MAIL = '$mail' and MDP='$mdp';";
    $res = PdoM2L::$monPdo->query($req)or die ("La récup du tresorier à échoué".$req);
    $renvoi = $res->fetch();
    return $renvoi;
  }
  /**
  * Récupere les motifs dans la bdd
  *
  * @return un tableau associatif du motif
 */

  public function recupMotifs()
  {
    $req="select * from motifs";
    $res = PdoM2L::$monPdo->query($req)or die ("La récup des motifs à échoué".$req);
    $motifs= $res->fetchAll();
    return $motifs;
  }

  /**
  * Récupere les frais professionnels du demandeur en attente en fonction du mail
  *
  * @param $mail
  * @return un tableau associatif du motif
 */

  public function recupLigneFrais($mail)
  {
    $req="select DATE,LIBELLE,TRAJET,KM,COUT_PEAGE,COUT_REPAS,COUT_HEBERGEMENT from lignes_frais where ADRESSE_MAIL='$mail' and valider=0;";
    $res = PdoM2L::$monPdo->query($req)or die ("La récup des frais à échoué".$req);
    $frais= $res->fetchAll();
    return $frais;
  }
  /**
  * Récupere les frais professionnels du demandeur en attente en fonction du mail
  *
  * @param $mail
  * @return un tableau associatif du motif
 */

  public function recupLigneFraisTre()
  {
    $req="select distinct lignes_frais.ADRESSE_MAIL,NOM,PRENOM,DATE,LIBELLE,TRAJET,KM,COUT_PEAGE,COUT_REPAS,COUT_HEBERGEMENT from lignes_frais,demandeurs where lignes_frais.ADRESSE_MAIL=demandeurs.ADRESSE_MAIL and valider=0 order by NOM;";
    $res = PdoM2L::$monPdo->query($req)or die ("La récup des frais trésorier à échoué".$req);
    $frais= $res->fetchAll();
    return $frais;
  }
  /**
  * Récupere les frais professionnels du demandeur en attente en fonction du mail
  *
  * @param $mail
  * @return un tableau associatif du motif
 */

  public function recupLigneFraisValideTre()
  {
    $req="select NOM,PRENOM,DATE,LIBELLE,TRAJET,KM,COUT_PEAGE,COUT_REPAS,COUT_HEBERGEMENT from lignes_frais,demandeurs where lignes_frais.ADRESSE_MAIL=demandeurs.ADRESSE_MAIL and valider=1 order by NOM;";
    $res = PdoM2L::$monPdo->query($req)or die ("La récup des frais trésorier validé a échoué".$req);
    $frais= $res->fetchAll();
    return $frais;
  }


  /**
  * Récupere les frais professionnels du demandeur en attente en fonction du mail
  *
  * @param $mail
  * @return un tableau associatif du motif
 */

  public function recupNomPrenomDemandeursTre()
  {
    $req="select DISTINCT NOM,PRENOM from lignes_frais, demandeurs where lignes_frais.ADRESSE_MAIL=demandeurs.ADRESSE_MAIL and valider=1 order by NOM;";
    $res = PdoM2L::$monPdo->query($req)or die ("La récup des nom des demandeur de lignes de frais a échoué".$req);
    $frais= $res->fetchAll();
    return $frais;
  }

  /**
  * Récupere les frais professionnels du demandeur en attente en fonction du mail et de la date
  *
  * @param $mail
  * @return un tableau associatif du motif
 */

  public function recupLigneFrais2($mail,$date)
  {
    $req="select DATE,LIBELLE,TRAJET,KM,COUT_PEAGE,COUT_REPAS,COUT_HEBERGEMENT from lignes_frais where DATE='$date' and lignes_frais.ADRESSE_MAIL='$mail' and valider=0;";
    $res = PdoM2L::$monPdo->query($req)or die ("La récup des fraisss à échoué".$req);
    $frais= $res->fetch();
    return $frais;
  }

  /**
  * Récupere les frais professionnels du demandeur validés
  *
  * @param $mail
  * @return un tableau associatif du motif
 */

  public function recupLigneFraisValide($mail)
  {
    $req="select DATE,LIBELLE,TRAJET,KM,COUT_PEAGE,COUT_REPAS,COUT_HEBERGEMENT from lignes_frais where ADRESSE_MAIL='$mail' and valider=1;";
    $res = PdoM2L::$monPdo->query($req)or die ("La récup des frais à échoué".$req);
    $frais= $res->fetchAll();
    return $frais;
  }

/**
  * Récupere les frais professionnels du demandeur validés pour l'année en cours
  *
  * @param $mail
  * @return un tableau associatif du motif
 */

  public function recupLigneFraisAnnee($mail,$annee)
  {
    $req="select DATE,LIBELLE,TRAJET,KM,COUT_PEAGE,COUT_REPAS,COUT_HEBERGEMENT from lignes_frais where ADRESSE_MAIL='$mail' and YEAR(DATE)='$annee' and valider=1;";
    $res = PdoM2L::$monPdo->query($req)or die ("La récup des frais à échoué".$req);
    $frais= $res->fetchAll();
    return $frais;
  }


/**
  * Récupere le demandeur correspondant au mail
  *
  * @param $licence
  * @return un tableau associatif de l'adhérent
 */

  public function RecupDemandeur($mail)
  {
    $req="select NOM,PRENOM,SEXE,RUE,CP,VILLE,DATEN,MDP from demandeurs where ADRESSE_MAIL = '$mail';";
    $res = PdoM2L::$monPdo->query($req)or die ("La récup du demandeur à échoué".$req);
    $adherent= $res->fetch();
    return $adherent;
  }
/**
  * Récupere l'adhérent correspondant au numéro de licence
  *
  * @param $licence
  * @return un tableau associatif de l'adhérent
 */

  public function RecupAdherent($licence)
  {
      $req="select NOM,PRENOM,SEXE,RUE,CP,VILLE,DATEN from adherents where NUMERO_LICENCE = '$licence'";
    $res = PdoM2L::$monPdo->query($req)or die ("La récup de l'adherent à échoué".$req);
    $adherent= $res->fetch();
    return $adherent;
  }

  /**
  * Récupere le ou les adhérent sous responsabilité
  *
  * @param $licence
  * @return un tableau associatif de l'adhérent
 */

  public function RecupAdherentSR()
  {
    $req="select distinct NUMERO_LICENCE,NOM,PRENOM from adherents;";
    $res = PdoM2L::$monPdo->query($req)or die ("La récup de l'adherent sr à échoué".$req);
    $adherent= $res->fetchAll();
    return $adherent;
  }

/**
  * Fait le lien entre le demandeur qui est un adhérent de la base de données
  *
  * @param $licence
  * @param $mail
  * @return le lien créé
 */

 	public function DemandeurVersAdherent($licence,$mail)
 	{
 	    $req="Insert into lien values ('$licence','$mail');";
		$res = PdoM2L::$monPdo->query($req) or die ("L'insertion du lien demandeur adhérent à échoué".$req);
 	}

	/**
  * Récupère le mail et le mdp pour voir s'il existe
  *
  * @param $adressemail
  * @return le mail et le mdp
 */

 	public function retrouverMail($adressemail)
 	{
 	    $req="select ADRESSE_MAIL,MDP from demandeurs where ADRESSE_MAIL = '$adressemail';";
 		$res = PdoM2L::$monPdo->query($req)or die ("La récup du mail à échoué".$req);
 		$email= $res->fetch();
 		return $email;
 	}

  /**
 * Modifie la ligne de frais sélectionnée
 *
 * @param
 * @param $
 * @param $
 * @return la ligne de frais mis à jours dans la bdd
*/
  public function modifierFrais($mail,$date,$motif,$trajet,$km,$peage,$repas,$hebergement)
  {
    $req="Update lignes_frais set LIBELLE='$motif', TRAJET='$trajet',KM=$km,COUT_PEAGE=$peage,COUT_REPAS=$repas, COUT_HEBERGEMENT=$hebergement where DATE='$date' and ADRESSE_MAIL='$mail';";
    $res = PdoM2L::$monPdo->query($req) or die ("La modification de la ligne de frais à échoué".$req);

  }

/**
 * Valide la ligne de frais sélectionnée
 *
 * @param
 * @param $
 * @param $
 * @return la ligne de frais mis à jours dans la bdd
*/
  public function fraisValidation($mail,$date)
  {
    $req="Update lignes_frais set valider=1 where DATE='$date' and ADRESSE_MAIL='$mail';";
    $res = PdoM2L::$monPdo->query($req) or die ("La validation de la ligne de frais à échoué".$req);

  }
  /**
 * Retourne le tarif km
 *
 * @param
 * @param
 * @return  le tarif km
*/
public function majTarifKM($tarif)
{
  $req = "Update tresorier set tarifKM=$tarif where ADRESSE_MAIL='estelle@gmail.com';";
  $res = PdoM2L::$monPdo->query($req) or die ("La recup du tarif a échoué");
  $tarif=$res->fetch();
  return $tarif;
}


/**
 * Supprime la ligne de frais selectionné
 *
 * @param
 * @return la ligne de frais supprimé
*/
  public function supprimerFrais($mail, $date)
  {
    $req="delete from lignes_frais where ADRESSE_MAIL = '$mail' and DATE='$date';";
    $res = PdoM2L::$monPdo->query($req) or die ("La suppression de la ligne de frais à échoué".$req);

  }

  /**
   * Supprime la ligne de frais selectionné
   *
   * @param
   * @return la ligne de frais supprimé
  */
    public function supprimerFraisTre($mail, $date)
    {
      $req="delete from lignes_frais where lignes_frais.ADRESSE_MAIL = '$mail' and lignes_frais.DATE='$date';";
      $res = PdoM2L::$monPdo->query($req) or die ("La suppression de la ligne de frais à échoué".$req);

    }
 }
 ?>
