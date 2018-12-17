<!-- Controleur pour contacter M2L -->
<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirContact':
	{
		include("./vues/v_contact.php");
  		break;
	}
	case 'envoyerMessage' :
	{
		$message=$_REQUEST['message'];
		//Rajouter une page include
		break;
	}
}
?>
