<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="container">
    <div class="welcomeCont">
        <span class="line"></span>
        <h6 class="welcome">
            <span>M</span><span>O</span><span>V</span><span>I</span><span>E</span>
        </h6>
    </div>
    <div class="row justify-content-center alert Onemovie">
        <div class="container-fluid flex">
            <h5 class="offset-sm-3 col-sm-12"> <?= $scope['titre']; ?></h5>
            <form action="/MVC_PiePHP/kindMovies" method="POST">
                <input type="hidden" name="nom" id="nom" value="<?= $_POST['nom'] ?>">
                <button type="submit" class="btn btn-info return"> RETURN </submit>
            </form>
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
            <form method="POST" action="/MVC_PiePHP/addHistorical"><br><br>
                <button type="submit" class="btn btn-info col-sm-12"> ADD HISTORICAL </button>
                <input type="text" name="avis" id="avis" class="form-control" placeholder="your opinion">
                <input type="hidden" name="idAdd" id="idAdd" value='<?= $scope['id_film'] ?>'>
                <!-- <input type="hidden" name="id_membre" id="id_membre" value='<?= $_SESSION['users']['id_membre']; ?>'> -->
            </form>
        <?php endif; ?>

    </div>
</div>