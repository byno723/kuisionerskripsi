<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Responden</h3>
        <a href="<?= base_url('home/excel_export_responden'); ?>" class="btn btn-success mb-4">Download Data</a>

        <?= $this->session->flashdata('message'); ?>
        <table class="table display nowrap " id="table_id" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID Responden</th>
                    <th scope="col">Nama Responden </th>
                    <th scope="col">Umur </th>
                    <th scope="col">Jenis Kelamin </th>
                    <th scope="col">Pekerjaan </th>
                    <th scope="col">Aksi </th>


                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($responden as $q) : ?>
                    <tr>

                        <th scope="row"><?= $i; ?></th>
                        <td><?= $q['id_responden']; ?></td>
                        <td class=""><?= $q['nama_responden']; ?></td>
                        <td class=""><?= $q['umur']; ?></td>
                        <td class=""><?= $q['jenkel']; ?></td>
                        <td class=""><?= $q['pekerjaan']; ?></td>
                        <td class=""><a href="<?= base_url(); ?>home/hapusresponden/<?= $q['id_responden']; ?>" class="btn btn-danger px-2 py-2">Hapus </a></td>

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