<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 setheight" style="background-color:black; opacity:0.75;align:center;">
      <p class="display-4 setFrontTitle" style="color:white;margin-left:10px;margin-top:10px;">Nous contacter</p>
      <p class="h5 setFrontSize" style="color:white;margin-left:10px;margin-right:10px;">
        Nous pouvons répondre à toutes vos questions concernant votre adhésion à M2L.<br><br>

        Nous nous chargeons de régler toutes éventuelles erreurs ou problèmes liés aux document CERFA.
      </p>
    </div>

    <div class="col-md-8">
		<p class="display-4 setFrontTitle" style="color:white;margin-left:10px;margin-top:10px;">Contact</p>
      <form style="padding-bottom:35px;margin:10px;" action="index.php?uc=contact&action=envoyerMessage" method="POST">
        <div class="form-group">
          <div class="form-row form-group">
              <div class="col-md-5">
                <input width="40%" type="text" class="form-control form-control-sm" value="<?php if(isset($_SESSION['nom'])) { echo $_SESSION['nom'];}?>" id="nom" name="nom" placeholder="Nom" required>
              </div>
              <div class="col-md-5">
                <input width="40%" type="text" class="form-control form-control-sm" value="<?php if(isset($_SESSION['prenom'])) { echo $_SESSION['prenom'];}?>" id="prenom" name="prenom" placeholder="Prenom" required>
              </div>
          </div>
          <div class="row form-group">
            <div class="col-md-8">
              <input width="40%" type="email" class="form-control form-control-sm" value="<?php if(isset($_SESSION['mail'])) { echo $_SESSION['mail'];}?>" id="adressemail" name="adressemail" placeholder="nom@exemple.com" required/>
            </div>
            <div class="col-md-4">
            </div>
          </div>
          <div class="form-group">
            <textarea type="text" style="resize: none;" rows="15" cols="50" class="form-control form-control-sm" id="message" name="message" placeholder="Message" required></textarea>
          </div>
          <button TITLE="Envoyer" type="submit" class="btn btn-success">Envoyer</button>
        </form>
      </div>
    </div>
  </div>
</div>
