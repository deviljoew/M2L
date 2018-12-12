<script type="text/javascript">
  function verifChamps()
  {
    if (isNaN(document.getElementById('tarif').value) || document.getElementById('tarif').value>=1)
          {
      alert("Veuillez saisir un taux acceptable pour le tarif kilométrique !");
      return false;
    }
    else
      return true;
  }

</script>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 setHeight" style="background-color:#00000055; opacity:0.9;height:740px;">
      <p class="display-4" style="color:white;margin-left:20px;margin-top:10px;">Tarif kilométrique</p>
      <p class="h5" style="color:white;margin-left:20px;margin-right:10px;">
        <br>
        Le barème kilométrique 2018 permet de calculer les frais et indemnités kilométriques, notamment dans le cadre de la déduction des frais réels, pour la déclaration de revenus 2018.<br><br>


      Le barème kilométrique 2018 a été publié par l'administration fiscale le 24 janvier 2018. Il reste le même que celui applicable l'an dernier.<br><br>
      Le barème qui suit est utilisable pour les voitures. Si le déplacement se fait en deux-roues dans le cadre du travail, vous devez utiliser le barème kilométrique moto et deux-roues.<br><br>
      Le barème kilométrique 2019 n'est pas encore connu. Il devrait normalement être publié par les impôts en janvier-février 2019.  </p>
    </div>
    <div class="col-md-8 setHeight" style="background-color:#00000055; opacity:0.9;height:740px;">

      <?php
        if(isset($erreurs)){
          include("./vues/v_erreurs.php");
        }
        if(isset($message)){
          include("./vues/v_message.php");
        }
      ?>
        <p class="display-4" style="color:white;margin-left:50px;margin-top:10px;">Tarif kilométrique actuel utilisé pour le(s) frais de déplacement(s) des demandeurs</p>
      <form name="modiftarif" style="margin:50px;" action="index.php?uc=Profil&action=misAjoursTarif" onSubmit="return verifChamps();" method="POST">
        <table class="table table-hover table-light table-bordered">
          <tr>
            <td style="text-align:center;">Tarif kilométrique</td>
            <td style="text-align:center;"><input  TITLE="Modifier le profil" type="text" class="form-control form-control-sm" value="<?php echo $tarifkm; ?>" id="tarif"  name="tarif" placeholder="Tarif km"></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:center;"><button onClick="return verifChamps();" style="width:35%;margin-right:10%;" class="btn btn-success">Valider le nouveau tarif kilométrique</button>
            <a href="index.php?uc=Profil&action=voirTarif" TITLE="Modifier le profil" style="width:35%;" class="btn btn-dark">Annuler</a></td>
          </tr>
        </table>
      </form>
  </div>
</div>
