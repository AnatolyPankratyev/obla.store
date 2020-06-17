<section class="container">
    <div class="container login_">
        <h1>Вход</h1>
        <?php if(isset($_SESSION['error'])): ?>
            <div class="container text-center">
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert_errors text-center">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($_SESSION['success'])): ?>
                    <div class="alert_success text-center">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?=ADMIN; ?>/user/login-admin" id="login" role="form" data-toggle="validator">
            <div class="form-group has-feedback">
                <label for="email">email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="email" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <button type="submit" class="btn btn-default px-4">Вход</button>
        </form>
    </div>
</section>