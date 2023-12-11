<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="section row">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                Pilih Jenis Try Out
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
                                        <a class='btn btn-sm btn-outline-primary' href='<?= base_url('dashboard/admin/validasi/paket/status/' . $pt['kode_paket']); ?>'><i class="bi bi-eye"></i></a>
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