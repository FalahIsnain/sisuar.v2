<?= $this->extend('layout/surat/templateSurat'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid px-4">

    <h1 class="mt-4">Surat Disposisi</h1>
    <div class="card mb-4">
        <div class="card-body">
            <b>Disposisi</b> adalah pendapat seorang pejabat mengenai urusan yang termuat dalam suatu surat dinas.
        </div>
    </div>


    <div class="card mb-4">
        <div class="card-header" style="background-color:#A8876F;color:white ;">
            <i class="fas fa-table me-1"></i>
            Data Surat Disposisi
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-hover">
                <thead>
                    <tr style="background-color:#A8876F;color:white ;">
                        <th>No surat</th>
                        <th>Asal Surat</th>
                        <th>Tujuan</th>
                        <th>Perihal</th>
                        <th>Tanggal Masuk</th>
                        <th>Berkas</th>
                        <th>Tanggapan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No surat</th>
                        <th>Asal Surat</th>
                        <th>Tujuan</th>
                        <th>Perihal</th>
                        <th>Tanggal Masuk</th>
                        <th>Berkas</th>
                        <th>Tanggapan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($suratdisposisi as $sm) : ?>
                        <tr>
                            <td><?= $sm['no_surat'] ?></td>
                            <td><?= $sm['asal_surat'] ?></td>
                            <td><?= $sm['tujuan_surat'] ?></td>
                            <td><?= $sm['perihal'] ?></td>
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