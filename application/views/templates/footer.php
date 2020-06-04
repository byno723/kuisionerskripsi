<!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        <p>
            &copy; Copyrights <?= date('Y'); ?> All Rights Reserved
        </p>
        <div class="credits">

            Created with <a href=""> <b> Obin </b></a> </a>
        </div>
        <a href="#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="<?= base_url('assets/'); ?>vendoradmin/lib/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendoradmin/lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?= base_url('assets/'); ?>vendoradmin/lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?= base_url('assets/'); ?>vendoradmin/lib/jquery.scrollTo.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendoradmin/lib/common-scripts.js"></script>

<script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/myscript.js"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!--script for this page-->


<script>
    $(document).ready(function() {
        $('#table_id').dataTable({
            "scrollX": true
        });

    });
</script>

<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("jenkel", {
            animationEnabled: true,
            title: {
                text: "Jenis Kelamin",
                horizontalAlign: "left"
            },
            data: [{
                type: "doughnut",
                startAngle: 60,
                //innerRadius: 60,
                indexLabelFontSize: 17,
                indexLabel: "{label} - #percent%",
                toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                dataPoints: [{
                        y: <?= $jenkel; ?>,
                        label: "Laki-Laki"
                    },
                    {
                        y: <?= $per; ?>,
                        label: "Perempuan"
                    }

                ]
            }]
        });
        chart.render();

        var chartA = new CanvasJS.Chart("umur", {
            animationEnabled: true,
            title: {
                text: "JUMLAH USIA"
            },
            data: [{
                type: "pie",
                startAngle: 240,
                indexLabel: "{label} {y}",
                dataPoints: [
                    <?php foreach ($umur as $row) : ?> {
                            y: <?= $row['COUNT(*)']; ?>,
                            label: "usia = <?= $row['umur']; ?>"
                        },
                    <?php endforeach; ?>

                ]
            }]
        });
        chartA.render();

        var pekerjaan = new CanvasJS.Chart("pekerjaan", {
            animationEnabled: true,
            title: {
                text: "JUMLAH PEKERJAAN"
            },
            data: [{
                type: "pie",
                startAngle: 240,
                indexLabel: "{label} {y}",
                dataPoints: [
                    <?php foreach ($pekerjaan as $row) : ?> {
                            y: <?= $row['COUNT(*)']; ?>,
                            label: "<?= $row['pekerjaan']; ?>"
                        },
                    <?php endforeach; ?>

                ]
            }]
        });
        pekerjaan.render();









    }
</script>



</body>

</html>