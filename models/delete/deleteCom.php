<?php 
    include '../../connexion/connexion.php';
    //Supprimer dans le panier 
    if(isset($_GET['idpanier']))
    {
        $id=$_GET['idpanier'];
        $supprimer=1;
        /**
         * Il ne faut pas mettre les vraies valeur lorques vous préparez la requette
         * Il faut les mettre tous en parametre
        */
        $req=$connexion->prepare("UPDATE panier set statut=? where id=?");
        $req->execute(array($supprimer,$id));   
        if($req)
        {
            $mesg="suppression reussie";
            $_SESSION['msg']=$mesg;
            header('location:../../views/commande.php');
        }
    }else{
        header('location:../../views/commande.php');
    }

?>