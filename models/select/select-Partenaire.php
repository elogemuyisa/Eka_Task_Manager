<?php
if(isset($_GET["idPart"])){
    # Script de modification
    $title="Modifier identité";
    $btn="Modifier";
    $action="";
}else{
    # Script d'enregistrement
    $title="Enregister un nouveau Partenaire";
    $btn="Enregistrer";
    $action = "../models/add/add-Partenaire-post.php";
}
# Selection des données des partenaires
$statut=0;
$req = $connexion->prepare("SELECT * FROM `partenaire` WHERE statut=? ORDER BY `partenaire`.`id` DESC ");
$req->execute([$statut]);