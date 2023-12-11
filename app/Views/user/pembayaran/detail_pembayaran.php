<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="row">

    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">Lakukan transfer ke rekening dibawah ini :</h4>
                    <p class="card-text">
                        Setelah melakukan pembayaran silahkan konfirmasi atau hubungi nomor whatsapp yang tersedia..
                    </p>
                    <p>
                    <div class="text-center">
                        <div class="col-6 col-sm-6 col-lg-3 mt-2 mb-2 mx-auto ">
                            <img class="w-100 active" src="<?= base_url(); ?>/gambar/logo_bri.png">
                        </div>
                        <div class="col-sm-12 card-text">
                            <h5>Nomor Rekening</h5>
                            <button class="btn btn-outline-primary btn-lg" style="width: 100%;"><strong>01281281139913</strong></button>
                        </div>
                        <div class="col-sm-12 card-text mt-3">
                            <h5>Jenis Rekening</h5>
                            <button class="btn btn-outline-primary btn-lg" style="width: 100%;"><strong>BRI</strong></button>
                        </div>
                        <div class="col-sm-12 card-text mt-3">
                            <h5>Nama Rekening</h5>
                            <button class="btn btn-outline-primary btn-lg" style="width: 100%;"><strong>Andre Agung</strong></button>
                        </div>
                        <div class="col-sm-12 card-text mt-3">
                            <h5>Hubungi/Konfirmasi Melalui Whatsapp</h5>
                            <button class="btn btn-outline-primary btn-lg" style="width: 100%;"><strong>081379886085</strong></button>
                        </div>
                    </div>
                    </p>
                    <br>
                    <table class="table text-center">
                        <tr>
                            <td>Paket</td>
                            <td><?= $jadwal->nama_paket; ?></td>
                        </tr>
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
                        <tr style="color: green;">
                            <td>Status Pembayaran</td>
                            <td><?= $status_pembayaran->validasi_pembayaran == 'belum' ? 'Belum dibayar' : 'Sudah dibayar'; ?></td>
                        </tr>
                        <tr style="color: green;">
                            <td>Status Pengerjaan</td>
                            <td><?= $status_pembayaran->status_pengerjaan == 'belum' ? 'Belum dikerjakan' : 'Selesai'; ?></td>
                        </tr>
                    </table>
                    <br>
                    <?php if ($status_pembayaran->validasi_pembayaran == 'sudah' && $status_pembayaran->status_pengerjaan == 'belum') {  ?>
                        <p class="card-text">
                            Jangan lupa kerjakan soal pada hari <?= strftime('%A, %d %B %Y', strtotime($jadwal->tgl_pelaksanaan)); ?> Pukul : <?= date('H:i', strtotime($jadwal->jam_mulai)) ?> - <?= date('H:i', strtotime($jadwal->jam_selesai)) ?> WIB
                        </p>
                        <p class="card-text">
                            Tekan mulai ketika anda bersedia mengerjakan soal..
                        </p>
                        <div class="text-center">
                            <div class="col-sm-12 card-text">
                                <a href="<?= base_url('dashboard/user/pengerjaan/' . $jadwal->kode_paket . '/' . $status_pembayaran->kode_pembayaran); ?>" class="btn btn-primary btn-lg" style="width: 100%;"><strong>Mulai Kerjakan!</strong></a>
                            </div>
                        </div>
                    <?php  } ?>

                </div>
            </div>

        </div>

    </div>
</section>


<?= $this->endSection(); ?>