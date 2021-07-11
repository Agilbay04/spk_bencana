<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-teal elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin/dashboard'); ?>" class="brand-link">
        <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">SPK - BP</span>
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

                <?php if ($this->session->userdata('id_akses') == 2 || $this->session->userdata('id_akses') == 3) : ?>

                <?php else : ?>
                    <li class="nav-item has-treeview <?php if ($this->uri->segment(2) == "user") {
                                                            echo "menu-open";
                                                        } ?>">
                        <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "user") {
                                                        echo "active";
                                                    } ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Manajemen User
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/user') ?>" class="nav-link <?php if ($this->uri->segment(2) == "user" && $this->uri->segment(3) == "") {
                                                                                            echo "active";
                                                                                        } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hak Akses</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/user/petugas_dinas') ?>" class="nav-link <?php if ($this->uri->segment(3) == "petugas_dinas") {
                                                                                                            echo "active";
                                                                                                        } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Petugas Dinas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/user/umum') ?>" class="nav-link <?php if ($this->uri->segment(3) == "umum") {
                                                                                                            echo "active";
                                                                                                        } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Umum</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>


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
                

                <?php if ($this->session->userdata('id_akses') == 3) : ?>

                <?php else : ?>
                    <li class="nav-item has-treeview <?php if ($this->uri->segment(2) == "kriteria") {
                                                            echo "menu-open";
                                                        } ?>">
                        <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "kriteria") {
                                                        echo "active";
                                                    } ?>">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p>
                                Data Kriteria
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/kriteria') ?>" class="nav-link <?php if ($this->uri->segment(2) == "kriteria" && $this->uri->segment(3) != "himpunan") {
                                                                                                echo "active";
                                                                                            } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kriteria</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/kriteria/himpunan') ?>" class="nav-link <?php if ($this->uri->segment(3) == "himpunan") {
                                                                                                            echo "active";
                                                                                                        } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Range Kriteria</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('admin/klasifikasi'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "klasifikasi") {
                                                                                            echo "active";
                                                                                        } ?>">
                            <i class="nav-icon fas fa-sort"></i>
                            <p>
                                Klasifikasi
                            </p>
                        </a>
                    </li>
                <?php endif; ?>


                <li class="nav-item">
                    <a href="<?= base_url('admin/rating'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "rating") {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Perangkingan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/developer'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "developer") {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-code"></i>
                        <p>
                            Developer
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/auth/logout'); ?>" class="nav-link active bg-gradient-danger" data-toggle="modal" data-target="#logout-modal">
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