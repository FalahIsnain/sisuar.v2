<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
    <link rel="icon" href="https://raw.githubusercontent.com/aldiskatel/cdn/main/dist/2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?= base_url("css/styles.css") ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?= $this->include('layout/surat/navSurat'); ?>
    <?= $this->include('layout/surat/sidebarSurat'); ?>
    <div id="layoutSidenav_content">
        <main>

            <?= $this->renderSection('content'); ?>

        </main>
        <?= $this->include('layout/surat/footerSurat'); ?>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url("js/scripts.js") ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url("assets/demo/chart-area-demo.js") ?>"></script>
    <script src="<?= base_url("assets/demo/chart-bar-demo.js") ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?= base_url("js/datatables-simple-demo.js") ?>"></script>



    <script>
        var suratDashboard = document.getElementById('suratdashboard').getContext('2d');

        var suratDashboard = new Chart(suratdashboard, {
                type: 'doughnut',
                data: {
                    labels: [
                        'Surat Masuk',
                        'Surat Keluar',
                        'Surat Tugas',
                        'Surat Disposisi'
                    ],
                    datasets: [{
                        label: 'Surat',
                        data: [<?php echo $jumlahSuratMasuk ?>, <?php echo $jumlahSuratKeluar ?>, <?php echo $jumlahSuratTugas ?>,<?php echo $jumlahSuratDisposisi ?>],
                        backgroundColor: [
                            '<?php echo $suratMasukWrn ?>',
                            '<?php echo $suratKeluarWrn ?>',
                            '<?php echo $suratTugasWrn ?>',
                            '<?php echo $suratDisposisiWrn ?>'
                        ],
                        hoverOffset: 4
                    }]
                }
            }

        );
    </script>

    <script>
        (function() {
            'use strict'
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

</body>

</html>