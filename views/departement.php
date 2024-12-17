<?php
# Se connecter à la BD
require_once('../connexion/connexion-Temp.php');
# Selection Querry
require_once('../models/select/select-departement.php');

if(isset($_GET["idModif"])){
    $id=$_GET["idModif"];
    $titre="Modifier departement";
    $btn="Modifier";
    $getdepart=$connexion->prepare("SELECT * FROM departement where iddepartement=?");
    $getdepart->execute([$id]);
    $Afficat=$getdepart-> fetch();
    $action="../traitement/modifier_departement.php?idModif=$id";

}else{
    $titre="Ajouter_departement";
    $btn="Enregistrer";
    $action="../traitement/ajouter_departement.php";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Département</title>
    <?php require_once('style.php'); ?>

</head>

<body>

    <!-- Appel de menues  -->
    <?php require_once('aside.php') ?>

    <main id="main" class="main">
        <div class="row">
            <div class="col-12">
                <h4>Département</h4>
            </div>
            <!-- pour afficher les massage  -->

            <?php
            if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) { ?>
                <div class="col-xl-12 mt-3">
                    <div class="alert-info alert text-center"><?= $_SESSION['msg'] ?></div>
                </div>
            <?php }
            #Cette ligne permet de vider la valeur qui se trouve dans la session message
            unset($_SESSION['msg']);
            
            if (isset($_GET["NewDepartement"])) {
            ?>
                <!-- Le form qui enregistre les données  -->
                <div class="col-xl-12 ">
                    <form action="<?=$action?>" method="POST" class="shadow p-3">
                        <div class="row">
                            <h4 class="text-center"><?= $title ?></h4>
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Description <span class="text-danger">*</span></label>
                                <input required type="text" name="description" <?php if ( isset($_GET['idModif'])){?>value="<?=$Afficat['descriptions']?>"<?php } ?>class="form-control" placeholder="Entrez la description " >
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                <label for="">Dénomination <span class="text-danger">*</span></label>
                                <input required type="text" name="pseudonyme"<?php if ( isset($_GET['idModif'])){?>value="<?=$Afficat['descriptions']?>"<?php } ?> class="form-control" placeholder="entrer le departement " >
                            </div>                            

                            <?php if (isset($_GET['iddepartement'])) {
                            ?>
                                <div class="col-xl-6 col-lg-6 col-md-6 mt-4 col-sm-6 p-3 ">
                                    <input type="submit" name="valider" class="btn btn-dark w-100" value="Modifier">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 mt-4 col-sm-6 p-3 ">
                                    <a href="client.php" class="btn btn-danger w-100">Annuler</a>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">
                                    <input type="submit" name="valider" class="btn btn-dark w-100" value="<?= $btn ?>">
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </form>
                </div>
            <?php
            } else {
                
            ?>
                
            <?php
            }
            ?>
                

            <!-- La table qui affiche les données  -->
            <div class="col-xl-12 table-responsive px-3 card mt-4 px-4 pt-3">
                <h6 class="text-center">Listes des departements</h6><a href="departement.php?NewDepartement" class="btn btn-dark w-100">Nouveau Département</a>
                <table class="table table-borderless datatable ">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Description</th> 
                            <th>Pseudonyme</th>                           
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                              $req=$connexion->prepare("SELECT * FROM departement");
                              $req->execute(); $num=0;
                              while ($departement=$req->fetch()) {
                                $num++; 
                            ?>
                        <tr>
                            <!--<th scope="row">1</th> -->
                            <td><?php echo $num?></td>    
                            <td><?php echo $departement["descriptions"]?></td>
                            <td><?php echo $departement["pseudonyme"]?></td>                          
                            <td>
                                <a href="departement.php?NewDepartement&idModif=<?php echo $departement[0]?>" class="btn btn-dark btn-sm">
                                    <i class="bi bi-pencil-square">Modifier</i>
                                </a>
                                <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')" href="../traitement/supprimer_departement.php?idsuppr=<?php echo $departement[0]?>" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash3-fill">Supprimer</i>
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