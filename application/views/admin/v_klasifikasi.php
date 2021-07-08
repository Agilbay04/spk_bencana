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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>" class="text-teal">Home</a></li>
                        <li class="breadcrumb-item active"><?= $judul; ?></li>
                    </ol>
                </div>
            </div>

            <!-- Alert -->
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

        </div><!-- /.container-fluid -->
    </section>

    <!-- Keterangan content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center bg-gradient-gray-dark">
                        <h5 class="font-weight-bold text-uppercase">Petunjuk pengisian range kriteria</h5>
                    </div>
                    <?php $no = 1; ?>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped align-items-center">
                            <thead>
                                <tr class="align-items-center text-center">
                                    <th>No</th>
                                    <th>Kriteria</th>
                                    <th>Range</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($himpunan as $himp) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $himp['nm_kriteria']; ?></td>
                                        <td><?= $himp['range']; ?></td>
                                        <td><?= $himp['nilai']; ?></td>
                                        <td><?= $himp['keterangan']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="align-items-center text-center">
                                    <th>No</th>
                                    <th>Kriteria</th>
                                    <th>Range</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn bg-gradient-teal font-weight-bold text-uppercase" data-toggle="modal" data-target="#add-modal">
                            <i class="fas fa-plus"></i>
                            Tambah Data
                        </button>
                    </div>
                    <?php $no = 1; ?>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped align-items-center">
                            <thead>
                                <tr class="align-items-center text-center">
                                    <th>No</th>
                                    <th>ID Klasifikasi</th>
                                    <th>Desa</th>
                                    <th>Kecamatan</th>
                                    <th>Ketersediaan Pangan</th>
                                    <th>Akses Pangan</th>
                                    <th>Pemanfaatan Pangan</th>
                                    <th>Terakhir diupdate</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($klasifikasi as $kls) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $kls['id_klasifikasi']; ?></td>
                                        <td><?= $kls['nm_desa']; ?></td>
                                        <td><?= $kls['nm_kecamatan']; ?></td>
                                        <td><?= $kls['r_ketersediaan']; ?></td>
                                        <td><?= $kls['r_akses']; ?></td>
                                        <td><?= $kls['r_pemanfaatan']; ?></td>
                                        <td><?= date('d M Y, H:i', strtotime($kls['time_in_kls'])); ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-sm bg-gradient-teal m-1" title="edit data" data-toggle="modal" data-target="#edit-modal<?= $kls['id_klasifikasi']; ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm bg-gradient-danger m-1" title="hapus data" data-toggle="modal" data-target="#del-modal<?= $kls['id_klasifikasi']; ?>">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="align-items-center text-center">
                                    <th>No</th>
                                    <th>ID Klasifikasi</th>
                                    <th>Desa</th>
                                    <th>Kecamatan</th>
                                    <th>Ketersediaan Pangan</th>
                                    <th>Akses Pangan</th>
                                    <th>Pemanfaatan Pangan</th>
                                    <th>Terakhir diupdate</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
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

<!-- modal add form -->
<div class="modal fade" id="add-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-teal">
                <h4 class="modal-title font-weight-bold text-uppercase">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/klasifikasi/tbh_klasifikasi'); ?>" method="POST">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Klasifikasi</label>
                            <input type="text" name="id_kls" class="form-control" id="" placeholder="ID klasifikasi..." value="<?= $id_kls; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Kecamatan</label>
                            <select name="nm_kec" class="form-control" id="nm_kec" required>
                                <option value="" selected><span class="text-muted">--Pilih Kecamatan--</span></option>
                                <?php foreach ($kec as $k) : ?>
                                    <option value="<?= $k['id_kecamatan']; ?>"><?= $k['nm_kecamatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('nm_kec', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Desa</label>
                            <select name="nm_ds" class="form-control" id="nm_ds" required>
                                <option value="" selected><span class="text-muted">--Pilih Desa--</span></option>
                            </select>
                            <?= form_error('nm_ds', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Range Ketersediaan</label>
                            <input type="number" name="r_ketersediaan" class="form-control" id="" placeholder="Range Ketersediaan..." value="<?= set_value('r_ketersediaan'); ?>" required>
                            <?= form_error('r_ketersediaan', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Range Akses</label>
                            <input type="number" name="r_akses" class="form-control" id="" placeholder="Range Akses..." value="<?= set_value('r_akses'); ?>" required>
                            <?= form_error('r_akses', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Range Pemanfaatan</label>
                            <input type="number" name="r_pemanfaatan" class="form-control" id="" placeholder="Range Pemanfaatan..." value="<?= set_value('r_pemanfaatan'); ?>" required>
                            <?= form_error('r_pemanfaatan', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default text-uppercase font-weight-bold" data-dismiss="modal"><i class="fas fa-ban"></i> Tutup</button>
                    <button type="submit" class="btn bg-gradient-teal text-uppercase font-weight-bold"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php foreach ($klasifikasi as $kls) : ?>
    <!-- modal edit form -->
    <div class="modal fade" id="edit-modal<?= $kls['id_klasifikasi']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient-teal">
                    <h4 class="modal-title font-weight-bold text-uppercase">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/klasifikasi/edit_klasifikasi'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID Klasifikasi</label>
                                <input type="text" name="id_kls1" class="form-control" id="" placeholder="ID klasifikasi..." value="<?= $kls['id_klasifikasi']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Desa</label>
                                <select name="nm_ds1" class="form-control" id="nm_ds" disabled>
                                    <option value="" selected><span class="text-muted">--Pilih Desa--</span></option>
                                    <?php foreach ($desa as $ds) : ?>
                                        <option value="<?= $ds['id_desa']; ?>" <?= $ds['id_desa'] == $kls['id_desa'] ? "selected" : null ?>><?= $ds['nm_desa']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('nm_ds1', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Kecamatan</label>
                                <select name="nm_kec1" class="form-control" id="nm_kec" disabled>
                                    <option value="" selected><span class="text-muted">--Pilih Kecamatan--</span></option>
                                    <?php foreach ($kec as $k) : ?>
                                        <option value="<?= $k['id_kecamatan']; ?>" <?= $k['id_kecamatan'] == $kls['id_kecamatan'] ? "selected" : null ?>><?= $k['nm_kecamatan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('nm_kec1', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Range Ketersediaan</label>
                                <input type="number" name="r_ketersediaan1" class="form-control" id="" placeholder="Range Ketersediaan..." value="<?= $kls['r_ketersediaan']; ?>" required>
                                <?= form_error('r_ketersediaan1', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Range Akses</label>
                                <input type="number" name="r_akses1" class="form-control" id="" placeholder="Range Akses..." value="<?= $kls['r_akses']; ?>" required>
                                <?= form_error('r_akses1', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Range Pemanfaatan</label>
                                <input type="number" name="r_pemanfaatan1" class="form-control" id="" placeholder="Range Pemanfaatan..." value="<?= $kls['r_akses']; ?>" required>
                                <?= form_error('r_pemanfaatan1', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default text-uppercase font-weight-bold" data-dismiss="modal"><i class="fas fa-ban"></i> Tutup</button>
                        <button type="submit" class="btn bg-gradient-teal text-uppercase font-weight-bold"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- modal delete data -->
    <div class="modal fade" id="del-modal<?= $kls['id_klasifikasi']; ?>">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header bg-gradient-teal">
                    <h4 class="modal-title font-weight-bold text-uppercase">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/klasifikasi/del_klasifikasi'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="card-body">
                            <input type="text" name="id_kls" value="<?= $kls['id_klasifikasi']; ?>" hidden>
                            <p>Apakah anda ingin menghapus data ini?</span></p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default text-uppercase font-weight-bold" data-dismiss="modal"><i class="fas fa-ban"></i> Tidak</button>
                        <button type="submit" class="btn bg-gradient-danger text-uppercase font-weight-bold"><i class="fas fa-trash"></i> Ya</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>