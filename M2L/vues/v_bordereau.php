<div class="container-fluid">
  <div class="row">
    <div class="col-md-12" style="padding-bottom:30px;background-color:#00000055;opacity:0.9;">
    <p class="display-4" style="color:white;margin-left:20px;margin-top:10px;">Bordereau de frais de l'année <?php echo $annee; ?></p>
    <br>
    <p class="display-4" style="font-size:20px;color:white;margin-left:20px;margin-top:10px;">Je soussigné(e) <?php echo $_SESSION['prenom'].' '.$_SESSION['nom']; ?>
      <br><br>
    </p>
    <p class="display-4" style="font-size:20px;color:white;margin-left:20px;margin-top:10px;">demeurant <?php echo $_SESSION['rue'].' '.$_SESSION['cp'].' '.$_SESSION['ville']; ?>
      <br><br>
    </p>
    <p class="display-4" style="font-size:20px;color:white;margin-left:20px;margin-top:10px;">certifie renoncer au remboursement des frais ci-dessous et les laisser à l'association <?php echo $association; ?>
      <br><br>
    </p>
    <p class="display-4" style="font-size:20px;color:white;margin-left:20px;margin-top:10px;">en tant que don.
      <br><br>
    </p>
    <p class="display-4" style="font-size:20px;color:white;margin-left:20px;margin-top:10px;">Frais de déplacements :
      <br><br>
    </p>
    <table class="table table-light table-hover table-bordered">
        <tr>
          <td class="display-4" style="font-size:15px;text-align:center;">Date</td>
          <td class="display-4" style="font-size:15px;text-align:center;">Motif</td>
          <td class="display-4" style="font-size:15px;text-align:center;">Trajet</td>
          <td class="display-4" style="font-size:15px;text-align:center;">Kilomètres</td>
          <td class="display-4" style="font-size:15px;text-align:center;">Coût péage</td>
          <td class="display-4" style="font-size:15px;text-align:center;">Coût repas</td>
          <td class="display-4" style="font-size:15px;text-align:center;">Coût hébergement</td>
          <td class="display-4" style="font-size:20px;text-align:center;background-color:#AAAAAA;">Coût total des frais</td>

        </tr>
      <?php
            foreach($fraisValide as $unfrais){
        ?>
      <tr>
        <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['DATE'] != ""){echo substr($unfrais['DATE'],0,10);}else{ echo "non renseigné";}?></td>
        <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['LIBELLE'] != ""){echo $unfrais['LIBELLE'];}else{ echo "non renseigné";}?></td>
        <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['TRAJET'] != ""){echo $unfrais['TRAJET'];}else{ echo "non renseigné";}?></td>
        <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['KM'] != ""){echo $unfrais['KM'].'km';}else{ echo "non renseigné";}?></td>
        <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['COUT_PEAGE'] != ""){echo $unfrais['COUT_PEAGE'].'€';}else{ echo "non renseigné";}?></td>
        <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['COUT_REPAS'] != ""){echo $unfrais['COUT_REPAS'].'€';}else{ echo "non renseigné";}?></td>
        <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['COUT_HEBERGEMENT'] != ""){echo $unfrais['COUT_HEBERGEMENT'].'€';}else{ echo "non renseigné";}?></td>
        <td class="h4" style="font-size:17px;text-align:center;background-color:#AAAAAA;"><?php echo $unfrais['COUT_HEBERGEMENT']+$unfrais['COUT_REPAS']+$unfrais['COUT_PEAGE'].'€'; ?></td>

      </tr>
      <?php } ?>
    </table>
    <p class="display-4" style="font-size:20px;color:white;margin-left:20px;margin-top:10px;"><?php if($_SESSION['type']=="Adhérent"){echo "Je suis licencié sous le n° de licence suivant ".$_SESSION['prenom'].' '.$_SESSION['nom'].', n° '.$licence;}else{ echo "Je suis le représentant légal des adhérents suivants : " ;} ?>
      <br><br>
     <p class="display-4" style="font-size:20px;color:white;margin-left:20px;margin-top:10px;">Montant total des dons :
        <span style="color:red;"><?php echo $fraisTotal . '€' ?></span>
        <br><br>
      </p>
      
        <br><br>
      <p class="display-4" style="text-align: center;font-size:20px;color:white;margin-left:20px;margin-top:10px;">Pour bénéficier du reçu de dons, cette note de frais doit être accompagnée de toutes les justificatifs correspondants
        <br>
      </p>
      <div >
       

      <div>
        <p class="h4" style="margin-left:50%;font-size:20px;color:white;margin-top:10px;">A<span style="margin-left:10%;">Le</span>
          <br><br>
        </p>
       
        <p class="h4" style="margin-left:50%;font-size:20px;color:white;margin-top:10px;">Signature du bénévole :
          <br><br>
        </p>
      </div>
      <br>
      <div>
        <p class="h4" style="text-align:center;margin-left:10%;font-size:20px;color:white;margin-top:10px;">A<span style="margin-left:10%;">Partie réservée à l'association</span>
          <br><br>
        </p>
        <p class="h4" style="margin-left:10%;font-size:20px;color:white;margin-top:10px;">n° d'ordre du reçu :
          <br><br>
        </p>
        <p class="h4" style="margin-left:10%;font-size:20px;color:white;margin-top:10px;">Remis le :
          <br><br>
        </p>
        <p class="h4" style="margin-bottom:50px;margin-left:10%;font-size:20px;color:white;margin-top:10px;">Signature du trésorier :
          <br><br>
        </p>
      </div>

    </div>
  </div>
</div>
</div style="padding-bottom:100px;">