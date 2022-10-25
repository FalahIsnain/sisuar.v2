<?= $this->extend('layout/surat/templateSurat'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Jenis Arsip</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Jenis Arsip</li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <?php if (session()->getFlashData('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="card mb-4">
        <div class="card-header" style="background-color:#8FBDD3;color:white ;">
            <i class="fas fa-table me-1"></i>
            Data Arsip
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Jenis Arsip
            </button>
            <table id="datatablesSimple" class="table table-hover">
                <thead>
                    <tr style="background-color:#8FBDD3;color:white ;">
                        <th>Nama Jenis</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Jenis</th>
                        <th>AKsi</th>

                </tfoot>
                <tbody>
                    <?php foreach ($jenis as $sm) : ?>
                        <tr>
                            <td><?= $sm['nama_jenis'] ?></td>
                            <td>
                                <button type="button " class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#formedit-<?= $sm['id_jenis'] ?>">
                                    <a><i class="fas fa-edit"></i></a>
                                </button>
                                <form action="<?= base_url('Arsip/indexJenis/' . $sm['id_jenis']) ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin');"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#8FBDD3;color:white ;">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Jenis Arsip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="post" action="<?= base_url('/Arsip/tambahJenis') ?>" enctype="multipart/form-data" novalidate>
                    <div class="col-12">
                        <label for="validationCustom01" class="form-label">Tipe Jenis Arsip</label>
                        <input type="text" class="form-control" id="validationCustom01" value="" id="nama_jenis" name="nama_jenis" required>
                        <div class="invalid-feedback">
                            Silahkan Isi Jenis Arsip!
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal EDIT-->
<?php foreach ($jenis as $sm) : ?>
    <div class="modal fade" id="formedit-<?= $sm['id_jenis'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#8FBDD3;color:white ;">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Arsip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/Arsip/editJenis/' . $sm['id_jenis']) ?>" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                        <?= csrf_field(); ?>
                        <div class="col-12">
                            <label for="validationCustom01" class="form-label">Nama Arsip</label>

                            <input type="text" class="form-control" id="validationCustom01" value="<?= $sm['nama_jenis'] ?>" id="nama_jenis" name="nama_jenis" required>
                            <div class="invalid-feedback">
                                Silahkan Isi No Surat!
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>


<?= $this->endSection(); ?>