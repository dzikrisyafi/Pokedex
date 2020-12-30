<div class="container-fluid">
    <div class="row" style="margin-bottom: -10px;">
        <div class="col-sm-5 login-section-wrapper">
            <div class=" login-wrapper my-auto">
                <h1 class="login-title primary-color">Sign up</h1>
                <form method="POST" action="<?= base_url('auth/register'); ?>" novalidate>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email@example.com" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger">', "</small>"); ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password1" id="password1" class="form-control" placeholder="Enter your passsword">
                        <?= form_error('password1', '<small class="text-danger">', "</small>"); ?>
                    </div>
                    <div class="form-group mb-4">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm your passsword">
                        <?= form_error('password2', '<small class="text-danger">', "</small>"); ?>
                    </div>
                    <small class="float-right mb-4">
                        <a href="<?= base_url('auth/login'); ?>" style="color: #ffc107; text-decoration: underline">Already have account? Sign in</a>
                    </small>
                    <button name="login" id="login" class="btn btn-block text-white font-weight-bold" style="background-color: #F4DC26;" type="submit">Sign up</button>
                </form>
            </div>
        </div>
        <div class="col-sm-7 px-0 d-none d-sm-block">
            <img src="<?= base_url('assets/'); ?>img/bg1.png" class="login-img">
        </div>
    </div>
</div>