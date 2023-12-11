<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="row">

    <div class="col-md-12 col-sm-12">

        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <?php if ($status_daftar != null) { ?>
                        <div class="alert alert-light-info color-info"><i class="bi bi-exclamation-circle"></i> Anda telah terdaftar di try out ini..</div>
                    <?php } ?>
                    <h4 class="card-title"><?= $jadwal->nama_paket; ?></h4>
                    <p class="card-text">
                        SKD adalah jenis ujian CPNS yang bertujuan untuk mengukur sejauh mana kompetensi pelamar sesuai dengan standar kompetensi dasar yang diperlukan oleh PNS Republik Indonesia.
                    </p>
                    <p class="card-text">
                        Ujian SKD CPNS terdiri dari tiga subtes dan memiliki durasi total 100 menit. Subtes-subtes dalam SKD CPNS melibatkan:
                    <ol>
                        <li>Tes wawasan kebangsaan (TWK)</li>
                        <li>Tes inteligensi umum (TIU)</li>
                        <li>Tes karakteristik pribadi (TKP)</li>
                    </ol>
                    </p><br>
                    <table class="table text-center">
                        <tr>
                            <td>Tanggal</td>
                            <td><?= strftime('%A, %d %B %Y', strtotime($jadwal->tgl_pelaksanaan)); ?></td>
                        </tr>
                        <tr>
                            <td>Waktu/Jam</td>
                            <td><?= date('H:i', strtotime($jadwal->jam_mulai)) ?> - <?= date('H:i', strtotime($jadwal->jam_selesai)) ?> WIB</td>
                        </tr>
                        <tr>
                            <td>Batas Daftar</td>
                            <td><?= strftime('%A, %d %B %Y', strtotime($jadwal->tgl_tutup)); ?></td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td><?= $jadwal->tempat; ?></td>
                        </tr>
                        <tr>
                            <td>Biaya</td>
                            <td>Rp. <?= number_format($jadwal->biaya, 0, ',', '.'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <?php if ($status_daftar == null) { ?>
                    <a href="<?= base_url('dashboard/user/daftar/' . $jadwal->kode_paket . '/' . $jadwal->kode_jadwal . '/' . $jadwal->id_jadwal); ?>" class="btn btn-primary">Setuju & Lakukan Pembayaran</a>
                <?php  } else { ?>
                    <a class="btn btn-primary disabled">Setuju & Lanjutkan Pendaftaran</a>
                <?php  }  ?>
            </div>
        </div>

    </div>
</section>


<?= $this->endSection(); ?>