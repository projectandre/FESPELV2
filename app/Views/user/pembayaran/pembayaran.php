<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="section row">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                Tabel Pembayaran Try Out
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Paket</th>
                                <th>Tgl Pelaksanaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($pembayaran as $key) :
                            ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $key['nama_paket']; ?></td>
                                    <td><?= $key['tgl_pelaksanaan']; ?></td>
                                    <td>
                                        <a class='btn btn-sm btn-primary' href='<?= base_url('dashboard/user/detail_pembayaran/' . $key['id_jadwal'] . '/' . $key['kode_jadwal']); ?>'>Detail</a>
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