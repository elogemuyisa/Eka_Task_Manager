<?php
# Se connecter à la BD
require_once('../connexion/connexion-Temp.php');
# Selection Querries
require_once("../models/select/select-Sortie.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Profil</title>
    <?php require_once('style.php'); ?>

</head>

<body>

    <!-- Appel de menues  -->
    <?php require_once('aside.php') ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="<?php if (isset($_SESSION['image'])) {
                                            print '../assets/img/profiles/' . $_SESSION['image'];
                                        } ?>" alt="Profile" class="rounded-circle">
                            <h2><?= $_SESSION['noms']; ?></h2>
                            <h3><?= $_SESSION['fonction']; ?></h3>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Changer de profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer le mot de Passe</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-edit pt-3 active" id="profile-edit">
                                    
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
                                    <!-- Profile Edit Form -->
                                    <form action="../models/updat/Update-profil-post.php" method="POST" enctype="multipart/form-data">
                                        <div class="row mb-3 ">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Photo de Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="<?php if (isset($_SESSION['image'])) {
                                                                print '../assets/img/profiles/' . $_SESSION['image'];
                                                            } ?>" alt="Profile">
                                                <?php
                                                if (isset($_GET['newProfil'])) {
                                                ?>
                                                    <div class="col-xl-12 col-lg-12 col-md-12  col-sm-6 p-3">
                                                        <label for="">Photo de profil<span class="text-danger">*</span></label>
                                                        <input class="form-control" type="file" name="picture" id="formFile" placeholder="Aucun fichier">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                                            <div class="text-center">
                                                                <a href="profil.php" class="btn btn-danger btn-sm w-100">Annuler </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 p-3">
                                                            <div class="text-center">
                                                                <button type="submit" name="valider" class="btn btn-dark btn-sm w-100">Enregister </button>
                                                            </div>
                                                        </div>
                                                    </div>


                                                <?php
                                                } else {
                                                ?>
                                                    <div class="pt-2">
                                                        <a href="profil.php?newProfil" class="btn btn-dark btn-sm" title="Upload new Photo de Profile"><i class="bi bi-upload"></i> Choisir</a>
                                                    </div>
                                                <?php
                                                }

                                                ?>

                                            </div>
                                        </div>


                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form Action="" method="" enctype="multipart/form-data">

                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control" id="currentPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control" id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Eka_Consulting</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="">Lad_77</a>
        </div>
    </footer><!-- End Footer -->
    <?php require_once('script.php') ?>

</body>

</html>