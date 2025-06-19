@include('partials.head')
<div class="container">
    <div class="row">
        <div class="col"></div>
        <form class="col-md-4 card login-form" method="post">
            @csrf
            <div class="vstack gap-3">
                <img src="favicon.svg" class="login-logo">
                <h4>Regisztráció</h4>
                <label>
                    <span>Email-cím</span>
                    <input name="email" class="form-control">
                </label>
                <label>
                    <span>Telefonszám</span>
                    <input name="phone_number" class="form-control">
                </label>
                <label>
                    <span>Lakcím</span>
                    <input name="address" class="form-control">
                </label>
                <label>
                    <span>Jelszó</span>
                    <input name="password" type="password" class="form-control">
                </label>
                <label>
                    <span>Jelszó megismétlése</span>
                    <input name="password_confirmation" type="password" class="form-control">
                </label>
                <button class="btn btn-primary">Regisztráció</button>
                <span>Már van fiókod? <a href="login">Jelentkezz be</a></span>
            </div>
        </form>
        <div class="col"></div>
    </div>
</div>
