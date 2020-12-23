<nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color: white;">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>"><span>Poke</span>dex.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <form class="form-inline ml-auto">
                <?php if ($this->session->userdata('email')) : ?>
                    <a href="<?= base_url('auth/logout'); ?>" class="btn btn-link">
                        Logout
                    </a>
                <?php else : ?>
                    <a href="<?= base_url('auth/login'); ?>" class="btn btn-link mr-3">
                        Sign In
                    </a>
                    <a href="<?= base_url('auth/register'); ?>" class="btn btn-warning">
                        Sign Up
                    </a>
                <?php endif; ?>
            </form>
        </div>
    </div>
</nav>