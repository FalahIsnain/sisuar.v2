<?= $this->extend('layout/surat/templateSurat'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Surat Keluar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Surat Keluar</li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <b>surat Keluar</b> adalah semua surat yang dibuat/ dikeluarkan oleh suatu perusahaan atau organisasi untuk diberikan kepada pihak lain, baik kepada perorangan maupun perusahaan/ organisasi.
        </div>
    </div>
    <?php if (session()->getFlashData('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="card mb-4">
        <div class="card-header" style="background-color:#F7C33A;color:white ;">
            <i class="fas fa-table me-1"></i>
            Data Surat Keluar
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Surat
            </button>
            <a href="<?= base_url('/SuratKeluar/formfilter') ?>">
                <button class="btn btn-primary mt-2 mb-2" type="submit">Filter</button>
            </a>
            <table id="datatablesSimple">
                <thead>
                    <tr style="background-color:#F7C33A;color:white ;">
                        <th>No surat</th>
                        <th>Tujuan Surat</th>
                        <th>Perihal</th>
                        <!-- <th>Isi Ringkas</th> -->
                        <th>Tanggal Keluar</th>
                        <th>Berkas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No surat</th>
                        <th>Tujuan Surat</th>
                        <th>Perihal</th>
                        <!-- <th>Isi Ringkas</th> -->
                        <th>Tanggal Keluar</th>
                        <th>Berkas</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($suratkeluar as $sm) : ?>
                        <tr>
                            <td><?= $sm['no_surat'] ?></td>
                            <td><?= $sm['tujuan_surat'] ?></td>
                            <td><?= $sm['perihal'] ?></td>
                            <!-- <td><?= $sm['isi_ringkas'] ?> </td> -->
                            <?php $date = date('d-M-Y', strtotime($sm['tanggal_keluar'])) ?>
                            <td><?= $date ?></td>
                            <td>
                                <a href="<?= base_url('asset/pdf/' . $sm['file']) ?>"><?= $sm['file'] ?> </a>
                            </td>
                            <td>
                                <button type="button " class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#formedit-<?= $sm['id_surat'] ?>">
                                    <a><i class="fas fa-edit"></i></a>
                                </button>
                                <form action="<?= base_url('SuratKeluar/' . $sm['id_surat']) ?>" method="post" class="d-inline">
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
<!-- Modal Create-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Surat Keluar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="post" action="<?= base_url('/SuratKeluar/tambahSuratKeluar') ?>" enctype="multipart/form-data" novalidate>
                    <?php csrf_field() ?>
                    <div class="col-12">
                        <label for="validationCustom01" class="form-label">No surat</label>
                        <input type="text" class="form-control" id="validationCustom01" value="" id="no_surat" name="no_surat" required>
                        <div class="invalid-feedback">
                            Silahkan Isi No Surat!
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="validationCustom02" class="form-label">Tujuan Surat</label>
                        <input type="text" class="form-control" id="validationCustom02" value="" id="tujuan_surat" name="tujuan_surat" required>
                        <div class="invalid-feedback">
                            Tujuan Surat Tidak Boleh Kosong!
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="validationCustom02" class="form-label">Perihal</label>
                        <input type="text" class="form-control" id="validationCustom02" value="" id="perihal" name="perihal" required>
                        <div class="invalid-feedback">
                            Perihal Tidak Boleh Kosong!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Tanggal keluar</label>
                        <input type="date" class="form-control" id="validationCustom02" value="" id="tanggal_keluar" name="tanggal_keluar" required>
                        <div class="invalid-feedback">
                            Tanggal Masuk Tidak Boleh Kosong!
                        </div>
                    </div>
                    <!-- <div class="col-12">
                        <label for="validationCustom02" class="form-label">Isi Ringkas</label>
                        <input type="text" class="form-control" id="validationCustom02" value="" id="isi_ringkas" name="isi_ringkas" required>
                        <div class="invalid-feedback">
                            Isi Ringkas Tidak Boleh Kosong!
                        </div>
                    </div> -->

                    <div class="col-12">
                        <label for="validationCustom02" class="form-label">file</label>
                        <input type="file" class="form-control" aria-label="file example" name="file" required>
                        <div class="invalid-feedback">
                            File Tidak Boleh Kosong!
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


<!-- Modal Edit-->
<?php foreach ($suratkeluar as $sm) : ?>
    <div class="modal fade" id="formedit-<?= $sm['id_surat'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Surat Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/SuratKeluar/edit/' . $sm['id_surat']) ?>" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="fileLama" value="<?= $sm['file']; ?>"> </input>
                        <div class="col-12">
                            <label for="validationCustom01" class="form-label">No surat</label>
                            <input type="text" class="form-control" id="validationCustom01" value="<?= $sm['no_surat'] ?>" id="no_surat" name="no_surat" required>
                            <div class="invalid-feedback">
                                Silahkan Isi No Surat!
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="validationCustom02" class="form-label">Tujuan Surat</label>
                            <input type="text" class="form-control" id="validationCustom02" value="<?= $sm['tujuan_surat'] ?>" id="tujuan_surat" name="tujuan_surat" required>
                            <div class="invalid-feedback">
                                Tujuan Surat Tidak Boleh Kosong!
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="validationCustom02" class="form-label">Perihal</label>
                            <input type="text" class="form-control" id="validationCustom02" value="<?= $sm['perihal'] ?>" id="perihal" name="perihal" required>
                            <div class="invalid-feedback">
                                Perihal Tidak Boleh Kosong!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Tanggal keluar</label>
                            <input type="date" class="form-control" id="validationCustom02" value="<?= $sm['tanggal_keluar'] ?>" id="tanggal_keluar" name="tanggal_keluar" required>
                            <div class="invalid-feedback">
                                Tanggal Masuk Tidak Boleh Kosong!
                            </div>
                        </div>
                        <!-- <div class="col-12">
                            <label for="validationCustom02" class="form-label">Isi Ringkas</label>
                            <input type="text" class="form-control" id="validationCustom02" value="<?= $sm['isi_ringkas'] ?>" id="isi_ringkas" name="isi_ringkas" required>
                            <div class="invalid-feedback">
                                Isi Ringkas Tidak Boleh Kosong!
                            </div>
                        </div> -->

                        <div class="col-12">
                            <label for="validationCustom02" class="costum-file-label"><?= $sm['file'] ?></label>
                            <input class="form-control" type="file" id="formFile" name="file" value="<?= $sm['file'] ?>">
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
<?php endforeach; ?>

<?= $this->endSection(); ?>