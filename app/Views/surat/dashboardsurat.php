<?= $this->extend('layout/surat/templateDashboardSurat'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Surat</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Surat Masuk : <?= $jumlahSuratMasuk ?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url("/SuratMasuk") ?>">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Surat Keluar : <?= $jumlahSuratKeluar ?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url("/SuratKeluar") ?>">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Surat Tugas : <?= $jumlahSuratTugas ?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url("/SuratTugas") ?>">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Surat Disposisi</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="suratdashboard" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle mb-3" data-bs-toggle="dropdown" aria-expanded="false">
                        Tambah
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#masuk" href="#">Surat Masuk</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#keluar" href="#">Surat Keluar</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#tugas" href="#">Surat Tugas</a></li>
                    </ul>
                </div>
                <thead>
                    <tr>
                        <th>Jenis Surat</th>
                        <th>No surat</th>
                        <th>Tujuan</th>
                        <th>Perihal</th>
                        <th>Tanggal</th>
                        <th>Isi Ringkas</th>
                        <th>Berkas</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Jenis Surat</th>
                        <th>No surat</th>
                        <th>Tujuan</th>
                        <th>Perihal</th>
                        <th>Tanggal</th>
                        <th>Isi Ringkas</th>
                        <th>Berkas</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($suratmasuk as $sm) : ?>
                        <tr>
                            <td><?= $sm['jenis_surat'] ?></td>
                            <td><?= $sm['no_surat'] ?></td>
                            <td><?= $sm['tujuan_surat'] ?></td>
                            <td><?= $sm['perihal'] ?></td>
                            <?php $date = date('d-m-Y', strtotime($sm['tanggal_masuk'])) ?>
                            <td><?= $date ?></td>
                            <td><?= $sm['isi_ringkas'] ?></td>
                            <td>
                                <a href="<?= base_url('asset/pdf/' . $sm['file']) ?>"><?= $sm['file'] ?> </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php foreach ($suratkeluar as $sm) : ?>
                        <tr>
                            <td><?= $sm['jenis_surat'] ?></td>
                            <td><?= $sm['no_surat'] ?></td>
                            <td><?= $sm['tujuan_surat'] ?></td>
                            <td><?= $sm['perihal'] ?></td>
                            <?php $date = date('d-m-Y', strtotime($sm['tanggal_keluar'])) ?>
                            <td><?= $date ?></td>
                            <td><?= $sm['isi_ringkas'] ?> </td>
                            <td>
                                <a href="<?= base_url('asset/pdf/' . $sm['file']) ?>"><?= $sm['file'] ?> </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php foreach ($surattugas as $sm) : ?>
                        <tr>
                            <?php $dateMulai = date('d-m-Y', strtotime($sm['tanggal_mulai'])) ?>
                            <?php $dateSelesai = date('d-m-Y', strtotime($sm['tanggal_selesai'])) ?>
                            <td><?= $sm['jenis_surat'] ?></td>
                            <td><?= $sm['no_surat'] ?></td>
                            <td><?= $sm['tempat_tujuan'] ?></td>
                            <td><?= $sm['keperluan'] ?></td>
                            <td><?= $dateMulai ?> s/d <?= $dateSelesai ?></td>
                            <td><?= $sm['beban_biaya'] ?> </td>
                            <td>
                                <a href="<?= base_url('asset/pdf/' . $sm['file']) ?>"><?= $sm['file'] ?> </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal MASUK -->
<div class="modal fade" id="masuk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Surat Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="post" action="<?= base_url('/BerandaSurat/tambahSuratMasukDashboard') ?>" enctype="multipart/form-data" novalidate>
                    <?= csrf_field(); ?>
                    <div class="col-12">
                        <label for="validationCustom01" class="form-label">No surat</label>
                        <input type="text" class="form-control" id="validationCustom01" value="" id="no_surat" name="no_surat" required>
                        <div class="invalid-feedback">
                            Silahkan Isi No Surat!
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="validationCustom01" class="form-label">Asal Surat</label>
                        <input type="text" class="form-control" id="validationCustom01" value="" id="asal_surat" name="asal_surat" required>
                        <div class="invalid-feedback">
                            Asal Surat Tidak Boleh Kosong!
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
                        <label for="validationCustom02" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="validationCustom02" value="" id="tanggal_masuk" name="tanggal_masuk" required>
                        <div class="invalid-feedback">
                            Tanggal Masuk Tidak Boleh Kosong!
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="validationCustom02" class="form-label">Isi Ringkas</label>
                        <input type="text" class="form-control" id="validationCustom02" value="" id="isi_ringkas" name="isi_ringkas" required>
                        <div class="invalid-feedback">
                            Isi Ringkas Tidak Boleh Kosong!
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="validationCustom02" class="form-label">Alasan</label>
                        <input type="text" class="form-control" id="validationCustom02" value="" id="alasan" name="alasan" required>
                        <div class="invalid-feedback">
                            Alasan Tidak Boleh Kosong!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom04" class="form-label">Keterangan</label>
                        <select class="form-select" id="validationCustom04" id="ket_surat" name="ket_surat" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="Ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>
                        <div class="invalid-feedback">
                            Silahkan Pilih Keterangan
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
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="keluar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Surat Keluar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="post" action="<?= base_url('/BerandaSurat/tambahSuratKeluarDashboard') ?>" enctype="multipart/form-data" novalidate>
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
                    <div class="col-12">
                        <label for="validationCustom02" class="form-label">Isi Ringkas</label>
                        <input type="text" class="form-control" id="validationCustom02" value="" id="isi_ringkas" name="isi_ringkas" required>
                        <div class="invalid-feedback">
                            Isi Ringkas Tidak Boleh Kosong!
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
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tugas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Surat Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="post" action="<?= base_url('/BerandaSurat/tambahSuratTugasDashboard') ?>" enctype="multipart/form-data" novalidate>
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
                        <label for="validationCustom02" class="form-label">Rincian Biaya</label>
                        <input type="text" class="form-control" id="validationCustom02" value="" id="beban_biaya" name="beban_biaya" required>
                        <div class="invalid-feedback">
                            Rincian Biaya Tidak Boleh Kosong!
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
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>