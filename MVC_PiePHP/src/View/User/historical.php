<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="container-fluid">
    <div class="welcomeCont">
        <span class="line"></span>
        <h6 class="welcome">
            <span>H</span><span>i</span><span>S</span><span>T</span><span>O</span><span>R</span><span>I</span><span>C</span><span>A</span><span>L</span>
        </h6>
    </div>
    <div class="offset-sm-2 col-sm-8">

        <hr class="welcomeBar">
        <?php for ($i = 0; $i < count($scope); $i++) : ?>
            <div class="row justify-content-center alert Onemovie">

                <form method="POST" action="/MVC_PiePHP/historicmovie" class="col-sm-12">
                    <input type="hidden" name="id" id="id" value='<?= $scope[$i]['id_film']; ?>'>
                    <input type="hidden" name="id_membre" id="id_membre" value='<?= $scope[$i]['id_membre']; ?>'>
                    <h5 class="titleMovie"> <button type="submit" class="noButton"><?= $scope[$i]['titre']; ?> </button></h5>
                </form>
            </div>
        <?php endfor; ?>
    </div>
</div>