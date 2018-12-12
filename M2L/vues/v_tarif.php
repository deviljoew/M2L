<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 setHeight" style="background-color:#00000055; opacity:0.9;text-align:center;height:740px;">
    
      <?php
        if(isset($erreurs)){
          include("./vues/v_erreurs.php");
        }
        if(isset($message)){
          include("./vues/v_message.php");
        }
      ?>
      <p class="Display-4" style="font-size:18px;color:white;">
        <strong>Tarif kilométrique actuel utilisé pour les frais de déplacement(s) des demandeurs</strong><br>
        
      </p>
      <p class="display-4" style="font-size:15px;text-align:center;color:white;"><img src="./images/tarif.jpg" width="30px" height="30px"/>
        <?php echo $tarifkm.' €';?><br>
        
      </p>
      
        <a TITLE="Modifier le tarif kilométrique" href="index.php?uc=Profil&action=modifiertarif"><button style="width:100%;" class="btn btn-success">Modifier tarif km</button></a>
           
           <p class="Display-4" style="font-size:18px;color:white;">
        Le barème kilométrique 2018 permet de calculer les frais et indemnités kilométriques, notamment dans le cadre de la déduction des frais réels, pour la déclaration de revenus 2018. 
     

      Le barème kilométrique 2018 a été publié par l'administration fiscale le 24 janvier 2018. Il reste le même que celui applicable l'an dernier. 
      Le barème qui suit est utilisable pour les voitures. Si le déplacement se fait en deux-roues dans le cadre du travail, vous devez utiliser le barème kilométrique moto et deux-roues.
      Le barème kilométrique 2019 n'est pas encore connu. Il devrait normalement être publié par les impôts en janvier-février 2019.  </p>

    </div>
  </div>
</div>
