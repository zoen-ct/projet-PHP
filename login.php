<?php
session_start();
require ("asset/class/Autoloader.php");
Autoloader::register();

$connect = new Connexion('vote');
$connect->verifierCompte();

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
  <div class="container min-vh-100 d-flex justify-content-center align-items-center flex-column  container-fluid  " >
    <h1 class="txt-center">Connexion</h1>
    <!-- Formulaire avec une méthode POST -->
    <form method="post" class="row g-3 p-5">
      <!-- Champs pour le nom -->
      <div class="col-md-6">
        <label for="exampleInputName1" class="form-label">Nom</label>
        <input type="text" class="form-control" id="exampleInputName1" name="pseudo">
      </div>
      
      <!-- Champs pour le prénom -->
      <div class="col-md-6">
        <label for="exampleInputName1" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="exampleInputName1" name="lastpseudo">
      </div>
      
      <!-- Champs pour le mot de passe avec une valeur par défaut (Azerty12345) -->
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="password">
      </div>
      
      <!-- Bouton de validation -->
      <div id="buttonIncriptionTexte" class="">
        <button type="submit" class="btn btn-primary" value="connexion" name="button">connexion</button>
      </div>
      <p>Pas encore inscrit ? <a href="index.php">s'inscrire</a></p>
    </form>
  </div>
</body>
</html>
