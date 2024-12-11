<?php 
    include_once '../../connexion/connexion.php'; // Appel de la connexion
    // Enregistrement d'un jeune 
    if(isset($_POST['valider']))
    {
        $nom=htmlspecialchars($_POST['nom']);
        $postnom=htmlspecialchars($_POST['postnom']);
        $prenom=htmlspecialchars($_POST['prenom']);
        $genre=htmlspecialchars($_POST['genre']);
        $dateNai=htmlspecialchars($_POST['dateNaiss']);
        $lieuNaissance=htmlspecialchars($_POST['lieuNaissance']);
        $EtatCivil=htmlspecialchars($_POST['EtatCivil']);       
        $adress=htmlspecialchars($_POST['adress']);
        $chapelle=htmlspecialchars($_POST['chapelle']);
        $telephone=htmlspecialchars($_POST['telephone']);
        $profession=htmlspecialchars($_POST['profession']);
        $etudes=htmlspecialchars($_POST['etudes']);
        $jeu=htmlspecialchars($_POST['jeu']);
        $statutBapteme=htmlspecialchars($_POST['statutBapteme']);
        $nompere=htmlspecialchars($_POST['nompere']);
        $nomMere=htmlspecialchars($_POST['nomMere']);
        $telephoneParent=htmlspecialchars($_POST['telephoneParent']);
        
        $dateNaiss= $dateNai;
        $dateactue=date('Y-m-d');
        $anniv=date_diff(date_create($dateNaiss), date_create($dateactue));
        $age=$anniv->format('%y');
        $req=$connexion->query("SELECT * FROM fidel where nom='$nom' and postnom='$postnom' and prenom='$prenom' and telephone='$telephone' and chapelle='$chapelle' and statut=0");

        if($existant=$req->fetch())
            {
                echo $existant['id'];
                if($existant['id']>=1)
                {
                    if($genre='M')
                    {
                        $msg="Le jeune monsieur $nom  $postnom $prenom existe déjà";
                        $_SESSION['msge']=$msg;
                        header('location:../../views/jeunes.php');
                    }
                    else
                    {
                        $msg="La jeune demoiselle $nom.' '.$postnom.' '.$prenom.' '.existe deja";
                        $_SESSION['msge']=$msg;
                        header('location:../../views/jeunes.php');
                    } 
                }   
            }
        elseif($age==0)
            {
                $msg="La date de naissance que vous avez selectionnez ne pas valide !";
                $_SESSION['msge']=$msg;
                header('location:../../views/jeunes.php');
            }
        else
            {  
                  
                // echo  $age->format('%y');
                // if( $age->format('%y')>12)
                // {
                //     $majeur="Majeur";
                // }
                // else
                // {
                //     $majeur="Mineur";
                // }
                $statut=0;
                $req=$connexion->prepare("INSERT INTO fidel (nom,postnom,prenom,genre,etatCivil,dateNaissance,lieuNaissance,age,adress,chapelle,niveauEtude,telephone,profession,jeuPrefere,StatutBapteme,NomPapa,nomMaman,telephoneParent,statut) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $req->execute(array($nom,$postnom,$prenom,$genre,$EtatCivil,$dateNai,$lieuNaissance,$age,$adress,$chapelle,$etudes,$telephone,$profession,$jeu,$statutBapteme,$nompere,$nomMere,$telephoneParent,$statut));
                if($req)
                {
                    $mesg="Enregistrement reussi";
                    $_SESSION['msge']=$mesg;
                    header('location:../../views/jeunes.php');
                }
            }
        }



       
    
    
?>