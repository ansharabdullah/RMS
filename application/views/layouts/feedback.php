<?php if ($feedback) { ?>
    <section id="main-content" style="margin-bottom: -100px">
        <section class="wrapper">
            <div class="row">
                <?php if ($feedback == 1) { ?>
                    <div class="alert alert-block alert-success fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Berhasil!</strong> <?php echo $pesan?>
                    </div>
                <?php } ?>

                <?php if ($feedback == 2) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error!</strong> <?php echo $pesan?>
                    </div>
                <?php } ?>
            </div>
        </section>
    </section>
<?php } ?>