<?php 
    include_once '../../connexion/connexion.php';
    // Modifier les données du panier
    if(isset($_POST['modifier']))
    {
        $id=$_GET['id'];
        $Description=htmlspecialchars($_POST['Description']);
        $Quantite=htmlspecialchars($_POST['Quantite']);
        $prix=htmlspecialchars($_POST['prix']);
        $entree=htmlspecialchars($_POST['entree']); 

        /**
             * Il ne faut pas mettre les vraies valeur lorques vous préparez la requette
             * Il faut les mettre tous en parametre
             */
        $req=$connexion->prepare("UPDATE panier set description=?, quantite=?, prix=?, entree=? where id=?");
        $req->execute(array($Description,$Quantite,$prix,$entree,$id));
        if($req)
        {
            $_SESSION['msg']=$mesg;
            $mesg="Modification reussie";
            header('location:../../views/commande.php');
                
        }

    }else{
        header('location:../../views/commande.php');

    }
?>