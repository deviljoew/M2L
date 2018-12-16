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
<script lang="javascript">

function motifAutre(obj1)
{
  if(document.getElementById("motif").value == "autre"){
    dons.elements[obj1].disabled=false;
    document.getElementById("motifA").style.visibility = "visible";
    document.getElementById("etoileautre").style.visibility = "visible";
  }
  else {
    dons.elements[obj1].disabled=true;
    document.getElementById("motifA").style.visibility = "hidden";
    document.getElementById("etoileautre").style.visibility = "hidden";
  }
}

</script>

<?php $colorHTMLi = "#070d13";?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4" style="background-color:black; opacity:0.75; height:740px;align:center;">
      <p class="display-4" style="color:white;margin-left:10px;margin-top:10px;">Notes de frais</p>
      <p class="h5" style="color:white;margin-left:10px;margin-right:10px;">
        <br>
        Nous souhaitons permettre aux adhérents ne désirant pas être remboursé de pouvoir faire valoir leur don lors de leur déclaration de revenus et de bénéficier alors d'une remise d’impôts.<br><br>

        Après avoir rempli le formulaire ci-contre, vous pourrez toujours le modifier, le supprimer dans l'onglet <span style="color:<?php echo $colorHTML; ?>">Demandes en attentes</span>.<br><br>

        Le tresorier validera ou non la note frais et celle-ci viendra alimenter votre bordereau disponible dans l'onglet <span style="color:<?php echo $colorHTML; ?>">Demandes validées</span>.
      </p>
    </div>
    <div class="col-md-8" style="background-color:#00000055;height:740px;">
	<p class="display-4" style="color:white;margin-left:50px;margin-top:10px;">Création de notes de frais<strong><span style="font-size:15px;color:<?php echo $colorHTML ?>;">  * Champs obligatoires</span></strong></p>
        <!-- !!!!! Renvoie en id " adressemail, motdepasse, prenom, nom, civilite, ville, codepostal, checkboxlicence, licence (si licencié) " par la methode POST dans inscription.php !!!!!!-->
      <form class="needs-validation" name="dons" style="margin:50px;" action="index.php?uc=formulaire&action=formvalider" method="POST" onsubmit="return verifChamps();">
        <div class="form-row">
          <strong><span style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="group-form input-group col-md-5">
            <input type="date" class="form-control form-control-sm" value="<?php echo $dateform;?>" id="date" name="date" required>
            <div class="form-group input-group-append">
              <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">Date de l'évenement</span>
            </div>
          </div>
        </div>

        <div class="form-row">
          <strong><span style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="form-group col-md-3">
            <select onchange="motifAutre('motifA');" class="form-control form-control-sm" id="motif" name="motif" required>
              <option disabled="disabled" selected>Motif</option>
             <?php foreach($motifs as $unmotif)
             {
              ?>
              <option value="<?php echo $unmotif[0];?>" <?php if ($motif=="$unmotif[0]") {echo "selected='selected'" ; }?>><?php echo $unmotif[0];?></option>
              <?php
             }
              ?>
              <option value="autre" <?php if ($motif=="$unmotif[0]") {echo "selected='selected'" ; }?>>Autre...</option>
            </select>
          </div>

          <strong><span id="etoileautre" style="visibility:hidden;color:<?php echo $colorHTML ?>;">*</span></strong><div class="form-group col-md-3">
            <input style="visibility:hidden;" disabled="disabled" type="text" class="form-control form-control-sm" value="" id="motifA" name="motifA" placeholder="Autre..." required>
          </div>
        </div>

        <div class="form-row form-group">
          <strong><span style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group group-form col-md-4">
            <input type="text" class="form-control form-control-sm" value="<?php echo $trajet;?>" id="depart" name="depart" placeholder="Ville départ" required>
            <div class="input-group-append">
              <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">Ville départ</span>
            </div>
          </div>
          <strong><span style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group group-form col-md-4">
            <input type="text" class="form-control form-control-sm" value="<?php echo $trajet;?>" id="arrivee" name="arrivee" placeholder="Ville arrivée" required>
            <div class="input-group-append">
              <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">Ville arrivée</span>
            </div>
          </div>
        </div>

        <div class="form-row form-group">
          <strong><span style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group group-form col-md-4">
            <input type="text" class="form-control form-control-sm" value="<?php echo $km;?>" id="km" name="km" placeholder="Kilometres parcourus">
            <div class="input-group-append">
              <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">km</span>
            </div>
          </div>
        </div>

        <div class="form-row form-group">
          <strong><span style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group group-form col-md-3">
            <input type="text" class="form-control form-control-sm" value="<?php echo $peage;?>" id="peage" name="peage" placeholder="Coût peage">
            <div class="input-group-append">
              <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">€</span>
            </div>
          </div>
          <strong><span style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group col-md-3">
            <input type="text" class="form-control form-control-sm" value="<?php echo $repas;?>" id="repas" name="repas" placeholder="Coût repas">
            <div class="input-group-append">
              <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">€</span>
            </div>
          </div>
          <strong><span style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group col-md-3">
            <input type="text" class="form-control form-control-sm" value="<?php echo $hebergement;?>" id="hebergement" name="hebergement" placeholder="Coût hébergement">
            <div class="input-group-append">
              <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">€</span>
            </div>
          </div>
        </div>
          <strong><span style="color:<?php echo $colorHTML ?>;visibility:hidden;">*</span></strong><button TITLE="Envoyer" type="submit" class="btn btn-success" style="">Envoyer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
