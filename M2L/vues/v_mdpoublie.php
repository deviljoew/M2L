<div class="container-fluid">
  <div class="row">
    <div class="col-md-5" style="background-color:#00000055;height:700px;">
      <p class="display-4" style="color:white;margin-left:20px;margin-top:10px;">Mot de passe oublié ?</p>
      <p class="h5" style="color:white;margin-left:20px;margin-right:10px;">
        <br>
        Inscrivez votre adresse mail (existante)<br>
        nous allons renvoyer le mot de passe à cette adresse.
        </p>
      <form style="margin-left:20px;margin-top:20px;" action="index.php?uc=gerermdp&action=mail" method="POST">
        <div class="form-group">
          <div class="form-group">
            <input type="email" class="form-control form-control-sm" id="adressemail" placeholder="Mail"/>
          </div>
          <button type="submit" class="btn btn-light">Envoyer</button>
        </form>

        <!-- ATTENTION SI MAIL EXISTE PAS, CHARGER CETTE PAGE A LA PLACE !-->
        <?php
          //Include("vues/v_mauvaismdp.php"); //ou le lien HREF = ""index.php?uc=gerermdp&action=mauvaismail""
         ?>

      </div>
    </div>
    <div class="col-md-7" style="background-color:#00000055;height:700px;">
    </div>
  </div>
</div>
