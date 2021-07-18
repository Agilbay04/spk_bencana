<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark font-weight-bold text-uppercase"><?= $judul; ?></h1> -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Alert -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- Jumbotron -->
        <div class="container-fluid">
            <div class="jumbotron bg-gradient-gray-dark">
                <h1 class="display-4 font-weight-bold text-uppercase">Sistem Pendukung Keputusan </h1>
                <h2 class="font-weight-bold text-uppercase">Perangkingan Daerah Rawan Bencana Pangan Kabupaten Jember</h2>
                <hr class="my-4">
                <p>Sistem Informasi yang dapat membantu untuk menentukan daerah yang memiliki kerawanan bencana pangan di Kabupaten Jember.</p>
                <a class="btn bg-gradient-teal btn-lg font-weight-bold text-uppercase" href="<?= base_url('admin/about') ?>" data-target="#card-dashboard" role="button">Selengkapnya</a>
            </div>
        </div>
        <!-- /. End Jumbotron -->

        <div class="container-fluid" id="card-dashboard">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-teal">
                        <div class="inner">
                            <h3><?= $jml_kec; ?></h3>

                            <p>Jumlah Kecamatan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-search-location"></i>
                        </div>
                        <a href="<?= base_url('admin/daerah/kecamatan'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-teal">
                        <div class="inner">
                            <h3><?= $jml_ds; ?></h3>

                            <p>Jumlah Desa</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <a href="<?= base_url('admin/daerah/desa'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <?php if ($this->session->userdata('id_akses') == 1 || $this->session->userdata('id_akses') == 2) : ?>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-teal">
                            <div class="inner">
                                <h3><?= $jml_kt; ?></h3>

                                <p>Data Kriteria</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-boxes"></i>
                            </div>
                            <a href="<?= base_url('admin/kriteria'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                <?php elseif ($this->session->userdata('id_akses') == 3) : ?>

                <?php endif; ?>

                <?php if ($this->session->userdata('id_akses') != 1) : ?>

                <?php else : ?>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-teal">
                            <div class="inner">
                                <h3><?= $jml_usr; ?></h3>

                                <p>Pengguna Aktif</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                <?php endif; ?>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->