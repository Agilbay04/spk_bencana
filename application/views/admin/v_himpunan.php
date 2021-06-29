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
                    <!-- /.card-header -->
                    <?php $no = 1; ?>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped align-items-center">
                            <thead>
                                <tr class="align-items-center text-center">
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama Kriteria</th>
                                    <th>Range</th>
                                    <th>Nilai</th>
                                    <th>Terakhir diupdate</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($himpunan as $himp) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $himp['no']; ?></td>
                                        <td><?= $himp['nm_kriteria']; ?></td>
                                        <td><?= $himp['range']; ?></td>
                                        <td><?= $himp['nilai']; ?></td>
                                        <td><?= date('d M Y, H:i', strtotime($himp['time_in_himp'])); ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-sm bg-gradient-teal m-1" data-toggle="modal" data-target="#edit-modal<?= $himp['no']; ?>" title="edit data">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm bg-gradient-danger m-1" data-toggle="modal" data-target="#del-modal<?= $himp['no']; ?>" title="hapus data">
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
                                    <th>ID</th>
                                    <th>Nama Kriteria</th>
                                    <th>Range</th>
                                    <th>Nilai</th>
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
            <form action="<?= base_url('admin/kriteria/tbh_himpunan'); ?>" method="POST">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="text" name="id_h" class="form-control" id="" placeholder="ID himpunan kriteria..." value="<?= $id_h; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Kriteria</label>
                            <select name="kriteria" class="form-control" id="" required>
                                <option value="" selected><span class="text-muted">--Pilih Kriteria--</span></option>
                                <?php foreach ($kriteria as $kt) : ?>
                                    <option value="<?= $kt['id_kriteria']; ?>"><?= $kt['nm_kriteria']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('kriteria', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Range</label>
                            <input type="text" name="range" class="form-control" id="" placeholder="Range..." required>
                            <?= form_error('range', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nilai</label>
                            <input type="text" name="nilai" class="form-control" id="" placeholder="Nilai..." required>
                            <?= form_error('nilai', '<small class="text-danger">', '</small>') ?>
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

<?php foreach ($himpunan as $himp) : ?>
    <div class="modal fade" id="edit-modal<?= $himp['no']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient-teal">
                    <h4 class="modal-title font-weight-bold text-uppercase">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/kriteria/edit_himpunan'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID</label>
                                <input type="text" name="id_h" class="form-control" id="" placeholder="ID himpunan kriteria..." value="<?= $himp['no']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Kriteria</label>
                                <select name="kriteria" class="form-control" id="" required>
                                    <option value="" selected><span class="text-muted">--Pilih Kriteria--</span></option>
                                    <?php foreach ($kriteria as $kt) : ?>
                                        <option value="<?= $kt['id_kriteria']; ?>" <?= $kt['id_kriteria'] == $himp['id_kriteria'] ? "selected" : null ?>><?= $kt['nm_kriteria']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('kriteria', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Range</label>
                                <input type="text" name="range" class="form-control" id="" value="<?= $himp['range']; ?>" placeholder="Range..." required>
                                <?= form_error('range', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nilai</label>
                                <input type="text" name="nilai" class="form-control" id="" value="<?= $himp['nilai']; ?>" placeholder="Nilai..." required>
                                <?= form_error('nilai', '<small class="text-danger">', '</small>') ?>
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
    <div class="modal fade" id="del-modal<?= $himp['no']; ?>">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header bg-gradient-teal">
                    <h4 class="modal-title font-weight-bold text-uppercase">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/kriteria/del_himpunan'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="card-body">
                            <input type="text" name="id_h" value="<?= $himp['no']; ?>" hidden>
                            <p>Apakah anda ingin menghapus data ini?</p>
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