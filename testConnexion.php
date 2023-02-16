<?php
    session_start();
    //test de la connexion
    if(isset($_SESSION['connected'])){
        //test role
        if($_SESSION['role']== 0){
            echo 'tu as le droit d\'accéder à la page';
        } 
    }
    else{
        echo 'interdit !!!';
    }
?>