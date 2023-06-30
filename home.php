<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="style_two.css">
</head>
<body>
    
    <div class="main">


    <div class="header">
    <?php
        include "header.php";
    ?>
    </div>
    <div class="container">
        <a href="ajouter.php" class="Btn_add_ent"><img src="img/add.png">Ajouter</a>
        <!-- <div class="entete">
            <a href="ajouter.php" class="Btn_add_ent"><img src="img/add.png">Ajouter</a>
            <a href="ajouter.php" class="Btn_add_ent"><img src="img/add.png">Ajouter</a>
        </div> -->
        
        <table>
            <tr id="items">
                <th>Mcle</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Age</th>
                <th>Date Naissance</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Photo</th>
                <th>promotion</th>
                <th>Année</th>
                <th>Edit</th>
                <th>Suppr</th>
            </tr>
            <?php
            //inclure la page de connexion
            include_once "connexion.php"; 

            //requete pour afficher la liste des apprenants
            $req = mysqli_query($con , "SELECT * FROM apprenant order by promotion"); 
            if (mysqli_num_rows($req) == 0){
                //S'il n'existe pas d'apprenant dans la base de donnée, alors on affiche ce message:
                echo "Il n'y a pas encore d'apprenant ajouter !";
            }else{
                //Si non , afficher la liste des apprenants ajoutés
                while($row=mysqli_fetch_assoc($req)){
                    ?>
                        <tr>
                            <td><?=$row['matricule']?> </td>
                            <td><?=$row['nom']?> </td>
                            <td><?=$row['prenom']?> </td>
                            <td><?=$row['age']?></td>
                            <td><?=$row['date_naissance']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['tel']?></td>
                            <td> <a href="detail.php?id=<?=$row['id']?>"> <img src="<?= $row['photo']?>" alt="IMG"></a> </td>
                            <td><?=$row['promotion']?></td> 
                            <td><?=$row['annee_certification']?></td>
                            <td><a href="modifier.php?id=<?=$row['id']?>" class="Btn_add"><img src="img/EDIT.png"></a></td>
                            <td><a href="supprimer.php?id=<?=$row['id']?>" class="Btn_add"><img src="delete.png"></a></td>
                        </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>

    </div>
</body>
</html>