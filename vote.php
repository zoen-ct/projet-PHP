<?php
session_start();
require "asset/class/Autoloader.php";
Autoloader::register();
// var_dump($_SESSION);

$vote = new Bdd('vote');

echo $vote->aVoter();

// permet à l'utilisateur de se deconnecter
$deco = new Deconnect;
$deco->deconnection();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de vote</title>
    <!-- Inclusion de la feuille de style Bootstrap depuis un CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <main class="container min-vh-100 d-flex justify-content-center align-items-center flex-column  container-fluid ">
        <h1>Bonjour <?=$_SESSION["prenom"] . " " . $_SESSION["nom"]; ?></h1>
        <h2 class="txt-center">Pour qui votes-tu ?</h2>
        <!-- Formulaire de vote -->
        <form method="post" class="d-flex flex-wrap w-25 justify-content-center  p-5">
            

            <!-- Liste déroulante pour le choix -->
            <select name="choix" class="form-select mb-3" aria-label="Default select example">
                <option value="" selected>Ton choix</option>
                <option value="James">James</option>
                <option value="Célia">Célia</option>
                <option value="Charly">Charly</option>
                <option value="Enzo">Enzo</option>
                <option value="Stéphane">Stéphane</option>
            </select>
           
            <!-- Bouton de validation -->
            <input type="submit" name="envoie" value="envoyer" class="btn btn-primary">
            <input type="submit" name="decon" value="déconnection" class="btn btn-primary">
        </form>

        <!-- Affichage du contenu généré (messages de succès ou d'erreur) -->
        <!-- <?= $content;?> -->

        <!-- Lien vers la page des résultats -->

        <a class="btn btn-primary" href="resultat.php">Voir les résultats</a>
    </main>
</body>
</html>
