<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="section row">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                Tabel Jadwal Try Out
                <a class='btn btn-sm btn-info' style="margin-left: 10px;" data-bs-toggle="modal" data-bs-target="#tambahJadwal">Tambah Jadwal TO</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Jadwal</th>
                                <th>Paket</th>
                                <th>Tgl Pelaksanaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($jadwal as $key) :
                            ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $key['kode_jadwal']; ?></td>
                                    <td><?= $key['nama_paket']; ?></td>
                                    <td><?= $key['tgl_pelaksanaan']; ?></td>
                                    <td>
                                        <a class='btn btn-sm btn-primary' href='<?= base_url('dashboard/admin/detail_jadwal_try_out/' . $key['id_jadwal']); ?>'>Detail</a>
                                        <a onclick='return confirm("Apakah anda yakin mengedit data ini?")' class='btn btn-sm btn-outline-success' href='<?= base_url('dashboard/admin/edit_jadwal_try_out/' . $key['id_jadwal']); ?>'>Edit</a>
                                        <a onclick='return confirm("Apakah anda yakin menghapus data ini?")' class='btn btn-sm btn-outline-danger' href='<?= base_url('dashboard/admin/hapus_jadwal_try_out/' . $key['id_jadwal']);  ?>'>Delete</a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>


<!-- Modal -->
<div class="modal fade" id="tambahJadwal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Jadwal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dashboard/admin/tambah_jadwal'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="kode_paket">Paket Try Out</label>
                        <select class="form-select" name="kode_paket" id="kode_paket" required>
                            <option value="" selected disabled>Pilih..</option>
                            <?php foreach ($paket as $key) { ?>
                                <option value="<?= $key['kode_paket']; ?>"><?= $key['nama_paket']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tempat">Tempat/Lokasi</label>
                        <textarea class="form-control" name="tempat" style="height: 75px"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pelaksanaan">Tanggal Pelaksanaan</label>
                        <input type="date" class="form-control" name="tgl_pelaksanaan">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_daftar">Tanggal Daftar</label>
                        <input type="datetime-local" class="form-control" name="tgl_daftar">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_tutup">Tanggal Tutup</label>
                        <input type="datetime-local" class="form-control" name="tgl_tutup">
                    </div>
                    <div class="mb-3">
                        <label for="jam_mulai">Waktu Mulai</label>
                        <input type="time" class="form-control" name="jam_mulai">
                    </div>
                    <div class="mb-3">
                        <label for="jam_selesai">Waktu Selesai</label>
                        <input type="time" class="form-control" name="jam_selesai">
                    </div>
                    <div class="mb-3">
                        <label for="biaya">Biaya</label>
                        <input type="number" class="form-control" name="biaya">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>