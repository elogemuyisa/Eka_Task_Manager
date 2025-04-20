<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Eka_Consulting</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <style>
        .fonction a {
            text-decoration: none;           
        }
        .fonction {
            color: blue;
        }
        .fonction:hover {
            text-decoration: none;
            background-color: orange;
            transition: 0.5s ease-out;
        }
    </style>
    <?php require_once('views/style.php') ?>

</head>

<body>


    <main class="main d-flex justify-content-center align-items-center" id="main" style="min-height: 80vh;">
        <div class="row">
            <div class="col-lg-12 card shadow">
                <h4 class="text-center">Bienvue sur l'application de Eka_Consulting </h4>
                <div class="row text-center">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-8">
                        <img src="assets/img/logo/EKA_logo.png" alt="" height="140px">
                    </div>
                    <div class="col-lg-2">

                    </div>

                </div>
                <div class="row m-2 ">
                    <div class="col-lg-4 card fonction p-2">
                        <a href="login.php?Admin">
                            <h3 class="text-center bi bi-person"></h3>
                            <h4 class="text-center">Admin</h4>
                        </a>
                    </div>

                    <div class="col-lg-3 m-2 card fonction p-2">
                        <a href="login.php?ceo">
                            <h3 class="text-center bi bi-person"></h3>
                            <h4 class="text-center">CEO</h4>
                        </a>
                    </div>

                    <div class="col-lg-4 card fonction p-2">
                        <a href="login.php?Agent">
                            <h3 class="text-center bi bi-person"></h3>
                            <h4 class="text-center">Agents</h4>
                        </a>
                    </div>
                </div>
                <p class="text-center">
                    Avant d'acceder au systeme veillez specifier ici votre fonction. <br> celà nous permettra de vous
                    identifier.
                </p>
            </div>
        </div>
    </main>
</body>

</html>