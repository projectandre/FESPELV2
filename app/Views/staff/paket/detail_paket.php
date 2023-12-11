<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="section row">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                Data Soal
                <a class='btn btn-sm btn-info' style="margin-left: 10px;" data-bs-toggle="modal" data-bs-target="#tambahPaket">Tambah Soal</a>
                <!-- <a class='btn btn-sm btn-warning' style="margin-left: 10px;" data-bs-toggle="modal" data-bs-target="#tambahSoal">Tambah Soal</a> -->
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Soal</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <p class="card-text">
                                    Pilih soal..
                                </p>
                                <p>
                                    <?php foreach ($soal as $sl) : ?>
                                        <a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#collapseExample<?= $sl['no_soal']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample<?= $sl['no_soal']; ?>">
                                            <?= $sl['no_soal']; ?>
                                        </a>
                                    <?php endforeach; ?>
                                </p>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <?php foreach ($soal as $sl) : ?>
                                    <div class="collapse" id="collapseExample<?= $sl['no_soal']; ?>">
                                        <div class="d-flex justify-content-end">
                                            <a href="<?= base_url('dashboard/admin/edit_soal/' . $sl['id_soal'] . '/' . $sl['kode_paket']); ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a> <a onclick='return confirm("Apakah anda yakin menghapus data ini?")' href="<?= base_url('dashboard/admin/hapus_soal/' .  $sl['id_soal'] . '/' . $sl['kode_paket']); ?>" class="btn btn-danger btn-sm mx-2"><i class="bi bi-trash"></i></a> <br>
                                        </div>
                                        Pertanyaan : <br>
                                        <p><?= $sl['pertanyaan']; ?></p>
                                        <ol type="A">
                                            <li><?= $sl['pilihan_a']; ?></li>
                                            <li><?= $sl['pilihan_b']; ?></li>
                                            <li><?= $sl['pilihan_c']; ?></li>
                                            <li><?= $sl['pilihan_d']; ?></li>
                                            <li><?= $sl['pilihan_e']; ?></li>
                                        </ol>
                                        <div class="alert alert-light">
                                            <span style="color: green;">Poin Jawaban :</span> <br>
                                            <ol type="A">
                                                <li><?= $sl['poin_a']; ?></li>
                                                <li><?= $sl['poin_b']; ?></li>
                                                <li><?= $sl['poin_c']; ?></li>
                                                <li><?= $sl['poin_d']; ?></li>
                                                <li><?= $sl['poin_e']; ?></li>
                                            </ol>
                                        </div>
                                        <div class="alert alert-light">
                                            Pembahasan : <br>
                                            <p><?= $sl['pembahasan']; ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>



<!-- <script>
    // Temukan semua tombol dengan class "btn-primary"
    const buttons = document.querySelectorAll(".btn-primary");

    // Tambahkan event listener untuk setiap tombol
    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            // Tutup semua elemen yang memiliki class "collapse"
            const collapses = document.querySelectorAll(".collapse");
            collapses.forEach((collapse) => {
                collapse.classList.remove("show");
            });

            // Buka elemen dengan id yang sesuai dengan tombol yang diklik
            const targetId = button.getAttribute("href").replace("#", "");
            const targetCollapse = document.getElementById(targetId);
            targetCollapse.classList.add("show");
        });
    });
</script> -->

<script>
    // Temukan semua tombol dengan class "btn-primary"
    const buttons = document.querySelectorAll(".btn-primary");

    // Tambahkan event listener untuk setiap tombol
    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            // Tutup semua elemen yang memiliki class "collapse"
            const collapses = document.querySelectorAll(".collapse");
            collapses.forEach((collapse) => {
                collapse.classList.remove("show");
            });

            // Buka elemen dengan id yang sesuai dengan tombol yang diklik
            const targetId = button.getAttribute("href").replace("#", "");
            const targetCollapse = document.getElementById(targetId);
            targetCollapse.classList.add("show");

            // Hapus class "btn-primary" dari semua tombol
            buttons.forEach((btn) => {
                btn.classList.remove("btn-primary");
                btn.classList.add("btn-outline-primary");
            });

            // Tambahkan class "btn-primary" ke tombol yang diklik
            button.classList.add("btn-primary");
        });
    });
</script>









<!-- Modal Paket -->
<div class="modal fade" id="tambahPaket" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Soal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dashboard/admin/tambah_soal'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="kode_jt">No Soal</label>
                        <input type="number" class="form-control" name="no_soal" max="100" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="nama_paket">Pertanyaan</label>
                        <textarea name="pertanyaan"></textarea>
                        <script>
                            CKEDITOR.replace('pertanyaan', {
                                height: 400,
                                toolbar: [{
                                        name: 'clipboard',
                                        groups: ['clipboard', 'undo'],
                                        items: ['Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo']
                                    },
                                    {
                                        name: 'editing',
                                        groups: ['find', 'selection', 'spellchecker'],
                                        items: ['Find', 'Replace']
                                    },
                                    {
                                        name: 'basicstyles',
                                        groups: ['basicstyles', 'cleanup'],
                                        items: ['Bold', 'Italic', 'Underline', '-', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']
                                    },
                                    {
                                        name: 'paragraph',
                                        groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
                                        items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-']
                                    },
                                    {
                                        name: 'links',
                                        items: ['Link', 'Unlink']
                                    },
                                    {
                                        name: 'insert',
                                        items: ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar']
                                    },
                                    {
                                        name: 'styles',
                                        items: ['Styles', 'Format', 'Font', 'FontSize']
                                    },
                                    {
                                        name: 'colors',
                                        items: ['TextColor', 'BGColor']
                                    },
                                    {
                                        name: 'others',
                                        items: ['-']
                                    },
                                ]
                            });
                        </script>

                    </div>
                    <div class="mb-3 d-flex">
                        <div class="form-floating col-md-9">
                            <textarea class="form-control" placeholder="Pilihan A.." id="pilihan_a" name="pilihan_a"></textarea>
                            <label for="floatingTextarea">Pilihan A</label>
                        </div>
                        <div class="form-floating col-md-2 mx-2">
                            <input type="number" class="form-control" name="poin_a" max="5" min="0">
                            <label for="floatingTextarea">Bobot A</label>
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="form-floating col-md-9">
                            <textarea class="form-control" placeholder="Pilihan B.." id="pilihan_b" name="pilihan_b"></textarea>
                            <label for="floatingTextarea">Pilihan B</label>
                        </div>

                        <div class="form-floating col-md-2 mx-2">
                            <input type="number" class="form-control" name="poin_b" max="5" min="0">
                            <label for="floatingTextarea">Bobot B</label>
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="form-floating col-md-9">
                            <textarea class="form-control" placeholder="Pilihan C.." id="pilihan_c" name="pilihan_c"></textarea>
                            <label for="floatingTextarea">Pilihan C</label>
                        </div>
                        <div class="form-floating col-md-2 mx-2">
                            <input type="number" class="form-control" name="poin_c" max="5" min="0">
                            <label for="floatingTextarea">Bobot C</label>
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="form-floating col-md-9">
                            <textarea class="form-control" placeholder="Plihan D.." id="pilihan_d" name="pilihan_d"></textarea>
                            <label for="floatingTextarea">Pilihan D</label>
                        </div>
                        <div class="form-floating col-md-2 mx-2">
                            <input type="number" class="form-control" name="poin_d" max="5" min="0">
                            <label for="floatingTextarea">Bobot D</label>
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="form-floating col-md-9">
                            <textarea class="form-control" placeholder="Pilihan E.. " id="pilihan_e" name="pilihan_e"></textarea>
                            <label for="floatingTextarea">Pilihan E</label>
                        </div>
                        <div class="form-floating col-md-2 mx-2">
                            <input type="number" class="form-control" name="poin_e" max="5" min="0">
                            <label for="floatingTextarea">Bobot E</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="pembahasan">Pembahasan</label>
                        <textarea class="form-control" name="pembahasan" style="height: 75px"></textarea>
                    </div>
                    <input type="hidden" name="kode_paket" value="<?= $kode_paket; ?>">
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