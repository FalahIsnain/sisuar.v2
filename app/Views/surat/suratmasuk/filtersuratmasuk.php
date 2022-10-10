<?= $this->extend('layout/surat/templateSurat'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Filter Surat Masuk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Surat Masuk</a></li>
        <li class="breadcrumb-item active">Filter Surat</li>
    </ol>


    <div class="container" style="margin-left:30px ;">
        <div class="row mb-2" style="width:400px ;">
            <form class="row g-3 needs-validation" method="post" action="<?= base_url('/SuratMasuk/cetakFilterSuratMasuk') ?>" enctype="multipart/form-data" novalidate>
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

</div>






<?= $this->endSection(); ?>