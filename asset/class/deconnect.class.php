<?php


class deconnect{
    public function deconnection(){
        if(isset($_POST["decon"]) && $_POST["decon"] == "déconnection" ){
            session_destroy();
            header('location: login.php');
            exit();
        }
    }
}