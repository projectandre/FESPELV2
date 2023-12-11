<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="row">
    <div class="container-fluid">
        <div class="col-md-6 col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Edit Try Out</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="<?= base_url('dashboard/admin/update_jenis_try_out/' . $jenis['kode_jt']); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Jenis Try Out</label>
                                    </div>

                                    <div class="col-md-8 form-group">
                                        <input type="text" id="jenis_to" class="form-control" name="jenis_to" placeholder="Jenis Try Out" value="<?= $jenis['jenis_to']; ?>">
                                        <br><br>
                                    </div>

                                    <div class=" col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                        <a href="<?= base_url('dashboard/admin/jenis_try_out'); ?>" class="btn btn-secondary me-1 mb-1">Kembali</a>
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