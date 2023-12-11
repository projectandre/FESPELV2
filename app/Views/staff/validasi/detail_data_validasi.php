<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="row">

    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title text-center">Detail Pembayaran <?= $pembayaran->name; ?> Sebagai Berikut :</h4>


                    <br><br>
                    <table class="table text-center">
                        <tr>
                            <td>Nama</td>
                            <td><?= $pembayaran->name; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?= $pembayaran->email; ?></td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td><?= $pembayaran->user_phone; ?></td>
                        </tr>
                        <tr>
                            <td>Paket</td>
                            <td><?= $pembayaran->nama_paket; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td><?= strftime('%A, %d %B %Y', strtotime($pembayaran->tgl_pelaksanaan)); ?></td>
                        </tr>
                        <tr>
                            <td>Waktu/Jam</td>
                            <td><?= date('H:i', strtotime($pembayaran->jam_mulai)) ?> - <?= date('H:i', strtotime($pembayaran->jam_selesai)) ?> WIB</td>
                        </tr>
                        <tr>
                            <td>Batas Daftar</td>
                            <td><?= strftime('%A, %d %B %Y', strtotime($pembayaran->tgl_tutup)); ?></td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td><?= $pembayaran->tempat; ?></td>
                        </tr>
                        <tr>
                            <td>Biaya</td>
                            <td>Rp. <?= number_format($pembayaran->biaya, 0, ',', '.'); ?></td>
                        </tr>
                        <tr style="color: green;">
                            <td>Status Pembayaran</td>
                            <td><?= $pembayaran->validasi_pembayaran == 'belum' ? 'Belum dibayar' : 'Sudah dibayar'; ?></td>
                        </tr>
                    </table>
                    <?php if ($pembayaran->validasi_pembayaran == 'belum') {  ?>
                        <div class="text-center mt-5">
                            <div class="col-sm-12 card-text">
                                <a href="<?= base_url('dashboard/admin/validasi/diverifikasi/' . $pembayaran->kode_pembayaran); ?>" class="btn btn-primary btn-lg" style="width: 100%;"><strong>Verifikasi Pembayaran <i class="bi bi-check"></i></strong></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>

    </div>
</section>


<?= $this->endSection(); ?>