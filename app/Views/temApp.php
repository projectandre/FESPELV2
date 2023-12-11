<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fespel Application</title>

    <link rel="stylesheet" href="<?= base_url() ?>/tempApp/assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tempApp/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="<?= base_url() ?>/tempApp/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url() ?>/tempApp/assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="<?= base_url() ?>/tempApp/assets/css/shared/iconly.css">

    <link rel="stylesheet" href="<?= base_url() ?>/tempApp/assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tempApp/assets/css/pages/simple-datatables.css">
    <script src="https://cdn.ckeditor.com/4.10.0/full-all/ckeditor.js"></script>
</head>

<?php if (session()->getFlashdata('tryout') == 'ditambah') { ?>
    <script>
        function sweet() {
            swal("Berhasil!", "Try Out berhasil ditambah!", "success");
        }
    </script>
<?php } ?>

<?php if (session()->getFlashdata('tryout') == 'dihapus') { ?>
    <script>
        function sweet() {
            swal("Berhasil!", "Try Out berhasil dihapus!", "success");
        }
    </script>
<?php } ?>

<?php if (session()->getFlashdata('tryout') == 'fail') { ?>
    <script>
        function sweet() {
            swal("Gagal!", "", "warning");
        }
    </script>
<?php } ?>

<?php if (session()->getFlashdata('tryout') == 'diupdate') { ?>
    <script>
        function sweet() {
            swal("Berhasil!", "Try Out berhasil diupdate!", "success");
        }
    </script>
<?php } ?>

<!-- end dari jenis tryout notifikasi -->

<?php if (session()->getFlashdata('ptryout') == 'dihapus') { ?>
    <script>
        function sweet() {
            swal("Berhasil!", "Paket Try Out berhasil dihapus!", "success");
        }
    </script>
<?php } ?>

<?php if (session()->getFlashdata('ptryout') == 'ditambah') { ?>
    <script>
        function sweet() {
            swal("Berhasil!", "Paket Try Out berhasil ditambah!", "success");
        }
    </script>
<?php } ?>
<?php if (session()->getFlashdata('ptryout') == 'diupdate') { ?>
    <script>
        function sweet() {
            swal("Berhasil!", "Paket Try Out berhasil diupdate!", "success");
        }
    </script>
<?php } ?>

<?php if (session()->getFlashdata('soal') == 'ditambah') { ?>
    <script>
        function sweet() {
            swal("Berhasil!", "Soal berhasil ditambah!", "success");
        }
    </script>
<?php } ?>

<?php if (session()->getFlashdata('soal') == 'dihapus') { ?>
    <script>
        function sweet() {
            swal("Berhasil!", "Soal berhasil dihapus!", "success");
        }
    </script>
<?php } ?>

<!-- jadwal admin -->
<?php if (session()->getFlashdata('jadwal_admin') == 'ditambah') { ?>
    <script>
        function sweet() {
            swal("Berhasil!", "Jadwal berhasil ditambah!", "success");
        }
    </script>
<?php } ?>
<?php if (session()->getFlashdata('jadwal_admin') == 'diupdate') { ?>
    <script>
        function sweet() {
            swal("Berhasil!", "Jadwal berhasil diupdate!", "success");
        }
    </script>
<?php } ?>
<?php if (session()->getFlashdata('jadwal_admin') == 'dihapus') { ?>
    <script>
        function sweet() {
            swal("Berhasil!", "Jadwal berhasil dihapus!", "success");
        }
    </script>
<?php } ?>

<!-- pembayaran role user -->
<?php if (session()->getFlashdata('pembayaran_user') == 'ditambah') { ?>
    <script>
        function sweet() {
            swal("Berhasil!", "Pendaftaran telah berhasil!", "success");
        }
    </script>
<?php } ?>

<?php if (session()->getFlashdata('pengerjaan') == 'selesai') { ?>
    <script>
        function sweet() {
            swal("Terima Kasih!", "Lihat dan cek nilai anda sekarang!", "success");
        }
    </script>
<?php } ?>



<body onload="sweet()">

    <?php $uri = new \CodeIgniter\HTTP\URI(current_url());
    ?>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html"><img src="<?= base_url() ?>/tempApp/assets/images/logo/logo.svg" alt="Logo" srcset=""></a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <?php if (in_array(session('role'), ['user'])) : ?>
                            <li class="sidebar-item <?= $uri->getSegment(2) == 'user' && $uri->getSegment(3) == '' ? 'active' : null ?>">
                                <a href="<?= base_url('dashboard/user') ?>" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?= $uri->getSegment(2) == 'user' && $uri->getSegment(3) == 'jadwal' ? 'active' : null ?>">
                                <a href="<?= base_url('dashboard/user/jadwal') ?>" class='sidebar-link'>
                                    <i class="bi bi-calendar3-week-fill"></i>
                                    <span>Jadwal</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?= $uri->getSegment(2) == 'user' && $uri->getSegment(3) == 'pembayaran' ? 'active' : null ?>">
                                <a href="<?= base_url('dashboard/user/pembayaran') ?>" class='sidebar-link'>
                                    <i class="bi bi-cart-fill"></i>
                                    <span>Pembayaran</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?= $uri->getSegment(2) == 'user' && $uri->getSegment(3) == 'riwayat' ? 'active' : null ?>">
                                <a href="<?= base_url('dashboard/user/riwayat') ?>" class='sidebar-link'>
                                    <i class="bi bi-clock-fill"></i>
                                    <span>Riwayat</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?= $uri->getSegment(2) == 'user' && $uri->getSegment(3) == 'pengumuman' ? 'active' : null ?>">
                                <a href="<?= base_url('dashboard/user/pengumuman') ?>" class='sidebar-link'>
                                    <i class="bi bi-info-circle-fill"></i>
                                    <span>Pengumuman</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array(session('role'), ['admin'])) : ?>
                            <li class="sidebar-item <?= $uri->getSegment(2) == 'admin' && $uri->getSegment(3) == '' ? 'active' : null ?>">
                                <a href="<?= base_url('dashboard/admin') ?>" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item <?= $uri->getSegment(2) == 'admin' && $uri->getSegment(3) == 'jenis_try_out' ? 'active' : null ?>">
                                <a href="<?= base_url('dashboard/admin/jenis_try_out') ?>" class='sidebar-link'>
                                    <i class="bi bi-stickies-fill"></i>
                                    <span>Jenis Try Out</span>
                                </a>
                            </li>

                            <li class="sidebar-item <?= $uri->getSegment(2) == 'admin' && $uri->getSegment(3) == 'paket_try_out' ? 'active' : null ?>">
                                <a href="<?= base_url('dashboard/admin/paket_try_out') ?>" class='sidebar-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>Paket Try Out</span>
                                </a>
                            </li>

                            <li class="sidebar-item <?= $uri->getSegment(2) == 'admin' && $uri->getSegment(3) == 'jadwal' ? 'active' : null ?>">
                                <a href="<?= base_url('dashboard/admin/jadwal') ?>" class='sidebar-link'>
                                    <i class="bi bi-stopwatch-fill"></i>
                                    <span>Jadwal Try Out</span>
                                </a>
                            </li>

                            <li class="sidebar-item  <?= $uri->getSegment(2) == 'admin' && $uri->getSegment(3) == 'validasi' ? 'active' : null ?>">
                                <a href="<?= base_url('dashboard/admin/validasi') ?>" class='sidebar-link'>
                                    <i class="bi bi-calendar-check-fill"></i>
                                    <span>Validasi Try Out</span>
                                </a>
                            </li>

                            <li class="sidebar-item  ">
                                <a href="form-layout.html" class='sidebar-link'>
                                    <i class="bi bi-tv-fill"></i>
                                    <span>Blog</span>
                                </a>
                            </li>
                            <li class="sidebar-item  ">
                                <a href="form-layout.html" class='sidebar-link'>
                                    <i class="bi bi-people-fill"></i>
                                    <span>Akun Pengguna</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <!-- <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-gear-fill"></i>
                                <span>Pengaturan</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="table-datatable.html">Profile</a>
                                </li>

                                <li class="submenu-item ">
                                    <a href="table-datatable-jquery.html">Ubah Password</a>
                                </li>
                                <li class="submenu-item ">
                                    <a onclick='return confirm("Apakah anda yakin logout ?")' href="<?= base_url('auth/logout') ?>">Logout</a>
                                </li>
                            </ul>
                        </li> -->

                        <!-- <li class="sidebar-title">Pages</li>

                        <li class="sidebar-item  ">
                            <a href="application-email.html" class='sidebar-link'>
                                <i class="bi bi-envelope-fill"></i>
                                <span>Email Application</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a onclick='return confirm("Apakah anda yakin logout ?")' href="<?= base_url('auth/logout') ?>" class='sidebar-link'>
                                <i class="bi bi-arrow-right-square-fill"></i>
                                <span>Logout</span>
                            </a>
                        </li> -->

                    </ul>
                </div>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class="mb-3">
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0"></ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?= session()->get('name'); ?></h6>
                                            <p class="mb-0 text-sm text-gray-600"><?= session()->get('role'); ?></p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?= base_url(); ?>/tempApp/assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?= session()->get('name'); ?></h6>
                                    </li>
                                    <?php if (session()->get('role') == 'admin') { ?>
                                        <li><a class="dropdown-item" href="<?= base_url('dashboard/admin/profile') ?>"><i class="icon-mid bi bi-person me-2"></i> My
                                                Profile</a></li>
                                    <?php } ?>
                                    <?php if (session()->get('role') == 'user') { ?>
                                        <li><a class="dropdown-item" href="<?= base_url('dashboard/user/profile') ?>"><i class="icon-mid bi bi-person me-2"></i> My
                                                Profile</a></li>
                                    <?php } ?>
                                    <li><a class="dropdown-item" href="<?= base_url('staff/UbahPassword') ?>"><i class="icon-mid bi bi-key me-2"></i>
                                            Ubah Password</a></li>
                                    <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" onclick='return confirm("Apakah anda yakin logout ?")' href="<?= base_url('logout') ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <div id="main-content">

                <div class="page-heading">
                    <h3><?= $title; ?></h3>
                </div>
                <div class="page-content">
                    <?= $this->renderSection('content'); ?>
                </div>

                <footer style="margin-top: 150px;">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2023 &copy; Fespel</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="https://saugi.me">Fespel</a></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="<?= base_url() ?>/tempApp/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
        <script src="<?= base_url() ?>/tempApp/assets/js/pages/simple-datatables.js"></script>

        <script src="<?= base_url() ?>/tempApp/assets/vendor/tinymce/tinymce.min.js"></script>
        <!-- Template Main JS File -->
        <script src="<?= base_url() ?>/tempApp/assets/js/main.js"></script>


        <script src="<?= base_url() ?>/tempApp/assets/js/bootstrap.js"></script>
        <script src="<?= base_url() ?>/tempApp/assets/js/app.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        <!-- Need: Apexcharts -->
        <script src="<?= base_url() ?>/tempApp/assets/extensions/apexcharts/apexcharts.min.js"></script>
        <script src="<?= base_url() ?>/tempApp/assets/js/pages/dashboard.js"></script>



</body>

</html>