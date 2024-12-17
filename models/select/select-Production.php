<?php
if(isset($_GET["idProd"])){
    $id = $_GET["idProd"];
    $getDataMod = $connexion->prepare("SELECT * FROM agents WHERE id=?");
    $getDataMod->execute([$id]);
    $tab = $getDataMod->fetch();
    $departementModif = $tab['fonction'];
    $title="Modifier une production";
    $btn="Modifier";
    $action="";
}else{
    $title="Enregister un nouvelle production";
    $btn="Enregistrer";
    $action="";
}
# Selection des departement de la DB
$statut = 0;
$getDisk = $connexion->prepare("SELECT * FROM `disk` WHERE disk.statut=?;");
$getDisk->execute([$statut]);

# Selection Des données des agents
$getAgent = $connexion->prepare("SELECT `agents`.*, departement.denomination FROM `agents`, `departement` WHERE agents.fonction=departement.id AND agents.statut=?;");
$getAgent->execute([$statut]);
