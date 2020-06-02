<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> MVC_PiePHP </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="webroot/css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&display=swap" rel="stylesheet">
</head>

<body>
    <img class="background" src="./webroot/assets/flamme.jpg">
    <header id="Menu1" class="container-fluid">
        <div class="row justify-content-center box">
            <nav class="navbar navbar-expand-sm ">
                <a class="navbar-brand" href="/MVC_PiePHP/">
                    <h2 class="d-inline-block align-middle"> cinéma mvc </h2>
                </a>
                <!--               TOGGLER/COLLAPSIBLE BUTTON                -->
                <div class="togglerCont d-block d-md-none">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <!--                     NAVBAR LINKS                        -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/MVC_PiePHP/"> home </a></li>
                        <li class="nav-item"><a class="nav-link" href="/MVC_PiePHP/allKind"> movies </a></li>

                        <!--               DROPDOWN                           -->
                        <?php if (isset($_SESSION['users'])) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="/MVC_PiePHP/" id="navbardrop" data-toggle="dropdown"> members </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/MVC_PiePHP/historical"> historical </a>
                                    <a class="dropdown-item" href="/MVC_PiePHP/deconnection"> deconnection </a>
                                    <a class="dropdown-item" href="/MVC_PiePHP/profil"> profil </a>
                                    <a class="dropdown-item" href="/MVC_PiePHP/subscription"> subscription </a>
                                </div>
                            </li>
                        <?php endif; ?>
                        <?php if (empty($_SESSION['users'])) : ?>
                            <li class="nav-item"><a class="nav-link" href="/MVC_PiePHP/register">register</a></li>
                            <li class="nav-item"><a class="nav-link" href="/MVC_PiePHP/login">connection</a></li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['users'])) : ?>
                            <li class="nav-item flex">
                                <div>
                                    <div class="greenPointHead"></div>
                                    <div class="greenPoint"></div>
                                </div>
                                <p class="connectedHead"> connected </p>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--                                 WELCOME                           -->


    <!--  ////////////////////////////////////////////        VIEW       /////////////////////////////////////////////////////////////////////// -->



    <div class="root row-justify-content">
        <?= $view ?>
    </div>


    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <!--                               SCRIPT                               -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenLite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/plugins/CSSPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
    <script src="webroot/js/script.js"></script>
    <script src="webroot/js/errors.js"></script>
</body>

</html>