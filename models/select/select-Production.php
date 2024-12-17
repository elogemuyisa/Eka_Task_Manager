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
    $idTerrain = $_GET["idTerrain"];
    $title = "Enregister un nouvelle production";
    $btn = "Enregistrer";
    $action = "../models/add/add-production-post.php?idTerrain=" . $idTerrain;
    # Selection des post-productions d'un terrain
    $statut = 0;
    $getPost_Prod = $connexion->prepare("SELECT `post_production`.*, agents.nom,agents.prenom, terrain.date,terrain.description, terrain.lieu,partenaire.Denomination,disk.matricule FROM `post_production`,agents,terrain,partenaire,disk,participation WHERE post_production.participation=participation.agent AND post_production.terrain=terrain.id AND post_production.terrain=participation.terrain AND participation.agent=agents.id AND terrain.partenaire=partenaire.id AND post_production.disk=disk.id AND post_production.statut=? AND terrain.id=?;");
    $getPost_Prod->execute([$statut, $idTerrain]);
}
# Selection des departement de la DB
$statut = 0;
$getDisk = $connexion->prepare("SELECT * FROM `disk` WHERE disk.statut=?;");
$getDisk->execute([$statut]);

# Selection Des données des agents
$getAgent = $connexion->prepare("SELECT `agents`.*, departement.denomination FROM `agents`, `departement`, `participation`, `terrain` WHERE agents.fonction=departement.id AND participation.agent=agents.id AND terrain.id=? AND terrain.statut=?;");
$getAgent->execute([$idTerrain, $statut]);

# Selection des terrains
$getTerrain = $connexion->prepare("SELECT `terrain`.*, partenaire.Denomination FROM `terrain`,`partenaire` WHERE terrain.partenaire=partenaire.id AND terrain.statut=?;");
$getTerrain->execute([$statut]);
