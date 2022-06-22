<?php
require_once "class/Etudiant.php";
require_once "class/Groupe.php";
require_once "class/Enseignant.php";
require_once "class/Cours.php";

$etudiant = new Etudiant;
$selectStudent = $etudiant->select("etudiant");

$groupe = new Groupe;
$selectStudent = $groupe->select("groupe");

$enseignant = new Enseignant;
$selectTeacher = $enseignant->select("enseignant");

$cours = new Cours;
$selectCours = $cours->select("cours");
?>

<!-- what do I have to do with the table coursHasGroupe? -->
<!-- what do I have to do with special characters? -->
<!-- Am I going in the right direction? -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Etudiant List</title>
</head>
<body>
    <header class="header">
        <div class="container flex">
            <div class="header__text">
                <h1>Conception et Programmation de Site web</h1>
                <h3>par Jaeri Park</h3>
            </div>
            <div class="header__img">
                <img src="./assets/img/codinggirl.svg" alt="a girl working on a laptop" class="header__image">
            </div>
        </div>
    </header>
    <div class="list etudiant__list">
        <div class="px">
            <div class="container">
                <h1 class="list__title">Etudiant</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Phone</th>
                            <th>Courriel</th>    
                            <th>Groupe</th>    
                            <th>Edit</th>    
                            <th>Delete</th>    
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    foreach($selectStudent as $row){
                ?>
                        <tr>
                            <td><?php echo $row["prenom"]; ?></td>
                            <td><?php echo $row["nom"]; ?></td>
                            <td><?php echo $row["phone"]; ?></td>
                            <td><?php echo $row["courriel"]; ?></td>
                            <td><?php echo $row["groupe_idgroupe"]; ?></td>
                            <td><a href="client-edit.php?idetudiant=<?php echo $row["idetudiant"];?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="client-delete.php?idetudiant=<?php echo $row["idetudiant"];?>"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                <?php
                    }
                ?>       
                    </tbody>
                </table>

                <a href="client.php">CREATE<i class="fa-solid fa-user-plus"></i></a>
            </div>
        </div>
    </div>

    <div class="list enseignant__list">
        <div class="px">
            <div class="container">
                <h1 class="list__title">Enseignant</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Phone</th>
                            <th>Courriel</th>    
                            <th>Edit</th>    
                            <th>Delete</th>    
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    foreach($selectTeacher as $row){
                ?>
                        <tr>
                            <td><?php echo $row["prenom"]; ?></td>
                            <td><?php echo $row["nom"]; ?></td>
                            <td><?php echo $row["phone"]; ?></td>
                            <td><?php echo $row["courriel"]; ?></td>
                            <td><a href="client-edit.php?idenseignant=<?php echo $row["idenseignant"];?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="client-delete.php?idenseignant=<?php echo $row["idenseignant"];?>"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                <?php
                    }
                ?>       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="list cours__list">
        <div class="px">
            <div class="container">
                <h1 class="list__title">Cours</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Enseignant</th>
                            <!-- <th>Edit</th>
                            <th>Delete</th> -->
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    foreach($selectCours as $row){
                ?>
                        <tr>
                            <td><?php echo $row["titre"]; ?></td>
                            <td><?php echo $row["description"]; ?></td>
                            <td><?php echo $row["enseignant"]; ?></td>
                            <!-- <td><a href="client-edit.php?idcours=<?php echo $row["idcours"];?>"><i class="fa-solid fa-pen-to-square"></i></a></td> -->
                            <!-- <td><a href="client-delete.php?idcours=<?php echo $row["idcours"];?>"><i class="fa-solid fa-trash"></i></a></td> -->
                        </tr>
                <?php
                    }
                ?>       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>