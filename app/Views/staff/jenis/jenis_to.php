<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="section row">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                Tabel Jenis Try Out
                <a class='btn btn-sm btn-info' style="margin-left: 10px;" data-bs-toggle="modal" data-bs-target="#tambahTO">Tambah Try Out</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table1">
                        <thead>
                            <tr>
                                <th>Kode Jenis TO</th>
                                <th>Jenis Try Out</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($jenis as $jn) :
                            ?>
                                <tr>
                                    <td><?= $jn['kode_jt']; ?></td>
                                    <td><?= $jn['jenis_to'] ?></td>
                                    <td>
                                        <a onclick='return confirm("Apakah anda yakin mengedit data ini?")' class='btn btn-sm btn-outline-success' href='<?= base_url('dashboard/admin/edit_jenis_try_out/' . $jn['kode_jt']); ?>'>Edit</a>
                                        <a onclick='return confirm("Apakah anda yakin menghapus data ini?")' class='btn btn-sm btn-outline-danger' href='<?= base_url('dashboard/admin/hapus_jenis_try_out/' . $jn['kode_jt']);  ?>'>Delete</a>
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
<div class="modal fade" id="tambahTO" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Jenis Try Out</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dashboard/admin/tambah_TryOut'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="jenis_to">Jenis Try Out</label>
                        <input type="text" name="jenis_to" id="jenis_to" class="form-control">
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