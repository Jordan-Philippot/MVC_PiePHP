<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<div class="container">
    <div class="row justify-content-center alert Onemovie">
        <form method="POST" action="/MVC_PiePHP/update" class="col-sm-12" id="profil">
            <h5 class="col-sm-12"> edit profil </h5>
            <div class="col-sm-12">
                <p class="resum"> <?= $_SESSION['users']['prenom'] . ' ' .  $_SESSION['users']['nom']; ?></p>
                <hr>
            </div>

            <div class="offset-sm-1 col-sm-10">
                <input type="email" name="email" class="form-control" placeholder="email" minlength="5" maxlength="50" id="email" />
            </div>

            <div class="offset-sm-1 col-sm-10">
                <input type="text" name="ville" class="form-control" placeholder="city" minlength="2" maxlength="50" id="ville" />
            </div>

            <div class="offset-sm-1 col-sm-10">
                <input type="text" name="adresse" class="form-control" placeholder="adress" minlength="5" maxlength="50" id="adresse" />
            </div>

            <div class="offset-sm-1 col-sm-10">
                <input type="text" name="cpostal" class="form-control" placeholder="postal code" minlength="5" maxlength="50" id="cpostal" />
            </div>

            <div class="offset-sm-1 col-sm-10">
                <input type="text" name="pays" class="form-control" placeholder="country" minlength="5" maxlength="50" id="pays" />
            </div>

            <div class="offset-sm-1 col-sm-10">
                <input type="password" name="password" class="form-control" placeholder="mot de passe" minlength="3" maxlength="30" id="password" />
            </div>

            <div class="row justify-content-center offset-sm-2 col-sm-8">
                <button type="submit" class="btn btn-primary col-sm-10" id="saveChange"> SAVE CHANGES </a>
            </div>
        </form>
        <div class="row justify-content-center">
            <form method="POST" action="/MVC_PiePHP/delete">
                <button type="submit" class="btn btn-danger">DESACTIVATE</button>
            </form>
        </div>
    </div>
</div>