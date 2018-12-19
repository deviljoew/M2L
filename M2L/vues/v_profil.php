<div class="container-fluid">
  <div class="row">
    <div class="col-md-12" style="text-align:center;">
      <a class="Display-4" style="font-size:20px;text-align:center;color:white;decoration:none;font:bold;" href="index.php?uc=Profil&action=voirProfil"><img style="margin:20px;" src="./images/usericone.png" width="150px"/></a>
      <?php
        if(isset($erreurs)){
          include("./vues/v_erreurs.php");
        }
        if(isset($message)){
          include("./vues/v_message.php");
        }
      ?>
      <p class="Display-4" style="font-size:18px;color:white;">
        <strong><?php echo $civ." ".$_SESSION['nom'];?></strong><br>
        <?php echo $_SESSION['type']?><br><br>

      </p>
       <table style="text-align:center;" class="table table-dark ">
		  <tr>
            <td class="display-4" style="font-size:15px;text-align:center;"><img src="./images/sexe.png" width="30px" height="30px"/><br><strong> Sexe </strong></td>
            <td class="display-4" style="font-size:15px;text-align:center;"><img src="./images/rue.png" width="30px" height="30px"/><br><strong> Rue </strong></td>
            <td class="display-4" style="font-size:15px;text-align:center;"><img src="./images/ville.png" width="30px" height="30px"/><br><strong> Ville </strong></td>
            <td class="display-4" style="font-size:15px;text-align:center;"><img src="./images/zip.png" width="30px" height="30px"/><br><strong> Code postal </strong></td>
            <td class="display-4" style="font-size:15px;text-align:center;"><img src="./images/daten.png" width="30px" height="30px"/><br><strong> Date de naissance </strong></td>
          </tr>
          <tr>
            <td class="display-4" style="font-size:15px;text-align:center;"><strong><?php echo " ".$sexe;?></strong></td>
            <td class="display-4" style="font-size:15px;text-align:center;"><strong><?php echo " ".$_SESSION['rue'];?></strong></td>
            <td class="display-4" style="font-size:15px;text-align:center;"><strong><?php echo " ".$_SESSION['ville'];?></strong></td>
            <td class="display-4" style="font-size:15px;text-align:center;"><strong><?php echo " ".$_SESSION['cp'];?></strong></td>
            <td class="display-4" style="font-size:15px;text-align:center;"><strong><?php echo " né le ".$_SESSION['daten'];?></strong></td>
          </tr>
          <tr>
            <td colspan=7 style="text-align:center;">
             <a TITLE="Modifier le profil" href="index.php?uc=Profil&action=modifierProfil"><button style="width:100%;" class="btn btn-success">Modifier profil</button></a>
            </td>
          </tr>
        </table>

    </div>
  </div>
</div>
