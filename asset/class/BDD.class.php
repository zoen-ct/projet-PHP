<?php
// namespace App;




class Bdd{


    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;

    public $pdo;


    public $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,  // On affiche les erreurs 
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',  // On définit le jeu de caractères à utf8
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // On récupère les données sous forme de tableau associatif
    ];
    
    public function __construct($db_name,$db_user = 'root',$db_pass='',$db_host='localhost'){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }
    // private car on aura seulement besoin de cette propriéte dans la class Bdd
    public function getPdo(){
        // pour éviter de devoir à appeler plussieurs fois notre bese de donné on regarde si la propriété pdo est null 
        if($this->pdo == null){
 
            $pdo = new PDO("mysql". ':host=' . $this->db_host . ';dbname=' . $this->db_name, $this->db_user, $this->db_pass,$this->options);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }




    //méthode qui va nous permettre de faire des requette sql et de retourner le résultat sous forme de tableau associatif utile pour le debug
    public function requeteDebugSql($requete){
        // query permet de faire un prepare et un execute en une requête sql 
        $req = $this->getPdo()->query($requete);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }



    // méthode pour la création d'un compte
    // méthode que l'on va appeler dans la class Bdd du fichier BDD.php pour créer le compte si toutes les étapes de validations sont remplies
    public function createAccount($name, $lastname, $password){ 
        $user = $this->getPdo()->prepare('INSERT INTO `user`(`name`, `lastname`, `password` ) VALUES (
            :name,
            :lastname,
            :password
        )');
        $user->bindvalue(':name',$name,PDO::PARAM_STR);
        $user->bindvalue(':lastname',$lastname,PDO::PARAM_STR);
        $user->bindValue(':password',password_hash($password,PASSWORD_DEFAULT),PDO::PARAM_STR);
        $user->execute();
        
    }
    public function aVoter(){
        if(isset($_POST["envoie"]) && $_POST["envoie"]=="envoyer"){
            $choix = $_POST["choix"];
            $id = $_SESSION["id_user"];
            if($_SESSION["statue"] == ""){
                $user = $this->getPdo()->prepare('UPDATE `user` SET `statue`=:choix WHERE id_user=:sessionId');
    
                // var_dump($_SESSION);
                $user->bindvalue(':choix',$choix,PDO::PARAM_STR);
                $user->bindvalue(':sessionId',$id,PDO::PARAM_STR);
                $user->execute();
                // on ajoute le vote pour ne pas quue l'utilisateur puisse voter a nouveau 
                $_SESSION["statue"]=$choix;
                return "<div class='alert alert-success w-100'>Votre vote à bien été pris en compte !</div>";
            }else{
                // on retourne un message d'erreur si l'utilisateur a déjà voter, le vote est définitif
                return "<div class='alert alert-danger w-100'>Vous avez déjà voter</div>";

            }
        }
    }
}



