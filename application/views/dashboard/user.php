<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Administrator</h3>
        <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-primary mb-4">Tambah Data Admin</a>

        <?= $this->session->flashdata('message'); ?>
        <table class="table display nowrap " id="table_id" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Admin</th>
                    <th scope="col">Email </th>
                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($user as $q) : ?>
                    <tr>

                        <th scope="row"><?= $i; ?></th>
                        <td><?= $q['nama_user']; ?></td>
                        <td class=""><?= $q['email']; ?></td>

                        <td class=""><a href="<?= base_url(); ?>home/hapusadmin/<?= $q['id_user']; ?>" class="btn btn-danger px-2 py-2">Hapus </a></td>
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
                <h4 class="text-center">Tambah Administrator </h4>
                <form method="post" action="<?= base_url('home/user'); ?>">
                    <div class="form-horizontal style-form">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control round-form" name="nama_user">
                                <?= form_error('nama_user', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control round-form" name="email">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control round-form" name="password1">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" placeholder="Ulangi Password" class="form-control round-form" name="password2">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
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