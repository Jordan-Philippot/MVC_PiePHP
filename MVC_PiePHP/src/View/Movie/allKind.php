<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="container-fluid">
    <div class="welcomeCont">
        <span class="line"></span>
        <h6 class="welcome">
            <span>A</span><span>L</span><span>L</span><span> </span><span>K</span><span>I</span><span>N</span><span>D</span><span>S</span>
        </h6>
    </div>
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <?php for ($i = 0; $i < count($scope); $i++) : ?>

                <div class="alert oneKind col-sm-4">
                    <form method="POST" action="/MVC_PiePHP/kindMovies">
                        <input type="hidden" name="nom" id="nom" value='<?= $scope[$i]['nom'] ?>'>
                        <h5 class="titleMovie"> <button type="submit" class="noButton"><?= $scope[$i]['nom']; ?> </button></h5>
                    </form>
                </div>

            <?php endfor; ?>
        </div>
    </div>
</div>