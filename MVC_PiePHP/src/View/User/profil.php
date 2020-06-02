<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<div class="container">
    <div class="welcomeCont">
        <span class="line"></span>
        <h6 class="welcome">
            <span>P</span><span>R</span><span>O</span><span>F</span><span>I</span><span>L</span>
        </h6>
    </div>
    <div class="row justify-content-center alert Onemovie">
        <div class="col-sm-10">

            <h5 class="col-sm-12"> profil</h5>

            <div class="col-sm-12">
                <p class="resum"> <?= $scope['prenom'] . ' ' .  $scope['nom']; ?></p>
                <hr>
            </div>

            <div class="col-sm-12 detailsCont">
                <div class="nameDetails col-sm-6">
                    <p> Born on: </p>
                </div>
                <div class="details col-sm-6">
                    <?php $date = explode(" ", $scope['date_naissance']);
                    $date = $date[0]; ?>
                    <p><?= $date ?> </p>
                </div>
            </div>

            <div class="col-sm-12 detailsCont">
                <div class="nameDetails col-sm-6">
                    <p> Email : </p>
                </div>
                <div class="details col-sm-6">
                    <p><?= $scope['email'] ?> </p>
                </div>
            </div>

            <?php if ($scope['adresse'] != NULL) : ?>
                <div class="col-sm-12 detailsCont">
                    <div class="nameDetails col-sm-6">
                        <p> Adress : </p>
                    </div>
                    <div class="details col-sm-6">
                        <p><?= $scope['adresse'] ?> </p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($scope['cpostal'] != NULL) : ?>
                <div class="col-sm-12 detailsCont">
                    <div class="nameDetails col-sm-6">
                        <p> Postal code : </p>
                    </div>
                    <div class="details col-sm-6">
                        <p><?= $scope['cpostal'] ?> </p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($scope['ville'] != NULL) : ?>
                <div class="col-sm-12 detailsCont">
                    <div class="nameDetails col-sm-6">
                        <p> City : </p>
                    </div>
                    <div class="details col-sm-6">
                        <p><?= $scope['ville'] ?> </p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($scope['pays'] != NULL) : ?>
                <div class="col-sm-12 detailsCont">
                    <div class="nameDetails col-sm-6">
                        <p> Country : </p>
                    </div>
                    <div class="details col-sm-6">
                        <p><?= $scope['pays'] ?> </p>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-sm-12 detailsCont">
                <div class="nameDetails col-sm-6">
                    <p> Status : </p>
                </div>
                <?php if ($scope['etat'] == '0') : ?>
                    <div class="details col-sm-6">
                        <p>Member </p>
                    </div>
                <?php endif; ?>
                <?php if ($scope['etat'] == '1') : ?>
                    <div class="details col-sm-6">
                        <p>Prenium Member </p>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($scope['date_inscription'] != NULL) : ?>
                <div class="col-sm-12 detailsCont">
                    <div class="nameDetails col-sm-6">
                        <p> Registered since : </p>
                    </div>
                    <div class="details col-sm-6">
                        <?php $date = explode(" ", $scope['date_inscription']);
                        $date = $date[0]; ?>
                        <p><?= $date ?> </p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($scope['date_dernier_film'] != NULL) : ?>
                <div class="col-sm-12 detailsCont">
                    <div class="nameDetails col-sm-6">
                        <p> Last session : </p>
                    </div>
                    <div class="details col-sm-6">
                        <?php $date = explode(" ", $scope['date_dernier_film']);
                        $date = $date[0]; ?>
                        <p><?= $date ?> </p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($scope['date_abo'] != NULL) : ?>
                <div class="col-sm-12 detailsCont">
                    <div class="nameDetails col-sm-6">
                        <p> Subscribed since : </p>
                    </div>
                    <div class="details col-sm-6">
                        <?php $date = explode(" ", $scope['date_abo']);
                        $date = $date[0]; ?>
                        <p><?= $date ?> </p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($scope['id_dernier_film'] != NULL) : ?>
                <div class="col-sm-12 detailsCont">
                    <div class="nameDetails col-sm-6">
                        <p> Last movies : </p>
                    </div>
                    <div class="details col-sm-6">
                        <p><?= $scope['titre'] ?> </p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($scope['id_abo'] != NULL && $scope['id_abo'] > 0) : ?>
                <div class="col-sm-12 detailsCont">
                    <div class="nameDetails col-sm-6">
                        <p> Subscription : </p>
                    </div>
                    <div class="details col-sm-6">
                        <p><?= $scope['nom_abonnement'] ?> </p>
                    </div>
                </div>
            <?php endif; ?>


            <div class="row justify-content-center col-sm-12 my-4">
                <a href="/MVC_PiePHP/edit" class="btn btn-primary col-sm-6 m-4"> EDIT </a>
                <a href="/MVC_PiePHP/subscription" class="btn btn-info col-sm-6 m-4"> SUBSCRIPTION </a>
            </div>



            <form method="POST" action="/MVC_PiePHP/prenium" class="col-sm-6" id="profil">
                <button type="submit" class="btn btn-success preniumBtn">PRENIUM</button>
            </form>

        </div>
    </div>
</div>