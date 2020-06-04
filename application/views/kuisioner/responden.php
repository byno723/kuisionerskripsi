<section class="wrapper site-min-height">

    <div class="row justify-content-center">
        <div class="col-md-7 ">
            <div class="form-panel px-5">
                <h4 class="mb text-center">Formulir Data Diri</h4>
                <form class="form-horizontal style-form" method="post" action="<?= base_url('kuisioner/responden'); ?>">
                    <div class="form-group">

                        <label class="col-sm-2 col-sm-2 control-label">Nama lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_responden">
                            <?= form_error('nama_responden', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Pekerjaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pekerjaan">
                            <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Usia</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="umur">
                            <?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jenkel">
                                <option value="Laki laki">Laki Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
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