<?php
require "asset/class/BDD.class.php";



// class qui va nous permettre de récupérer les informations dans la base de donnée 
class Resultat extends Bdd{

    // les options du vote 
    public $array = ["James","Célia","Enzo","Charly","Stéphane"];
   
    public function __construct($base){
        parent::__construct($base);
    }

    // calcul le nombre de personne qui on voté pour chaque options 
    public function calculOcc(string $choix){
        $pdoStatement = parent::getPdo()->prepare('SELECT COUNT(*) AS "nb_Occ_vote" FROM `user` WHERE statue=:statue');
        $pdoStatement->bindValue(':statue',$choix,PDO::PARAM_STR);
        $pdoStatement->execute();
        $resultat=$pdoStatement->fetchAll();
        return $resultat[0]["nb_Occ_vote"];

    }
    // calcul le nombre de participant dans la bdd 
    public function calcul(){
        $pdoStatement = parent::getPdo()->prepare('SELECT COUNT(*) AS "nb_vote" FROM `user`');
        // echo "ici";
        $pdoStatement->execute();
        $resultat=$pdoStatement->fetchAll();
        // var_dump($resultat);
        return $resultat[0]["nb_vote"];
    }

    // fonction qui va calculer sous forme d'un pourcentage les résultat du sondage
    public function printProgress(string $choix){
        // echo $this->calculOcc($choix);
        return ($this->calculOcc($choix) / $this->calcul())*100;
    }

    // méthode qui va permettre d'afficher les résultatt dans chaque progresse bar 
    public function print(){
        for($i=0 ; $i<count($this->array); $i++){
            ?>
            <p> <?= $this->array[$i] ;?></p>
            <div class='progress' style='height: 30px;'>
                <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar'  aria-valuemin='0' aria-valuemax='100'  style='width: <?= $this->printProgress($this->array[$i]);?>%'> <?= $this->printProgress($this->array[$i]);?>%</div>
            </div>
            <?php
        }
    }
}
