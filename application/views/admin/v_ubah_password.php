<div class="container-fluid">
    <div class="row justify-content-center py-4">
        <div class="col-md-6 card p-3">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Ubah Kata Sandi</h2>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>
                <form action="<?= base_url() . 'admin/profile/changePassword'; ?>" method="post">

                    <div class="form-group">
                        <label for="password_sekarang">Kata Sandi Sekarang: </label>
                        <input type="password" class="form-control" name="password_sekarang" id="password_sekarang" placeholder="Masukkan Kata Sandi Saat Ini...">
                        <?php echo form_error('password_sekarang'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password_baru">Kata Sandi Baru: </label>
                        <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Masukkan Kata Sandi Baru...">
                        <?php echo form_error('password_baru'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password_baru2">Ketik Ulang Kata Sandi Baru: </label>
                        <input type="password" class="form-control" name="password_baru2" id="password_baru2" placeholder="Ketik Ulang Kata Sandi Baru...">
                        <?php echo form_error('password_baru2'); ?>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-primary px-3 mr-1" type="submit">Simpan Perubahan</button>
                        <a href="<?=base_url()?>admin/dashboard" class="btn btn-danger px-3 mr-1">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>