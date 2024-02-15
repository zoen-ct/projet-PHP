<?php

require "asset/class/BDD.class.php";


class Connexion extends Bdd{
    public function __construct($base){
        parent::__construct($base);
    }


    public function verifierCompte(){

        if(isset($_POST) && isset($_POST["button"]) && !empty($_POST["pseudo"]) && !empty($_POST["lastpseudo"]) && !empty($_POST["password"]) ){
            extract($_POST);

            $pdoStatement = parent::getPdo()->prepare('SELECT `id_user`,`name`, `lastname`,`password`,`statue` FROM `user` WHERE name =:nom AND lastname=:prenom');
    
            // On binde ':nom' et on lui atitre la valeur contenu dans la variable $nom idem pour ':prenom'.
            $pdoStatement->bindValue(':nom',$pseudo,PDO::PARAM_STR);
            $pdoStatement->bindValue(':prenom',$lastpseudo,PDO::PARAM_STR);
            
            
            $pdoStatement->execute();
            if($pdoStatement->rowCount() !=0){
                // echo password_verify($password,$verification['password']);
                // On créer un tableau associatif qui va contenir seulement les informations de l'admin pour pouvoir les comparer 
                $verification = $pdoStatement->fetch(PDO::FETCH_ASSOC);
                print_r ($verification);
                // on vérifie si le mot de passe hashé est le même que celui dans la bdd grace a la fonction prédéfinie password_verify
                if(password_verify($_POST['password'],$verification['password'])){
                    
                    // si le mot de passe est le bon alors on redirige l'admin vers la page backOffice, mais avant on va stocker dans session la valeurs de status qui est dans notre base de donnés se qui va permettre ou non a l'admin d'acceder a la page Backoffice
                    $_SESSION['statue']=$verification['statue'];
                    $_SESSION['nom']=$verification['name'];
                    $_SESSION['prenom']=$verification['lastname'];      
                    $_SESSION['id_user']=$verification['id_user'];    
                    var_dump($_SESSION);    
                    header("location: vote.php");
                    exit();
                }else{
                    echo "<p>Le mot de passe n'est pas correcte</p>";
                }
            }else{
                echo  "<p class='errorMessage'>L'utilisateur : ". $pseudo . " ". $lastpseudo . " n'existe pas.</p>";
            }



        }

    }


}