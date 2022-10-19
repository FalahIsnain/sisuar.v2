<?= $this->extend('layout/surat/templateSurat'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Arsip</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Arsip</li>
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
                Tambah Arsip
            </button>
            <a href="<?= base_url('/arsip/formfilter') ?>">
                <button class="btn btn-primary mt-2 mb-2" type="submit">Filter</button>
            </a>
            <table id="datatablesSimple" class="table table-hover">
                <thead>
                    <tr style="background-color:#8FBDD3;color:white ;">
                        <th>Nama</th>
                        <th>Tanggal Arsip</th>
                        <th>Keterangan</th>
                        <th>Jenis</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal Arsip</th>
                        <th>Keterangan</th>
                        <th>Jenis</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($arsip as $sm) : ?>
                        <tr>
                            <td><?= $sm['nama_arsip'] ?></td>
                            <?php $date = date('d-M-Y', strtotime($sm['tgl_arsip'])) ?>
                            <td><?= $date ?></td>
                            <td><?= $sm['ket_arsip'] ?></td>
                            <td><?= $sm['nama_jenis'] ?></td>
                            <td>
                                <a href="<?= base_url('asset/pdf/' . $sm['file_arsip']) ?>"><?= $sm['file_arsip'] ?> </a>
                            </td>
                            <td>
                                <button type="button " class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#formedit-<?= $sm['id_arsip'] ?>">
                                    <a><i class="fas fa-edit"></i></a>
                                </button>
                                <form action="<?= base_url('Arsip/' . $sm['id_arsip']) ?>" method="post" class="d-inline">
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
            <div class="modal-header"style="background-color:#8FBDD3;color:white ;">
                <h5 class="modal-title" id="staticBackdropLabel" >Tambah Arsip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="post" action="<?= base_url('/Arsip/tambahArsip') ?>" enctype="multipart/form-data" novalidate>
                    <div class="col-12">
                        <label for="validationCustom01" class="form-label">Nama Arsip</label>
                        <input type="text" class="form-control" id="validationCustom01" value="" id="nama_arsip" name="nama_arsip" required>
                        <div class="invalid-feedback">
                            Silahkan Isi No Surat!
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="validationCustom02" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="validationCustom02" value="" id="tgl_arsip" name="tgl_arsip" required>
                        <div class="invalid-feedback">
                            Tanggal Masuk Tidak Boleh Kosong!
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="validationCustom01" class="form-label">Keterangan Arsip</label>
                        <input type="text" class="form-control" id="validationCustom01" value="" id="ket_arsip" name="ket_arsip" required>
                        <div class="invalid-feedback">
                            Silahkan Isi Keterangan Surat!
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="validationCustom04" class="form-label">Jenis</label>
                        <select class="form-select" id="validationCustom04" id="jenis" name="jenis" required>
                            <option selected disabled value="">Choose...</option>
                            <?php
                            foreach ($jenis as $row) {
                            ?>
                                <option value="<?= $row['id_jenis'] ?>"> <?= $row['nama_jenis'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            Silahkan Pilih Jenis Surat
                        </div>
                    </div>
                    <!-- <div class="col-12">
                        <label for="validationCustom02" class="form-label">Alasan</label>
                        <input type="text" class="form-control" id="validationCustom02" value="" id="alasan" name="alasan" required>
                        <div class="invalid-feedback">
                            Alasan Tidak Boleh Kosong!
                        </div>
                    </div> -->

                    <div class="col-12">
                        <label for="formFile" class="form-label">File</label>
                        <input class="form-control" type="file" id="formFile" name="file_arsip" required>
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



<?= $this->endSection(); ?>