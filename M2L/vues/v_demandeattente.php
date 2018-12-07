<div class="container-fluid">
  <div class="row">
    <div class="col-md-8" style="padding-bottom:30px;background-color:#00000055;opacity:0.9;">
    <p class="display-4" style="color:white;margin-left:20px;margin-top:10px;">Vos notes de frais :</p>
        <table class="table table-light table-hover table-bordered">
            <tr>
              <td class="display-4" style="font-size:20px;text-align:center;">Date</td>
              <td class="display-4" style="font-size:20px;text-align:center;">Motif</td>
              <td class="display-4" style="font-size:20px;text-align:center;">Trajet</td>
              <td class="display-4" style="font-size:20px;text-align:center;">Kilomètres</td>
              <td class="display-4" style="font-size:20px;text-align:center;">Coût péage</td>
              <td class="display-4" style="font-size:20px;text-align:center;">Coût repas</td>
              <td class="display-4" style="font-size:20px;text-align:center;">Coût hébergement</td>
              <td class="display-4" style="font-size:20px;text-align:center;background-color:#AAAAAA;">Coût total des frais</td>
              <td class="display-4" style="font-size:20px;text-align:center;">Modifier</td>
              <td class="display-4" style="font-size:20px;text-align:center;">Supprimer</td>
            </tr>
          <?php
                foreach($fraisAttente as $unfrais){
                  $date=substr($unfrais['DATE'],0,10);?>
          <tr>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['DATE'] != ""){echo $date;}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['LIBELLE'] != ""){echo $unfrais['LIBELLE'];}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['TRAJET'] != ""){echo $unfrais['TRAJET'];}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['KM'] != ""){echo $unfrais['KM'].'km';}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['COUT_PEAGE'] != ""){echo $unfrais['COUT_PEAGE'].'€';}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['COUT_REPAS'] != ""){echo $unfrais['COUT_REPAS'].'€';}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['COUT_HEBERGEMENT'] != ""){echo $unfrais['COUT_HEBERGEMENT'].'€';}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;background-color:#AAAAAA;"><?php echo $unfrais['COUT_HEBERGEMENT']+$unfrais['COUT_REPAS']+$unfrais['COUT_PEAGE'].'€'; ?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><a href="index.php?uc=formulaire&date=<?=$date?>&motif=<?=$unfrais['LIBELLE']?>&trajet=<?=$unfrais['TRAJET']?>&km=<?=$unfrais['KM']?>&peage=<?=$unfrais['COUT_PEAGE']?>&repas=<?=$unfrais['COUT_REPAS']?>&hebergement=<?=$unfrais['COUT_HEBERGEMENT']?>&action=modifierfrais"><img width="30px" src="./images/edit.png"/></a></td>
            <td class="h4" style="font-size:17px;text-align:center;"><a href="index.php?uc=formulaire&date=<?=$unfrais['DATE']?>&action=supprimerfrais" onclick="return confirm('Voulez-vous vraiment supprimer cette ligne de frais? Attention, aucun retour ne sera possible.');"><img width="30px" src="./images/suppr.png"/></a></td>
          </tr>

          <?php } ?>
           
        </table>

    </div>
    <div class="col-md-4" style="background-color:black; opacity:0.75; height:700px;align:center;">
      <p class="display-4" style="color:white;margin-left:10px;margin-top:10px;">Demandes en attentes</p>
      <p class="h5" style="color:white;margin-left:10px;margin-right:10px;">
        Vos lignes de frais en attente de validation par le trésorier.<br><br>

        Vous pouvez modifier vos demandes ci-contre en cliquant sur le bouton associé.
      </p>
    </div>
</div>
