<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url('admin/auth/auth') ?>" class="text-white"><span class="font-weight-bold">SPK</span> - BP</a>
    </div>

    <!-- Alert -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <!-- /.login-logo -->
    <div class="card login-card shadow-lg">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Buat Akun Baru</p>

            <form action="<?= base_url('admin/auth/register') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email..." value="<?= set_value('email'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope text-teal"></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama..." value="<?= set_value('nama'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user text-teal"></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Kata Sandi..." value="<?= set_value('password'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock text-teal"></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password1" class="form-control" placeholder="Ketik Ulang Kata Sandi..." value="<?= set_value('password1'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock text-teal"></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn bg-gradient-teal btn-block font-weight-bold text-uppercase">Daftar</button>
                </div>
            </form>
            <p class="mb-0">
                <a href="<?= base_url('admin/auth') ?>" class="text-teal">Sudah punya akun? Masuk disini</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->