<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="row">
    <?php
    foreach ($jadwal as $key) :
    ?>
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title text-center"><?= $key['nama_paket']; ?></h4>
                        <p class="card-text">
                        <table class="table">
                            <tr>
                                <td>Tanggal</td>
                                <td><?= strftime('%A, %d %B %Y', strtotime($key['tgl_pelaksanaan'])); ?></td>
                            </tr>
                            <tr>
                                <td>Waktu/Jam</td>
                                <td><?= date('H:i', strtotime($key['jam_mulai'])) ?> - <?= date('H:i', strtotime($key['jam_selesai'])) ?> WIB</td>
                            </tr>
                            <tr>
                                <td>Batas Daftar</td>
                                <td><?= strftime('%A, %d %B %Y', strtotime($key['tgl_tutup'])); ?></td>
                            </tr>
                            <tr>
                                <td>Tempat</td>
                                <td><?= $key['tempat']; ?></td>
                            </tr>
                            <tr>
                                <td>Biaya</td>
                                <td>Rp. <?= number_format($key['biaya'], 0, ',', '.'); ?></td>
                            </tr>
                        </table>
                        </p>
                        <div class="d-flex justify-content-center">
                            <a href="<?= base_url('dashboard/user/detail_jadwal/' . $key['id_jadwal']); ?>" class="btn btn-primary">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</section>


<?= $this->endSection(); ?>