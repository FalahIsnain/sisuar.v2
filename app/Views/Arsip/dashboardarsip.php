<?= $this->extend('layout/arsip/templateDashboardArsip'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Arsip</h1>
    <a href="<?= base_url('/Arsip') ?>">
        <button class="btn btn-primary mt-2 mb-2" type="submit"><i class="fas fa-plus"></i> Tambah Arsip</button>
    </a>


    <form class="row g-3 needs-validation" method="post" action="<?= base_url('/FilterArsip') ?>" enctype="multipart/form-data" novalidate>
        <div class="col-4">
            <div class="btn-group submitter-group float-right">
                <div class="input-group-prepend">
                    <div class="input-group-text">Jenis</div>
                </div>
                <select class="form-control status-dropdown" name="filterJenis">
                    <option selected disabled value="">Choose...</option>
                    <?php
                    foreach ($jenis as $row) {
                    ?>
                        <option value="<?= $row['id_jenis'] ?>"> <?= $row['nama_jenis'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>

    </form>


    <div class="card-body">

        <table id="tabelarsip" class="table table-hover">
            <thead>
                <tr style="background-color:#8FBDD3;color:white ;">
                    <th>Nama Dokumen</th>
                    <th>Jenis Dokumen</th>
                    <th>Unduh</th>
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
                        <td>
                            <a href="<?= base_url('asset/pdf/' . $sm['file_arsip']) ?>">
                                <button type="button" class="btn btn-success">unduh</button>
                            </a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>




</div>



<?= $this->endSection(); ?>