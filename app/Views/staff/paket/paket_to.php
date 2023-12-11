<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="section row">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                Tabel Paket Try Out
                <a class='btn btn-sm btn-info' style="margin-left: 10px;" data-bs-toggle="modal" data-bs-target="#tambahPaket">Tambah Paket</a>
                <!-- <a class='btn btn-sm btn-warning' style="margin-left: 10px;" data-bs-toggle="modal" data-bs-target="#tambahSoal">Tambah Soal</a> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table1">
                        <thead>
                            <tr>
                                <th>Kode Paket</th>
                                <th>Paket Try Out</th>
                                <th>Jenis Try Out</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($paket as $pt) :
                            ?>
                                <tr>
                                    <td><?= $pt['kode_paket']; ?></td>
                                    <td><?= $pt['nama_paket']; ?></td>
                                    <td><?= $pt['jenis_to']; ?></td>
                                    <td>
                                        <a class='btn btn-sm btn-primary' href='<?= base_url('dashboard/admin/detail_paket/' . $pt['kode_paket']); ?>'>Detail</a>
                                        <a onclick='return confirm("Apakah anda yakin mengedit data ini?")' class='btn btn-sm btn-outline-success' href='<?= base_url('dashboard/admin/edit_paket_try_out/' . $pt['kode_paket']); ?>'>Edit</a>
                                        <a onclick='return confirm("Apakah anda yakin menghapus data ini?")' class='btn btn-sm btn-outline-danger' href='<?= base_url('dashboard/admin/hapus_paket_try_out/' . $pt['kode_paket']);  ?>'>Delete</a>

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



<!-- Modal Paket -->
<div class="modal fade" id="tambahPaket" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Paket</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dashboard/admin/tambah_paket_tryout'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama_paket">Nama Paket Try Out</label>
                        <input type="text" name="nama_paket" id="nama_paket" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="kode_jt">Jenis Try Out</label>
                        <select class="form-control" name="kode_jt" id="kode_jt" required>
                            <option value="" selected disabled>Pilih Jenis Try Out</option>
                            <?php foreach ($jenis as $jn) { ?>
                                <option value="<?= $jn['kode_jt']; ?>"><?= $jn['jenis_to']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Close Paket -->
<?= $this->endSection(); ?>