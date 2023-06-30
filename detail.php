
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>ODK</title>
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">

    <!--Stylesheet-->

    <link rel="stylesheet" href="detail.css">
    
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

            // // Vérifier que le boutton ajouter a bien été cliquer 
            // if(isset($_POST['button'])){

            //     $img_loc = $_FILES['photo']['tmp_name'];
            //     $img_name = $_FILES['photo'] ['name'];
            //     $img_des = "uploadImage/".$img_name;
            //     move_uploaded_file($img_loc, $img_des);
            //     // matricule générator 
            //     $matcle = $_POST['promotion'].$_POST['matricule'];
            //     // Extration des information envoyé dans la des variables par la méthode post
            //     extract($_POST);
            //     // vérifier que tous les champs on été remplit 
            //     if(isset($matcle) && isset($nom) && isset($prenom) && isset($age)&& isset($date_naissance)&& isset($email)&& isset($tel)&& isset($img_des)&& isset($promotion)&& isset($annee_certification)){
            //         // réquête de modification 
            //         $req = mysqli_query($con, "UPDATE `apprenant` SET `matricule`='$matcle',`nom`='$nom',`prenom`='$prenom',`age`='$age',`date_naissance`='$date_naissance',`email`='$email',`tel`='$tel',`photo`='$img_des',`promotion`='$promotion',`annee_certification`='$annee_certification' WHERE `id`='$id'");
            //         if($req){
            //             // si la requete a été effectuée avec succès , on fait une redirection 
            //             header("location: home.php");
            //         }else{
            //             // si non 
            //             $message = "Apprénant non ajouté";
            //         }
            //     }else{
            //         //Si non
            //         $message ="Veuillez remplire tous les champs !";
            //     }

            // }
        ?>
       
            
        <!-- SECTION A PROPOS-->
        <a href="home.php" class="back_btn"><img src="retour.png" alt="">Retour</a>
        <section class="about" id="about">
            <div class="about-img">
            <img src="<?=$row['photo']?>" alt="">
            </div>
            <div class="about-content">
                <h2 class="heading"><?=$row['nom']?> <span><?=$row['prenom']?></span> </h2>
                <h3><?=$row['age']?> ans.</h3>
                <p>Matricule: <?=$row['matricule']?></p>
                <p>Date Naissance: <?=$row['date_naissance']?></p>
                <p>Email: <?=$row['email']?></p>
                <p>Téléphone: <?=$row['tel']?></p>
                <p>Promotion: <?=$row['promotion']?></p>
                <p>Anne Certification: <?=$row['annee_certification']?></p>
                <div class="dbtn">
                    <a href="modifier.php?id=<?=$row['id']?>" class="Btn_add"><img src="img/EDIT.png"></a>
                    <a href="supprimer.php?id=<?=$row['id']?>" class="Btn_add"><img src="delete.png"></a>
                </div>
            </div>
        </section>
        <!-- FIN DE SECTION A PROPOS-->
                    
</body>
</html>
