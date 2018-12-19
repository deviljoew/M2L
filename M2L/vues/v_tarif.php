<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 setheight" style="background-color:#00000055; opacity:0.9;">
      <p class="display-4 setFrontTitle" style="color:white;margin-left:20px;margin-top:10px;">Tarif kilométrique</p>
      <p class="h5 setFrontSize" style="color:white;margin-left:20px;margin-right:10px;">
        <br>
        Le barème kilométrique 2018 permet de calculer les frais et indemnités kilométriques, notamment dans le cadre de la déduction des frais réels, pour la déclaration de revenus 2018.<br><br>


      Le barème kilométrique 2018 a été publié par l'administration fiscale le 24 janvier 2018. Il reste le même que celui applicable l'an dernier.<br><br>
      Le barème qui suit est utilisable pour les voitures. Si le déplacement se fait en deux-roues dans le cadre du travail, vous devez utiliser le barème kilométrique moto et deux-roues.<br><br>
      Le barème kilométrique 2019 n'est pas encore connu. Il devrait normalement être publié par les impôts en janvier-février 2019.  </p>
    </div>
    <div class="col-md-8">

      <?php
        if(isset($erreurs)){
          include("./vues/v_erreurs.php");
        }
        if(isset($message)){
          include("./vues/v_message.php");
        }
      ?>
      <p class="display-4 setFrontTitle" style="color:white;margin-left:50px;margin-top:10px;">Tarif kilométrique actuel utilisé pour le(s) frais de déplacement(s) des demandeurs</p><br>
      <p class="display-4" style="font-size:25px;text-align:center;color:white;"><img src="./images/tarif.png" width="60px" height="60px"/>
        <strong><?php echo $tarifkm.' €';?></strong><br>

      </p>

        <a TITLE="Modifier le tarif kilométrique" href="index.php?uc=Profil&action=modifiertarif"><button style="width:100%;" class="btn btn-success">Modifier le tarif kilométrique</button></a>

    </div>
  </div>
</div>
