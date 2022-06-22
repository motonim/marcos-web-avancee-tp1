<?php
require_once "class/Etudiant.php";

$etudiant = new Etudiant;

$insert = $etudiant->insert("etudiant", $_POST);

// print_r($insert);

// header("Location: client-edit.php?id=$insert");
// header("Location: client-edit.php?idetudiant=$insert");
header("Location: index.php");


?>