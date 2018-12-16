<script type="text/javascript">
  function verifChamps()
  {
    if (document.getElementById('motdepasse1').value!=document.getElementById('motdepasse2').value)
          {
      alert("Veuillez saisir le même mot de passe !");
      return false;
    }
    else
      return true;
  }

  function cocher(ob1, ob2, ob3, ob4, ob5, ob6, ob7, ob8, ob9, ob10, ob11, ob12) {
        if(document.getElementById("checkboxlicence").checked){
        document.getElementById("checked").style.visibility = "visible";
        document.getElementById("unchecked").style.visibility = "hidden";
        document.getElementById("unchecked1").style.visibility = "hidden";
        document.getElementById("unchecked2").style.visibility = "hidden";
        document.getElementById("unchecked3").style.visibility = "hidden";
        document.getElementById("unchecked4").style.visibility = "hidden";
        document.getElementById("unchecked5").style.visibility = "hidden";
        document.getElementById("unchecked6").style.visibility = "hidden";
        inscription.elements[ob1].disabled=false;
        inscription.elements[ob2].disabled=false;
        inscription.elements[ob3].disabled=false;
        inscription.elements[ob4].disabled=false;
        inscription.elements[ob5].disabled=true;
        inscription.elements[ob6].disabled=true;
        inscription.elements[ob7].disabled=true;
        inscription.elements[ob8].disabled=true;
        inscription.elements[ob9].disabled=true;
        inscription.elements[ob10].disabled=true;
        inscription.elements[ob11].disabled=true;
        inscription.elements[ob12].disabled=true;
      }
      else{
        document.getElementById("checked").style.visibility = "hidden";
        document.getElementById("unchecked").style.visibility = "visible";
        document.getElementById("unchecked1").style.visibility = "visible";
        document.getElementById("unchecked2").style.visibility = "visible";
        document.getElementById("unchecked3").style.visibility = "visible";
        document.getElementById("unchecked4").style.visibility = "visible";
        document.getElementById("unchecked5").style.visibility = "visible";
        document.getElementById("unchecked6").style.visibility = "visible";
        inscription.elements[ob1].disabled=true;
        inscription.elements[ob2].disabled=false;
        inscription.elements[ob3].disabled=false;
        inscription.elements[ob4].disabled=false;
        inscription.elements[ob5].disabled=false;
        inscription.elements[ob6].disabled=false;
        inscription.elements[ob7].disabled=false;
        inscription.elements[ob8].disabled=false;
        inscription.elements[ob9].disabled=false;
        inscription.elements[ob10].disabled=false;
        inscription.elements[ob11].disabled=false;
        inscription.elements[ob12].disabled=false;
      }

  }
</script>

<div class="container-fluid">
  <div class="row" style="padding-bottom:30px;">
    <div class="col-md-4" style="background-color:black; opacity:0.75; height:740px;align:center;">
      <p class="display-4" style="color:white;margin-left:10px;margin-top:10px;">La maison des ligues de Lorraine</p>
      <p class="h5" style="color:white;margin-left:10px;margin-right:10px;">
        <br>
        Elle a pour mission de fournir des espaces et des services aux différentes ligues sportives régionales de Lorraine et à d’autres structures hébergées.<br><br>

        La M2L est une structure financée par le Conseil Régional de Lorraine dont l'administration est déléguée au Comité Régional Olympique et Sportif de Lorraine (CROSL).<br><br>

        Installée depuis 2003 dans la banlieue Nancéienne, la M2L accueille l'ensemble du mouvement sportif Lorrain qui représente près de 6 500 clubs, plus de 525 000 licenciés et près de 50 000 bénévoles.

        Les associations sportives (les clubs) peuvent profiter de dispositions fiscales apparues en 2008 pour faire bénéficier de remises d'impôts aux adhérents engageant des frais, en particulier dans le cadre de déplacements liés à des compétitions, des stages sportifs, des réunions... Il s'agit de faciliter par l'informatisation l'établissement du document officiel permettant la remise d'impôts.
      </p>
    </div>
    <div class="col-md-8" style="background-color:#00000055;z-index:1;height:740px;">
      <?php
        if(isset($_REQUEST['message']))
        {
          $message = $_REQUEST['message'];
        }
        if(isset($_REQUEST['erreurs']))
        {
          $erreurs = $_REQUEST['erreurs'];
        }

        if(isset($erreurs)){
          include("./vues/v_erreurs.php");
        }
        if(isset($message)){
          include("./vues/v_message.php");
        }

        $colorHTMLi = "#070d13";
      ?>
  <p class="display-4" style="color:white;margin-left:50px;margin-top:10px;">Inscription<strong><span style="font-size:15px;color:<?php echo $colorHTML ?>;">  * Champs obligatoires</span></strong></p>
        <!-- !!!!! Renvoie en name " adressemail, motdepasse, prenom, nom, civilite, ville, codepostal, checkboxlicence, licence (si licencié) " par la methode POST dans inscription.php !!!!!!-->
      <form name="inscription" style="margin:50px;" action="index.php?uc=gererAccueil&action=inscription" onSubmit="return verifChamps();" method="POST">
          <div class="form-row">
              <strong><span style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group form-group col-md-3">
              <input type="email" class="form-control form-control-sm" value="<?php if(isset($_POST['mail'])) { echo $_REQUEST['mail'];} ;?>" id="adressemail" name="adressemail" placeholder="nom@exemple.com">
              <div class="input-group-append">
                <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">Adresse mail</span>
              </div>
            </div>
              <strong><span style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group form-group col-md-3">
              <input type="password" class="form-control form-control-sm" id="motdepasse1" name="motdepasse1" placeholder="Mot de passe">
              <div class="input-group-append">
                <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">Mot de passe</span>
              </div>
            </div>
              <strong><span style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group form-group col-md-4">
              <input type="password" class="form-control form-control-sm" id="motdepasse2" name="motdepasse2" placeholder="Confirmer le mot de passe">
              <div class="input-group-append">
                <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">Confirmer le mot de passe</span>
              </div>
            </div>
          </div>
          <div class="form-check">
            <strong><span style="visibility:hidden;color:<?php echo $colorHTML ?>;">*</span></strong><input class="form-check-input" type="checkbox" value="<?php echo $_POST['checkboxlicence']; ?>"   id="checkboxlicence" name="checkboxlicence" onClick="cocher('licence', 'adressemail', 'motdepasse1', 'motdepasse2', 'civilite', 'prenom', 'nom', 'datenaissance', 'rue', 'codepostal', 'ville' );">
            <label style="color:white;" class="form-check-label" for="checkboxlicence">
              Cocher si vous êtes licencié
            </label>
          </div>
          <div class="form-row">
              <strong><span id="checked" style="visibility:hidden;color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group form-group col-md-3">
              <input type="text" class="form-control form-control-sm" disabled="true" value="<?php if(isset($_POST['licence'])) { echo $_REQUEST['licence'];} ?>" id="licence" name="licence"  placeholder="Licence">
              <div class="input-group-append">
                <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">Licence</span>
              </div>
            </div>
            <div class="form-group col-md-5">
            </div>
          </div>
          <div class="form-row">
            <strong><span id="unchecked" style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="form-group col-md-3">
              <select class="form-control form-control-sm" id="civilite" name="civilite">
                <option value="" selected>Choisir une civilite</option>
                <option value="F" <?php if (isset($_POST['civilite']) && $_POST['civilite']=="F") {echo "selected='selected'" ; } ?>>Madame</option>
                <option value="M" <?php if (isset($_POST['civilite']) && $_POST['civilite']=="M") {echo "selected='selected'" ; } ?>>Monsieur</option>
              </select>
            </div>
            <div class="form-group col-md-5">
            </div>
          </div>
          <div class="form-row">
            <strong><span id="unchecked1" style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group form-group col-md-5">
              <input type="text" class="form-control form-control-sm" value="<?php if(isset($_POST['nom'])) { echo $_REQUEST['nom'];} ?>" id="nom" name="nom" placeholder="Nom">
              <div class="input-group-append">
                <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">Nom</span>
              </div>
            </div>
            <strong><span id="unchecked2" style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group form-group col-md-5">
            <input type="text" class="form-control form-control-sm" id="prenom" value="<?php if(isset($_POST['prenom'])) { echo $_REQUEST['prenom'];} ?>" name="prenom" placeholder="Prénom">
            <div class="input-group-append">
              <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">Prenom</span>
            </div>
            </div>
          </div>
          <div class="form-row">
            <strong><span id="unchecked3" style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group col-md-5">
              <input type="date" class="form-control form-control-sm" id="datenaissance" value="<?phpif(isset($_POST['datenaissance'])) { echo $_REQUEST['datenaissance'];} ?>" name="datenaissance">
              <div class="form-group input-group-append">
                <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">Date naissance</span>
              </div>
            </div>
          </div>
          <div class="form-row">
            <strong><span id="unchecked4" style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group form-group col-md-6">
              <input type="text" class="form-control form-control-sm" value="<?php if(isset($_POST['rue'])) { echo $_REQUEST['rue'];} ?>" id="rue" name="rue" placeholder="Rue">
              <div class="input-group-append">
                <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">Rue</span>
              </div>
            </div>
          </div>
          <div class="form-row">
            <strong><span id="unchecked5" style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group form-group col-md-3">
              <input type="text" class="form-control form-control-sm" value="<?php if(isset($_POST['codepostal'])) { echo $_REQUEST['codepostal'];} ?>" id="codepostal" name="codepostal" placeholder="Code postal">
              <div class="input-group-append">
                <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">Code postal</span>
              </div>
            </div>
            <strong><span id="unchecked6" style="color:<?php echo $colorHTML ?>;">*</span></strong><div class="input-group form-group col-md-5">
              <input type="text" class="form-control form-control-sm" value="<?php if(isset($_POST['ville'])) { echo $_REQUEST['ville'];} ?>" id="ville" name="ville" placeholder="Ville">
                <div class="input-group-append">
                  <span style="color:white;background-color:<?php echo $colorHTMLi;?>" class="input-group-text form-control-sm">Ville</span>
                </div>
            </div>
          </div>
          <span style="visibility:hidden;color:<?php echo $colorHTML ?>;">*</span><button TITLE="S'inscrire" type="submit" class="btn btn-success" style="">Inscription</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
