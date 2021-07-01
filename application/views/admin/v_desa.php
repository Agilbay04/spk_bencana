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
                                    <th>ID Desa</th>
                                    <th>Nama Desa</th>
                                    <th>Kecamatan</th>
                                    <th>Kode Pos</th>
                                    <th>Produksi Padi</th>
                                    <th>Produksi Jagung</th>
                                    <th>Populasi</th>
                                    <th>Terakhir Diupdate</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($desa as $ds) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $ds['id_desa']; ?></td>
                                        <td><?= $ds['nm_desa']; ?></td>
                                        <td><?= $ds['nm_kecamatan']; ?></td>
                                        <td><?= $ds['kd_pos']; ?></td>
                                        <td><?= $ds['prod_padi']; ?> kwintal</td>
                                        <td><?= $ds['prod_jagung']; ?> kwintal</td>
                                        <td><?= $ds['populasi']; ?> orang</td>
                                        <td><?= date('d M Y, H:i', strtotime($ds['time_in_ds'])); ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-sm bg-gradient-teal m-1" data-toggle="modal" data-target="#edit-modal<?= $ds['id_desa']; ?>" title="edit data">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm bg-gradient-danger m-1" data-toggle="modal" data-target="#del-modal<?= $ds['id_desa']; ?>" title="hapus data">
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
                                    <th>ID Desa</th>
                                    <th>Nama Desa</th>
                                    <th>Kecamatan</th>
                                    <th>Kode Pos</th>
                                    <th>Produksi Padi</th>
                                    <th>Produksi Jagung</th>
                                    <th>Populasi</th>
                                    <th>Terakhir Diupdate</th>
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
            <form action="<?= base_url('admin/daerah/tbh_desa') ?>" method="POST">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Desa</label>
                            <input type="text" name="id_ds" class="form-control" id="" placeholder="ID Desa..." value="<?= $id; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Desa</label>
                            <input type="text" name="nm_ds" class="form-control" id="" value="<?= set_value('nm_ds') ?>" placeholder="Nama Desa...">
                            <?= form_error('nm_ds', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kecamatan</label>
                            <select name="kec" class="form-control" id="">
                                <option value="" selected><span class="text-muted">--Pilih Kecamatan--</span></option>
                                <?php foreach ($kec as $k) : ?>
                                    <option value="<?= $k['id_kecamatan']; ?>" <?= set_select('kec', $k['id_kecamatan']); ?>><?= $k['nm_kecamatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('kec', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kode Pos</label>
                            <input type="number" name="kd_pos" class="form-control" id="" <?= set_value('kd_pos') ?> placeholder="Kode pos...">
                            <?= form_error('kd_pos', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Produksi Padi</label>
                            <div class="d-flex">
                                <input type="number" name="prd_padi" class="form-control" id="" value="<?= set_value('prd_padi') ?>" placeholder="Produksi padi...">
                                <p class="m-2 text-bold">kwintal</p>
                            </div>
                            <?= form_error('prd_padi', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Produksi Jagung</label>
                            <div class="d-flex">
                                <input type="number" name="prd_jagung" class="form-control" id="" value="<?= set_value('prd_jagung') ?>" placeholder="Produksi jagung...">
                                <p class="m-2 text-bold">kwintal</p>
                            </div>
                            <?= form_error('prd_jagung', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Populasi</label>
                            <div class="d-flex">
                                <input type="number" name="populasi" class="form-control" id="" value="<?= set_value('populasi') ?>" placeholder="Jumlah populasi...">
                                <p class="m-2 text-bold">orang</p>
                            </div>
                            <?= form_error('populasi', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div> -->
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

<?php foreach ($desa as $ds) : ?>
    <!-- modal edit form -->
    <div class="modal fade" id="edit-modal<?= $ds['id_desa']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient-teal">
                    <h4 class="modal-title font-weight-bold text-uppercase">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/daerah/edit_desa') ?>" method="POST">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID Desa</label>
                                <input type="text" name="id_ds1" class="form-control" id="" placeholder="ID Desa..." value="<?= $ds['id_desa']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Desa</label>
                                <input type="text" name="nm_ds1" class="form-control" id="" value="<?= $ds['nm_desa'] ?>" placeholder="Nama Desa...">
                                <?= form_error('nm_ds1', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kecamatan</label>
                                <select name="kec1" class="form-control" id="">
                                    <option value="" selected><span class="text-muted">--Pilih Kecamatan--</span></option>
                                    <?php foreach ($kec as $k) : ?>
                                        <option value="<?= $k['id_kecamatan']; ?>" <?= $k['id_kecamatan'] == $ds['id_kecamatan'] ? "selected" : null ?>>
                                            <?= $k['nm_kecamatan']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('kec11', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kode Pos</label>
                                <input type="number" name="kd_pos1" class="form-control" id="" value="<?= $ds['kd_pos'] ?>" placeholder="Kode pos...">
                                <?= form_error('kd_pos1', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Produksi Padi</label>
                                <div class="d-flex">
                                    <input type="number" name="prd_padi1" class="form-control" id="" value="<?= $ds['prod_padi'] ?>" placeholder="Produksi padi...">
                                    <p class="m-2 text-bold">kwintal</p>
                                </div>
                                <?= form_error('prd_padi1', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Produksi Jagung</label>
                                <div class="d-flex">
                                    <input type="number" name="prd_jagung1" class="form-control" id="" value="<?= $ds['prod_jagung'] ?>" placeholder="Produksi jagung...">
                                    <p class="m-2 text-bold">kwintal</p>
                                </div>
                                <?= form_error('prd_jagung1', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Populasi</label>
                                <div class="d-flex">
                                    <input type="number" name="populasi1" class="form-control" id="" value="<?= $ds['populasi'] ?>" placeholder="Jumlah populasi...">
                                    <p class="m-2 text-bold">orang</p>
                                </div>
                                <?= form_error('populasi1', '<small class="text-danger">', '</small>') ?>
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
    <div class="modal fade" id="del-modal<?= $ds['id_desa']; ?>">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header bg-gradient-teal">
                    <h4 class="modal-title font-weight-bold text-uppercase">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/daerah/del_desa'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="card-body">
                            <input type="text" name="id" value="<?= $ds['id_desa']; ?>" hidden>
                            <p>Apakah anda ingin menghapus data desa <span class="text-bold"><?= $ds['nm_desa']; ?></span>?</p>
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