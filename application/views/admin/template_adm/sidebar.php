<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-teal elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SPK - BP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "dashboard") {
                                                                                        echo "active";
                                                                                    } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?php if ($this->uri->segment(2) == "daerah") {
                                                        echo "menu-open";
                                                    } ?>">
                    <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "daerah") {
                                                    echo "active";
                                                } ?>">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Data Daerah
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/daerah/kecamatan') ?>" class="nav-link <?php if ($this->uri->segment(3) == "kecamatan") {
                                                                                                    echo "active";
                                                                                                } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kecamatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/daerah/desa') ?>" class="nav-link <?php if ($this->uri->segment(3) == "desa") {
                                                                                                echo "active";
                                                                                            } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Desa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/kriteria'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "kriteria") {
                                                                                        echo "active";
                                                                                    } ?>">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Data Kriteria
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/rating'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "rating") {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Data Rating
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active bg-gradient-danger" data-toggle="modal" data-target="#logout-modal">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Keluar
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>