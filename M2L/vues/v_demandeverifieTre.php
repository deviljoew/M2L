<div class="container-fluid">
  <div class="row">
    <div class="col-md-12" style="padding-bottom:30px;background-color:#00000055;opacity:0.9;">
      <p class="display-4" style="color:white;margin-left:20px;margin-top:10px;">Notes de frais validées :</p>
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
              <td class="display-4" style="font-size:20px;text-align:center;background-color:#AAAAAA;">Coût total des frais</td>
            </tr>
          <?php
                foreach($fraisAttente as $unfrais){
            ?>
          <tr>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['NOM'] != ""){echo $unfrais['NOM'];}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['PRENOM'] != ""){echo $unfrais['PRENOM'];}else{ echo "non renseigné";}?></td>
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
    </div>
</div>