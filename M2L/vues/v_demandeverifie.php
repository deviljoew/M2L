<div class="container-fluid">
  <div class="row">
    <div class="col-md-9" style="padding-bottom:30px;background-color:#00000055;opacity:0.9;height:740px;">
    <p class="display-4" style="color:white;margin-left:20px;margin-top:10px;">Vos notes de frais validées :</p>
        <table class="table table-light table-hover table-bordered">
            <tr>
              <td class="display-4" style="font-size:18px;text-align:center;">Date</td>
              <td class="display-4" style="font-size:18px;text-align:center;">Motif</td>
              <td class="display-4" style="font-size:18px;text-align:center;">Trajet</td>
              <td class="display-4" style="font-size:18px;text-align:center;">Kilomètres</td>
              <td class="display-4" style="font-size:18px;text-align:center;background-color:#CCCCCC;">Coût trajet</td>
              <td class="display-4" style="font-size:18px;text-align:center;">Coût péage</td>
              <td class="display-4" style="font-size:18px;text-align:center;">Coût repas</td>
              <td class="display-4" style="font-size:18px;text-align:center;">Coût hébergement</td>
              <td class="display-4" style="font-size:18px;text-align:center;background-color:#CCCCCC;">Coût total</td>

            </tr>
          <?php
                foreach($fraisAttente as $unfrais){
            ?>
          <tr>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['DATE'] != ""){echo substr($unfrais['DATE'],0,10);}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['LIBELLE'] != ""){echo $unfrais['LIBELLE'];}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['TRAJET'] != ""){echo $unfrais['TRAJET'];}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['KM'] != ""){echo $unfrais['KM'].' km';}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;background-color:#CCCCCC;"><?php echo ($unfrais['KM']*$tarifkm).' €';  ?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['COUT_PEAGE'] != ""){echo $unfrais['COUT_PEAGE'].' €';}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['COUT_REPAS'] != ""){echo $unfrais['COUT_REPAS'].' €';}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;"><?php if($unfrais['COUT_HEBERGEMENT'] != ""){echo $unfrais['COUT_HEBERGEMENT'].' €';}else{ echo "non renseigné";}?></td>
            <td class="h4" style="font-size:17px;text-align:center;background-color:#CCCCCC;"><?php echo $unfrais['COUT_HEBERGEMENT']+$unfrais['COUT_REPAS']+$unfrais['COUT_PEAGE'].' €'; ?></td>

          </tr>
        <?php } $backgroundColor = "#FFFFFF";?>
          <td colspan=10 style="text-align:center;">

             <a TITLE="Visualiser votre bordereau" href="index.php?uc=formulaire&action=afficherBordereau&mail=<?=$mail;?>&annee=<?=$annee;?>" target="_blank"><button style="width:100%;" class="btn btn-success">Visualiser le bordereau de frais de <?php echo $annee; ?></button></a>

            </td>
        </table>
    </div>
    <div class="col-md-3" style="background-color:black; opacity:0.75; height:740px;align:center;">
      <p class="display-4" style="color:white;margin-left:10px;margin-top:10px;">Demandes acceptées</p>
      <p class="h5" style="color:white;margin-left:10px;margin-right:10px;">
        Votre liste de frais acceptées.<br>En fin d'année, vous allez pouvoir recevoir un document CERFA (pdf) qui vous sera envoyé par mail (Cela comprend uniquement les frais acceptés de l'année en cours)<br>Vous pourrez ainsi le joindre à vos impots et faire valoir ce don lors de votre déclaration de revenus pour
bénéficier de remise d’impôts.
        <br><br>
        Vos demandes validées ne peuvent pas être modifiées.<br>En cas de problème, n'hésitez pas à contacter votre club.<br><br>
        En recevant le document CERFA, vous acceptez de renoncer au remboursement de ces frais, ce qui
équivaut à un don à l’association. <br>Attention, une donation ne peut être annulé. <br>Rappel du code : La donation est un acte par lequel une personne, le donateur, transmet de son vivant et gratuitement la propriété d'un bien à une autre personne, le donataire.<br>

      </p>
    </div>
</div>
