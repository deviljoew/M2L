<div class="container-fluid">
  <div class="row">
    <div class="col-md-12" style="padding-bottom:30px;background-color:#00000055;opacity:0.9;height:740px;">
      <p class="display-4" style="color:white;margin-left:20px;margin-top:10px;">Notes de frais à valider :</p>
        <?php
          if(isset($message)){
            include("vues/v_message.php");
          }

        ?>
          <table class="table table-light table-hover table-bordered">
            <tr>
              <td class="display-4" style="font-size:15px;text-align:center;">Nom</td>
              <td class="display-4" style="font-size:15px;text-align:center;">Prenom</td>
              <td class="display-4" style="font-size:15px;text-align:center;">Date</td>
              <td class="display-4" style="font-size:15px;text-align:center;">Motif</td>
              <td class="display-4" style="font-size:15px;text-align:center;">Trajet</td>
              <td class="display-4" style="font-size:15px;text-align:center;">Kilomètres</td>
              <td class="display-4" style="font-size:15px;text-align:center;">Coût péage</td>
              <td class="display-4" style="font-size:15px;text-align:center;">Coût repas</td>
              <td class="display-4" style="font-size:15px;text-align:center;">Coût hébergement</td>
              <td class="display-4" style="font-size:20px;text-align:center;background-color:#CCCCCC;">Coût total</td>
              <td class="display-4" style="font-size:15px;text-align:center;">Valider</td>
              <td class="display-4" style="font-size:15px;text-align:center;">Refuser</td>
            </tr>
          <?php
                foreach($fraisAttente as $unfrais){
                  $date=substr($unfrais['DATE'],0,10);
            ?>
          <tr>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['NOM'] != ""){echo $unfrais['NOM'];}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['PRENOM'] != ""){echo $unfrais['PRENOM'];}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['DATE'] != ""){echo $date;}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['LIBELLE'] != ""){echo $unfrais['LIBELLE'];}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['TRAJET'] != ""){echo $unfrais['TRAJET'];}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['KM'] != ""){echo $unfrais['KM'].'km';}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['COUT_PEAGE'] != ""){echo $unfrais['COUT_PEAGE'].'€';}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['COUT_REPAS'] != ""){echo $unfrais['COUT_REPAS'].'€';}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['COUT_HEBERGEMENT'] != ""){echo $unfrais['COUT_HEBERGEMENT'].'€';}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;background-color:#CCCCCC;"><?php echo $unfrais['COUT_HEBERGEMENT']+$unfrais['COUT_REPAS']+$unfrais['COUT_PEAGE'].'€'; ?></td>
           <td class="h4" style="font-size:17px;text-align:center;"><a TITLE="Valider la demande" href="index.php?uc=formulaire&date=<?=$date?>&adressemail=<?php echo $unfrais['ADRESSE_MAIL'] ?>&motif=<?=$unfrais['LIBELLE']?>&trajet=<?=$unfrais['TRAJET']?>&km=<?=$unfrais['KM']?>&peage=<?=$unfrais['COUT_PEAGE']?>&repas=<?=$unfrais['COUT_REPAS']?>&hebergement=<?=$unfrais['COUT_HEBERGEMENT']?>&action=validerFrais"><img width="30px" src="./images/valider.png"/></a></td>
            <td class="h4" style="font-size:17px;text-align:center;"><a TITLE="Refuser la demande" href="index.php?uc=formulaire&date=<?=$unfrais['DATE']?>&action=supprimerfraisTre" onclick="return confirm('Voulez-vous vraiment refuser cette ligne de frais? Attention, aucun retour ne sera possible.');"><img width="30px" src="./images/refuser.png"/></a></td>
         </tr>
          <?php } ?>
        </table>
    </div>
</div>
