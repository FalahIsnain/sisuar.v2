<?= $this->extend('layout/arsip/templateDashboardArsip'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Arsip</h1>
    <?php $i = 1 ?>
    <?php foreach ($arsip as $sm) : ?>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?= $i ?>">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>" aria-expanded="true" aria-controls="collapse<?= $i ?>">
                        <?= $sm['nama_arsip'] ?>
                    </button>
                </h2>
                <div id="collapse<?= $i ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $i ?>" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" width="1220" height="400" src="asset/pdf/KHS.pdf"></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php $i = $i + 1 ?>
    <?php endforeach; ?>

</div>
<!-- <?= 'asset/pdf/' . $sm['file_arsip'] ?> -->


<?= $this->endSection(); ?>