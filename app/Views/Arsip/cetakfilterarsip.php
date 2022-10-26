<?= $this->extend('layout/surat/templateSurat'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Filter Arsip</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Arsip</a></li>
        <li class="breadcrumb-item active">Filter Arsip</li>
    </ol>

    <div class="card">
        <div class="card-body">
            <h5>
                Periode <?= $tanggalMin ?> s/d <?= $tanggalMax ?>
            </h5>
        </div>
    </div>

    <div class="container">
        <div class="row mb-2" style="width:400px ;">
            <form class="row g-3 needs-validation" method="post" action="<?= base_url('/Arsip/cetakFilterArsip') ?>" enctype="multipart/form-data" novalidate>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Tanggal Minimal</label>
                    <input type="date" class="form-control" id="validationCustom02" value="" id="tanggal_min" name="tanggal_min" required>
                    <div class="invalid-feedback">
                        Tanggal Minimal Tidak Boleh Kosong!
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Tanggal Maxmimal</label>
                    <input type="date" class="form-control" id="validationCustom02" value="" id="tanggal_max" name="tanggal_max" required>
                    <div class="invalid-feedback">
                        Tanggal Maxmimal Tidak Boleh Kosong!
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>

        </div>

    </div>

    <div class="card mb-3 mt-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Surat Keluar
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
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
                    <?php $i = 1 ?>
                    <?php foreach ($dataFilter->getResultArray() as $sm) : ?>
                        <tr>
                            <td><?= $sm['nama_arsip'] ?></td>
                            <?php $date = date('d-M-Y', strtotime($sm['tgl_arsip'])) ?>
                            <td><?= $date ?></td>
                            <td><?= $sm['ket_arsip'] ?></td>
                            <td><?= $sm['nama_jenis'] ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fileModal<?= $i ?>">
                                    Lihat file
                                </button>
                                <div class="modal fade" id="fileModal<?= $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $sm['file_arsip'] ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" width="1220" height="400" src="asset/pdf/<?= $sm['file_arsip'] ?>"></iframe>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++ ?>
                                <!-- <a href="<?= base_url('asset/pdf/' . $sm['file_arsip']) ?>"><?= $sm['file_arsip'] ?> </a> -->
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






<?= $this->endSection(); ?>