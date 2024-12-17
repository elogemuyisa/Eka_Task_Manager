<?php
if (isset($_GET["idModif"])) {
    $id = $_GET["idModif"];
    $titre = "Modifier departement";
    $btn = "Modifier";
    $getdepart = $connexion->prepare("SELECT * FROM departement where iddepartement=?");
    $getdepart->execute([$id]);
    $Afficat = $getdepart->fetch();
    $action = "../traitement/modifier_departement.php?idModif=$id";
} else {
    $titre = "AAjouter un nouveau département";
    $btn = "Enregistrer";
    $action = "../models/add/add-departement-post.php";
}
$getData = $connexion->prepare("SELECT * FROM departement");
$getData->execute();
