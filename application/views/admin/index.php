<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold text-uppercase"><?= $judul; ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Alert -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
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

                                <p>User Aktif</p>
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

        <!-- Carousel -->
        <div class="container-fluid">
            <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="10000">
                        <img src="<?= base_url(); ?>/assets/img/Gambar1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-interval="2000">
                        <img src="<?= base_url(); ?>/assets/img/Gambar1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url(); ?>/assets/img/Gambar1.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- end Carousel -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->