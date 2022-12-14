<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="<?= base_url("/") ?>">
                        <div class="sb-nav-link-icon"><img src="assets\img\icon-home.svg" width="25px" alt=""></i></div>
                        Home
                    </a>
                    <a class="nav-link" href="<?= base_url("/BerandaSurat") ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard Surat
                    </a>
                    <a class="nav-link" href="<?= base_url("/BerandaArsip") ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></div>
                        Dashboard Arsip
                    </a>
                    <div class="sb-sidenav-menu-heading">Fitur</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <i class="far fa-envelope" width="25px"></i>
                        </div>
                        Surat
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url("/SuratMasuk") ?>"> <i class="fas fa-envelope"></i>&ensp;Masuk</a>
                            <a class="nav-link" href="<?= base_url("/SuratKeluar") ?>"> <i class="far fa-envelope-open"></i>&ensp;Keluar</a>
                            <a class="nav-link" href="<?= base_url("/SuratTugas") ?>"> <i class="fas fa-user-friends"></i>&ensp;Tugas</a>
                            <a class="nav-link" href="<?= base_url("/SuratMasuk/tabelDisposisi") ?>"> <i class="fas fa-mail-bulk"></i>&ensp;Disposisi</a>
                        </nav>
                    </div>

                    <a class="nav-link" href="<?= base_url("/Arsip") ?>">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-paste"></i>
                        </div>
                        Arsip
                    </a>

                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="<?= base_url("/BerandaSurat#tables") ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Charts
                    </a>
                    <a class="nav-link" href="<?= base_url("/BerandaSurat#datatablesSimple") ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tables
                    </a>
                </div>
            </div>
            <!-- <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div> -->
        </nav>
    </div>