<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'deconnexion':
	{
		$_SESSION['demandeur'] = "non";
		$_SESSION['tresorier'] = "non";
		$_SESSION = array();
		session_destroy();//Détruit le tableau session
		echo "<script type='text/javascript'>window.top.location='index.php?uc=gererAccueil&action=accueil';</script>"; 
		exit;
		break;
	}
}
?>