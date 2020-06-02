<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="container-fluid">
    <div class="welcomeCont">
        <span class="line"></span>
        <h6 class="welcome">
            <span>M</span><span>V</span><span>C</span><span> </span><span>P</span><span>R</span><span>E</span><span>S</span><span>E</span><span>N</span><span>T</span>
        </h6>
    </div>
    <div class="row offset-sm-8">
        <form method="POST" action="/MVC_PiePHP/" class="col-sm-12">
            <input type="text" name="search" id="search" placeholder="All movies">
            <button type="submit" class="btn btn-info">Search </button>
        </form>
    </div>
    <div class="offset-sm-2 col-sm-8">
        <hr class="welcomeBar">

        <?php for ($i = 0; $i < count($scope); $i++) : ?>

            <div class="row justify-content-center alert Onemovie">
                <form method="POST" action="/MVC_PiePHP/movie" class="col-sm-12">
                    <input type="hidden" name="id" id="id" value='<?= $scope[$i]['id_film'] ?>'>
                    <h5 class="titleMovie"> <button type="submit" class="noButton"><?= $scope[$i]['titre']; ?> </button></h5>
                </form>
            </div>

        <?php endfor; ?>

    </div>
</div>