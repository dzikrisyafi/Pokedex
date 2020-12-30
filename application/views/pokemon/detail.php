<div class="container">
    <div class="row" style="margin-top: 110px;">
        <div class="col-md-3">
            <figure class="figure" style="background-color:<?= $pokemon['bgcolor'] ?>; padding: 5px; border-radius: 20px;">
                <div class="text-center">
                    <img src="<?= base_url('assets/img/pokemon/') . $pokemon['image']; ?>" class="figure-img" style="width:100%;">
                </div>
            </figure>
            <div class="row justify-content-center">
                <?php foreach ($types as $type) : ?>
                    <div class="col-md-6">
                        <div class="border text-center text-white font-weight-bold" style="background-color: <?= $type['bgcolor']; ?>; padding: 5px; border-radius: 10px;">
                            <?= $type['name'] ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-7 ml-4">
            <h2 class="primary-color font-weight-bold" style="font-size: 38px;"><?= $pokemon['pname']; ?></h2>
            <p class="primary-color" style="font-size: 18px;"><?= $pokemon['pdesc']; ?></p>
            <div class="row pt-2">
                <div class="col-md-4">
                    <h4 class="primary-color font-weight-bold">Kategori</h4>
                    <p class="primary-color" style="font-size: 18px;"><?= $pokemon['cname'] ?></p>
                </div>
                <div class="col-md-4">
                    <h4 class="primary-color font-weight-bold">Kemampuan</h4>
                    <p class="primary-color" style="font-size: 18px;"><?= $pokemon['aname'] ?>
                        <span data-container="body" data-toggle="popover" data-placement="right" data-content="<?= $pokemon['adesc']; ?>" style="cursor: pointer;">
                            <i class="far fa-question-circle"></i>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>