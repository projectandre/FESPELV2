<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>

<section class="row">
    <div class="container-fluid">
        <div class="col-md-12 col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Edit Soal</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="<?= base_url('dashboard/admin/update_soal/' . $soal['id_soal'] . '/' . $soal['kode_paket']); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">
                                    <div class="form-group mb-3">
                                        <label for="no_soal" class="form-label">No Soal</label>
                                        <input type="number" class="form-control" name="no_soal" value="<?= $soal['no_soal']; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3">
                                        <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                        <textarea id="pertanyaan" name="pertanyaan"><?= $soal['pertanyaan']; ?></textarea>
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
                                    <div class="row">
                                        <div class="form-group mb-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Pilihan A.." id="pilihan_a" name="pilihan_a"><?= $soal['pilihan_a']; ?></textarea>
                                                <label for="floatingTextarea">Pilihan A</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Pilihan B.." id="pilihan_b" name="pilihan_b"><?= $soal['pilihan_b']; ?></textarea>
                                                <label for="floatingTextarea">Pilihan B</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Pilihan C.." id="pilihan_c" name="pilihan_c"><?= $soal['pilihan_c']; ?></textarea>
                                                <label for="floatingTextarea">Pilihan C</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Pilihan D.." id="pilihan_d" name="pilihan_d"><?= $soal['pilihan_d']; ?></textarea>
                                                <label for="floatingTextarea">Pilihan D</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Pilihan E.." id="pilihan_e" name="pilihan_e"><?= $soal['pilihan_e']; ?></textarea>
                                                <label for="floatingTextarea">Pilihan E</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-3">
                                            <label for="nama_paket" class="form-label">Jawaban Benar</label>
                                            <select class="form-select" name="jawaban_benar" id="jawaban_benar" required>
                                                <option value="" disabled>Pilih..</option>
                                                <option value="a" <?= $soal['jawaban_benar'] == 'a' ? 'selected' : null ?>>A</option>
                                                <option value="b" <?= $soal['jawaban_benar'] == 'b' ? 'selected' : null ?>>B</option>
                                                <option value="c" <?= $soal['jawaban_benar'] == 'c' ? 'selected' : null ?>>C</option>
                                                <option value="d" <?= $soal['jawaban_benar'] == 'd' ? 'selected' : null ?>>D</option>
                                                <option value="e" <?= $soal['jawaban_benar'] == 'e' ? 'selected' : null ?>>E</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-3">
                                            <label for="pembahasan" class="form-label">Pembahasan</label>
                                            <textarea class="form-control" id="pembahasan" name="pembahasan" rows="5"><?= $soal['pembahasan'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class=" col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <a href="<?= base_url('dashboard/admin/detail_paket/' . $soal['kode_paket']); ?>" class="btn btn-secondary me-1 mb-1">Kembali</a>
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