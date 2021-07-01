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
                                    <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Terakhir diupdate</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($kriteria as $kt) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $kt['id_kriteria']; ?></td>
                                    <td><?= $kt['nm_kriteria']; ?></td>
                                    <td><?= date('d M Y, H:i', strtotime($kt['time_in_kt'])); ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-sm bg-gradient-teal m-1" data-toggle="modal" data-target="#edit-modal<?= $kt['id_kriteria']; ?>" title="edit data">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm bg-gradient-danger m-1" data-toggle="modal" data-target="#del-modal<?= $kt['id_kriteria']; ?>" title="hapus data">
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
                                    <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
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
            <form action="<?= base_url('admin/kriteria/tbh_kriteria'); ?>" method="POST">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Kriteria</label>
                            <input type="text" name="id_kt" class="form-control" id="" placeholder="ID kriteria..." value="<?= $id; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Kriteria</label>
                            <input type="text" name="nm_kt" class="form-control" id="" placeholder="Nama kriteria..." value="<?= set_value('nm_kt'); ?>" required>
                            <?= form_error('nm_kt', '<small class="text-danger">', '</small>'); ?>
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

<?php foreach ($kriteria as $kt) : ?>
    <!-- modal edit form -->
    <div class="modal fade" id="edit-modal<?= $kt['id_kriteria']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient-teal">
                    <h4 class="modal-title font-weight-bold text-uppercase">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/kriteria/edit_kriteria'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID Kriteria</label>
                                <input type="text" name="id_kt1" class="form-control" id="" placeholder="ID kriteria..." value="<?= $kt['id_kriteria']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Kriteria</label>
                                <input type="text" name="nm_kt1 class="form-control" id="" placeholder="Nama kriteria..." value="<?= $kt['nm_kriteria'] ?>" required>
                                <?= form_error('nm_kec1', '<small class="text-danger">', '</small>'); ?>
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
    <div class="modal fade" id="del-modal<?= $kt['id_kriteria']; ?>">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header bg-gradient-teal">
                    <h4 class="modal-title font-weight-bold text-uppercase">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/kriteria/del_kriteria'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="card-body">
                            <input type="text" name="id" value="<?= $kt['id_kriteria']; ?>" hidden>
                            <p>Apakah anda ingin menghapus data kriteria <span class="text-bold"><?= $kt['nm_kriteria']; ?></span>?</p>
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