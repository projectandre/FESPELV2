<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Registrasi Fespel</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('gambar/') ?>logo.png" rel="icon">
    <link href="<?= base_url('gambar/') ?>logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>/niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/niceadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>/niceadmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/niceadmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url() ?>/niceadmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url() ?>/niceadmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>/niceadmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>/niceadmin/assets/css/style.css" rel="stylesheet">

    <style>
        #submit:hover {
            background-color: #212A3E;

        }

        #submit {
            width: 100%;
            padding: 12px;
            color: aliceblue;
            background-color: #394867;
        }

        #text1 {
            color: black;
        }

        #text1:hover {
            color: #9BA4B5;

        }
    </style>
</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="<?= base_url('user/') ?>" class="logo d-flex align-items-center w-auto">
                                    <img src="<?= base_url('gambar/') ?>logo1.png" alt="">
                                    <!-- <span class="d-none d-lg-block">Arkatama</span> -->
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4" style="color: #394867;">Daftar Akun</h5>
                                        <!-- <p class="text-center small">Masukkan detail pribadi Anda untuk membuat akun</p> -->
                                    </div>


                                    <form class="row g-3 needs-validation" method="POST" action="<?= base_url('register'); ?>">
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Nama Anda</label>
                                            <input type="text" name="nama" class="form-control" id="nama" required>

                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Email Anda</label>
                                            <input type="email" name="email" class="form-control" id="email" required>
                                            <div id="hasil-email" style="color:red;" class="mt-1"></div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" required>

                                        </div>
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Ulangi Password</label>
                                            <input type="password" name="password2" class="form-control" id="password2" required>

                                        </div>


                                        <div class="col-12">
                                            <button class="btn btn-sm w-100" id="submit" type="submit">Buat Akun</button>
                                        </div>
                                        <div class="col-12 text-center">
                                            <p class="small mb-0">Sudah punya akun? <a href="<?= base_url() ?>" id="text1">Log in</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>/niceadmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>/niceadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/niceadmin/assets/vendor/chart.js/chart.min.js"></script>
    <script src="<?= base_url() ?>/niceadmin/assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url() ?>/niceadmin/assets/vendor/quill/quill.min.js"></script>
    <script src="<?= base_url() ?>/niceadmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url() ?>/niceadmin/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url() ?>/niceadmin/assets/vendor/php-email-form/validate.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>/niceadmin/assets/js/main.js"></script>

    <script>
        $(document).ready(function() {
            selesai();
        });


        function selesai() {
            setTimeout(function() {
                selesai();
                email();
            }, 200);
        }

        function email() {
            $.getJSON("<?php echo site_url("Auth/cek_email"); ?>", function(data) {
                $("#email").empty();
                $('#email').keyup(function() {
                    $.each(data.result, function() {
                        if (this['email'] == $('#email').val()) {
                            // $('#emailni').val($('#emailya').val());
                            var y = 'Email Sudah Terpakai';
                            document.getElementById("hasil-email").innerHTML = y;
                            $("#submit").prop('disabled', true);
                        }
                    });
                });

            });
        }


        $('#email').keyup(function() {
            // data span dan field
            var x = document.getElementById("email").value;
            var y = document.getElementById("hasil-email").value;
            var z = ''
            if (x != y) {
                document.getElementById("hasil-email").innerHTML = z;
                $("#submit").prop('disabled', false);
            }
        });
    </script>

</body>

</html>