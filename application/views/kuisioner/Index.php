<section class="wrapper site-min-height">

    <div class="row justify-content-center">
        <div class="col-md-7">
            <?= $this->session->flashdata('message'); ?>

            <div class="form-panel px-5">
                <h4 class="mb text-center">Formulir Kuisioner </h4>
                <form class="form-horizontal style-form" method="post" action="<?= base_url('kuisioner/simpan'); ?>">

                    <div class="form-group">

                        <div class="col-lg-10">

                            <?php
                            $i = 1;
                            foreach ($tanya as $q) :

                            ?>
                                <p class="form-control-static text-primary"><?= $i . "." . " " . $q['isi']; ?></p>

                                <input type="hidden" value="<?php echo $this->session->userdata('id_responden'); ?>" name="id_responden<?= $i; ?>">


                                <?php
                                for ($j = 1; $j <= 5; $j++) {
                                ?>
                                    <label class="radio-inline text-danger"><input type="radio" value="<?= $j; ?>" name="hasil<?php echo $i; ?>" checked><?= $j; ?></label>

                                <?php
                                }
                                ?>
                                <hr>
                                <input type="hidden" name="id_pernyataan<?= $i; ?>" value="<?= $q['id_pernyataan']; ?>">

                            <?php $i++;
                            endforeach; ?>


                            <input type="hidden" name="banyak" value="<?php echo ($i - 1); ?>">

                        </div>
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-danger btn-block" value="Submit">
                    </div>

                </form>
            </div>
        </div>
        <!-- col-lg-12-->
    </div>



</section>