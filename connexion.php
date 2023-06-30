<?php

//DATABASE CONNEXION
    $con = mysqli_connect("localhost", "root", "", "tp_php_js");
    if(!$con){
        echo "Vous n'êtes pas connecter à la base de donnée";
    }
?>