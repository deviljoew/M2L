<script type="text/javascript">
  function verifChamps()
  {
    if (document.getElementById('mdp1').value!=document.getElementById('mdp2').value)
          {
      alert("Veuillez saisir le même mot de passe !");
      return false;
    }
    else
      return true;
  }

</script>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12" style="text-align:center;">
      <img style="font-size:20px;text-align:center;color:white;decoration:none;font:bold;margin:20px;" src="./images/usericone.png" width="150px"/></a>
      <p class="Display-4" style="font-size:18px;color:white;">
        <strong><?php echo $civ." ".$_SESSION['nom'];?></strong><br>
        <?php echo $_SESSION['type']?><br><br>
      </p>

      <form onSubmit="return verifChamps();" action="index.php?uc=Profil&action=misAjoursProfil" method="POST">
        <table class="table table-light table-hover table-bordered">
          <tr>
            <td class="display-4" style="font-size:20px;text-align:center;">Nom</td>
            <td class="display-4" style="font-size:20px;text-align:center;">Prénom</td>
            <td class="display-4" style="font-size:20px;text-align:center;">Rue</td>
            <td class="display-4" style="font-size:20px;text-align:center;">Ville</td>
            <td class="display-4" style="font-size:20px;text-align:center;">Code postal</td>
          </tr>
          <tr>
              <td class="display-4" style="font-size:20px;text-align:center;"><input type="text" class="form-control form-control-sm" value="<?php echo $_SESSION['nom'];?>" id="nom" name="nom" placeholder="Nom"></td>
              <td class="display-4" style="font-size:20px;text-align:center;"><input type="text" class="form-control form-control-sm" value="<?php echo $_SESSION['prenom'];?>" id="prenom" name="prenom" placeholder="Prenom"></td>
              <td class="display-4" style="font-size:20px;text-align:center;"><input type="text" class="form-control form-control-sm" value="<?php echo $_SESSION['rue'];?>" id="rue" name="rue" placeholder="Rue"></td>
              <td class="display-4" style="font-size:20px;text-align:center;"><input type="text" class="form-control form-control-sm" value="<?php echo $_SESSION['ville'];?>" id="ville" name="ville" placeholder="Ville"></td>
              <td class="display-4" style="font-size:20px;text-align:center;"><input type="text" class="form-control form-control-sm" value="<?php echo $_SESSION['cp'];?>" id="cp" name="cp" placeholder="Code postal"></td>
            </tr>
            <tr>
              <td colspan=2 class="display-4" style="font-size:20px;text-align:center;">Modifier votre mot de passe : </td>
              <td class="display-4" style="font-size:20px;text-align:center;"><input type="password" class="form-control form-control-sm" id="mdp1" name="mdp1" placeholder="Nouveau mot de passe"></td>
              <td class="display-4" style="font-size:20px;text-align:center;"><input type="password" class="form-control form-control-sm" id="mdp2" name="mdp2" placeholder="Confirmer le nouveau mot de passe"></td>

            </tr>
            <tr>
              <td colspan=7 style="text-align:center;">
                <button TITLE="Modifier le profil" value="modifier" type="submit" style="width:35%;margin-right:10%;" class="btn btn-success">Modifier <img src="./images/valider_white.png" width="12px" height="12px"/></button>
                </form>
                <a TITLE="Annuler la modification" class="btn btn-dark" style="width:35%;" href="index.php?uc=Profil&action=voirProfil">Annuler <img src="./images/suppr_white.png" width="12px" height="12px"/></a>
              </td>
            </tr>
        </table>
    </div>
  </div>
</div>
