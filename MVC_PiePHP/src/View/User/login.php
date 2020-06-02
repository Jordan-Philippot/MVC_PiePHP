<div class="row justify-content-center">

    <form method="POST" action="/MVC_PiePHP/connect" class="col-sm-4" id="connectForm">
        <h4 class="offset-md-2 col-sm-8 titleRegist"> Login </h4>

        <div class="form-group offset-md-2 col-md-8">
            <input type="email" name="email" class="form-control" placeholder="email" minlength="4" maxlength="30" id="email" required />
        </div>

        <div class="form-group offset-md-2 col-md-8">
            <input type="password" name="password" class="form-control" placeholder="password" minlength="2" maxlength="30" id="password" required />
        </div>

        <div class="row justify-content-center p-4">
            <button type="submit" class="btn btn-primary col-sm-6" id="loginSubmit"> LOGIN </button>
        </div>
    </form>
</div>