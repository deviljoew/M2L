<?php
if(!isset($_REQUEST['uc'])){
	 $_REQUEST['action'] = 'accueil';
}
?>
    <div class="container-fluid" style="z-index:1;height:auto; background-color:black; opacity:0.9;">
      <div class="row">
        <div class="col-md-6">
          <p class="display-4" style="color:white"><img src="./images/logo_blk.png" width="70px"/> Maison des ligues de Lorraine</p>
				</div>
				<div class="col-md-6" style="z-index:10;">
          <?php
           if((!isset($_SESSION['demandeur']) || $_SESSION['demandeur'] == "non") && (!isset($_SESSION['tresorier']) || $_SESSION['tresorier'] == "non")){
              include("v_form_connexion.php");
           }
          else {
                  include("v_acces_profil.php");
                } ?>
        </div>
			</div>
		</div>

		<div class="container-fluid" style="z-index:-1;height:auto; background-color:black; opacity:0.9;">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg navbar-dark hoverNav" style="background-color: black;margin:10px;">
            <span class="navbar-brand hoverNav" disabled="disabled">Menu</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav hoverNav">
                <li class="nav-item <?php if($action == "accueil"){?> active <?php } ?>">
                  <a class="nav-link hoverNav" href="<?php if($_SESSION['demandeur'] == 'ok' || $_SESSION['tresorier'] == 'ok') { echo "index.php?uc=gererAccueil&action=informations";} else { echo "index.php?uc=accueil&action=accueil";} ?>">Accueil<span class="sr-only">(current)</span></a>
                </li>
                  <?php
                    if(isset($_SESSION['demandeur']) && $_SESSION['demandeur'] == 'ok')
                  {
                      ?>
                    <li class="nav-item <?php if($action == "formdon"){?> active <?php } ?>">
                      <a TITLE="Formulaire de dons" class="nav-link hoverNav" href="index.php?uc=formulaire&action=formdon">Formulaire de dons</a>
                    </li>
                    <li class="nav-item <?php if($action == "attente"){?> active <?php } ?>">
                      <a TITLE="Demandes en attentes" class="nav-link hoverNav" href="index.php?uc=formulaire&action=fraisAttente">Demandes en attentes</a>
                    </li>
                    <li class="nav-item <?php if($action == "valide"){?> active <?php } ?>">
                      <a TITLE="Demandes validées" class="nav-link hoverNav" href="index.php?uc=formulaire&action=fraisConfirmer">Demandes validées</a>
                    </li>
                <?php }else if(isset($_SESSION['tresorier']) && $_SESSION['tresorier'] == 'ok'){ ?>
                    <li class="nav-item <?php if($action == "attente"){?> active <?php } ?>">
                      <a TITLE="Demandes à valider" class="nav-link hoverNav" href="index.php?uc=formulaire&action=fraisAttenteTre">Frais à valider</a>
                    </li>
                    <li class="nav-item <?php if($action == "valide"){?> active <?php } ?>">
                      <a TITLE="Demandes validées" class="nav-link hoverNav" href="index.php?uc=formulaire&action=fraisConfirmerTre">Frais acceptés</a>
                    </li>
                <?php } ?>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
