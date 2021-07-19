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
		<!-- Default box -->
		<div class="row d-flex align-items-stretch align-items-center">
			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
				<div class="card bg-light developer">
					<div class="card-header text-muted border-bottom-0"></div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-7">
								<h2 class="lead font-weight-bold">Nurlaita Afia Tri Wahyuni</h2>
								<p class="text-muted text-sm"><b>As: </b> Frontend Developer / UI/UX Designer </p>
								<ul class="ml-4 mb-0 fa-ul text-muted">
									<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: Jember City</li>
								</ul>
							</div>
							<div class="col-5 text-center">
								<img src="<?= base_url(); ?>/assets/dist/img/developer/01.jpeg" alt="" class="img-circle img-fluid">
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="text-right">
							<a href="#" class="btn btn-sm bg-gradient-green" title="WhatsApp">
								<i class="fab fa-whatsapp"></i>
							</a>
							<a href="#" class="btn btn-sm bg-gradient-instagram" title="Instagram">
								<i class="fab fa-instagram text-white"></i>
							</a>
							<a href="#" class="btn btn-sm bg-gradient-red" title="Email">
								<i class="fas fa-envelope"></i>
							</a>
							<a href="#" class="btn btn-sm bg-gradient-dark" title="GitHub">
								<i class="fab fa-github"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
				<div class="card bg-light">
					<div class="card-header text-muted border-bottom-0"></div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-7">
								<h2 class="lead font-weight-bold"><b>Moh. Saidul Musthofa</b></h2>
								<p class="text-muted text-sm"><b>As: </b> Research & Development / Backend Developer </p>
								<ul class="ml-4 mb-0 fa-ul text-muted">
									<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: Kabupaten Probolinggo</li>
								</ul>
							</div>
							<div class="col-5 text-center">
								<img src="<?= base_url(); ?>/assets/dist/img/developer/02.jpeg" alt="" class="img-circle img-fluid">
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="text-right">
							<a href="#" class="btn btn-sm bg-gradient-green" title="WhatsApp">
								<i class="fab fa-whatsapp"></i>
							</a>
							<a href="#" class="btn btn-sm bg-gradient-instagram" title="Instagram">
								<i class="fab fa-instagram text-white"></i>
							</a>
							<a href="#" class="btn btn-sm bg-gradient-red" title="Email">
								<i class="fas fa-envelope"></i>
							</a>
							<a href="#" class="btn btn-sm bg-gradient-dark" title="GitHub">
								<i class="fab fa-github"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
				<div class="card bg-light">
					<div class="card-header text-muted border-bottom-0"></div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-7">
								<h2 class="lead font-weight-bold"><b>M. Wildan Aulia Kahfi</b></h2>
								<p class="text-muted text-sm"><b>As: </b> Backend Developer / QA Engineer </p>
								<ul class="ml-4 mb-0 fa-ul text-muted">
									<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: Mangli, Karangsari, Sempu, Kabupaten Banyuwangi</li>
								</ul>
							</div>
							<div class="col-5 text-center">
								<img src="<?= base_url(); ?>/assets/dist/img/developer/03.jpg" alt="" class="img-circle img-fluid">
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="text-right">
							<a href="#" class="btn btn-sm bg-gradient-green" title="WhatsApp">
								<i class="fab fa-whatsapp"></i>
							</a>
							<a href="#" class="btn btn-sm bg-gradient-instagram" title="Instagram">
								<i class="fab fa-instagram text-white"></i>
							</a>
							<a href="#" class="btn btn-sm bg-gradient-red" title="Email">
								<i class="fas fa-envelope"></i>
							</a>
							<a href="#" class="btn btn-sm bg-gradient-dark" title="GitHub">
								<i class="fab fa-github"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
				<div class="card bg-light">
					<div class="card-header text-muted border-bottom-0"></div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-7">
								<h2 class="lead font-weight-bold"><b>Bayu Agil Prananda</b></h2>
								<p class="text-muted text-sm"><b>As: </b> Backend Developer / Database Administrator </p>
								<ul class="ml-4 mb-0 fa-ul text-muted">
									<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: Duwet, Wates, Kediri City</li>
								</ul>
							</div>
							<div class="col-5 text-center">
								<img src="<?= base_url(); ?>/assets/dist/img/developer/04.jpg" alt="" class="img-circle img-fluid">
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="text-right">
							<a href="#" class="btn btn-sm bg-gradient-green" title="WhatsApp">
								<i class="fab fa-whatsapp"></i>
							</a>
							<a href="#" class="btn btn-sm bg-gradient-instagram" title="Instagram">
								<i class="fab fa-instagram text-white"></i>
							</a>
							<a href="#" class="btn btn-sm bg-gradient-red" title="Email">
								<i class="fas fa-envelope"></i>
							</a>
							<a href="#" class="btn btn-sm bg-gradient-dark" title="GitHub">
								<i class="fab fa-github"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
