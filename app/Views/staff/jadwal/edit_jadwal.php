<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="row">
    <div class="container-fluid">
        <div class="col-md-12 col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Edit Jadwal Try Out</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="<?= base_url('dashboard/admin/update_jadwal_try_out/' . $jadwal['kode_jadwal']); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="kode_paket" class="form-label">Paket</label>
                                        <select class="form-control" name="kode_paket" id="kode_paket" required>
                                            <?php foreach ($paket as $key) { ?>
                                                <option value="<?= $key['kode_paket']; ?>" <?= ($key['kode_paket'] == $jadwal['kode_paket']) ? 'selected' : ''; ?>><?= $key['nama_paket']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="tempat" class="form-label">Tempat/Lokasi</label>
                                        <textarea class="form-control" name="tempat" rows="4"><?= $jadwal['tempat']; ?></textarea>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="tgl_pelaksanaan" class="form-label">Tgl Pelaksanaan</label>
                                        <input type="date" class="form-control" name="tgl_pelaksanaan" value="<?= $jadwal['tgl_pelaksanaan']; ?>">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="tgl_daftar" class="form-label">Tgl Daftar</label>
                                        <input type="datetime-local" class="form-control" name="tgl_daftar" value="<?= $jadwal['tgl_daftar']; ?>">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="tgl_tutup" class="form-label">Tgl Tutup</label>
                                        <input type="datetime-local" class="form-control" name="tgl_tutup" value="<?= $jadwal['tgl_tutup']; ?>">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="jam_mulai" class="form-label">Waktu Mulai</label>
                                        <input type="time" class="form-control" name="jam_mulai" value="<?= $jadwal['jam_mulai']; ?>">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="jam_selesai" class="form-label">Waktu Selesai</label>
                                        <input type="time" class="form-control" name="jam_selesai" value="<?= $jadwal['jam_selesai']; ?>">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="biaya" class="form-label">Biaya</label>
                                        <input type="number" class="form-control" name="biaya" value="<?= $jadwal['biaya']; ?>">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class=" col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <a href="<?= base_url('dashboard/admin/jadwal'); ?>" class="btn btn-secondary me-1 mb-1">Kembali</a>
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