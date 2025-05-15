<?php  
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
session_start();
include ("../admin/inc/koneksi.php");
include ("../admin/inc/tanggal.php");   
if (!isset($_SESSION['santri'])) 
{
    echo "<script>alert('Maaf pastikan anda sudah login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
} 
?> 

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/greeva-asp/layouts/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 11:34:56 GMT -->
<head>
    <meta charset="utf-8" />
    <title><?= $meta['instansi'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../admin/assets/gambar/<?= $meta['logo'] ?>">

    <!-- Vector Maps css -->
    <link href="../admin/assets/vendor/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css">

    <!-- Theme Config Js -->
    <script src="../admin/assets/js/config.js"></script>

    <!-- Vendor css -->
    <link href="../admin/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="../admin/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="../admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Datatables css -->
    <link href="../admin/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../admin/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../admin/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../admin/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../admin/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../admin/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <!-- Sweetalert2 -->
    <script src="../admin/assets/js/sweetalert2@11.js"> </script>
    <script src="../admin/assets/ckeditor/ckeditor.js"></script>

    <style> 
        .sidenav-toggle-button, .topnav-toggle-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }
        .time-display {
            font-size: 18px; 
        }  

        .horizontal_center
        {
            border-top: 2px solid black;
            height: 5px; 
        }
    </style>
</head>

<body> 
    <!-- Begin page -->
    <div class="wrapper">

        
        <!-- Sidenav Menu Start -->
        <?php include "menu.php" ?>
        <!-- Sidenav Menu End -->
        

        <!-- Topbar Start -->
        <header class="app-topbar">
            <div class="page-container topbar-menu">
                <div class="d-flex align-items-center gap-2">

                    <!-- Brand Logo -->
                    <a href="index.php" class="logo">
                        <span class="logo-light">
                            <span class="logo-lg text-white" style="font-size: 20px;"><?= $meta['instansi'] ?></span>
                            <span class="logo-sm"><img src="../admin/assets/gambar/<?= $meta['logo'] ?>" ></span>
                        </span>

                        <span class="logo-dark">
                            <span class="logo-lg"><img src="../admin/assets/images/logo-dark.png"></span>
                            <span class="logo-sm"><img src="../admin/assets/gambar/<?= $meta['logo'] ?>" ></span>
                        </span>
                    </a>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="sidenav-toggle-button px-2">
                        <i class="ti ti-menu-deep fs-24"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="ti ti-menu-deep fs-22"></i>
                    </button> 

                    <div id="current-time" class="time-display text-white"></div>
                </div>

                <div class="d-flex align-items-center gap-2">

                    <!-- Search for small devices -->
                    <div class="topbar-item d-flex d-xl-none">
                        <button class="topbar-link" data-bs-toggle="modal" data-bs-target="#searchModal" type="button">
                            <i class="ti ti-search fs-22"></i>
                        </button>
                    </div>  

                    <!-- Button Trigger Customizer Offcanvas -->
                    <div class="topbar-item d-none d-sm-flex">
                        <button class="topbar-link" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" type="button">
                            <i class="ti ti-settings fs-22"></i>
                        </button>
                    </div>

                    <!-- Light/Dark Mode Button -->
                    <div class="topbar-item d-none d-sm-flex">
                        <button class="topbar-link" id="light-dark-mode" type="button">
                            <i class="ti ti-moon fs-22"></i>
                        </button>
                    </div>

                    <!-- User Dropdown -->
                    <div class="topbar-item nav-user">
                        <div class="dropdown">
                            <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown" data-bs-offset="0,19" type="button" aria-haspopup="false" aria-expanded="false">
                                <img src="../admin/assets/gambar/santri_wati.png" width="32" class="rounded-circle me-lg-2 d-flex" alt="user-image">
                                <span class="d-lg-flex flex-column gap-1 d-none">
                                    <h5 class="my-0"><?= $_SESSION['santri']['nama_lengkap'] ?></h5>
                                    <h6 class="my-0 fw-normal"><?= $_SESSION['santri']['nisn'] ?></h6> 
                                </span>
                                <i class="ti ti-chevron-down d-none d-lg-block align-middle ms-2"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div> 

                                <!-- item-->
                                <a href="javascript:void(0);" onclick="logoutConfirmation()" class="dropdown-item active fw-semibold text-danger">
                                    <i class="ti ti-logout me-1 fs-17 align-middle"></i>
                                    <span class="align-middle">Sign Out</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Topbar End --> 

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="page-content">
            <div class="page-container">

                <?php 

                $page = $_GET['page'];
                $aksi = $_GET['aksi'];    

                if ($page == "calon_santri") 
                {
                    if ($aksi == "") { include "page/calon_santri/calon_santri.php"; }
                    if ($aksi == "tambah") { include "page/calon_santri/tambah.php"; }  
                    if ($aksi == "ubah") { include "page/calon_santri/ubah.php"; }   
                    if ($aksi == "hapus") { include "page/calon_santri/hapus.php"; }  
                    if ($aksi == "lihat") { include "page/calon_santri/lihat.php"; }  
                    if ($aksi == "pembayaran") { include "page/calon_santri/pembayaran.php"; }  
                    if ($aksi == "update_password") { include "page/calon_santri/update_password.php"; }  
                }    

                if ($page == "pembayaran") 
                {
                    if ($aksi == "") { include "page/pembayaran/pembayaran.php"; }
                    if ($aksi == "tambah") { include "page/pembayaran/tambah.php"; }  
                    if ($aksi == "lihat") { include "page/pembayaran/lihat.php"; }   
                    if ($aksi == "verifikasi") { include "page/pembayaran/verifikasi.php"; }   
                    if ($aksi == "verif_pembayaran") { include "page/pembayaran/verif_pembayaran.php"; }   
                    if ($aksi == "update_password") { include "page/pembayaran/update_password.php"; }    
                }      

                if ($page == "ayah") 
                {
                    if ($aksi == "") { include "page/ayah/ayah.php"; }
                    if ($aksi == "tambah") { include "page/ayah/tambah.php"; }  
                    if ($aksi == "ubah") { include "page/ayah/ubah.php"; }   
                    if ($aksi == "hapus") { include "page/ayah/hapus.php"; }  
                }     

                if ($page == "ibu") 
                {
                    if ($aksi == "") { include "page/ibu/ibu.php"; }
                    if ($aksi == "tambah") { include "page/ibu/tambah.php"; }  
                    if ($aksi == "ubah") { include "page/ibu/ubah.php"; }   
                    if ($aksi == "hapus") { include "page/ibu/hapus.php"; }  
                }       

                if ($page == "formulir") 
                {
                    if ($aksi == "") { include "page/formulir/formulir.php"; }
                    if ($aksi == "tambah") { include "page/formulir/tambah.php"; }   
                    if ($aksi == "verifikasi") { include "page/formulir/verifikasi.php"; }   
                }         

                if ($page == "tes_masuk") 
                {
                    if ($aksi == "") { include "page/tes_masuk/tes_masuk.php"; }
                    if ($aksi == "tambah") { include "page/tes_masuk/tambah.php"; }    
                    if ($aksi == "penilaian") { include "page/tes_masuk/penilaian.php"; }    
                }    

                if ($page == "") 
                { 
                   
                            $nisn = $_SESSION['santri']['nisn']; 
                            $ambil = $con->query("SELECT * FROM calon_santri NATURAL JOIN tes_masuk WHERE nisn='$nisn' "); 
                            while ($row = $ambil->fetch_assoc()) { 
                                $hari = getHari($row['tgl_tes']); 
                                $tgl = tgl_indo($row['tgl_tes']); 
                                $nilai_kosong = (empty($row['btq']) || empty($row['pengetahuan_umum']) || empty($row['total_nilai']) || empty($row['keterangan']));
                        ?>
                        <div class='card p-4 mt-3'>
                        <?php
                            $pesan = '<span class="text-danger">Data Santri Tidak Ditemukan</span>';


                if ($row) {
                if (empty($row['btq']) && empty($row['pengetahuan_umum']) && empty($row['total_nilai']) && empty($row['grade']) && empty($row['keterangan'])) {
                    $pesan = '<span class="text-danger">Siswa belum melakukan tes</span>';
                } else {
                    $pesan = "BTQ: <strong>{$row['btq']}</strong><br>";
                    $pesan .= "Pengetahuan Umum: <strong>{$row['pengetahuan_umum']}</strong><br>";
                    $pesan .= "Total Nilai: <strong>{$row['total_nilai']}</strong><br>";
                    $pesan .= "Grade: <strong>{$row['grade']}</strong><br>";
                    $pesan .= "Keterangan: <strong>{$row['keterangan']}</strong>";
                }
            }

// Tampilkan hasilnya
echo $pesan;


                                    ?>  
                        <?php 
                            } 

    echo "</div>"; 
                } 

                ?> 

            </div> <!-- container -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="page-container">
                    <div class="row">
                        <div class="col-md-8 text-center text-md-start">
                            <script>document.write(new Date().getFullYear())</script> © Aplikasi Penerimaan Santri Baru <?= $meta['instansi'] ?> Tanah Grogot</span>
                        </div>
                        <div class="col-md-4">
                            <div class="text-md-end footer-links d-none d-md-block"> 
                                <a href="javascript: void(0);">Alief Hidayat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    <?php include "theme.php" ?>

    <!-- Vendor js -->
    <script src="../admin/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="../admin/assets/js/app.js"></script>

    <!-- Datatables js -->
    <script src="../admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../admin/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="../admin/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../admin/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="../admin/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
    <script src="../admin/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../admin/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../admin/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="../admin/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../admin/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../admin/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../admin/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../admin/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Datatable Demo js -->
    <script src="../admin/assets/js/components/table-datatable.js"></script>

    <!-- Projects Analytics Dashboard App js -->
    <script src="../admin/assets/js/pages/dashboard.js"></script>

    <script> 
        function updateTime() {
            var today = new Date();
 
            var dayNames = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            var day = dayNames[today.getDay()];
            var date = today.getDate();
            var month = today.getMonth() + 1;  
            var year = today.getFullYear();
            var hours = today.getHours();
            var minutes = today.getMinutes();
            var seconds = today.getSeconds();
 
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            var timeString = day + ", " + date + " / " + month + " / " + year + " || " + hours + ":" + minutes + ":" + seconds;
 
            document.getElementById("current-time").textContent = timeString;
        }
 
        setInterval(updateTime, 1000);
 
        updateTime();
    </script>

    <script>
        function logoutConfirmation() {
            Swal.fire({
                title: 'Apakah Anda yakin ingin logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, logout!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'logout.php'; // Redirect ke logout.php
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#dtTabel').DataTable({ 
                "language": {
                    "url": "../admin/assets/js/id.json"
                }
            });
        });
    </script>
 
    <script>
        $(document).ready(function () {  
            // Load daftar provinsi saat halaman dibuka
            $.post('../admin/get_provinsi.php', function (data) {
                $('#provinsi').html(data);
            });

            // Event saat provinsi dipilih
            $('#provinsi').on('change', function () {
                var kode_provinsi = $(this).val();
                $.post('../admin/get_kabupaten.php', { kode_provinsi: kode_provinsi }, function (data) {
                    $('#kabupaten').html(data); 
                    $('#kecamatan').html('<option value="">Pilih Kecamatan</option>'); 
                    $('#desa').html('<option value="">Pilih Kelurahan / Desa</option>');
                });
            });

            // Event saat kabupaten dipilih
            $('#kabupaten').on('change', function () {
                var kode_kabupaten = $(this).val();
                $.post('../admin/get_kecamatan.php', { kode_kabupaten: kode_kabupaten }, function (data) {
                    $('#kecamatan').html(data); 
                    $('#desa').html('<option value="">Pilih Kelurahan / Desa</option>');
                });
            });

            // Event saat kecamatan dipilih
            $('#kecamatan').on('change', function () {
                var kode_kecamatan = $(this).val();
                $.post('../admin/get_desa.php', { kode_kecamatan: kode_kecamatan }, function (data) {
                    $('#desa').html(data);
                });
            });
        });
    </script>

</body>


<!-- Mirrored from coderthemes.com/greeva-asp/layouts/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 11:35:42 GMT -->
</html> 