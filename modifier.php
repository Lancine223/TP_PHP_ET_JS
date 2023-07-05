
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
    <script type="javascript" src="script.js"></script>
</head>
<body>

        <?php

            // connexion à la base de donnée
            include_once "connexion.php";
            // on récupère l'id dans le lien 
            $id= $_GET['id'];
            // requête pour afficher infos d'un apprenants
            $req = mysqli_query($con, "SELECT * FROM apprenant WHERE id= $id");
            $row = mysqli_fetch_assoc($req);

            // Vérifier que le boutton ajouter a bien été cliquer 
            if(isset($_POST['button'])){

                $img_loc = $_FILES['photo']['tmp_name'];
                $img_name = $_FILES['photo'] ['name'];
                $img_des = "uploadImage/".$img_name;
                move_uploaded_file($img_loc, $img_des);
                // matricule générator 
                
                // Extration des information envoyé dans la des variables par la méthode post
                extract($_POST);
                // vérifier que tous les champs on été remplit 
                if(isset($matcle) && isset($nom) && isset($prenom) && isset($age)&& isset($date_naissance)&& isset($email)&& isset($tel)&& isset($img_des)&& isset($promotion)&& isset($annee_certification)){
                    // réquête de modification 
                    $req = mysqli_query($con, "UPDATE `apprenant` SET `nom`='$nom',`prenom`='$prenom',`age`='$age',`date_naissance`='$date_naissance',`email`='$email',`tel`='$tel',`promotion`='$promotion',`annee_certification`='$annee_certification' WHERE `id`='$id'");
                    if($req){
                        // si la requete a été effectuée avec succès , on fait une redirection 
                        header("location: home.php");
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

        
        <form class="br_input1" action="" method="POST" enctype="multipart/form-data">
            <div class="photo">
                <img src="<?=$row['photo']?>" alt="" width="50%" height="50%" style="border-radius: 50%">
            </div>
            <div><a href="home.php" class="back_btn"><img src="retour.png" alt="">Retour</a><br>
                <h4>Modifier un apprénant</h4>
            
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
            <input class="br_input" type="text" placeholder="Numéro Matricule" name="matricule" value="<?=$row['matricule']?>" readonly>
    
            <label >Nom</label>
            <input class="br_input" type="text" placeholder="Nom" name="nom" value="<?=$row['nom']?>">

            <label >Prénom</label>
            <input class="br_input" type="text" placeholder="Prénom" name="prenom" value="<?=$row['prenom']?>">

            <label >Age</label>
            <input class="br_input" type="number" placeholder="age" name="age" value="<?=$row['age']?>">

            <label >Date de Naissance</label>
            <input class="br_input" type="date" placeholder="date de naissance" name="date_naissance" value="<?=$row['date_naissance']?>">

            <label >Email</label>
            <input class="br_input" type="email" placeholder="lacine@gmail.com" name="email" value="<?=$row['email']?>">

            <label >Téléphone</label>
            <input class="br_input" type="text" placeholder="Numéro de Téléphone" name="tel" value="<?=$row['tel']?>">

            <label >Photo</label>

            <input  type="file" name="photo" accept="image/*" value="<?=$row['photo']?>">
            
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
            <input  type="number" name="annee_certification" placeholder="Année de certification" value="<?=$row['annee_certification']?>" >

            <input class="button_btn" type="submit" value="Modifier" name="button">
        </form>
                    
        <!-- js link  -->
        <script src="script.js"></script>
</body>
</html>