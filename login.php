<?php
include('connexion/connexion.php');
if (isset($_GET['Admin'])) {
    $fonction = "Admin";
    $_SESSION['User'] = $fonction;
} elseif (isset($_GET['ceo'])) {
    $fonction = "ceo";
    $_SESSION['User'] = $fonction;
} elseif (isset($_GET['Agent'])) {
    $fonction = "Agent";
    $_SESSION['User'] = $fonction;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    body {
        min-height: 100vh;
    }
</style>
<?php require_once('views/style.php') ?>

<body class="d-flex justify-content-center align-items-center px-3">
    <div class="fixed-top container text-center pt-4">
        <span></span>
    </div>
    <form method="POST" action="models/login.php" class="col-xl-4 col-lg-5 col-sm-7 col-md-6 card p-4">
        <div class="row">
            <div class="col-10">

            </div>
            <div class="col-2">
                <a href="index.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
            </div>
        </div>
        <h5 class="title text-center">Connexion</h5>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="">Adresse e-mail</label>
                <input type="text" class="form-control" placeholder="Ex: example@Eka.com" name="username">
            </div>
            <div class="col-12 mb-3">
                <label for="">Mot de passe</label>
                <input type="password" class="form-control" placeholder="Ex: *****" name="password">
            </div>
            <?php
            if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) { ?>
                <div class="col-xl-12 mt-3">
                    <div class="alert-info alert text-center"><?= $_SESSION['msg'] ?></div>
                </div>
            <?php }
            #Cette ligne permet de vider la valeur qui se trouve dans la session message
            unset($_SESSION['msg']);
            ?>
            <div class="col-12 mb-3">
                <input type="submit" class="form-control btn-dark btn" name="connect" value="Se connecter">
            </div>
            <div class="col-12 mb-3 d-flex justify-content-between">
                <label><input type="checkbox" class="form-check-input"> Se souvenir de moi </label>
                <!-- <a href="">Mot de passe oublé ?</a> -->
            </div>
        </div>
    </form>
    <div class="fixed-bottom container text-center pb-4">
        <span>Droit réservé</span>
    </div>
</body>

</html>