<?php
  if(!isset($_SESSION['demandeur']) && !isset($_SESSION['tresorier'])){
    header("index.php?uc=accueil&action=accueil");
  }
?>
<div class="container-fluid" >
  <div class="row">
  	<div class="col-md-4">
    </div>
    <div class="col-md-8" style="text-align:right;">
      <div style="margin-bottom:30px;" class="dropdown" style="z-index:20;">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <strong><?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></strong>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="index.php?uc=Profil&action=voirProfil">Profil</a>
          <?php if(isset($_SESSION['tresorier']) && $_SESSION['tresorier'] == 'ok') { ?>
          <a class="dropdown-item" href="index.php?uc=Profil&action=voirTarif">Tarif kilométrique</a> <?php } ?>
          <a class="dropdown-item" href="index.php?uc=Connexion&action=deconnexion" onclick="return confirm('Voulez-vous vraiment vous deconnecter ?');">Deconnexion</a>
        </div>
     	  <img style="margin-bottom:20px;" width="85px" src="./images/usericone.png"/>
      </div>
    </div>
  </div>
</div>
