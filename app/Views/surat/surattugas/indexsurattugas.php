<?= $this->extend('layout/surat/templateSurat'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Surat Tugas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Surat Tugas</li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <b>surat Tugas</b> adalah surat resmi yang dibuat yang dikeluarkan oleh seorang pejabat yang berkuasa di instansi atau lembaga tertentu yang mana isinya menugaskan seorang pegawai atau staf guna melakukan suatu pekerjaan.
        </div>
    </div>
    <?php if (session()->getFlashData('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashData('err')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashData('err'); ?>
        </div>
    <?php endif; ?>
    <div class="card mb-4">
        <div class="card-header" style="background-color:#60AEB2;color:white ;">
            <i class="fas fa-table me-1"></i>
            Data Surat Tugas
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Surat
            </button>
            <a href="<?= base_url('/SuratTugas/formfilter') ?>">
                <button class="btn btn-primary mt-2 mb-2" type="submit">Filter</button>
            </a>
            <table id="datatablesSimple" class="table table-hover">
                <thead>
                    <tr style="background-color:#60AEB2;color:white ;">
                        <th>No surat</th>
                        <th>keperluan</th>
                        <th>Tempat</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Pembebanan Biaya</th>
                        <th>Alat Angkut</th>
                        <th>Tanggal surat</th>
                        <th>Berkas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No surat</th>
                        <th>keperluan</th>
                        <th>Tempat</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Pembebanan Biaya</th>
                        <th>Alat Angkut</th>
                        <th>Tanggal surat</th>
                        <th>Berkas</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach ($surattugas as $sm) : ?>
                        <tr>
                            <?php $dateMulai = date('d-M-Y', strtotime($sm['tanggal_mulai'])) ?>
                            <?php $dateSelesai = date('d-M-Y', strtotime($sm['tanggal_selesai'])) ?>
                            <?php $dateRilis = date('d-M-Y', strtotime($sm['tgl_rilis'])) ?>
                            <td><?= $sm['no_surat'] ?></td>
                            <td><?= $sm['keperluan'] ?></td>
                            <td><?= $sm['tempat_tujuan'] ?></td>
                            <td><?= $dateMulai ?> s/d <?= $dateSelesai ?></td>
                            <td><?= $sm['beban_biaya'] ?></td>
                            <td><?= $sm['alat_angkut'] ?></td>
                            <td><?= $dateRilis ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fileModal<?= $i ?>">
                                    Lihat file
                                </button>
                                <div class="modal fade" id="fileModal<?= $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $sm['file'] ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" width="1220" height="400" src="asset/pdf/<?= $sm['file'] ?>"></iframe>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++ ?>
                                <!-- <a href="<?= base_url('asset/pdf/' . $sm['file']) ?>"><?= $sm['file'] ?> </a> -->
                            </td>
                            <td>
                                <button type="button " class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#formedit-<?= $sm['id_surat'] ?>">
                                    <a><i class="fas fa-edit"></i></a>
                                </button>
                                <form action="<?= base_url('SuratTugas/' . $sm['id_surat']) ?>" method="post" class="d-inline">
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
            <div class="modal-header" style="background-color:#60AEB2;color:white ;">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Surat Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="post" action="<?= base_url('/SuratTugas/tambahSuratTugas') ?>" enctype="multipart/form-data" novalidate>
                    <div class="col-12">
                        <label for="validationCustom01" class="form-label">No surat</label>
                        <input type="text" class="form-control" id="validationCustom01" value="" id="no_surat" name="no_surat" required>
                        <div class="invalid-feedback">
                            Silahkan Isi No Surat!
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="validationCustom01" class="form-label">Keperluan</label>
                        <input type="text" class="form-control" id="validationCustom01" value="" id="keperluan" name="keperluan" required>
                        <div class="invalid-feedback">
                            Asal Surat Tidak Boleh Kosong!
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="validationCustom02" class="form-label">Tempat Tujuan</label>
                        <input type="text" class="form-control" id="validationCustom02" value="" id="tempat_tujuan" name="tempat_tujuan" required>
                        <div class="invalid-feedback">
                            Tujuan Surat Tidak Boleh Kosong!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="validationCustom02" value="" id="tanggal_mulai" name="tanggal_mulai" required>
                        <div class="invalid-feedback">
                            Tanggal Mulai Tidak Boleh Kosong!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="validationCustom02" value="" id="tanggal_selesai" name="tanggal_selesai" required>
                        <div class="invalid-feedback">
                            Tanggal Selesai Tidak Boleh Kosong!
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="validationCustom02" class="form-label">Pembebanan Biaya</label>
                        <input type="text" class="form-control" id="validationCustom02" value="" id="beban_biaya" name="beban_biaya" required>
                        <div class="invalid-feedback">
                            Pembebanan Biaya Tidak Boleh Kosong!
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="validationCustom02" class="form-label">Alat angkut yang digunakan</label>
                        <input type="text" class="form-control" id="validationCustom02" value="" id="alat_angkut" name="alat_angkut" required>
                        <div class="invalid-feedback">
                            Alat angkut yang digunakan Tidak Boleh Kosong!
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Tanggal Surat di Buat</label>
                        <input type="date" class="form-control" id="validationCustom02" value="" id="tgl_rilis" name="tgl_rilis" required>
                        <div class="invalid-feedback">
                            Tanggal Surat Tidak Boleh Kosong!
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="validationCustom02" class="form-label">file</label>
                        <input type="file" class="form-control" aria-label="file example" name="file" required>
                        <div class="invalid-feedback">
                            File Tidak Boleh Kosong!
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($surattugas as $sm) : ?>
    <!-- ModalEdit -->
    <div class="modal fade" id="formedit-<?= $sm['id_surat'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#60AEB2;color:white ;">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Surat Tugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/SuratTugas/edit/' . $sm['id_surat']) ?>" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
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
                            <label for="validationCustom01" class="form-label">Keperluan</label>
                            <input type="text" class="form-control" id="validationCustom01" value="<?= $sm['keperluan'] ?>" id="keperluan" name="keperluan" required>
                            <div class="invalid-feedback">
                                Asal Surat Tidak Boleh Kosong!
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="validationCustom02" class="form-label">Tempat Tujuan</label>
                            <input type="text" class="form-control" id="validationCustom02" value="<?= $sm['tempat_tujuan'] ?>" id="tempat_tujuan" name="tempat_tujuan" required>
                            <div class="invalid-feedback">
                                Tujuan Surat Tidak Boleh Kosong!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="validationCustom02" value="<?= $sm['tanggal_mulai'] ?>" id="tanggal_mulai" name="tanggal_mulai" required>
                            <div class="invalid-feedback">
                                Tanggal Mulai Tidak Boleh Kosong!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="validationCustom02" value="<?= $sm['tanggal_selesai'] ?>" id="tanggal_selesai" name="tanggal_selesai" required>
                            <div class="invalid-feedback">
                                Tanggal Selesai Tidak Boleh Kosong!
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="validationCustom02" class="form-label">Pembebanan Biaya</label>
                            <input type="text" class="form-control" id="validationCustom02" value="<?= $sm['beban_biaya'] ?>" id="beban_biaya" name="beban_biaya" required>
                            <div class="invalid-feedback">
                                Pembebanan Biaya Tidak Boleh Kosong!
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="validationCustom02" class="form-label">Alat angkut yang digunakan</label>
                            <input type="text" class="form-control" id="validationCustom02" value="<?= $sm['alat_angkut'] ?>" id="alat_angkut" name="alat_angkut" required>
                            <div class="invalid-feedback">
                                Alat angkut yang digunakan Tidak Boleh Kosong!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Tanggal Surat di Buat</label>
                            <input type="date" class="form-control" id="validationCustom02" value="<?= $sm['tgl_rilis'] ?>" id="tgl_rilis" name="tgl_rilis" required>
                            <div class="invalid-feedback">
                                Tanggal Surat Tidak Boleh Kosong!
                            </div>
                        </div>
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