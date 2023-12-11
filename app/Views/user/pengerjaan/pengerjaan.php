<?= $this->extend('temApp'); ?>

<?= $this->section('content'); ?>


<section class="section row">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                SKD CPNS 01 2023
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Soal Ke-<span id="no_soal">1</span></h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <p class="card-text">
                                    Pilih soal..
                                </p>
                                <p>
                                    <?php foreach ($soal as $sl) : ?>
                                        <a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#collapseExample<?= $sl['no_soal']; ?>" role="button" data-no-soal="<?= $sl['no_soal']; ?>" aria-expanded="false" aria-controls="collapseExample<?= $sl['no_soal']; ?>">
                                            <?= $sl['no_soal']; ?>
                                        </a>
                                    <?php endforeach; ?>
                                </p>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div id="countdown" class="bg-primary text-light p-2 shadow rounded text-center fs-5 fw-bold"></div><br>
                                <form id="kuisForm" action="<?= base_url('dashboard/user/selesai_pengerjaan'); ?>" method="POST" enctype="multipart/form-data">
                                    <?php
                                    $no_jawaban = 1;
                                    foreach ($soal as $sl) : ?>
                                        <div class="collapse" id="collapseExample<?= $sl['no_soal']; ?>">

                                            <p><?= $sl['pertanyaan']; ?></p>

                                            <fieldset class="row mb-3">
                                                <div class="col-sm-10">
                                                    <div class="form-check">
                                                        <input type="hidden" name="kode_soal<?= $no_jawaban; ?>" value="<?= $sl['kode_soal']; ?>">
                                                        <input class="form-check-input" type="radio" name="jawaban<?= $no_jawaban; ?>" id="jawaban<?= $no_jawaban; ?>a" value="<?= $sl['poin_a']; ?>">
                                                        <label class="form-check-label" for="jawaban<?= $no_jawaban; ?>a">
                                                            <?= $sl['pilihan_a']; ?>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jawaban<?= $no_jawaban; ?>" id="jawaban<?= $no_jawaban; ?>b" value="<?= $sl['poin_b']; ?>">
                                                        <label class="form-check-label" for="jawaban<?= $no_jawaban; ?>b">
                                                            <?= $sl['pilihan_b']; ?>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jawaban<?= $no_jawaban; ?>" id="jawaban<?= $no_jawaban; ?>c" value="<?= $sl['poin_c']; ?>">
                                                        <label class="form-check-label" for="jawaban<?= $no_jawaban; ?>c">
                                                            <?= $sl['pilihan_c']; ?>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jawaban<?= $no_jawaban; ?>" id="jawaban<?= $no_jawaban; ?>d" value="<?= $sl['poin_d']; ?>">
                                                        <label class="form-check-label" for="jawaban<?= $no_jawaban; ?>d">
                                                            <?= $sl['pilihan_d']; ?>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jawaban<?= $no_jawaban; ?>" id="jawaban<?= $no_jawaban; ?>e" value="<?= $sl['poin_e']; ?>">
                                                        <label class="form-check-label" for="jawaban<?= $no_jawaban; ?>e">
                                                            <?= $sl['pilihan_e']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    <?php
                                        $no_jawaban++;
                                    endforeach; ?>
                                    <button class="btn btn-primary" type="submit" id="simpanButton">Selesai</button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

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

            const noSoal = button.getAttribute("data-no-soal");

            // Memperbarui teks pada elemen "no_soal" dengan nomor soal yang sesuai
            document.getElementById('no_soal').textContent = noSoal;

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



<!-- tampil waktu saat ini -->
<script>
    var countdownDate = new Date();
    countdownDate.setMinutes(countdownDate.getMinutes() + 1);

    var countdown = setInterval(function() {
        var now = new Date().getTime();
        var distance = countdownDate - now;

        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML = "Sisa Waktu: " + minutes + " menit " + seconds + " detik";

        if (distance < 0) {
            clearInterval(countdown);
            document.getElementById("countdown").innerHTML = "Waktu telah habis!";
            // simpanJawaban();

            // Cari dan klik tombol submit
            var submitButton = document.getElementById("simpanButton"); // Gantilah "submitButton" dengan ID tombol submit yang sesuai
            if (submitButton) {
                submitButton.click(); // Melakukan klik otomatis pada tombol submit
            } else {
                console.error("Tombol submit tidak ditemukan.");
            }
        }
    }, 1000);


    // function simpanJawaban() {
    //     // Menggunakan AJAX untuk memanggil fungsi di controller
    //     var xhr = new XMLHttpRequest();
    //     xhr.open("POST", "/dashboard/user/selesai_pengerjaan", true);
    //     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //     xhr.onreadystatechange = function() {
    //         if (xhr.readyState == 4 && xhr.status == 200) {
    //             console.log("Jawaban berhasil disimpan!");
    //             // Tindakan selanjutnya setelah jawaban disimpan
    //         }
    //     };
    //     xhr.send();
    // }
</script>


<?= $this->endSection(); ?>