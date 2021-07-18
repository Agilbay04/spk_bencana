<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" class="text-teal">Beranda</a></li>
                        <li class="breadcrumb-item active"><?= $judul; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 mt-3 text-center">
                <p class="lead">
                    <a class="btn btn-sm btn-info" href="<?= base_url('admin/developer') ?>">Kelompok 11 <i class="fas fa-external-link-alt"></i></a>
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-3 col-sm-4 text-center">
                <img src="<?= base_url(); ?>assets/dist/img/saw.png" width="600" alt="halo">
                <p class="mt-2 mb-2 rounded alert alert-secondary"><i class="fas fa-info-circle"></i> Mengenal algoritma dari Simple Additive Weighting, berikut penjelasan singkatnya berdasarkan studi kasus <b>Desa di Kabupaten Jember</b>.</p>
            </div>
            <div class="col-lg-12" id="accordion">
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseZero">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                1. Tentang SAW
                            </h4>
                        </div>
                    </a>
                    <div id="collapseZero" class="collapse show" data-parent="#accordion">
                        <div class="card-body text-justify">
                            Dalam machine learning, <b>Simple Additive Weighting</b> (<b>SAW</b>) Kusumadewi (2006: 74) adalah Metode SAW adalah metode penjumlahan terbobot. Konsep dasar dari metode SAW adalah mencari penjumlahan terbobot dari rating kinerja pada setiap alternatif pada semua atribut. Metode Simple Additive Weighting (SAW) adalah salah satu metode yang dapat digunakan untuk mengambil sebuah keputusan. Metode ini sering kali dikenal sebagai algoritma dengan metode penjumlahan berbobot. Metode ini membutuhkan proses normalisasi matriks keputusan (X) ke suatu skala yang dapat dengan semua rating dari alternatif yang tersedia. SAW ini merupakan metode yang paling terkenal dan banyak sekali digunakann untuk masalah Multiple Attribute Decision Making (MADM).
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                2. Konsep Data
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body text-justify">
                            <p><b>2.1 Kriteria Aspek Ketersedian Pangan</b>
                            <br>
                            Ketersediaan Pangan merupakan suatu unsur yang sangat penting. Semakin tinggi tingkat ketersediaan pangan seseorang maka semakin besar peluang untuk menjalankan kehidupan pada taraf yang lebih baik. Ketersediaan pangan adalah semua bentuk persediaan pangan (beras, jagung, ubi kayu, gandum) yang dimiliki seseorang pada tingkat ketersediaan tertentu yang berguna untuk kelangsungan hidup seseorang. Pada Sistem Pendukung Keputusan dengan kriteria ketersediaan pangan dilihat berdasarkan beberapa indikator yaitu :
                            <ul>
                                <li>
                                    Produksi beras bersih
                                </li>
                                <li>
                                    Produksi jagung bersih
                                </li>
                                <li>
                                    Populasi
                                </li>
                            </ul>
                            </p>
                            <p><b>2.2 Kriteria Aspek Akses Pangan</b>
                            <br>
                            Aspek akses pangan dinilai dengan pendekatan persentase KK Pra-KS dan KS alasan ekonomi berdasarkan data setahun terakhir yang dikeluarkan oleh Badan Kependudukan dan KB. Pada sistem pendukung keputusan dengan kriteria aspek akses pangan akan dilihat berdasarkan beberapa indikator yaitu :
                            <ul>
                                <li>
                                    Jumlah keluarga pada suatu desa
                                </li>
                                <li>
                                    Jumlah KK pra sejahtera
                                </li>
                                <li>
                                    Jumlah kk sejahtera
                                </li>
                            </ul>
                            </p>
                            <p><b>2.3 Kriteria Aspek Pemanfaatan Pangan</b>
                            <br>
                            Pemanfaatan pangan yang dimaksud disini adalah kemampuan warga untuk mengolah bahan makanan menjadi sajian pangan yang bernilai gizi baik. Pada sistem pendukung keputusan dengan kriteria pemanfaatan pangan akan dilihat berdasarkan beberapa indikator yaitu :
                            <ul>
                                <li>
                                    Jumlah balita
                                </li>
                                <li>
                                    Gizi buruk
                                </li>
                                <li>
                                    Gizi kurang
                                </li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                3. Tahapan Metode SAW
                            </h4>
                        </div>
                    </a>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body text-justify">
                        <p>Dalam menyelesaikan permasalahan menggunakan metode ini terdapat beberapa tahapan yang perlu dilakukan antara lainnya adalah :
                        <br>
                        <ul>
                            <li>
                            Kita harus menentukan kriteria yang akan dijadikan acuan dalam mengambil keputusan yaitu Ci.
                            </li>
                            <li>
                            Kemudian kita harus menentukan rating kecocokan pada tiap kriteria yang kita buat pada tahap sebelumnya.
                            </li>
                            <li>
                            Lalu kita membuat sebuah matriks keputusan yang berasal dari kriteria yang kita buat tadi (Ci), setelah itu kita lakukan normalisasi matriks berdasarkan persamaan yang disesuaikan dengan jenis atribut (baik itu tipe cost atau benefit) sehingga didapat matriks yang ternormalisasi R.
                            </li>
                            <li>
                            hasil akhir diperoleh dari proses perangkingan yaitu penjumlahan dari perkalian matriks R dengan vektor bobot sehingga diperoleh nilai terbesar yang dipilih dari alternatif (Ai) sebagai solusi.
                            </li>
                        </ul>
                        </p>

                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                4. Perhitungan
                            </h4>
                        </div>
                    </a>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <div class="card-body text-justify">
                            <p>
                            Berikut adalah formula untuk menyelesaikan normalisasinya adalah:
                            <br>
                            <br>
                            <img src="<?= base_url(); ?>assets/dist/img/formula.png" width="300" alt="halo">
                            <br>
                            Dimana :
                            <ul>
                                <li>
                                Nilai rij = nilai perangkingan untuk kinerja ternormalisasi.
                                </li>
                                <li>
                                Nilai xij = nilai atribut yang di punya dari setiap kriteria yang ad
                                </li>
                                <li>
                                Nilai Max xij = nilai untuk yang terbesar pada setiap kriteria ᵢ
                                </li>
                                <li>
                                Nilai Min xij = nilai untuk yang terkecil pada setiap kriteria ᵢ
                                </li>
                                <li>
                                Nilai benefit = apabila nilai terbesar adalah terbaik
                                </li>
                                <li>
                                Nilai cost = apabila nilai terkecil adalah terbaik pada rij adalah rating dari kinerja
                                </li>
                            </ul>
                            </p>
                            <p>
                            Nilai untuk preferensi pada semua alternatif (Vi) diberi sebagai :
                            <br>
                            <br>
                            <img src="<?= base_url(); ?>assets/dist/img/formula1.png" width="300" alt="halo">
                            <br>
                            Dimana :
                            <ul>
                                <li>
                                Vi = perangkingan pada semua alternatif
                                </li>
                                <li>
                                wj = nilai untuk bobot pada semua kriteria
                                </li>
                                <li>
                                rij = nilai untuk rating kinerja yang sudah ternormalisasi
                                </li>
                            </ul>
                            Nilai pada Vi yang mempunyai nilai lebih besar menandakan bahwa alternatif Ai lebih terpilih.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSix">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                5. Daftar pustaka
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSix" class="collapse" data-parent="#accordion">
                        <div class="card-body text-justify">
                            <ul>
                                <li>[1] Sa’id EG., Rachmayanti, dan MZ. Muttaqin. 2004. Manajemen Teknologi Agribisnis. Jakarta: Ghalia Indonesia. </li>
                                <li>[2] Djoyohadikusumo (1994). Pengertian Teknologi. Yogyakarta: BPFE.</li>
                                <li>[3] Maryatin (2013). Sebuah Paradoksal Krisis Pangan dan Ironi Ketahanan Pangan. Equilibrium, Volume 1 No 1, 93-117.</li>
                                <li>[4] Turban. 2001. Decision Support System and intelligent system (Sistem Pendukung Keputusan dan Sistem Cerdas). Yogyakarta, Andi</li>
                                <li>[5] Dilahur. (1994). Geografi Desa dan Pengertian Desa. Forum Geografi, 8(14)125.</li>
                                <li>[6] Elistri, M., Wahyudi, J., Supardi, R. (2014). Penerapan Metode SAW Dalam Sistem Pendukung Keputusan Pemilihan Jurusan Pada Sekolah Menengah Atas Negeri 8 Seluma. Jurnal Media Infotama, 10(2), 105-109.</li>
                                <li>[7] Wibowo, K.M., Kanedi, I., Jumadi, J. (2015). Sistem Informasi Geografis (SIG) Menentukan Lokasi Pertambangan Batu Bara Di Provinsi Bengkulu Berbasi Website. Jurnal Media Infotama, 11(1), 51-60. </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>