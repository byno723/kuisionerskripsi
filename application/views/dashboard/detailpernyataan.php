<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Detail pernyataan</h3>

        <?= $this->session->flashdata('message'); ?>
        <div class="container-fluid mt">
            <h4 class="text-center">Edit Daftar Pernyataan</h4>
            <form method="POST" action="<?= base_url('home/editpernyataan'); ?>">
                <div class="form-horizontal style-form">
                    <input type="hidden" name="id_pernyataan" value="<?= $pernyataan['id_pernyataan']; ?>">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Isi Pernyataan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="isi" rows="3"><?= $pernyataan['isi']; ?></textarea>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">kategori </label>
                        <div class="col-sm-10">
                            <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                                <option value="performance">performance</option>
                                <option value="controls">controls</option>
                                <option value="service">service</option>
                                <option value="eficiency">eficiency</option>
                                <option value="information">information</option>
                                <option value="economics">economics</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">

                        <div class="col-sm-12">

                            <button type="submit" class="btn btn-primary btn btn-block">Submit</button>

                        </div>
                    </div>


                </div>
            </form>
        </div>

    </section>
    <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->