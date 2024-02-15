<?php
require ("asset/class/Autoloader.php");
Autoloader::register();


$verifMdp = new Mdp('vote');

$verifMdp->mdpOk();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Inclusion de la feuille de style Bootstrap depuis un CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Inscription</title>
</head>
<body>
  <div class="container min-vh-100 d-flex justify-content-center align-items-center flex-column  container-fluid  ">
    <h1>Inscription</h1>
    <form class="row g-3 p-5" method="post"> <!-- Formulaire avec une méthode POST -->
      
      <!-- Champs pour le nom -->
      <div class="col-md-6">
        <label for="exampleInputName1" class="form-label">Nom</label>
        <input type="text" class="form-control" id="exampleInputName1" name="name">
      </div>
      
      <!-- Champs pour le prénom -->
      <div class="col-md-6">
        <label for="exampleInputName1" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="exampleInputName1" name="lastname">
      </div>
      
      <!-- Champs pour le mot de passe -->
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">*Mot de passe</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
      </div>
      
      <!-- Confirmation du mot de passe -->
      <div class="mb-3">
        <label for="exampleInputPassword2" class="form-label">*Confirmation du mot de passe</label>
        <input type="password" class="form-control" id="exampleInputPassword2" name="mdp2">
      </div>
      
      <!-- Bouton de validation -->
      <div id="buttonIncriptionTexte">
        <button type="submit" class="btn btn-primary mb-3" name="button">S'inscrire</button>
        <p>Déjà inscrit ? <a href="login.php">Connectez-vous</a></p>
      </div>
    </form>
    
    <!-- Information sur les critères du mot de passe -->
    <p>*Votre mot de passe doit contenir au moins une majuscule, une minuscule, un nombre et doit avoir une longueur comprise entre 8 et 15 caractères.</p>
  </div>

</body>
</html>
