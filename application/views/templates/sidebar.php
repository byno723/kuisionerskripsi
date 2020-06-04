<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <h5 class="centered"><?php echo $this->session->userdata('nama_user'); ?></h5>
            <li class="mt">
                <a class="" href="<?= base_url('home'); ?>">
                    <i class=" fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>


            <li>
                <a href="<?= base_url('kuisioner/'); ?>" target="_blank">
                    <i class="fa fa-send"></i>
                    <span>Lihat Kuisioner </span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('home/pernyataan'); ?>">
                    <i class="fa fa-laptop"></i>
                    <span>Pernyataan </span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('home/responden'); ?>">
                    <i class="fa fa-users"></i>
                    <span>Responden </span>
                </a>
            </li>


            <li class="sub-menu">
                <a class="active" href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Kategori</span>
                </a>
                <ul class="sub">
                    <li>
                        <a href="<?= base_url('home/performance'); ?>">
                            <i class="fa fa-bolt"></i>
                            <span>Performance </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('home/information'); ?>">
                            <i class="fa fa-desktop"></i>
                            <span>Information </span>
                        </a>
                    </li>


                    <li>
                        <a href="<?= base_url('home/economics'); ?>">
                            <i class="fa fa-dollar"></i>
                            <span>Economics </span>
                        </a>
                    </li>


                    <li>
                        <a href="<?= base_url('home/controls'); ?>">
                            <i class="fa fa-gear"></i>
                            <span>Controls </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('home/eficiency'); ?>">
                            <i class="fa fa-briefcase"></i>
                            <span>Eficiency </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('home/service'); ?>">
                            <i class="fa fa-book"></i>
                            <span>Service </span>
                        </a>
                    </li>

                </ul>
            </li>




            <li>
                <a href="<?= base_url('home/user'); ?>">
                    <i class="fa fa-user"></i>
                    <span>Admin </span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->