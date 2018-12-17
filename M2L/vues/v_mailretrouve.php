<div class="container-fluid">
  <div class="row">
    <div class="col-md-4" style="background-color:#00000055;height:740px;">
      <p class="display-4" style="color:white;margin-left:20px;margin-top:10px;">Mot de passe retrouvé !</p>
      <p class="h5" style="color:white;margin-left:20px;margin-right:10px;">
      <br>
      Vous allez recevoir à l'adresse mail saisi votre mot de passe.<br><br><br>
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

      ?>
      </p>
      <form style="margin-left:20px;margin-top:20px;" action="index.php?uc=accueil&action=accueil" method="POST">
        <div class="form-group">
          <button TITLE="Retourner à l'accueil" type="submit" class="btn btn-success">Retour à l'accueil</button>
        </div>
      </form>
    </div>
    <div class="col-md-8" style="background-color:#00000055;height:740px;">
    </div>
  </div>
</div>
