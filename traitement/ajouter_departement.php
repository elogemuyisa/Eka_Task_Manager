<?php
include("../connexion/connexion-Temp.php");
if(isset($_POST["valider"]))
{
    $depart= htmlspecialchars ($_POST["pseudonyme"]);
    $descript=htmlspecialchars($_POST["description"]);
    echo $depart,$descript;
    if(!empty($depart) && !empty($descript)){
        $req=$connexion->prepare("INSERT INTO departement (descriptions,pseudonyme)VALUES(?,?)");
        $test=$req->execute(array($depart,$descript));
        if($test==true){
            header("location:../views/departement.php?message");
        }
        else {
            header("location:../views/departement.php?error");
        }
     }/*else{
        header("location:../views/departement.php?error");
    }
    
}else{
    header("location:../views/departement.php");*/
}