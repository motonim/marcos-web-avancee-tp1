<?php
require_once "class/Etudiant.php";
require_once "class/Enseignant.php";
require_once "class/Cours.php";

$etudiant = new Etudiant;
$selectStudent = $etudiant->select("etudiant", "groupe", "ASC");

$enseignant = new Enseignant;
$selectTeacher = $enseignant->select("enseignant");

$cours = new Cours;
$selectCours = $cours->select("cours", "titre");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Liste</title>
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
                <div class="list__title flex">
                    <h1>Etudiant</h1>
                    <a href="etudiant-create.php" class="etudiant__create--link"><span class="etudiant__create--text">CREATE</span><i class="fa-solid fa-user-plus"></i></a>
                </div>
                <table>
                    <thead>
                        <tr>
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
                        foreach ($selectStudent as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row["nomEtudiant"]; ?></td>
                                <td><?php echo $row["phone"]; ?></td>
                                <td><?php echo $row["courriel"]; ?></td>
                                <td><?php echo $row["groupe"]; ?></td>
                                <td><a href="etudiant-edit.php?idetudiant=<?php echo $row["idetudiant"]; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td><a href="etudiant-delete.php?idetudiant=<?php echo $row["idetudiant"]; ?>"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="list enseignant__list">
        <div class="px">
            <div class="container">
                <div class="list__title flex">
                    <h1>Enseignant</h1>
                    <a href="enseignant-create.php" class="etudiant__create--link"><span class="etudiant__create--text">CREATE</span><i class="fa-solid fa-user-plus"></i></a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Pr??nom</th>
                            <th>Nom</th>
                            <th>Phone</th>
                            <th>Courriel</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($selectTeacher as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row["prenom"]; ?></td>
                                <td><?php echo $row["nom"]; ?></td>
                                <td><?php echo $row["phone"]; ?></td>
                                <td><?php echo $row["courriel"]; ?></td>
                                <td><a href="enseignant-edit.php?idenseignant=<?php echo $row["idenseignant"]; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td><a href="enseignant-delete.php?idenseignant=<?php echo $row["idenseignant"]; ?>"><i class="fa-solid fa-trash"></i></a></td>
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
                            <th class="cours__title">Titre</th>
                            <th class="cours__desc">Description</th>
                            <th>Enseignant</th>
                            <th>Groupe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($selectCours as $row) {
                        ?>
                            <tr>
                                <td class="cours__title"><?php echo $row["titre"]; ?></td>
                                <td class="cours__desc"><?php echo $row["description"]; ?></td>
                                <td><?php echo $row["enseignant"]; ?></td>
                                <td><?php echo $row["groupe"]; ?></td>
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