<?php
if (isset($_GET["idTerrain"])) {
    # Modification terrain
    $id = $_GET["idTerrain"];
    # Selection des données du terrain à modifier
    $getModifTer = $connexion->prepare("SELECT terrain.*, partenaire.Denomination FROM terrain, partenaire WHERE terrain.partenaire=partenaire.id AND terrain.id=?");
    $getModifTer->execute([$id]);
    $terMod = $getModifTer->fetch();
    $partenaire = $terMod["Denomination"];
    $idPart=$terMod["partenaire"];
    $title = "Modifier un terrain de";
    $btn = "Modifier";
    $action = "";
} else {
    $title = "Enregister un nouveau terrain";
    $btn = "Enregistrer";
    $action = "../models/add/add-Terrain-post.php";
}
$statut = 0;
$req = $connexion->prepare("SELECT terrain.*, partenaire.Denomination FROM terrain, partenaire WHERE terrain.partenaire=partenaire.id AND terrain.statut=?");
$req->execute([$statut]);

# Selection des partenaires
$getPartenaire = $connexion->prepare("SELECT * FROM `partenaire` ");
$getPartenaire->execute();
