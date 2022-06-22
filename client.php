<?php

require_once "class/Groupe.php";
$groupe = new Groupe;
$select = $groupe->select("groupe");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiant</title>
    <style>
    input{
        display: block;
        margin: 5px;
    }
    </style>
</head>
<body>
<h1>Etudiant</h1>
    <form action="client-post.php" method="post">
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" maxlenght="30">

        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" maxlenght="30">

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" maxlenght="20">

        <label for="courriel">Courriel</label>
        <input type="text"  id="courriel" name="courriel" maxlenght="100">

        <label for="groupe_idgroupe">Groupe</label>
        <select name="groupe_idgroupe" id="groupe_idgroupe">
            <?php
                for($i = 0; $i < count($select); $i++)
                {
                    echo "<option value='{$select[$i]["idgroupe"]}'>{$select[$i]["nom"]}</option>";
                }
            ?>
        </select>

        <input type="submit">
    </form>
</body>
</html>