<?php 
include '../connexion/connexion.php';//Se connecter à la BD
if(isset($_SESSION['msge']) && $_SESSION['msge']!="")
{
    $msg=$_SESSION['msge'];
}
if(isset($_GET['idclient']))
{
    $id=$_GET['idclient'];
    $req=$connexion->prepare("SELECT * FROM client where id='$id'");
    $req->execute();
    $element=$req->fetch();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Jeunes</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php require_once('style.php'); ?>

</head>

<body>

    <!-- Appel de menues  -->
    <?php require_once('aside.php') ?>

    <main id="main" class="main">
        <div class="row">
            <div class="col-12">
                <h4>Jeunes</h4>
            </div>
            <!-- pour afficher les massage  -->
            <?php if(isset($msg))
                {
                    ?>
                        <div class="alert-info alert text-center"> <?php echo $msg;$_SESSION['msge']=""; ?> </div>
                    <?php
                }                                                 
            ?>
            <!-- Le form qui enregistrer les données  -->
            <div class="col-xl-12 ">
                <form <?php if(isset($_GET['idclient'])){?> action="../models/updat/upJeune.php?id=<?=$_GET['idclient']?>"<?php }else{?>  action="../models/add/addJeune.php"<?php } ?> method="POST" class="shadow p-3">
                    <div class="row">
                        <?php if(isset($_GET['idclient']))
                            {
                                ?>
                                    <h4 class="text-center"> Modifier un jeune </h4>
                                <?php 
                            }
                            else 
                            {
                                ?>  
                                <h4 class="text-center"> Ajouter un jeune </h4>
                                <?php  
                            } 
                        ?>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Nom <span class="text-danger">*</span></label>
                            <input required type="text" name="nom" class="form-control" placeholder="Entrez le nom"<?php if(isset($_GET['idclient'])){?>value="<?=$element['nom']?>" <?php } ?>>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Postnom <span class="text-danger">*</span></label>
                            <input required type="text" name="postnom" class="form-control" placeholder="Entrez le postnom" <?php if(isset($_GET['idclient'])){?>value="<?=$element['postnom']?>" <?php } ?>>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Prenom <span class="text-danger">*</span></label>
                            <input required type="text" name="prenom" class="form-control" placeholder="Entrez le prenom" <?php if(isset($_GET['idclient'])){?>value="<?=$element['prenom']?>" <?php } ?>>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Genre (Sexe)<span class="text-danger">*</span></label>
                            <select required id="" name="genre" class="form-select">
                                <!--   -->
                                <?php if(isset($_GET['idclient']))
                                    { 
                                        ?>  
                                            <option <?php if(isset($_GET['idclient'])){?>value="<?=$element['genre']?>" <?php } $genre= $element['genre'] ?>> <?php echo $genre ?></option>
                                            <option value="M">Masculin</option>
                                            <option value="F">Feminin</option>
                                        <?php 
                                    }
                                    else
                                    {
                                        ?>
                                            <option value="" desabled >Choisir un genre</option>
                                            <option value="M">Masculin</option>
                                            <option value="F">Feminin</option>
                                        <?php  
                                    } 
                                ?>                                    
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Date de naissance <span class="text-danger">*</span></label>
                            <input required type="date" name="dateNaiss" class="form-control" placeholder="Entrer votre date de naissance" <?php if(isset($_GET['idclient'])){?>value="<?=$element['adresse']?>" <?php } ?>>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Lieu de naissance <span class="text-danger">*</span></label>
                            <input required type="text" name="lieuNaissance" class="form-control" placeholder="Entrez votre lieu de naissance" <?php if(isset($_GET['idclient'])){?>value="<?=$element['adresse']?>" <?php } ?>>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Etat civil <span class="text-danger">*</span></label>
                            <select required id="" name="EtatCivil" class="form-select">                                                        
                                <option value="celibataire">Célibataire</option>
                                <option value="Fiance">Fiancé(e)</option>
                                <option value="Marie">Marié(e)</option>                                               
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Adresse <span class="text-danger">*</span></label>
                            <input required type="text" name="adress" class="form-control" placeholder="Entrez l'adresse" <?php if(isset($_GET['idclient'])){?>value="<?=$element['adresse']?>" <?php } ?>>
                        </div>                       
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Chapelle (Kijiji) <span class="text-danger">*</span></label>
                            <select required id="" name="chapelle" class="form-select">                                                        
                                <option value="Njiapanda_A">NJiapanda <b>A</b> </option>
                                <option value="Njiapanda_B">NJiapanda <b>B</b> </option>
                                <option value="Vichai">Vichai</option>                                               
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Telephone <span class="text-danger">*</span></label>
                            <input required type="text" name="telephone" class="form-control" placeholder="Entrez le N° Tel" <?php if(isset($_GET['idclient'])){?>value="<?=$element['telephone']?>" <?php } ?>>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Profession<span class="text-danger">*</span></label>
                            <input required type="text" name="profession" class="form-control" placeholder="Entrez votre profession" <?php if(isset($_GET['idclient'])){?>value="<?=$element['telephone']?>" <?php } ?>>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Niveau d'étude <span class="text-danger">*</span></label>
                            <select required id="" name="etudes" class="form-select">                                                        
                                <option value="Primaire">Primaire</option>
                                <option value="Diplome"> Diplomé </option>
                                <option value="gradde"> Gradué</option> 
                                <option value="licence"> Licencié</option>
                                <option value="Docteur"> Docteur</option>
                                <option value="ilettre"> je ne pas fait d'etude</option>                                                
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Jeu preferer <span class="text-danger">*</span></label>
                            <select required id="" name="jeu" class="form-select">                                                        
                                <option value="Football">Football</option>
                                <option value="Basketball">Basketball</option>
                                <option value="Course">Course</option> 
                                <option value="Voleyball">Voleyball</option>
                                                                              
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">baptisé ou non baptisé<span class="text-danger">*</span></label>
                            <select required id="" name="statutBapteme" class="form-select">                                                        
                                <option value="1">Baptisé(e)</option>
                                <option value="0">Non baptisé(e)</option>                                           
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Nom du père <span class="text-danger">*</span></label>
                            <input required type="text" name="nompere" class="form-control" placeholder="Entrez le nom"<?php if(isset($_GET['idclient'])){?>value="<?=$element['nom']?>" <?php } ?>>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">Nom du la mère<span class="text-danger">*</span></label>
                            <input required type="text" name="nomMere" class="form-control" placeholder="Entrez le postnom" <?php if(isset($_GET['idclient'])){?>value="<?=$element['postnom']?>" <?php } ?>>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                            <label for="">N° Telephone parents <span class="text-danger">*</span></label>
                            <input required type="text" name="telephoneParent" class="form-control" placeholder="Entrez le N° Tel" <?php if(isset($_GET['idclient'])){?>value="<?=$element['telephone']?>" <?php } ?>>
                        </div>

                        <?php if(isset($_GET['idclient']))
                            {
                                ?> 
                                    <div class="col-xl-6 col-lg-6 col-md-6 mt-4 col-sm-6 p-3 ">
                                        <input type="submit" name="valider" class="btn btn-dark w-100" value="Modifier">                                        
                                    </div>                                        
                                    <div class="col-xl-6 col-lg-6 col-md-6 mt-4 col-sm-6 p-3 ">                                        
                                        <a href="client.php" class="btn btn-danger w-100">Annuler</a>
                                    </div>
                                <?php 
                            } 
                            else 
                            { 
                                ?>
                                    <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">
                                        <input type="submit" name="valider" class="btn btn-primary w-100" value="Enregistrer">
                                    </div>
                                <?php 
                            } 
                        ?>
                        
                    </div>
                </form>
            </div>
            <!-- La table qui affiche les données  -->
            <div class="col-xl-12 table-responsive px-3 mt-3">
                <table class="table table-sm text-center shadow">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Postnom</th>
                            <th>prenom</th>
                            <th>Genre</th>
                            <th>Age</th>
                            <th>Etat civil</th>
                            <th>Chapelle</th>
                            <th>Statut Bapteme</th>
                            <th>Profession</th>
                            <th>Tel</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $req=$connexion->prepare("SELECT * FROM fidel where statut=0");
                            $req->execute();
                            $numero=0;
                            while($affiche=$req->fetch())
                            {
                                $numero++;
                                $age = $affiche ['age'];
                                $statutBapteme = $affiche ['StatutBapteme'];
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $numero?></th>
                                        <td><?php echo $affiche['nom']?></td>
                                        <td><?php echo $affiche['postnom']?></td>
                                        <td><?php echo $affiche['prenom']?></td>
                                        <td><?php echo $affiche['genre']?></td>
                                        <?php
                                            if($age>12)
                                            {
                                                ?>
                                                    <td><?php echo $age?></td>
                                                <?php 
                                            }
                                            else
                                            {
                                                ?>
                                                    <td class="text-danger"><?php echo $age?></td>
                                                <?php 
                                            }
                                        ?>                                     
                                        <td><?php echo $affiche ['etatCivil']?></td>
                                        <td><?php echo $affiche['chapelle']?></td>
                                        <?php
                                            if($statutBapteme>0)
                                            {
                                                ?>
                                                    <td>Baptisé(e)</td>
                                                <?php 
                                            }
                                            else
                                            {
                                                ?>
                                                    <td>Non Baptisé(e)</td>
                                                <?php 
                                            }
                                        ?>  
                                        <td><?php echo $affiche['profession']?></td>
                                        <td><?php echo $affiche['telephone']?></td>
                                        <td>
                                            <a href="client.php?idclient=<?php echo $affiche['id']?>" class="btn btn-dark btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a  onclick=" return confirm('Voulez-vous vraiment supprimer ?')" href="../models/delete/deleteClient.php?idclient=<?php echo $affiche['id']?>" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash3-fill"></i>
                                            </a>
                                        </td>                                       
                                    </tr>
                                <?php  
                            } 
                        ?>                        
                    </tbody>
                </table>
            </div>
        </div>
    </main><!-- End #main -->
    <?php require_once('script.php') ?>

</body>

</html>