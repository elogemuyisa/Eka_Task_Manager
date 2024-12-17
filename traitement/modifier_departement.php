<?php
include("../connexion/connexion-Temp.php");

if(isset($_POST["enregistrer"]))
{
    if(isset($_GET["idModif"])){
        $id=$_GET["idModif"];
        $dep= htmlspecialchars ($_POST["pseudonyme"]);
        $desc=htmlspecialchars($_POST["description"]);
        if(!empty($dep) && !empty($desc)){
            $req=$connexion->prepare("UPDATE departement SET descriptions=?,pseudonyme=?  WHERE iddepartement=?");
            $test=$req->execute(array($dep, $desc));
            if($test==true){
                header("location:../views/departement.php?message");
            }
            else {
                header("location:../views/departement.php?error");
            }
        }else{
            header("location:../views/departement.php?error");
        }
    }
    
}else{
    header("location:../views/departement.php");
}