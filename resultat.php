<?php
require "asset/class/Autoloader.php";
Autoloader::register();


if(empty($_))

$resultat = new Resultat('vote');
// echo $resultat->calcul();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats</title>
    <!-- Inclusion de la feuille de style Bootstrap depuis un CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="p-5">
    <div class="container d-flex justify-content-center container-fluid">
        <h1 class="mb-5">Ici vous pourrez voir les résultats du vote</h1>
    </div>
    <div class="container   container-fluid mb-5">
        <?php $resultat->print();?>
    </div>
    <a class="btn btn-primary container d-flex justify-content-center container-fluid" href="vote.php">Retour au vote</a>
</body>
</html>
