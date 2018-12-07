<?php 
if(!isset($_REQUEST['uc'])){
	 $_REQUEST['action'] = 'accueil';
}
?>
<!--
<ul class="cb-slideshow">
         <li><span>Image 01</span></li>
         <li><span>Image 02</span></li>
         <li><span>Image 03</span></li>
         <li><span>Image 04</span></li>
         <li><span>Image 05</span></li>
         <li><span>Image 06</span></li>
 </ul>-->

    <div class="container-fluid" style="height:auto; background-color:black; opacity:0.9;">
      <div class="row">
        <div class="col-md-8">
          <p class="display-4" style="color:white">Maison des ligues de Lorraine</p>
          <nav class="navbar navbar-expand-lg navbar-dark hoverNav" style="background-color: black;margin:10px;">
            <a class="navbar-brand hoverNav" disabled="disabled" href="#">Menu</a>
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
                      <a class="nav-link hoverNav" href="index.php?uc=formulaire&action=formdon">Formulaire de dons</a>
                    </li>
                    <li class="nav-item <?php if($action == "attente"){?> active <?php } ?>">
                      <a class="nav-link hoverNav" href="index.php?uc=formulaire&action=fraisAttente">Demandes en attentes</a>
                    </li>
                    <li class="nav-item <?php if($action == "valide"){?> active <?php } ?>">
                      <a class="nav-link hoverNav" href="index.php?uc=formulaire&action=fraisConfirmer">Demandes validés</a>
                    </li>
                <?php }else if(isset($_SESSION['tresorier']) && $_SESSION['tresorier'] == 'ok'){ ?>
                    <li class="nav-item <?php if($action == "attente"){?> active <?php } ?>">
                      <a class="nav-link hoverNav" href="index.php?uc=formulaire&action=fraisAttenteTre">Frais à valider</a>
                    </li>
                    <li class="nav-item <?php if($action == "valide"){?> active <?php } ?>">
                      <a class="nav-link hoverNav" href="index.php?uc=formulaire&action=fraisConfirmerTre">Frais acceptés</a>
                    </li>
                <?php } ?>
              </ul>
            </div>
          </nav>
        </div>
        <div class="col-md-4">
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
