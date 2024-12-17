<?php
include_once '../../connexion/connexion-Temp.php';
if (isset($_POST["valider"])){
    $statut=1;
    $description=htmlspecialchars($_POST['description']);
    $lieu=htmlspecialchars($_POST['lieu']);
    $partenaire=htmlspecialchars($_POST['partenaire']);
    $rq = $connexion->prepare("INSERT INTO `terrain` (`date`, `description`, `lieu`,`partenaire`, `statut`) VALUES (NOW(),?,?,?,?)");
    $resultat = $rq->execute([$description, $lieu, $partenaire, $statut]);
    if ($resultat == true) {
        $_SESSION['msg'] = "Enregistrement Effectué Avec succes !";
        header("location:../../views/terrain.php");
    } else {
        $_SESSION['msg'] = "Echec d'enregistrement !";
        header("location:../../views/terrain.php");
    }
}else{
    header("location:../../views/terrain.php");
}
