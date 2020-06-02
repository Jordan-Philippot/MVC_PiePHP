<section class="container">
    <div class="row justify-content-center">

    </div>
</section>

<div class="row justify-content-center">
    <form method="POST" action="/MVC_PiePHP/registration" class="col-sm-4" id="registForm">
        <h5 class="offset-md-2 col-md-8 titleRegist">sign up to receive all the latest news </h5>
        <div class="form-group offset-md-2 col-md-8">
            <input type="text" name="prenom" class="form-control" placeholder="prenom" minlength="2" maxlength="30" id="prenom" required />
        </div>
        <div class="form-group offset-md-2 col-md-8">
            <input type="text" name="nom" class="form-control" placeholder="nom" minlength="2" maxlength="30" id="nom" required />
        </div>

        <div class="form-group offset-md-2 col-md-8">
            <input type="date" name="naissance" class="form-control" id="naissance" required />
        </div>

        <div class="form-group offset-md-2 col-md-8">
            <input type="email" name="email" class="form-control" placeholder="email" minlength="5" maxlength="50" id="email" required />
        </div>

        <div class="form-group offset-md-2 col-md-8">
            <input type="password" name="password" class="form-control" placeholder="mot de passe" minlength="3" maxlength="30" id="password" required />
        </div>

        <div class="form-group offset-md-2 col-md-8">
            <input type="password" name="passwordConfirm" class="form-control" placeholder="confirmation mot de passe" minlength="3" maxlength="30" id="passwordConfirm" required />
        </div>

        <div class="row justify-content-center p-4">
            <button type="submit" class="btn btn-primary col-sm-6" id="signUp"> SUBSCRIBE </button>
        </div>
    </form>
</div>