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
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
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
                                        <button class="btn bg-gradient-primary font-weight-bold text-uppercase">
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
                                <?php foreach($hasil_desa as $hsd) : ?>
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

<!-- modal form -->
<div class="modal fade" id="add-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-teal">
                <h4 class="modal-title font-weight-bold text-uppercase">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
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
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default text-uppercase font-weight-bold" data-dismiss="modal"><i class="fas fa-ban"></i> Tutup</button>
                <button type="button" class="btn bg-gradient-teal text-uppercase font-weight-bold"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->