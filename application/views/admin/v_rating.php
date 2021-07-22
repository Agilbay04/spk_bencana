<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="font-weight-bold text-uppercase"><?= $judul; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>" class="text-teal">Beranda</a></li>
                        <li class="breadcrumb-item active"><?= $judul; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Notifikasi -->
        <!-- <?= $this->session->flashdata('notif'); ?> -->
        <!-- /. Notifikasi -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action="<?= base_url('admin/rating'); ?>" method="post">
                            <div class="row">
                                <div class="d-flex">
                                    <div class="mr-2">
                                        <select name="kec" class="form-control" id="">
                                            <option value="" selected><span class="text-muted">--Pilih Kecamatan--</span></option>
                                            <?php foreach ($kec as $k) : ?>
                                                <option value="<?= $k['id_kecamatan']; ?>" <?= set_select('kec', $k['id_kecamatan']); ?>><?= $k['nm_kecamatan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mr-2">
                                        <button class="btn bg-gradient-teal font-weight-bold text-uppercase">
                                            <i class="fas fa-search"></i>
                                            cari
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped align-items-center">
                            <thead>
                                <tr class="align-items-center text-center">
                                    <th>No Perangkingan</th>
                                    <th>Nama Desa</th>
                                    <th>Hasil Perangkingan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($hasil_desa as $hsd) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $hsd['nm_desa']; ?></td>
                                        <td><?= $hsd['hasil_akhir']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="align-items-center text-center">
                                    <th>No Perangkingan</th>
                                    <th>Nama Desa</th>
                                    <th>Hasil Perangkingan</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <!-- </form> -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->