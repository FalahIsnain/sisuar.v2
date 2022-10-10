<?= $this->extend('layout/surat/templateSurat'); ?>
<?= $this->section('content'); ?>
<div class="container ml-8">
    <center>
        <div class="container mt-1 mb-3">
            <h2>
                Surat Disposisi
            </h2>
        </div>
    </center>
    <!-- <?php if (session()->getFlashData('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?> -->
    <!-- <button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Tambah Surat
    </button>
    <a href="<?= base_url('/SuratMasuk/formfilter') ?>">
        <button class="btn btn-primary mt-2 mb-2" type="submit">Filter</button>
    </a> -->
    <div class="tablebox" style="width: 1300px;">
        <table id="table" class="table table-striped" style="width:100%">

            <thead>
                <tr style="background-color: #5E8B7E;color:white">
                    <th>No surat</th>
                    <th>Asal Surat</th>
                    <th>Tujuan</th>
                    <th>Perihal</th>
                    <!-- <th>Isi Ringkas</th> -->
                    <th>Tanggal Masuk</th>
                    <th>Berkas</th>
                    <th>Tanggapan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($suratdisposisi as $sm) : ?>
                    <tr>
                        <td><?= $sm['no_surat'] ?></td>
                        <td><?= $sm['asal_surat'] ?></td>
                        <td><?= $sm['tujuan_surat'] ?></td>
                        <td><?= $sm['perihal'] ?></td>
                        <!-- <td><?= $sm['isi_ringkas'] ?></td> -->
                        <?php $date = date('d-M-Y', strtotime($sm['tanggal_masuk'])) ?>
                        <td><?= $date ?></td>
                        <td>
                            <a href="<?= base_url('asset/pdf/' . $sm['file']) ?>"><?= $sm['file'] ?> </a>
                        </td>
                        <td>
                            <?php
                            if ($sm['ket_surat'] == 'Ya') { ?>
                                <a href="<?= site_url('SuratMasuk/Disposisi/' . $sm['id_surat']) ?>">
                                    <button type="button" class="btn btn-success">Disposisi</button>
                                </a>
                            <?php } else { ?>
                                <button type="button" class="btn btn-danger">Disposisi</button>
                            <?php } ?>
                        </td>
                        <td>
                            <button type="button " class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#formedit-<?= $sm['id_surat'] ?>">
                                <a><i class="fas fa-edit"></i></a>
                            </button>
                            <form action="<?= base_url('SuratMasuk/' . $sm['id_surat']) ?>" method="post" class="d-inline">
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

<?= $this->endSection(); ?>