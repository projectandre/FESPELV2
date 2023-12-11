<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="section row">
    <?php
    foreach ($jadwal as $key) :
    ?>
        <div class="col-md-4 col-sm-4">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title text-center"><?= $key['nama_paket']; ?></h4>
                        <div class="d-flex justify-content-center">
                            <a href="<?= base_url('dashboard/admin/validasi/pembayaran/belum/' . $key['kode_jadwal'] . '/' . $key['kode_paket']); ?>" class="btn btn-primary">Lihat Peserta Terdaftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title text-center"><?= $key['nama_paket']; ?></h4>
                        <div class="d-flex justify-content-center">
                            <a href="<?= base_url('dashboard/admin/validasi/pembayaran/sudah/' . $key['kode_jadwal'] . '/' . $key['kode_paket']); ?>" class="btn btn-primary">Lihat Peserta Sudah Bayar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title text-center"><?= $key['nama_paket']; ?></h4>
                        <div class="d-flex justify-content-center">
                            <a href="<?= base_url('dashboard/admin/validasi/pembayaran/batal/' . $key['kode_jadwal'] . '/' . $key['kode_paket']); ?>" class="btn btn-primary">Lihat Peserta Batal Bayar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>



<?= $this->endSection(); ?>