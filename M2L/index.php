<?php session_start();
require_once("./util/fonctions.inc.php");

require_once("./util/class.pdoM2L.inc.php");

  /* Création d'une instance d'accès à la base de données */
	$pdo = PdoM2L::getPdoM2L();
?>

<html lang="en" dir="ltr">
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="icon" type="image/png" href="./images/logo_blk.png" />
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href='./util/bootstrap.min.css'/>
    <link rel="stylesheet" href='./util/background.css'/>
    <link rel="stylesheet" href='./util/style.css'/>
    <title>Maison des ligues de Lorraine</title>
  </head>
<body style="background-color:#000000">
	<ul class="cb-slideshow">
					 <li><span>Image 01</span></li>
					 <li><span>Image 02</span></li>
					 <li><span>Image 03</span></li>
					 <li><span>Image 04</span></li>
					 <li><span>Image 05</span></li>
					 <li><span>Image 06</span></li>
	 </ul>
<?php



if(!isset($_REQUEST['uc'])){
     $uc = 'accueil';
	 $_REQUEST['action'] = 'accueil';
}
else
	$uc = $_REQUEST['uc'];
// On initialise les attributs
$mail="";
$nom="";
$prenom="";
$mdp="";
$licence="";
$civilite="";
$date="";
$rue="";
$codepostal="";
$ville="";
$motif="";
$dateform="";
$peage="";
$trajet="";
$km="";
$hebergement="";
$repas="";
$message="";

$colorHTML = "#8eF989";

$action = $_REQUEST['action'];

if($action != 'afficherBordereau')
	Include("./vues/v_header.php");

switch($uc)
{
	//Gere la page principale avec l'inscription
	case 'accueil':
		{include("./vues/v_inscription.php");break;}
	case 'contact' :
		{include("./controleurs/c_voirContact.php");break;}
	case 'oubliemdp' :
		{include("./controleurs/c_gererMDP.php");break; }
	case 'gererAccueil' :
		{include("./controleurs/c_gererAccueil.php");break; }
	case 'formulaire' :
		{include("./controleurs/c_gererFormulaires.php");break; }
	case 'Profil' :
		{include("./controleurs/c_gererProfil.php");break; }
	case 'Connexion' :
		{include("./controleurs/c_gestionConnexion.php");break; }

}
if($action != 'afficherBordereau')
	include("./vues/v_footer.php") ;
?>
</body>
</html>
