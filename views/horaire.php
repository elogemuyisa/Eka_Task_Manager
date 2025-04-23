<?php
# Se connecter à la BD
require_once('../connexion/connexion-Temp.php');
# Selection Querries
require_once("../models/select/select-horaire.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Terrain</title>
    <?php require_once('style.php'); ?>

</head>

<body>

    <!-- Appel de menues  -->
    <?php require_once('aside.php') ?>

    <main id="main" class="main">

        <div class="row">
            <div class="col-12">
                <h4>Terrain</h4>
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
            ?>

            <!-- La table qui affiche les données  -->
            <div class="col-xl-12 table-responsive px-3 card mt-4 px-4 pt-3">
                <h6 class="text-center">Agent <b><?= $_SESSION['noms']; ?></b> Vous etes affecter aux terrains suivants</h6>
                <table class="table table-borderless datatable ">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>lieu</th>
                            <th>Partenaire</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num = 0;
                        while ($ress = $getTerrain->fetch()) {
                            $num = $num + 1 ?>
                            <tr>
                                <th scope="row"><?= $num ?></th>
                                <td><?= $ress["date"] ?></td>
                                <td><?= $ress["description"] ?></td>
                                <td><?= $ress["lieu"] ?></td>
                                <td><?= $ress["Denomination"] ?></td>
                            </tr>
                    </tbody>
                <?php
                        }
                ?>
                </table>
            </div>
        </div>

    </main><!-- End #main -->
    <?php require_once('script.php') ?>

</body>

</html>