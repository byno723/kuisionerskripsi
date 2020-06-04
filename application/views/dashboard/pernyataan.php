<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Administrator</h3>
        <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-primary mb-4">Tambah Data Pernyataan</a>

        <?= $this->session->flashdata('message'); ?>

        <table class="table display nowrap " id="table_id" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Isi Pernyataan </th>
                    <th scope="col">kategori </th>
                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pernyataan as $q) : ?>
                    <tr>

                        <th scope="row"><?= $i; ?></th>
                        <td><?= $q['isi']; ?></td>
                        <td class=""><?= $q['kategori']; ?></td>

                        <td class="">
                            <a href="<?= base_url(); ?>home/detailpernyataan/<?= $q['id_pernyataan']; ?>" class="btn btn-primary px-2 py-2">Edit </a>

                            <a href="<?= base_url(); ?>home/hapuspernyataan/<?= $q['id_pernyataan']; ?>" class="btn btn-danger px-2 py-2">Hapus </a>
                        </td>
                    </tr>

                    <?php $i++; ?>
                <?php endforeach; ?>

            </tbody>
        </table>



    </section>
    <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-fluid mt">
                <h4 class="text-center">Tambah Daftar Pernyataan</h4>
                <form method="POST" action="<?= base_url('home/pernyataan'); ?>" enctype="multipart/form-data">
                    <div class="form-horizontal style-form">

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Isi Pernyataan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="isi" rows="3"></textarea>
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
        </div>
    </div>
</div>