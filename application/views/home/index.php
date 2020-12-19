<div class="container">
    <!-- Search -->
    <section id="search">
        <div class="row justify-content-center" style="margin-top: 130px;">
            <div class="col-md-7">
                <h1 class="text-center mb-5">
                    Cari Pokémon Favoritmu
                </h1>
                <div class="input-group input-group-lg mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-0" id="basic-addon1" style="font-size: 16px;">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control border-0" placeholder="Cari Pokemon...">
                </div>
                <div class="text-center" style="color: #ccc;">
                    <small class="mr-2">Greninja</small>
                    <small class="mr-2">Lucario</small>
                    <small class="mr-2">Mimikyu</small>
                    <small class="mr-2">Charizard</small>
                    <small>Umbreon</small>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Search -->

    <!-- List Pokemon -->
    <section id="pokemon" style="padding-top: 80px;">
        <div class="row">
            <div class="col-md">
                <figure class="figure rounded" style="background-color: #A3D0A3; padding: 5px;">
                    <div class="text-center">
                        <img src="<?= base_url('assets/') ?>img/bulbasaur.png" class="figure-img rounded" style="width:70%;">
                    </div>
                    <figcaption class="figure-caption font-weight-bold text-center pb-2" style="font-size: 16px;">Bulbasaur</figcaption>
                </figure>
            </div>
            <div class="col-md">
                <figure class="figure rounded" style="background-color: #8BC569; padding: 5px;">
                    <div class="text-center">
                        <img src="<?= base_url('assets/') ?>img/caterpie.png" class="figure-img rounded" style="width:70%;">
                    </div>
                    <figcaption class="figure-caption font-weight-bold text-center pb-2" style="font-size: 16px;">Caterpie</figcaption>
                </figure>
            </div>
            <div class="col-md">
                <figure class="figure rounded" style="background-color: #F1B681; padding: 5px;">
                    <div class="text-center">
                        <img src="<?= base_url('assets/') ?>img/charmander.png" class="figure-img rounded" style="width:70%;">
                    </div>
                    <figcaption class="figure-caption font-weight-bold text-center pb-2" style="font-size: 16px;">Charmander</figcaption>
                </figure>
            </div>
            <div class="col-md">
                <figure class="figure rounded" style="background-color: #F8C7CB; padding: 5px;">
                    <div class="text-center">
                        <img src="<?= base_url('assets/') ?>img/clefairy.png" class="figure-img rounded" style="width:70%;">
                    </div>
                    <figcaption class="figure-caption font-weight-bold text-center pb-2" style="font-size: 16px;">Clefairy</figcaption>
                </figure>
            </div>
            <div class="col-md">
                <figure class="figure rounded" style="background-color: #E7D3E7; padding: 5px;">
                    <div class="text-center">
                        <img src="<?= base_url('assets/') ?>img/ekans.png" class="figure-img rounded" style="width:70%;">
                    </div>
                    <figcaption class="figure-caption font-weight-bold text-center pb-2" style="font-size: 16px;">Ekans</figcaption>
                </figure>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md">
                <figure class="figure rounded" style="background-color: #FCB2CF; padding: 5px;">
                    <div class="text-center">
                        <img src="<?= base_url('assets/') ?>img/jigglypuff.png" class="figure-img rounded" style="width:70%;">
                    </div>
                    <figcaption class="figure-caption font-weight-bold text-center pb-2" style="font-size: 16px;">Jigglypuff</figcaption>
                </figure>
            </div>
            <div class="col-md">
                <figure class="figure rounded" style="background-color: #AFCAF8; padding: 5px;">
                    <div class="text-center">
                        <img src="<?= base_url('assets/') ?>img/nidorana.png" class="figure-img rounded" style="width:70%;">
                    </div>
                    <figcaption class="figure-caption font-weight-bold text-center pb-2" style="font-size: 16px;">Nidorina</figcaption>
                </figure>
            </div>
            <div class="col-md">
                <figure class="figure rounded" style="background-color: #C89DC5; padding: 5px;">
                    <div class="text-center">
                        <img src="<?= base_url('assets/') ?>img/nidorano.png" class="figure-img rounded" style="width:70%;">
                    </div>
                    <figcaption class="figure-caption font-weight-bold text-center pb-2" style="font-size: 16px;">Nidorino</figcaption>
                </figure>
            </div>
            <div class="col-md">
                <figure class="figure rounded" style="background-color: #96C575; padding: 5px;">
                    <div class="text-center">
                        <img src="<?= base_url('assets/') ?>img/oddish.png" class="figure-img rounded" style="width:70%;">
                    </div>
                    <figcaption class="figure-caption font-weight-bold text-center pb-2" style="font-size: 16px;">Oddish</figcaption>
                </figure>
            </div>
            <div class="col-md">
                <figure class="figure rounded" style="background-color: #F7F2B9; padding: 5px;">
                    <div class="text-center">
                        <img src="<?= base_url('assets/') ?>img/pidgey.png" class="figure-img rounded" style="width:70%;">
                    </div>
                    <figcaption class="figure-caption font-weight-bold text-center pb-2" style="font-size: 16px;">Pidgey</figcaption>
                </figure>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-4 pb-2">
            <div class="col-md-2">
                <button class="btn btn-warning btn-block font-weight-bold text-white">Load More</button>
            </div>
        </div>
    </section>
    <!-- End of List Pokemon-->
</div>