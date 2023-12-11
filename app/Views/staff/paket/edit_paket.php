<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="row">
    <div class="container-fluid">
        <div class="col-md-6 col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Edit Paket Try Out</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="<?= base_url('dashboard/admin/update_paket_try_out/' . $paket['kode_paket']); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Paket Try Out</label>
                                    </div>

                                    <div class="col-md-8 form-group">
                                        <input type="text" id="nama_paket" class="form-control" name="nama_paket" placeholder="Paket Try Out" value="<?= $paket['nama_paket']; ?>">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Jenis Try Out</label>
                                    </div>

                                    <div class="col-md-8 form-group">
                                        <select class="form-control" name="kode_jt" id="kode_jt" required>
                                            <?php foreach ($jenis as $key) { ?>
                                                <option value="<?= $key['kode_jt']; ?>" <?= ($key['kode_jt'] == $paket['kode_jt']) ? 'selected' : ''; ?>><?= $key['jenis_to']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <br><br>
                                    </div>

                                    <div class=" col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <a href="<?= base_url('dashboard/admin/paket_try_out'); ?>" class="btn btn-secondary me-1 mb-1">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>