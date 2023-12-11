<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="row">
    <div class="container-fluid">
        <div class="col-md-12 col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Jadwal Try Out</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3">
                                <label for="kode_paket">Paket Try Out</label>
                                <select class="form-select" name="kode_paket" id="kode_paket" disabled>
                                    <option value="" selected disabled>Pilih..</option>
                                    <?php foreach ($paket as $key) { ?>
                                        <option value="<?= $key['kode_paket']; ?>" <?= ($key['kode_paket'] == $jadwal['kode_paket']) ? 'selected' : ''; ?>><?= $key['nama_paket']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tempat">Tempat/Lokasi</label>
                                <textarea class="form-control" name="tempat" rows="4" disabled><?= $jadwal['tempat']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_pelaksanaan">Tanggal Pelaksanaan</label>
                                <input type="date" class="form-control" name="tgl_pelaksanaan" disabled value="<?= $jadwal['tgl_pelaksanaan']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tgl_daftar">Tanggal Daftar</label>
                                <input type="datetime-local" class="form-control" name="tgl_daftar" disabled value="<?= $jadwal['tgl_daftar']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tgl_tutup">Tanggal Tutup</label>
                                <input type="datetime-local" class="form-control" name="tgl_tutup" disabled value="<?= $jadwal['tgl_tutup']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="jam_mulai">Waktu Mulai</label>
                                <input type="time" class="form-control" name="jam_mulai" disabled value="<?= $jadwal['jam_mulai']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="jam_selesai">Waktu Selesai</label>
                                <input type="time" class="form-control" name="jam_selesai" disabled value="<?= $jadwal['jam_selesai']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="biaya">Biaya</label>
                                <input type="number" class="form-control" name="biaya" disabled value="<?= $jadwal['biaya']; ?>">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class=" col-sm-12 d-flex justify-content-end">
                                <a href="<?= base_url('dashboard/admin/jadwal'); ?>" class="btn btn-secondary me-1 mb-1">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>