<script lang="javascript"> window.print(); </script>
<?php
  if($_SESSION['demandeur'] != 'ok' && $_SESSION['tresorier'] != 'ok'){
    header("index.php?uc=accueil&action=accueil");
  }
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12" style="padding-bottom:30px;background-color:white;">
    <p class="display-4" style="color:black"><img src="./images/logo_blk.png" width="70px"/> Maison des ligues de Lorraine</p>
    <p class="display-4" style="text-align:center;font-size:40px;color:black;margin-left:20px;margin-top:10px;">Bordereau de frais de l'année <?php echo $annee; ?></p>
    <br>
    <p class="display-4" style="font-size:20px;color:black;margin-left:20px;margin-top:10px;">Je soussigné(e) <strong><?php echo $_SESSION['prenom'].' '.$_SESSION['nom']; ?></strong>
      <br><br>
    </p>
    <p class="display-4" style="font-size:20px;color:black;margin-left:20px;margin-top:10px;">demeurant <strong><?php echo $_SESSION['rue'].' '.$_SESSION['cp'].' '.$_SESSION['ville']; ?></strong>
      <br><br>
    </p>
    <p class="display-4" style="font-size:20px;color:black;margin-left:20px;margin-top:10px;">certifie renoncer au remboursement des frais ci-dessous et les laisser à l'association <strong><?php echo $association.' '; ?></strong> en tant que don.
      <br><br>
    </p>

    <p class="display-4" style="font-size:20px;color:black;margin-left:20px;margin-top:10px;">Frais de déplacements :</p><p class="display-4" style="font-size:20px;color:black;margin-left:20px;margin-top:10px;">Tarif kilométrique appliqué pour le remboursement : <strong><?php echo $tarifkm.' €'; ?></strong>

      <br><br>
    </p>
    <table class="table table-light table-hover table-bordered">
        <tr>
          <td class="display-4" style="color:black;font-size:15px;text-align:center;">Date</td>
          <td class="display-4" style="color:black;font-size:15px;text-align:center;">Motif</td>
          <td class="display-4" style="color:black;font-size:15px;text-align:center;">Trajet</td>
          <td class="display-4" style="color:black;font-size:15px;text-align:center;">Kilomètres</td>
          <td class="display-4" style="color:black;font-size:20px;text-align:center;background-color:#CCCCCC;">Coût trajet</td>
          <td class="display-4" style="color:black;font-size:15px;text-align:center;">Coût péage</td>
          <td class="display-4" style="color:black;font-size:15px;text-align:center;">Coût repas</td>
          <td class="display-4" style="color:black;font-size:15px;text-align:center;">Coût hébergement</td>
          <td class="display-4" style="color:black;font-size:20px;text-align:center;background-color:#AAAAAA;">Coût total des frais</td>

        </tr>
      <?php
            foreach($fraisValide as $unfrais){
        ?>
      <tr>
        <td class="h4" style="color:black;font-size:17px;text-align:center;"><?php if($unfrais['DATE'] != ""){echo substr($unfrais['DATE'],0,10);}else{ echo "non renseigné";}?></td>
        <td class="h4" style="color:black;font-size:17px;text-align:center;"><?php if($unfrais['LIBELLE'] != ""){echo $unfrais['LIBELLE'];}else{ echo "non renseigné";}?></td>
        <td class="h4" style="color:black;font-size:17px;text-align:center;"><?php if($unfrais['TRAJET'] != ""){echo $unfrais['TRAJET'];}else{ echo "non renseigné";}?></td>
        <td class="h4" style="color:black;font-size:17px;text-align:center;"><?php if($unfrais['KM'] != ""){echo $unfrais['KM'].' km';}else{ echo "non renseigné";}?></td>
        <td class="h4" style="color:black;font-size:17px;text-align:center;background-color:#CCCCCC;"><?php echo ($unfrais['KM']*$tarifkm).' €';  ?></td>
        <td class="h4" style="color:black;font-size:17px;text-align:center;"><?php if($unfrais['COUT_PEAGE'] != ""){echo $unfrais['COUT_PEAGE'].' €';}else{ echo "non renseigné";}?></td>
        <td class="h4" style="color:black;font-size:17px;text-align:center;"><?php if($unfrais['COUT_REPAS'] != ""){echo $unfrais['COUT_REPAS'].' €';}else{ echo "non renseigné";}?></td>
        <td class="h4" style="color:black;font-size:17px;text-align:center;"><?php if($unfrais['COUT_HEBERGEMENT'] != ""){echo $unfrais['COUT_HEBERGEMENT'].' €';}else{ echo "non renseigné";}?></td>
        <td class="h4" style="color:black;font-size:17px;text-align:center;background-color:#AAAAAA;"><?php echo $unfrais['COUT_HEBERGEMENT']+$unfrais['COUT_REPAS']+$unfrais['COUT_PEAGE']+($unfrais['KM']*$tarifkm).'€'; ?></td>


      </tr>
      <?php } ?>
      <tr>
        <td colspan=8 class="h4" style="color:black;font-size:17px;text-align:center;">Montant total des frais de déplacement</td>
        <td class="h4" style="color:black;font-size:17px;text-align:center;background-color:#CECECE;"><?php echo $fraisTotal.' €'; ?></td>
      </tr>
    </table>
    <p class="display-4" style="font-size:20px;color:black;margin-left:20px;margin-top:10px;"><?php if($_SESSION['type']=="Adhérent"){echo "Je suis licencié sous le n° de licence suivant ".$_SESSION['prenom'].' '.$_SESSION['nom'].', n° '.$licence;}else{ echo "Je suis le représentant légal des adhérents suivants : </br>";

    foreach ($adherents as $unadh)
    {

          $lesadh=$pdo->RecupAdherent($unadh);
          echo $lesadh[2].' '.$lesadh[1].', licence n° '.$lesadh[0].'</br>';
        
        } }?>

      <br><br>
     <p class="display-4" style="font-size:20px;color:black;margin-left:20px;margin-top:10px;">Montant total des dons :
        <span style="color:red;"><?php echo $fraisTotal.' €' ?></span>
        <br>
      </p>

        <br>
      <p class="display-4" style="text-align: center;font-size:20px;color:black;margin-left:20px;margin-top:10px;">Pour bénéficier du reçu de dons, cette note de frais doit être accompagnée de tous les justificatifs correspondants
        <br>
      </p>
      <div >


      <div>
        <p class="h4" style="margin-left:50%;font-size:20px;color:black;margin-top:10px;">A<span style="margin-left:10%;">Le</span>
          <br><br>
        </p>

        <p class="h4" style="margin-left:50%;font-size:20px;color:black;margin-top:10px;">Signature du bénévole :
          <br><br>
        </p>
      </div>
      <br>

      <div>
        <p class="h4" style=";margin-left:10%;font-size:20px;color:black;margin-top:10px;">Partie réservée à l'association
          <br><br>
        </p>
        <p class="h4" style="margin-left:10%;font-size:20px;color:black;margin-top:10px;">A
          <br><br>
        </p>
        <p class="h4" style="margin-left:10%;font-size:20px;color:black;margin-top:10px;">n° d'ordre du reçu :
          <br><br>
        </p>
        <p class="h4" style="margin-left:10%;font-size:20px;color:black;margin-top:10px;">Remis le :
          <br><br>
        </p>
        <p class="h4" style="margin-bottom:50px;margin-left:10%;font-size:20px;color:black;margin-top:10px;">Signature du trésorier :
          <br><br>
        </p>
      </div>

    </div>
  </div>
</div>
</div style="padding-bottom:100px;">
