<?= $this->extend('layout/surat/templateSurat'); ?>container-fluid px-4
<?= $this->section('content'); ?>

<div class="container-fluid px-4">

    <h1 class="mt-4">Disposisi</h1>
    <div class="card mb-4">
        <div class="card-body">
            <b>Disposisi</b> adalah pendapat seorang pejabat mengenai urusan yang termuat dalam suatu surat dinas.
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="card mb-3" style="height:550px;">
                <div class="card-header">
                    <h5>Detail Surat</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered w-max h-max">
                        <tbody>
                            <tr>
                                <th scope="row">No Surat : </th>
                                <td><?= $detailSurat['no_surat'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Asal Surat : </th>
                                <td><?= $detailSurat['asal_surat'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tujuan Surat : </th>
                                <td><?= $detailSurat['tujuan_surat'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Perihal : </th>
                                <td><?= $detailSurat['perihal'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Masuk : </th>

                                <td><?= $date = date('d-M-Y', strtotime($detailSurat['tanggal_masuk'])) ?></td>
                            </tr>
                            <!-- <tr>
                                <th scope="row">Isi Ringkas : </th>
                                <td><?= $detailSurat['isi_ringkas'] ?></td>
                            </tr> -->
                            <tr>
                                <th scope="row">Keterangan : </th>
                                <td><?= $detailSurat['ket_surat'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Alasan : </th>
                                <td><?= $detailSurat['alasan'] ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
        <div class="col-6 col-md-5">
            <div class="card mb-3" style="max-width:max; max-height: max-content;">
                <div class="card-header">
                    <h5>DISPOSISI</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/SuratMasuk/tambahDisposisi') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_surat" value="<?= $detailSurat['id_surat'] ?>">
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered">
                                    <tbody>
                                        <td>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1. Untuk Diketahui" name="arrDisposisi[]" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            1. Untuk Diketahui
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="7. Ambil Langkah Sepertinya" name="arrDisposisi[]" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            7. Ambil Langkah Sepertinya
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="2. Untk Diperhatikan" name="arrDisposisi[]" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            2. Untk Diperhatikan
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="8. Dibicarakan" name="arrDisposisi[]" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            8. Dibicarakan
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="3. Untuk Dipelajari" name="arrDisposisi[]" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            3. Untuk Dipelajari
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="9. Dilaporkan" name="arrDisposisi[]" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            9. Dilaporkan
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>

                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="4. Disiapkan Jawaban" name="arrDisposisi[]" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            4. Disiapkan Jawaban
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="10. Segera Dilesaikan" name="arrDisposisi[]" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            10. Segera Dilesaikan
                                                        </label>
                                                    </div>
                                                </td>


                                            </tr>
                                            <tr>

                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="5. Jawab Langsung" name="arrDisposisi[]" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            5. Jawab Langsung
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="11. Copy Untuk..." name="arrDisposisi[]" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            11. Copy Untuk...
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>

                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="6. ACC untuk ditindak lanjuti" name="arrDisposisi[]" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            6. ACC untuk ditindak lanjuti
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="12. Arsip" name="arrDisposisi[]" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            12. Arsip
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </td>




                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Dari</span>
                            <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="dari">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Kepada</span>
                            <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="kepada">
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Keterangan</span>
                            <textarea class="form-control" aria-label="With textarea" name="keterangan"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2" style="width:max;">Kirim</button>




                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- Columns are always 50% wide, on mobile and desktop -->
    <div class="row">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header">File</h5>
                <div class="card-body text-center">
                    <i class='bx bx-file bx-lg' style="width:500px ;"></i>
                    <p class="card-text"><?= $detailSurat['file'] ?></p>
                    <a href="<?= base_url('asset/pdf/' . $detailSurat['file']) ?>" class="btn btn-primary">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Riwayat Disposisi</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Dari</th>
                                <th scope="col">Kepada</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Disposisi</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($disposisiCetak->getResultArray() as $sm) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $sm['dari'] ?></td>
                                    <td><?= $sm['kepada'] ?></td>
                                    <td><?= $sm['ket'] ?></td>
                                    <td>
                                        <?= $sm['disposisi'] ?>

                                    </td>
                                    <?php $no++ ?>
                                <?php endforeach; ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection(); ?>