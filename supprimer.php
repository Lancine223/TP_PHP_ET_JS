<?php

    // Connexion à la base de donnée
    include_once "connexion.php";

    // Récupération de l'id dans le lien
    $id = $_GET['id'];
    // Requête pour suppimer 
    $req = mysqli_query($con, "DELETE FROM apprenant WHERE id = $id");
    // Redirection vers la page accueille
    header("Location:home.php"); 

?>