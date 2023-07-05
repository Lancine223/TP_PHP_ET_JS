<?php

    // connexion à la base de donnée
    require "connexion.php";
    if(isset($_POST['button_p'])){
        $nom_p = $_POST['nom_p'];
        $annee_p  = $_POST['annee_p'];
        //$req = mysqli_query($con, "INSERT INTO `promotion` (`id_p`, `nom_p`, `annee_p`) VALUES (NULL, '$nom_p', '$annee_p');");

        // Extration des information envoyé dans la des variables par la méthode post
        extract($_POST);
        // vérifier que tous les champs on été remplit 
        if(isset($nom_p) && isset($annee_p) ){
            // connexion à la base de donnée
            // include_once "connexion.php";
            // requête pour ajouter des apprenants
            $req = mysqli_query($con, "INSERT INTO `promotion` (`id_p`, `nom_p`, `annee_p`) VALUES (NULL, '$nom_p', '$annee_p');");
            //"INSERT INTO apprenant VALUES(NULL, '$matricule','$prenom','$nom','$age','$date_naissance','$email','$tel','$photo','$promotion','$annee_certification')");
            if($req){
                // si la requete a été effectuée avec succès , on fait une redirection
                $message = "Promotion ajouté avec succès"; 
                header("Location: ajouter.php");
            }else{
                // si non 
                $message = "Promotion non ajouté";
            }
        }else{
            //Si non
            $message ="Veuillez remplire tous les champs !";
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>ODK</title>
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">

    <!--Stylesheet-->

    <link rel="stylesheet" href="ajouter.css">
    
</head>
<body>
  
        <?php
            // matricule générator


            // Vérifier que le boutton ajouter a bien été cliquer 
            if(isset($_POST['button'])){
                // $IMAGE = $_FILES['photo'];
                
                $img_loc = $_FILES['photo']['tmp_name'];
                $img_name = $_FILES['photo'] ['name'];
                $img_des = "uploadImage/".$img_name;
                move_uploaded_file($img_loc, $img_des);
                // mat generate 
                // generate matricule 
                $mat = $_POST['promotion'].$_POST['matricule'];
                // Extration des information envoyé dans la des variables par la méthode post
                extract($_POST);
                // vérifier que tous les champs on été remplit 
                if(isset($nom) && isset($prenom) && $age && isset($date_naissance)&& isset($email)&& isset($tel)&& isset($img_des)&& isset($promotion)&& $annee_certification ){
                    // connexion à la base de donnée
                    // include_once "connexion.php";
                    // requête pour ajouter des apprenants
                    $req = mysqli_query($con, "INSERT INTO `apprenant` (`id`,`matricule`, `nom`, `prenom`, `age`, `date_naissance`, `email`, `tel`, `photo`, `promotion`, `annee_certification`) VALUES(Null, '$mat', '$nom', '$prenom', '$age', '$date_naissance', '$email', '$tel', '$img_des', '$promotion', '$annee_certification')");
                    //"INSERT INTO apprenant VALUES(NULL, '$matricule','$prenom','$nom','$age','$date_naissance','$email','$tel','$photo','$promotion','$annee_certification')");
                    if($req){
                        // si la requete a été effectuée avec succès , on fait une redirection 
                        header("Location: home.php");
                    }else{
                        // si non 
                        $message = "Apprénant non ajouté";
                    }
                }else{
                    //Si non
                    $message ="Veuillez remplire tous les champs !";
                }

            }
        ?>



<div class="container">
<button class="Btn_add_ent" type="submit"  name="popup_promo" id="popup_promo">Ajouter Promotion</button>
<!-- <input class="button" type="submit" value="Ajouter Promotion" name="popup_promo" id="popup_promo"> -->
        <form class="br_input1" enctype="multipart/form-data" action="" method="POST">


            <div><a href="home.php" class="back_btn"><img src="retour.png" alt="">Retour</a><br>

                <div class="promo" id="id_p" name="id_p" style="display: none">
                    <label >Promotion</label>
                    <input class="br_input" type="text" placeholder="Nom promotion" name="nom_p">
            
                    <label >Année Promotion</label>
                    <input class="br_input" type="text" placeholder="Nom" name="annee_p">
                    <input class="button_btn" type="submit" value="Ajouter" name="button_p">
                </div>    

                <h4>ajouter un apprénant</h4>
            
                <p class="erreur_message">
                    <?php

                        // Si la variable message existe , afficher son contenu 
                        if(isset($message)){
                            echo $message;
                        }

                    ?>
                </p>
            </div>
    
            <label >Matricule</label>
            <input class="br_input" type="text" placeholder="Numéro Matricule" name="matricule" id="matcle" readonly>
    
            <label >Nom</label>
            <input class="br_input" type="text" placeholder="Nom" name="nom" >

            <label >Prénom</label>
            <input class="br_input" type="text" placeholder="Prénom" name="prenom" >

            <label >Age</label>
            <input class="br_input" type="number" placeholder="age" name="age" >

            <label >Date de Naissance</label>
            <input class="br_input" type="date" placeholder="date de naissance" name="date_naissance" >

            <label >Email</label>
            <input class="br_input" type="email" placeholder="lacine@gmail.com" name="email" >

            <label >Téléphone</label>
            <input class="br_input" type="text" placeholder="Numéro de Téléphone" name="tel" >

            <label >Photo</label>
            <input  type="file" name="photo" accept="image/*" >
    
            <select class="custom-select" name="promotion" id="id_p">
                
                <?php
                    $req = mysqli_query($con, 'select * from promotion');

                    while($row = mysqli_fetch_assoc($req)){
                        if(isset($_POST['id_p']) && $row['id_p']== $_POST['id_p']){
                            echo '<option value="'.$row['nom_p'].'" selected>'.$row['nom_p'].''
                            .'-'.$row['annee_p']. '</option>';
                        } else{
                            echo '<option value="'.$row['nom_p'].'">'.$row['nom_p'].'-'.
                            $row['annee_p'].'</option>';
                        }
                    }
               ?>
                        
            </select>

            <label >Année</label>
            <input  type="number" name="annee_certification" accept="image/*" placeholder="Année de certification" >

            <input class="button_btn" type="submit" value="Ajouter" name="button">
        </form>
</div>
<!-- js link  -->
<script src="script.js"></script>
</body>
</html>