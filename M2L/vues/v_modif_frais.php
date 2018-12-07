<script lang="javascript">

function verifChamps()
{
  if(isNaN(document.getElementById('km').value) || isNaN(document.getElementById('peage').value) || isNaN(document.getElementById('repas').value) || isNaN(document.getElementById('hebergement').value))
          {
      alert("veuillez saisir un nombre valide pour les dépenses");
    return false;
  }
  else
    return true;
}

</script>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-8" style="padding-bottom:30px;background-color:#00000055;opacity:0.9;">
    <p class="display-4" style="color:white;margin-left:20px;margin-top:10px;">Modifier vos notes de frais :</p>
      <form onSubmit="return verifChamps();" action="index.php?uc=formulaire&date=<?=$date?>&motif=<?=$_REQUEST['motif']?>&trajet=<?=$_REQUEST['trajet']?>&km=<?=$_REQUEST['km']?>&peage=<?=$_REQUEST['peage']?>&repas=<?=$_REQUEST['repas']?>&hebergement=<?=$_REQUEST['hebergement']?>&action=misAjoursFrais" method="POST">
        <table class="table table-light table-hover table-bordered">
          <tr>
            <td class="display-4" style="font-size:15px;text-align:center;">Date</td>
            <td class="display-4" style="font-size:15px;text-align:center;">Motif</td>
            <td class="display-4" style="font-size:15px;text-align:center;">Trajet</td>
            <td class="display-4" style="font-size:15px;text-align:center;">Kilomètres</td>
            <td class="display-4" style="font-size:15px;text-align:center;">Coût péage</td>
            <td class="display-4" style="font-size:15px;text-align:center;">Coût repas</td>
            <td class="display-4" style="font-size:15px;text-align:center;">Coût hébergement</td>
          </tr>
          <tr>
              <td class="display-4" style="font-size:20px;text-align:center;"><input type="date" class="form-control form-control-sm" value="<?php echo $date?>" id="date" name="date" placeholder="Date"></td>
              <td class="display-4" style="font-size:20px;text-align:center;"><select class="form-control form-control-sm" id="motif" name="motif">
                <option disabled="disabled" selected>Motif</option>
               <?php foreach($motifs as $unmotif)
               {
                ?>
                <option value="<?php echo $unmotif[0];?>" <?php if ($_REQUEST['motif']=="$unmotif[0]") {echo "selected='selected'" ; }?>><?php echo $unmotif[0];?></option>
                <?php
               }?>
              </select></td>
              <td class="display-4" style="font-size:20px;text-align:center;"><input type="text" class="form-control form-control-sm" value="<?php echo $_REQUEST['trajet'];?>" id="trajet" name="trajet" placeholder="Trajet"></td>
              <td class="display-4" style="font-size:20px;text-align:center;"><input type="text" class="form-control form-control-sm" value="<?php echo $_REQUEST['km'];?>" id="km" name="km" placeholder="km"></td>
              <td class="display-4" style="font-size:20px;text-align:center;"><input type="text" class="form-control form-control-sm" value="<?php echo $_REQUEST['peage'];?>" id="peage" name="peage" placeholder="Peage"></td>
              <td class="display-4" style="font-size:20px;text-align:center;"><input type="text" class="form-control form-control-sm" value="<?php echo $_REQUEST['repas'];?>" id="repas" name="repas" placeholder="Repas"></td>
              <td class="display-4" style="font-size:20px;text-align:center;"><input type="text" class="form-control form-control-sm" value="<?php echo $_REQUEST['hebergement'];?>" id="hebergement" name="hebergement" placeholder="Hebergement"></td>
            </tr>
            <tr>
              <td colspan=7 style="text-align:center;">
                <button value="modifier" type="submit" style="width:400px;margin-right:150px;" class="btn btn-dark">Modifier</button>
                </form>
                <a class="btn btn-dark" style="width:400px;" href="index.php?uc=formulaire&action=fraisAttente">Annuler</a>
              </td>
            </tr>
        </table>
    </div>
    <div class="col-md-4" style="background-color:black; opacity:0.75; height:700px;align:center;">
      <p class="display-4" style="color:white;margin-left:10px;margin-top:10px;">Modification des demandes</p>
      <p class="h5" style="color:white;margin-left:10px;margin-right:10px;">
        Vous pouvez modifier vos lignes de frais ci contre<br><br>
      </p>
    </div>
</div>