<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include 'inc/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/greeva-asp/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 11:36:01 GMT -->
<head>
    <meta charset="utf-8" />
    <title><?= $meta['instansi'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/gambar/<?= $meta['logo'] ?>">

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>

    <!-- Vendor css -->
    <link href="assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Sweetalert2 -->
    <script src="assets/js/sweetalert2@11.js"> </script>
</head>

<body>

    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card overflow-hidden text-center h-100 p-xxl-4 p-3 mb-0">
                    <a href="index-2.html" class="auth-brand mb-4">
                        <img src="assets/gambar/<?= $meta['logo'] ?>" height="140" class="logo-dark"> <br><br>
                        <p><strong><?= $meta['instansi'] ?></strong></p>
                        <img src="assets/gambar/<?= $meta['logo'] ?>" height="140" class="logo-light"> 
                    </a>

                    <h4 class="fw-semibold mb-2 fs-18">Log in to your account</h4>

                    <p class="text-muted mb-4">Enter your username and password to access admin panel.</p>

                    <form method="post" class="text-start mb-3">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="example-password">Password</label>
                            <input type="password" name="password" class="form-control" required id="password">
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin" onclick="togglePassword()">
                                <label class="form-check-label" for="checkbox-signin" id="toggle-password-label">Lihat Password</label>
                            </div> 
                        </div>


                        <div class="d-grid">
                            <button class="btn btn-primary fw-semibold" type="submit" name="login">Login</button>
                        </div>
                    </form>

                    <?php
                        if (isset($_POST['login'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
         
                            $sql = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' AND status='Aktif'");
                            $ketemu = mysqli_num_rows($sql);
                            
                            if ($ketemu == 1) {
                                $data = mysqli_fetch_array($sql);
                                 
                                if ($data['password'] == $password) { 
                                    if ($data['level'] == "Admin") {
                                        $_SESSION['Admin'] = $data['id_admin'];
                                    } elseif ($data['level'] == "Pimpinan") {
                                        $_SESSION['Pimpinan'] = $data['id_admin'];
                                    } 
                                    echo "<script>
                                        Swal.fire({
                                            title: 'Login Berhasil!',
                                            text: 'Selamat datang, Anda berhasil login.',
                                            icon: 'success',
                                            showConfirmButton: false,
                                            timer: 2000
                                        }).then(() => {
                                            window.location = 'index.php';
                                        });
                                    </script>";
                                } else { 
                                    echo "<script>
                                        Swal.fire({
                                            title: 'Login Gagal!',
                                            text: 'Password salah!',
                                            icon: 'error',
                                            confirmButtonText: 'Coba Lagi'
                                        }).then(() => {
                                            window.location = 'login.php';
                                        });
                                    </script>";
                                }
                            } else { 
                                echo "<script>
                                    Swal.fire({
                                        title: 'Login Gagal!',
                                        text: 'Username tidak ditemukan!',
                                        icon: 'error',
                                        confirmButtonText: 'Coba Lagi'
                                    }).then(() => {
                                        window.location = 'login.php';
                                    });
                                </script>";
                            }
                        }
                    ?> 

                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var checkBox = document.getElementById("checkbox-signin");
            var label = document.getElementById("toggle-password-label");
            
            if (checkBox.checked) {
                passwordField.type = "text";
                label.textContent = "Sembunyikan Password";
            } else {
                passwordField.type = "password";
                label.textContent = "Lihat Password";
            }
        }
    </script>

</body>


<!-- Mirrored from coderthemes.com/greeva-asp/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 11:36:01 GMT -->
</html>