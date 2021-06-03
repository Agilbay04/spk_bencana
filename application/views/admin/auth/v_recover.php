<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url('admin/auth/auth') ?>" class="text-white"><span class="font-weight-bold">SPK</span> Bencana Pangan</a>
    </div>
    <!-- /.login-logo -->
    <div class="card login-card shadow-lg">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Ubah Password</p>

            <form action="<?= base_url('admin/auth') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password baru...">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock text-teal"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Ketik ulang password baru...">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock text-teal"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn bg-gradient-teal btn-block font-weight-bold text-uppercase">Ubah</button>
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->