<?php

// on utilise un namespace pour bien faire la différences entre chaque class que l'on va créer 
// namespace ConnexionMdp;
require "asset/class/BDD.class.php";


// class qui vérifie que les conditions de validité du mot de passe sont bien respectées
class Mdp extends Bdd{
    public static $content = "";

    public function __construct($base){
        parent::__construct($base);
    }

    /**
     * mdp
     *
     * @param string $data
     */
    // class qui va vérifier la syntaxe du mot de passe
    public static function mdpSyntaxe(string $data): string{

        if(preg_match('#^[a-zA-Z0-9_-]{8,15}$#',$data)){
            //vérification des maj : 
            if(!preg_match('#[A-Z]+#',$data))
            {
                self::$content .= "<div class='alert alert-danger w-100'>Le champ mot de passe doit contenir au moins une majuscule</div>";
            }
            //vérification des min : 
            if(!preg_match('#[a-z]+#',$data))
            {
                self::$content .= "<div class='alert alert-danger w-100'>Le champ mot de passe doit contenir au moins une minuscule</div>";

            }
            //vérification des entiers : 
            if(!preg_match('#[0-9]+#',$data))
            {
                self::$content .= "<div class='alert alert-danger w-100'>Le champ mot de passe doit contenir au moins une chiffre</div>";

            }
        }else{
            self::$content .= "<div class='alert alert-danger w-100'>Le champs mot de passe est incorrect</div>";

        }
        return self::$content;
    }
    // propriété qui va vérifier si le mot de passe de confirmation est identique au premier mot de passe 
    public static function mdpCompare(string $data1,string $data2): string{
        if($data1 != $data2){
            self::$content .= "<div class='alert alert-danger w-100'>les mdp sont différents</div>";
        }
        echo self::$content;
        return self::$content;

    }
    // propriété qui va créer ou non le compte de l'utilisateur
    public function mdpOk(){
        if (isset($_POST) && isset($_POST["button"]) ){
            if(self::mdpSyntaxe($_POST["password"]) == "" && self::mdpCompare($_POST["password"],$_POST["mdp2"]) == "" ){
                echo "<div class='alert alert-success w-100'>Votre compte à été créer</div>";
                $this->createAccount($_POST["name"], $_POST["lastname"], $_POST["password"]);

            }else{
                echo "<div class='alert alert-danger w-100'>Votre compte n'a pas été créer</div>";

            }
        }
        
    }
}