<?= $this->extend('layout/arsip/templateDashboardArsip'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Arsip</h1>
    <a href="<?= base_url('/Arsip') ?>">
        <button class="btn btn-primary mt-2 mb-2" type="submit"><i class="fas fa-plus"></i> Tambah Arsip</button>
    </a>
    <div class="col-4">

    </div>
    <div class="card-body">

        <table id="tabelarsip" class="table table-hover">
            <thead>
                <tr style="background-color:#8FBDD3;color:white ;">
                    <th>Nama Dokumen</th>
                    <th>Jenis Dokumen</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($arsip as $sm) : ?>
                    <tr>
                        <td>
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
                                                <iframe class="embed-responsive-item" width="900" height="400" src="asset/pdf/<?= $sm['file_arsip'] ?>"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </td>

                        <td><?= $sm['nama_jenis'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>




</div>



<?= $this->endSection(); ?>