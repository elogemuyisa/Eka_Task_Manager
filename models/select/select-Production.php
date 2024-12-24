<?php
if (isset($_GET["idProd"])) {
    $id = $_GET["idProd"];
    $getDataMod = $connexion->prepare("SELECT * FROM agents WHERE id=?");
    $getDataMod->execute([$id]);
    $tab = $getDataMod->fetch();
    $departementModif = $tab['fonction'];
    $title = "Modifier une production";
    $btn = "Modifier";
    $action = "";
} else if (!empty($_GET['idTerrain'])) {
    # Lors de l'Enregistrement des post-production
    $idTerrain = $_GET["idTerrain"];
    $title = "Enregister un nouvelle production";
    $btn = "Enregistrer";
    $action = "../models/add/add-production-post.php?idTerrain=" . $idTerrain;
    # Selection des post-productions d'un terrain
    $statut = 0;
    $getPost_Prod = $connexion->prepare("SELECT `post_production`.*, terrain.date, partenaire.Denomination,terrain.lieu,disk.matricule,agents.nom,agents.prenom FROM post_production,terrain,partenaire,disk,participation,agents WHERE post_production.disk=disk.id AND post_production.participation=participation.id AND participation.agent=agents.id AND participation.terrain=terrain.id AND terrain.partenaire=partenaire.id AND participation.terrain=?;");
    $getPost_Prod->execute([$idTerrain]);
} else if (!empty($_GET['VoirProd'])) {
    # Lors de la visualisation des post-production
    $VoirProd = $_GET["VoirProd"];   
    # Selection des post-productions d'un terrain ciblé
    $statut = 0;
    $getPost_Prod = $connexion->prepare("SELECT `post_production`.*, terrain.date, partenaire.Denomination,terrain.lieu,disk.matricule,agents.nom,agents.prenom FROM post_production,terrain,partenaire,disk,participation,agents WHERE post_production.disk=disk.id AND post_production.participation=participation.id AND participation.agent=agents.id AND participation.terrain=terrain.id AND terrain.partenaire=partenaire.id AND participation.terrain=?;");
    $getPost_Prod->execute([$VoirProd]);
}
# Selection des departement de la DB
$statut = 0;
$getDisk = $connexion->prepare("SELECT * FROM `disk` WHERE disk.statut=?;");
$getDisk->execute([$statut]);

# Selection Des données des agents qui ont participer au terrain
$getAgent = $connexion->prepare("SELECT `participation`.*, agents.nom,agents.postnom, agents.prenom,departement.denomination FROM `agents`, `departement`, `participation`, `terrain` WHERE agents.fonction=departement.id AND participation.agent=agents.id AND participation.terrain=? AND participation.statut=?;");
$getAgent->execute([$idTerrain, $statut]);

# Selection des terrains
$getTerrain = $connexion->prepare("SELECT `terrain`.*, partenaire.Denomination FROM `terrain`,`partenaire` WHERE terrain.partenaire=partenaire.id AND terrain.statut=? ORDER BY `terrain`.`id` DESC;");
$getTerrain->execute([$statut]);
