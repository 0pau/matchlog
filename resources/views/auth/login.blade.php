@include('partials.head')
<div class="container">
    <div class="row">
        <div class="col"></div>
        <form class="col-md-4 card login-form" method="post">
            @csrf
            <div class="vstack gap-3">
                <img src="favicon.svg" class="login-logo">
                <h4>Jelentkezz be MatchLog fiókodba!</h4>
                <label>
                    <span>Email-cím</span>
                    <input name="email" class="form-control">
                </label>
                <label>
                    <span>Jelszó</span>
                    <input name="password" type="password" class="form-control">
                </label>
                <button class="btn btn-primary">Bejelentkezés</button>
                <span>Még nincs fiókod? <a href="register">Regisztráció</a></span>
            </div>
        </form>
        <div class="col"></div>
    </div>
</div>
