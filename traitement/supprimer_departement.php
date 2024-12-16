<?php
include("../connexion/connexion-Temp.php");
    if(isset($_GET["idsuppr"])&& !empty($_GET["idsuppr"])){
        $id=$_GET["idsuppr"];
            $req=$connexion->prepare("DELETE from departement where iddepartement=?");
            $test=$req->execute([$id]);
            if($test==true){
                header("location:../views/departement.php?message");
            }
            else {
                header("location:../views/departement.php?error");
            }
        }else{
            header("location:../views/departement.php?error");
        }
    

