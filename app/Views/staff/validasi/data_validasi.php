<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="section row">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                Tabel Data Pembayaran Pengguna
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $i = 1;
                            foreach ($pembayaran as $key) :
                            ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $key['name']; ?></td>
                                    <td><?= $key['user_email']; ?></td>
                                    <td>
                                        <a class='btn btn-sm btn-outline-primary' href='<?= base_url('dashboard/admin/validasi/detail_pembayaran/'  . $key['kode_pembayaran']); ?>'><i class="bi bi-eye"></i></a>
                                        <?php if ($key['validasi_pembayaran'] == 'belum') {  ?>
                                            <a class='btn btn-sm btn-outline-success' href='<?= base_url('dashboard/admin/validasi/diverifikasi/' . $key['kode_pembayaran']); ?>'><i class="bi bi-check"></i></a>
                                        <?php  } ?>
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



<?= $this->endSection(); ?>