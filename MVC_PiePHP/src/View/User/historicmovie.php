<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="container">

    <div class="welcomeCont">
        <span class="line"></span>
        <h6 class="welcome">
            <span>Y</span><span>o</span><span>u</span><span>R</span><span> </span><span>M</span><span>O</span><span>V</span><span>I</span><span>E</span>
        </h6>
    </div>

    <div class="row justify-content-center alert Onemovie">

        <div class="container-fluid flex">
            <h5 class="offset-sm-3 col-sm-12"> <?= $scope['titre']; ?></h5>
            <div class="offset-sm-2 return">
                <a href="/MVC_PiePHP/historical" class="btn btn-info"> RETURN </a>
            </div>
        </div>

        <div class="col-sm-12">
            <p class="resum"> <?= $scope['resum']; ?></p>
            <hr>
        </div>

        <div class="col-sm-12 detailsCont">
            <div class="nameDetails col-sm-6">
                <p> Year of production : </p>
            </div>
            <div class="details col-sm-6">
                <p><?= $scope['annee_prod']; ?></p>
            </div>
        </div>

        <div class="col-sm-12 detailsCont">
            <div class="nameDetails col-sm-6">
                <p>Duration :</p>
            </div>
            <div class="details col-sm-6">
                <p> <?= $scope['duree_min']; ?> min</p>
            </div>
        </div>

        <div class="col-sm-12 detailsCont">
            <div class="nameDetails col-sm-6">
                <p>Release date : </p>
            </div>
            <div class="details col-sm-6">
                <p><?= $scope['debut_affiche']; ?> </p>
            </div>
        </div>

        <div class="col-sm-12 detailsCont">
            <div class="nameDetails col-sm-6">
                <p>End date : </p>
            </div>
            <div class="details col-sm-6">
                <p><?= $scope['fin_affiche']; ?> </p>
            </div>
        </div>

        <div class="col-sm-12 detailsCont">
            <div class="nameDetails col-sm-6">
                <p> Kind : </p>
            </div>
            <div class="details col-sm-6">
                <p><?= $scope['nom_genre']; ?> </p>
            </div>
        </div>

        <?php if (isset($scope['nom_distrib'])) : ?>
            <div class="col-sm-12 detailsCont">
                <div class="nameDetails col-sm-6">
                    <p> Distribution : </p>
                </div>
                <div class="details col-sm-6">
                    <p><?= $scope['nom_distrib']; ?> </p>
                </div>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['users'])) : ?>
            <form method="POST" action="/MVC_PiePHP/deleteHistorical" class="col-sm-5"><br><br>
                <!-- <input type="text" name="avis" id="avis" class="form-control" placeholder="your opinion"> -->
                <input type="hidden" name="id_film" id="id_film" value='<?= $scope['id_film'] ?>'>
                <input type="hidden" name="id_membre" id="id_membre" value='<?= $_POST['id_membre'] ?>'>
                <button type="submit" class="btn btn-danger col-sm-12"> DELETE </button>
            </form>
        <?php endif; ?>

    </div>
</div>