<?php
    include_once '../../connexion/connexion.php'; 
    if(isset($_POST ["Enregistrer"]))
        {
            $status=0;
            $nom=htmlspecialchars($_POST['nom']);
            $req=$con->prepare("INSERT INTO chapelle(nom,status) VALUES (?,?)");
            $req->execute (array($nom,$status)) ;
            $msg="Enregistrement effectué";
        }
?>