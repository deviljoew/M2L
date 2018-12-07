<div class="container-fluid">
  <div class="row">
    <div class="col-md-4" style="background-color:black; opacity:0.75; height:700px;align:center;">
      <p class="display-4" style="color:white;margin-left:10px;margin-top:10px;">Nous contacter</p>
      <p class="h5" style="color:white;margin-left:10px;margin-right:10px;">
        Nous pouvons répondre à toutes vos questions concernant votre adhésion à M2L.<br><br>

        Nous nous chargeons de régler toutes éventuelles erreurs ou problèmes liés aux document CERFA.
      </p>
    </div>
    <div class="col-md-8" style="background-color:#00000055;">
		<p class="display-4" style="color:white;margin-left:50px;margin-top:10px;">Contact</p>
      <form style="margin:50px;width:700px;" action="index.php?uc=contact&action=envoyerMessage" method="POST">
        <div class="form-group">
          <div class="form-row form-group">
              <div class="col-md-5">
                <input type="text" class="form-control form-control-sm" value="<?php echo $nom;?>" id="nom" name="nom" placeholder="Nom">
              </div>
              <div class="col-md-5">
                <input type="text" class="form-control form-control-sm" value="<?php echo $prenom;?>" id="prenom" name="prenom" placeholder="Prenom">
              </div>
          </div>
          <div class="row form-group">
            <div class="col-md-8">
              <input type="email" class="form-control form-control-sm" value="<?php echo $mail;?>" id="adressemail" name="adressemail" placeholder="nom@exemple.com"/>
            </div>
            <div class="col-md-4">
            </div>
          </div>
          <div class="form-group">
            <textarea type="text" rows="10" cols="50" class="form-control form-control-sm" id="message" name="message" placeholder="Message"></textarea>
          </div>
          <button type="submit" class="btn btn-light">Envoyer</button>
        </form>
      </div>
    </div>
  </div>
</div>
