<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Economics</h3>

        <?= $this->session->flashdata('message'); ?>

        <a href="#" class="btn btn-info float-right mr-1 mb-4"><i class="fa fa-download"></i> <span>Download File </span></a>

        <table class="table display nowrap " id="table_id" style="width:100%">
            <thead>

                <tr>

                    <th scope="col">No.</th>
                    <th scope="col">ID responden</th>
                    <th scope="col">Indikator</th>
                    <th scope="col">Total</th>


                </tr>

            </thead>

            <tbody>

                <?php $i = 1; ?>

                <?php foreach ($economics as $q) : ?>

                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $q['id_responden']; ?></td>


                        <td class=""><?= $q['hasil']; ?></td>
                        <td class=""><?= $q['total']; ?></td>

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