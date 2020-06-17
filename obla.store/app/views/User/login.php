<div class="container login_">
    <h1>Вход</h1>
    <form method="post" action="user/login" id="login" role="form" data-toggle="validator">
        <div class="form-group has-feedback">
            <label for="email">email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="email" required>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class="form-group has-feedback">
            <label for="pasword">Password</label>
            <input type="password" name="password" class="form-control" id="pasword" placeholder="Password" required>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <button type="submit" class="btn btn-default px-4">Вход</button>
    </form>
</div>