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
    <div class="col-md-4" style="background-color:black; opacity:0.75; height:700px;align:center;">
      <p class="display-4" style="color:white;margin-left:10px;margin-top:10px;">Formulaire de dons</p>
      <p class="h5" style="color:white;margin-left:10px;margin-right:10px;">
        <br>
        Nous souhaitons permettre aux adhérents ne souhaitant pas être remboursé de pouvoir faire valoir leur don lors de leur déclaration de revenus et de bénéficier alors d'une remise d’impôts.<br><br>

        Après avoir rempli le formulaire ci-contre, vous allez recevoir par mail un document CERFA à joindre lors de votre déclaration d'impôts.
      </p>
    </div>
    <div class="col-md-8" style="background-color:#00000055;">
	<p class="display-4" style="color:white;margin-left:50px;margin-top:10px;">Formulaire<strong><span style="font-size:15px;color:#33ffad;">  * Champs obligatoires</span></strong></p>
        <!-- !!!!! Renvoie en id " adressemail, motdepasse, prenom, nom, civilite, ville, codepostal, checkboxlicence, licence (si licencié) " par la methode POST dans inscription.php !!!!!!-->
      <form style="margin:50px;" action="index.php?uc=formulaire&action=formvalider" method="POST" onsubmit="return verifChamps();">
        <div class="form-row">
          <strong><span style="color:#33ffad;">*</span></strong><div class="group-form input-group col-md-5">
            <input type="date" class="form-control form-control-sm" value="<?php echo $dateform;?>" id="date" name="date" required>
            <div class="form-group input-group-append">
              <span class="input-group-text form-control-sm">Date de l'évenement</span>
            </div>
          </div>
        </div>
        <div class="form-row">
          <strong><span style="color:#33ffad;">*</span></strong><div class="form-group col-md-3">
            <select class="form-control form-control-sm" id="motif" name="motif" required>
              <option disabled="disabled" selected>Motif</option>
             <?php foreach($motifs as $unmotif)
             {
              ?>
              <option value="<?php echo $unmotif[0];?>" <?php if ($motif=="$unmotif[0]") {echo "selected='selected'" ; }?>><?php echo $unmotif[0];?></option>
              <?php
             }
              ?>
            </select>
          </div>
        </div>
        <div class="form-row">
          <strong><span style="color:#33ffad;">*</span></strong><div class="form-group col-md-4">
            <input type="text" class="form-control form-control-sm" value="<?php echo $trajet;?>" id="trajet" name="trajet" placeholder="Trajet">
          </div>
          <strong><span style="color:#33ffad;">*</span></strong><div class="input-group col-md-3">
            <input type="text" class="form-control form-control-sm" value="<?php echo $km;?>" id="km" name="km" placeholder="Kilometres parcourus">
            <div class="input-group-append">
              <span class="input-group-text form-control-sm">km</span>
            </div>
          </div>
        </div>
        <div class="form-row form-group">
          <strong><span style="color:#33ffad;">*</span></strong><div class="input-group col-md-3">
            <input type="text" class="form-control form-control-sm" value="<?php echo $peage;?>" id="peage" name="peage" placeholder="Coût peage">
            <div class="input-group-append">
              <span class="input-group-text form-control-sm">€</span>
            </div>
          </div>
          <strong><span style="color:#33ffad;">*</span></strong><div class="input-group col-md-3">
            <input type="text" class="form-control form-control-sm" value="<?php echo $repas;?>" id="repas" name="repas" placeholder="Coût repas">
            <div class="input-group-append">
              <span class="input-group-text form-control-sm">€</span>
            </div>
          </div>
          <strong><span style="color:#33ffad;">*</span></strong><div class="input-group col-md-3">
            <input type="text" class="form-control form-control-sm" value="<?php echo $hebergement;?>" id="hebergement" name="hebergement" placeholder="Coût hébergement">
            <div class="input-group-append">
              <span class="input-group-text form-control-sm">€</span>
            </div>
          </div>
        </div>
          <strong><span style="color:#33ffad;visibility:hidden;">*</span></strong><button type="submit" class="btn btn-light" style="">Envoyer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
