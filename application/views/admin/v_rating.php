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
                    <table id="example1" class="table table-bordered table-striped align-items-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Desa</th>
                                <th>Nama Desa</th>
                                <th>Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($dt_ket as $ket) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $ket['id_desa']; ?></td>
                                    <td><?= $ket['nm_desa']; ?></td>
                                    <td>
                                        <?php
                                        $nilai_k = $ket['r_ketersediaan'];
                                        $nilai_a = $ket['r_akses'];
                                        $nilai_p = $ket['r_pemanfaatan'];

                                        if ($nilai_k < 3) {
                                            $r_nilai_k = 0.2;
                                        } else if ($nilai_k > 3 && $nilai_k <= 5) {
                                            $r_nilai_k = 0.4;
                                        } else if ($nilai_k > 5 && $nilai_k <= 10) {
                                            $r_nilai_k = 0.6;
                                        } else if ($nilai_k > 10 && $nilai_k <= 14) {
                                            $r_nilai_k = 0.8;
                                        } else if ($nilai_k >= 15) {
                                            $r_nilai_k = 1;
                                        }

                                        if ($nilai_a <= 25) {
                                            $r_nilai_a = 0.2;
                                        } else if ($nilai_a > 25 && $nilai_a <= 30) {
                                            $r_nilai_a = 0.4;
                                        } else if ($nilai_a > 30 && $nilai_a <= 35) {
                                            $r_nilai_a = 0.6;
                                        } else if ($nilai_a > 35 && $nilai_a <= 43) {
                                            $r_nilai_a = 0.8;
                                        } else if ($nilai_a >= 44) {
                                            $r_nilai_a = 1;
                                        }

                                        if ($nilai_p <= 3) {
                                            $r_nilai_p = 0.2;
                                        } else if ($nilai_p > 3 && $nilai_p <= 6) {
                                            $r_nilai_p = 0.4;
                                        } else if ($nilai_p > 6 && $nilai_p <= 15) {
                                            $r_nilai_p = 0.6;
                                        } else if ($nilai_p > 15 && $nilai_p <= 18) {
                                            $r_nilai_p = 0.8;
                                        } else if ($nilai_p >= 19) {
                                            $r_nilai_p = 1;
                                        }

                                        $matrix1 = $r_nilai_k / $max_k;
                                        $matrix2 = $r_nilai_a / $max_a;
                                        $matrix3 = $r_nilai_p / $max_p;

                                        $b1 = 3.2;
                                        $b2 = 6.6;
                                        $b3 = 6;
                                        $hasil = ($matrix1 * $b1) + ($matrix2 * $b2) + ($matrix3 * $b3);
                                        ?>
                                        <?= $hasil ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- <form role="form">
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
                        </div> -->
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