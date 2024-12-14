<?php
$statut=0;
$getData=$connexion->prepare("SELECT * FROM `disk` WHERE disk.statut=?;");
$getData->execute([$statut]);