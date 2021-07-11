<div class="container-fluid">

    <div class="row justify-content-center py-4">
        <div class="col-md-6 card p-4">
            <div class="card-header pb-4">
                <h2 class="font-weight-bolder mb-0">Edit Profil</h2>
            </div>
            <div class="card-body">
                <div class="px-2">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>

                <?php foreach ($user as $prfl); { ?>
                    <form action="<?= base_url() . 'admin/profile/update_profil'; ?>" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id_user" id="id_user" value="<?= $prfl['id_user'] ?>">
                        <div class="form-group">
                            <label for="nama_admin">Nama :</label>
                            <input type="text" pattern="[a-zA-Z0-9]{2,100}" class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Masukkan nama..." value="<?= $prfl['nama'] ?>">
                            <small id="nama_admin" class="form-text text-muted">Masukkan Nama Tanpa Karakter Spesial</small>
                            <?php echo form_error('nama'); ?>
                        </div>
                        <div class="form-group">
                            <label for="username">Email:</label>
                            <input type="text" readonly pattern="[a-zA-Z]{2-32}" class="form-control" name="email" id="email" placeholder="Masukkan Email..." value="<?= $prfl['email'] ?>">
                            <small id="email" class="form-text text-muted">Masukkan Email</small>
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto Profil</label><br>
                            <img id="prev_foto1" src="<?= base_url() ?>assets/dist/img/user/<?= $prfl['foto']?>" class="img-responsive img-thumbnail mb-4" alt="Preview Image" width="300px">
                            <div class="custom-file mb-2">
                                <input type="file" class="custom-file-input" name="foto" id="foto" accept="image/png,  image/x-png, image/jpeg, image/pjpeg, image/jpeg,image/pjpeg">
                                <label class="custom-file-label" for="foto"><?= $prfl['foto']?></label>
                            </div>
                            <small id="foto" class="form-text text-muted">Pilihlah File foto. Max 5 MB dengan Format (JPG/PNG)</small>
                        </div>
                        </div>
                        
                    
                        <!--
                            <a class="btn btn-success px-3 mr-1" href="<?= base_url() ?>admin/anggota/reset_password">Reset Password</a>-->

                        <div class="form-group text-center">
                            <button class="btn btn-primary px-3 mr-1" type="submit">Simpan</button>
                            <a href="<?=base_url()?>admin/dashboard" class="btn btn-danger px-3 mr-1">Batal</a>
                        </div>
                    </form>
                <?php }?>
            </div>
        </div>      
    </div>
</div>