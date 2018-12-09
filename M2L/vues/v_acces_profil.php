<div class="container-fluid" >
  <div class="row">
  	<div class="col-md-4">
    </div>
    <div class="col-md-8" style="text-align:right;">
      <div class="dropdown" style="z-index:20;">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <strong><?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></strong>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="index.php?uc=Profil&action=voirProfil">Profil</a>
          <a class="dropdown-item" href="index.php?uc=Connexion&action=deconnexion" onclick="return confirm('Voulez-vous vraiment vous deconnecter ? ');">Deconnexion</a>
        </div>
     	  <img width="85px" src="./images/usericone.png"/>
        </div>
    </div>
  </div>
</div>
