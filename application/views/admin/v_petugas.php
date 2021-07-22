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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Terakhir diperbarui</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($petugas as $p) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $p['id_user']; ?></td>
                                        <td><?= $p['nama']; ?></td>
                                        <td><?= $p['email']; ?></td>
                                        <td>
                                            <?php if ($p['status'] == 1) : ?>
                                                <span class="badge badge-success">Aktif</span>
                                            <?php else : ?>
                                                <span class="badge badge-secondary">Nonaktif</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= date('d M Y, H:i', strtotime($p['time_in_usr'])); ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-sm bg-gradient-teal m-1" data-toggle="modal" data-target="#edit-modal<?= $p['id_user']; ?>" title="edit data">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm bg-gradient-danger m-1" data-toggle="modal" data-target="#del-modal<?= $p['id_user']; ?>" title="hapus data">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <?php if ($p['status'] == 1) : ?>
                                                    <button class="btn btn-sm bg-gradient-secondary m-1" data-toggle="modal" data-target="#dis-modal<?= $p['id_user']; ?>" title="nonaktifkan">
                                                        <i class="fas fa-user-alt-slash"></i>
                                                    </button>
                                                <?php else : ?>
                                                    <button class="btn btn-sm bg-gradient-primary m-1" data-toggle="modal" data-target="#en-modal<?= $p['id_user']; ?>" title="aktifkan">
                                                        <i class="fas fa-user"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="align-items-center text-center">
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Terakhir diperbarui</th>
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
            <form action="<?= base_url('admin/user/tbh_petugas'); ?>" method="POST">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="text" name="id_ptgs" class="form-control" id="" placeholder="ID User..." value="<?= $id_usr; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" name="nm_ptgs" class="form-control" id="" placeholder="Masukkan Nama..." value="<?= set_value('nm_ptgs'); ?>" required>
                            <?= form_error('nm_ptgs', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" name="em_ptgs" class="form-control" id="" placeholder="Masukkan Email..." value="<?= set_value('em_ptgs'); ?>" required>
                            <?= form_error('em_ptgs', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kata Sandi</label>
                            <input type="password" name="psw_ptgs" class="form-control" id="" placeholder="Masukkan Kata Sandi..." value="<?= set_value('psw_ptgs'); ?>" required>
                            <?= form_error('psw_ptgs', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ulangi Kata Sandi</label>
                            <input type="password" name="psw_ptgs1" class="form-control" id="" placeholder="Ketik Ulang Kata Sandi..." value="<?= set_value('psw_ptgs1'); ?>" required>
                            <?= form_error('psw_ptgs1', '<small class="text-danger">', '</small>'); ?>
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

<?php foreach ($petugas as $p) : ?>
    <!-- modal add form -->
    <div class="modal fade" id="edit-modal<?= $p['id_user']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient-teal">
                    <h4 class="modal-title font-weight-bold text-uppercase">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/user/edit_petugas'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID</label>
                                <input type="text" name="id_ptgs1" class="form-control" id="" placeholder="ID User..." value="<?= $p['id_user']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama</label>
                                <input type="text" name="nm_ptgs1" class="form-control" id="" placeholder="Masukkan Nama..." value="<?= $p['nama']; ?>" required>
                                <?= form_error('nm_ptgs1', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" name="param_email" value="<?= $p['email']; ?>" hidden>
                                <input type="email" name="em_ptgs1" class="form-control" id="" placeholder="Masukkan Email..." value="<?= $p['email']; ?>" required>
                                <?= form_error('em_ptgs1', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary text-uppercase font-weight-bold btn-batalpsw"><i class="fas fa-ban"></i> Batal Ubah Kata Sandi</button>
                                <button type="button" class="btn btn-primary text-uppercase font-weight-bold btn-ubahpsw"><i class="fas fa-lock"></i> Ubah Kata Sandi</button>
                            </div>
                            <div class="form-group psw">
                                <label for="exampleInputPassword1">Kata Sandi</label>
                                <input type="password" name="psw_ptgs1" class="form-control" id="" placeholder="Masukkan Kata Sandi..." value="<?= set_value('psw_ptgs1'); ?>">
                                <?= form_error('psw_ptgs1', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group psw1">
                                <label for="exampleInputPassword1">Ulangi Kata Sandi</label>
                                <input type="password" name="psw_ptgs2" class="form-control" id="" placeholder="Ketik Ulang Kata Sandi..." value="<?= set_value('psw_ptgs2'); ?>">
                                <?= form_error('psw_ptgs2', '<small class="text-danger">', '</small>'); ?>
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
    <div class="modal fade" id="del-modal<?= $p['id_user']; ?>">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header bg-gradient-teal">
                    <h4 class="modal-title font-weight-bold text-uppercase">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/user/del_petugas'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="card-body">
                            <input type="text" name="id_ptgs" value="<?= $p['id_user']; ?>" hidden>
                            <p>Apakah anda ingin menghapus pengguna <span class="font-weight-bold"><?= $p['nama']; ?></span>?</p>
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

    <!-- modal disable data -->
    <div class="modal fade" id="dis-modal<?= $p['id_user']; ?>">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header bg-gradient-teal">
                    <h4 class="modal-title font-weight-bold text-uppercase">Nonaktifkan Akun</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/user/dis_petugas'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="card-body">
                            <input type="text" name="id_ptgs" value="<?= $p['id_user']; ?>" hidden>
                            <p>Apakah anda ingin menonaktifkan pengguna <span class="font-weight-bold"><?= $p['nama']; ?></span>?</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default text-uppercase font-weight-bold" data-dismiss="modal"><i class="fas fa-ban"></i> Tidak</button>
                        <button type="submit" class="btn bg-gradient-secondary text-uppercase font-weight-bold"><i class="fas fa-arrow-right"></i> Ya</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- modal enable data -->
    <div class="modal fade" id="en-modal<?= $p['id_user']; ?>">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header bg-gradient-teal">
                    <h4 class="modal-title font-weight-bold text-uppercase">Aktifkan Akun</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/user/en_petugas'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="card-body">
                            <input type="text" name="id_ptgs" value="<?= $p['id_user']; ?>" hidden>
                            <p>Apakah anda ingin mengaktifkan pengguna <span class="font-weight-bold"><?= $p['nama']; ?></span>?</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default text-uppercase font-weight-bold" data-dismiss="modal"><i class="fas fa-ban"></i> Tidak</button>
                        <button type="submit" class="btn bg-gradient-primary text-uppercase font-weight-bold"><i class="fas fa-arrow-right"></i> Ya</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>