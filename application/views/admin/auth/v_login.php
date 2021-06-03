<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url('admin/auth/auth') ?>" class="text-white"><span class="font-weight-bold">SPK</span> Bencana Pangan</a>
    </div>
    <!-- /.login-logo -->
    <div class="card login-card shadow-lg">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Login Aplikasi</p>

            <form action="<?= base_url('admin/dashboard') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email...">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope text-teal"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password...">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock text-teal"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn bg-gradient-teal btn-block font-weight-bold text-uppercase">Masuk</button>
                </div>
            </form>
            <p class="mb-1 text-teal">
                <a href="<?= base_url('admin/auth/forget') ?>" class=" text-teal">Lupa password?</a>
            </p>
            <p class="mb-0">
                <a href="<?= base_url('admin/auth/register') ?>" class="text-teal">Belum punya akun? Register disini</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->