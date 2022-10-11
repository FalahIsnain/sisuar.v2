<?= $this->extend('layout/HalamanAwal/templateHalamanAwal'); ?>
<?= $this->section('content'); ?>

<!-- HEADER -->

<div id="home" class="header-hero bg_cover d-lg-flex align-items-center" style="background-image: url(https://diskominfomc.kalselprov.go.id/wp-content/uploads/2021/11/pupr1125.jpeg);">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header-hero-content text-center">
                    <div class="mb-3">
                        <img src="https://raw.githubusercontent.com/aldiskatel/cdn/main/dist/2.png" alt="" width="200px">
                    </div>
                    <h3 style="color: white" class="mb-3">Dinas Pekerjaan Umum dan Penataan Ruang Bidang Bina Kontruksi</h3>
                    <h3 style="color: white">Provinsi Kalimantan Selatan</h3>
                </div>
            </div>
        </div>
    </div>

</div>




<!-- STRUKTUR -->

<div class="container mt-3" id="struktur">
    <div class="row featurette">
        <center>
            <p style="color:#f14836; padding-bottom: 65px ; padding-top: 40px;letter-spacing: 5px;font-size: 18px;">DINAS PEKERJAAN UMUM PENATAAN RUANG
                <br> KALIMANTAN SELATAN
            </p>
        </center>
        <div class="col-md-7 order-md-2">
            <h2 style="color:#5E8B7E;font-weight: bolder;">Kepala Dinas PU Kalimantan Selatan <span class="text-muted"></span></h2>
            <p class="lead">Direktorat Jenderal Bina Konstruksi mempunyai tugas menyelenggarakan perumusan dan pelaksanaan kebijakan di bidang pembinaan jasa konstruksi sesuai dengan ketentuan peraturan perundang-undangan.</p>

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <b>Tugas pokok dan fungsi</b>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Direktorat Jenderal Bina Konstruksi mempunyai tugas menyelenggarakan perumusan dan pelaksanaan kebijakan di bidang pembinaan jasa .konstruksi sesuai dengan ketentuan peraturan perundang-undangan.</p>
                            <p>Dalam melaksanakan tugas Direktorat Jenderal Bina Konstruksi menyelenggarakan fungsi:</p>
                            <ol>
                                <li>perumusan kebijakan di bidang pembinaan penyelenggaraan, kelembagaan, dan sumber daya jasa konstruksi;</li>
                                <li>pelaksanaan kebijakan di bidang pembinaan penyelenggaraan, kelembagaan, dan sumber daya jasa konstruksi;</li>
                                <li>pelaksanaan kebijakan di bidang pemberdayaan dan pengawasan penyelenggaraan jasa konstruksi yang dilaksanakan oleh masyarakat dan pemerintah daerah;</li>
                                <li>penyusunan norma, standar, prosedur, dan kriteria di bidang pembinaan jasa konstruksi;</li>
                                <li>pelaksanaan bimbingan teknis dan supervisi di bidang pembinaan penyelenggaraan, kelembagaan, dan sumber daya jasa konstruksi;</li>
                                <li>pelaksanaan evaluasi dan pelaporan di bidang pembinaan penyelenggaraan, kelembagaan, dan sumber daya jasa konstruksi;</li>
                                <li>pelaksanaan administrasi Direktorat Jenderal Bina Konstruksi; dan</li>
                                <li>pelaksanaan fungsi lain yang diberikan oleh Menteri.</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <b>Unit Kerja</b>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <li>Sekretariat Direktorat Jenderal</li>
                            <li>Bina Investasi Infrastruktur</li>
                            <li>Bina Penyelenggaraan Jasa Konstruksi</li>
                            <li>Bina Kelembagaan dan Sumber Daya Jasa Konstruksi</li>
                            <li>Bina Kompetensi dan Produktivitas Konstruksi</li>
                            <li>Kerjasama dan Pemberdayaan</li>
                            <li>Balai Jasa Konstruksi</li>
                            <li>Balai Penerapan Teknologi Konstruksi</li>
                            <li>Balai Material dan Peralatan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-md-5 order-md-1">
            <img width="532" height="789" src="assets\img\default.png" class="attachment-large size-large" alt="" loading="lazy" srcset="https://kalselprov.monjaki.id/wp-content/uploads/2020/08/profil-kadis2.png 732w, https://kalselprov.monjaki.id/wp-content/uploads/2020/08/profil-kadis2-222x300.png 222w" sizes="(max-width: 732px) 100vw, 732px">
        </div>
    </div>

</div>
<!-- TENTANG KAMI -->
<hr class="featurette-divider">


<?php $color = "#798795" ?>
<?php $styleJudul = "color:#5e8b7e;font-weight:800;" ?>
<div class="container marketing mt-5" id="about">
    <div class="row">
        <center>
            <p style="color:#f14836; padding-bottom: 65px ; padding-top: 40px;letter-spacing: 5px;font-size: 18px;">TENTANG BINAKONTRUKSI</p>
        </center>

        <div class="col-lg-4">

            <center>
                <img src="assets\img\monitoring.svg" width="180px">
            </center>
            <br>
            <h3 style="<?php echo $styleJudul ?>">Seksi Monitoring/Evaluasi</h3>
            <p style="color: <?php echo $color ?>;font">Sistem ini berjalan dengan mengimplementasikan Geographic Information Sistem sehingga mempermudah dalam pemantauan dengan bentuk peta.</p>

        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <center>
                <img src="assets\img\pemberdayaan.svg" width="230px">
            </center>
            <br>
            <h3 style="<?php echo $styleJudul ?>">Seksi Pemberdayaan</h3>
            <p style="color: <?php echo $color ?>">Tenaga dengan sertifikat keahlian berdasarkan klasifikasi dan kualifikasi yang ditetapkan sesuai dengan ketentuan peraturan perundang-undangan tentang jasa konstruksi.</p>

        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">

            <center>
                <img src="assets\img\pengawasan.svg" width="200px">
            </center>
            <br>
            <h3 style="<?php echo $styleJudul ?>">Seksi Pengawasan</h3>
            <p style="color: <?php echo $color ?>">Tenaga dengan sertifikat keterampilan berdasarkan klasifikasi dan kualifikasi yang ditetapkan sesuai dengan ketentuan peraturan perundang-undangan tentang jasa konstruksi.</p>

        </div>
    </div>
    <hr class="featurette-divider">
    <!-- KEPALA BIDANG -->

    <div class="container mt-5 text-center">
        <div class="row">
            <div class="col">
                <h3 style="color:#5E8B7E;font-weight: bolder;">Kepala<br> Bidang </h3>
                <img src="assets\img\default.png" width="215px" height="220px" alt="">
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <h3 style="color:#5E8B7E;font-weight: bolder;">Kepala Seksi Pengawasan</h3>
                <img src="assets\img\default.png" width="215px" height="220px" alt="">
            </div>
            <div class="col">
                <h3 style="color:#5E8B7E;font-weight: bolder;">Kepala Seksi Pemberdayaan</h3>
                <img src="assets\img\default.png" width="215px" height="220px" alt="">
            </div>
            <div class="col">
                <h3 style="color:#5E8B7E;font-weight: bolder;">Kepala Seksi Monev & Pengaturan</h3>
                <img src="assets\img\default.png" width="215px" height="220px" alt="">
            </div>

        </div>
    </div>



    <!-- CONTAINER FEATURE -->

    <div class="container mt-5 " id="feature">

        <!-- START THE FEATURETTES -->
        <hr class="featurette-divider">


        <div class="row featurette">
            <div class="col-md-7">
                <h2 style="color:#5E8B7E;font-weight: bolder;">SISUAR</h2>
                <p class="lead">Sistem Surat dan Pengarsipan berbasis web. Aplikasi Sisuar merupakan aplikasi yang dibangun secara khusus untuk kebutuhan administrasi persuratan dan pengarsipan pada Bidang Bina Konstruksi Dinas PUPR Provinsi Kalimantan Selatan.</p>
                <a href="<?= base_url('/BerandaSurat') ?>">
                    <button type="button" class="btn" style="width:300px;background:#5E8B7E;color: white;font-weight: bold;">Tambah Surat</button>
                </a>
            </div>

            <div class="col-md-5">
                <img src="assets\img\surat.svg" style="width:300px;margin-left:180px;" class="card-img-top" alt="...">
            </div>
        </div>

        <hr class="featurette-divider">
        <!-- /END THE FEATURETTES -->

    </div>
    <!-- PARTER -->
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col text-center">
                <a href="https://www.pu.go.id/">
                    <img src="asset\logopupr.jpeg" width="50px" alt="">
                </a>
                <h3 class="mt-1 mb-2" style="color:black">Kementrian PUPR <br> Republik Indonesia</h3>
            </div>
            <div class="col text-center">
                <a href="https://dinaspupr.kalselprov.go.id/home">
                    <img src="https://raw.githubusercontent.com/aldiskatel/cdn/main/dist/2.png" width="50px" alt="">
                </a>
                <h3 class="mt-1 mb-2" style="color:black">Dinas PUPR <br> Provinsi Kalimantan Selatan</h3>
            </div>
            <div class="col text-center">
                <a href="https://pamsimas.pu.go.id/">
                    <img src="asset\logopamsinas.png" width="80px" alt="">
                </a>
                <h3 class="mt-1 " style="color:black">PAMSIMAS <br> Republik Indonesia</h3>
            </div>
            <div class="col text-center">
                <a href="https://kalselprov.go.id/">
                    <img src="https://raw.githubusercontent.com/aldiskatel/cdn/main/dist/2.png" width="50px" alt="">
                </a>
                <h3 class="mt-1 mb-2" style="color:black">Provinsi Kalimantan Selatan</h3>
            </div>
            <div class="col text-center">
                <a href="https://binakonstruksi.pu.go.id/">
                    <img src="asset\logopupr.jpeg" width="50px" alt="">
                </a>
                <h3 class="mt-1 mb-2" style="color:black">Direktorat Jendral <br> Binakontruksi PUPR </h3>
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>