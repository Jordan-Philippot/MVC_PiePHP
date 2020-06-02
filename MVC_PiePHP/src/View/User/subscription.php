<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<div class="container">
    <div class="welcomeCont">
        <span class="line"></span>
        <h6 class="welcome">
            <span>S</span><span>U</span><span>B</span><span>S</span><span>C</span><span>R</span><span>I</span><span>P</span><span>T</span><span>I</span><span>O</span><span>N</span>
        </h6>
    </div>
    <div class="row justify-content-center alert Onemovie">
        <div class="col-sm-10">

            <h5 class="col-sm-12"> subscription</h5>

            <div class="col-sm-12">
                <p class="resum"> <?= $scope['prenom'] . ' ' .  $scope['nom']; ?></p>
                <hr>
            </div>
            <div class="row justify-content-center">
                <h6>No obligation, free termination</h6>
            </div>

            <div class="col-sm-12 detailsCont">
                <div class="nameDetails col-sm-6">
                    <p> Current subscription : </p>
                </div>
                <?php if ($scope['id_abo'] != NULL && $scope['id_abo'] > 0) : ?>
                    <div class="details col-sm-6">
                        <p><?= $scope['nom_abonnement'] ?> </p>
                    </div>
                <?php else : ?>
                    <div class="details col-sm-6">
                        <p> No subscribed </p>
                    </div>
                <?php endif; ?>
            </div>
            <form action="/MVC_PiePHP/subscribed" method="POST">
                <div class="row justify-content-center">
                    <select name="id_abo" id="id_abo">
                        <option value="">Change subscription</option>
                        <option value="1">VIP</option>
                        <option value="2">Gold</option>
                        <option value="3">Classic</option>
                        <option value="4">Pass Day</option>
                        <option value="0">unsubscribe</option>
                    </select>
                </div>


                <div class="row justify-content-center offset-sm-2 col-sm-8 my-4">
                    <button type="submit" class="btn btn-primary col-sm-12"> EDIT </a>
                </div>
            </form>
        </div>
    </div>
</div>