<?= $this->extend('layout/surat/templateSurat'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Filter Surat Tugas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Surat Tugas</a></li>
        <li class="breadcrumb-item active">Filter Surat</li>
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
            <form class="row g-3 needs-validation" method="post" action="<?= base_url('/SuratTugas/cetakFilterSuratTugas') ?>" enctype="multipart/form-data" novalidate>
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
            Data Surat Tugas
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No surat</th>
                        <th>keperluan</th>
                        <th>Tempat</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Biaya</th>
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
                        <th>Biaya</th>
                        <th>Tanggal surat</th>
                        <th>Berkas</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($dataFilter->getResultArray() as $sm) : ?>
                        <tr>
                            <?php $dateMulai = date('d-m-Y', strtotime($sm['tanggal_mulai'])) ?>
                            <?php $dateSelesai = date('d-m-Y', strtotime($sm['tanggal_selesai'])) ?>
                            <?php $dateRilis = date('d-M-Y', strtotime($sm['tgl_rilis'])) ?>
                            <td><?= $sm['no_surat'] ?></td>
                            <td><?= $sm['keperluan'] ?></td>
                            <td><?= $sm['tempat_tujuan'] ?></td>
                            <td><?= $dateMulai ?> s/d <?= $dateSelesai ?></td>
                            <td><?= $sm['beban_biaya'] ?></td>
                            <td><?= $dateRilis ?> </td>
                            <td>
                                <a href="<?= base_url('asset/pdf/' . $sm['file']) ?>"><?= $sm['file'] ?> </a>
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

                        </tr>>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>






<?= $this->endSection(); ?>