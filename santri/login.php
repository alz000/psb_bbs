<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include '../admin/inc/koneksi.php';
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
    <link rel="shortcut icon" href="../admin/assets/gambar/<?= $meta['logo'] ?>">

    <!-- Theme Config Js -->
    <script src="../admin/assets/js/config.js"></script>

    <!-- Vendor css -->
    <link href="../admin/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="../admin/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="../admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Sweetalert2 -->
    <script src="../admin/assets/js/sweetalert2@11.js"> </script>
</head>

<body>

    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card overflow-hidden text-center h-100 p-xxl-4 p-3 mb-0">
                    <a href="index-2.html" class="auth-brand mb-4">
                        <img src="../admin/assets/gambar/<?= $meta['logo'] ?>" height="140" class="logo-dark"> <br><br>
                        <p><strong><?= $meta['instansi'] ?></strong></p>
                        <img src="../admin/assets/gambar/<?= $meta['logo'] ?>" height="140" class="logo-light"> 
                    </a>

                    <h4 class="fw-semibold mb-2 fs-18">Masuk Ke Akunmu</h4>

                    <p class="text-muted mb-4">Enter your NISN and password.</p>

                    <form method="post" class="text-start mb-3">
                        <div class="mb-3">
                            <label class="form-label">NISN</label>
                            <input type="text" name="nisn" class="form-control" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" name="password_santri" class="form-control" required id="password">
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
                        $nisn = trim($_POST['nisn']);
                        $password_santri = trim($_POST['password_santri']);

                        if (!empty($nisn) && !empty($password_santri)) {
                            $stmt = $con->prepare("SELECT * FROM calon_santri WHERE nisn = ?");
                            $stmt->bind_param("s", $nisn);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $akun = $result->fetch_assoc();

                            if ($akun) {
                                if ($akun['password_santri']) {
                                    $_SESSION["santri"] = $akun;
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
                                            text: 'NISN tidak ditemukan!',
                                            icon: 'error',
                                            confirmButtonText: 'Coba Lagi'
                                        }).then(() => {
                                            window.location = 'login.php';
                                        });
                                    </script>";
                            }
                            $stmt->close();
                        }
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="../admin/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="../admin/assets/js/app.js"></script>

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