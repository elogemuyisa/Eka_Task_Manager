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
    <title>Chapelle</title>
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
                <h4>Les chapelles</h4>
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
                <form method="post" <?php if(isset($_GET['idchappelle'])){?> action="../models/updat/upJeune.php?id=<?=$_GET['idchappelle']?>"<?php }else{?>  action="../models/add/addJeune.php"<?php } ?> class="shadow p-3">
                    <div class="row">
                        <?php if(isset($_GET['idchappelle']))
                            {
                                ?>
                                    <h4 class="text-center">Modifier une chapelle </h4>
                                <?php 
                            }
                            else 
                            {
                                ?>  
                                    <h4 class="text-center">Ajouter une chapelle </h4>
                                <?php  
                            } 
                        ?>
                        <div class="col-12 p-3">
                            <label for=""> Nom<span class="text-danger">*</span></label>
                            <input required type="text" name="nom" class="form-control" <?php if(isset($_GET['idchappelle'])){?>value="<?=$element['nomcat']?>" <?php } ?>>
                        </div>
                        <?php if(isset($_GET['idchappelle']))
                            {
                                ?> 
                                    <div class="col-xl-6 col-lg-6 col-md-6 mt-4 col-sm-6 p-3 ">
                                        <input  onclick=" return confirm('Voulez-vous vraiment Modifier ?')" type="submit" name="valider" class="btn btn-dark w-100" value="Modifier">                                        
                                    </div>                                        
                                    <div class="col-xl-6 col-lg-6 col-md-6 mt-4 col-sm-6 p-3 ">                                        
                                        <a href="categoriProduit.php" class="btn btn-danger w-100">Annuler</a>
                                    </div>
                                <?php 
                            } 
                            else 
                            { 
                                ?>
                                    <div class="col-12 p-3">
                                        <input type="submit" class="btn btn-dark w-100" name="Enregistrer" value="Enregistrer">
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
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                                      
                            $req=$con->prepare("SELECT * FROM `categorie`");
                            $req->execute();
                            $numero=0;
                            while($categorie=$req->fetch())
                            {
                                $numero++; 
                                ?>
                                    <tr>
                                        <th><?php echo $numero?></th>
                                        <td><?php echo $categorie['1']?></td>
                                        <td>
                                            <a href="categoriProduit.php?idchappelle=<?php echo $categorie['0']?>" class="btn btn-sm btn-dark"> 
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm ">
                                                <i class="bi bi-trash-fill"></i>
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