<?php
$id_admin = $_GET['id_admin'];
$sql = $con->query("SELECT * FROM admin WHERE id_admin='$id_admin'");
$row = mysqli_fetch_assoc($sql);
?> 

<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Ubah Data</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>            
            <li class="breadcrumb-item active">Ubah Data</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Ubah Data Admin 
                </h4> 

                <br> 

                <form method="post" enctype="multipart/form-data" action="">
                    <input type="hidden" name="foto_lama" value="<?= $row['foto']; ?>">
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="<?= $row['nama']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" value="<?= $row['username']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" value="<?= $row['password']; ?>" required>
                                <div class="input-group-append">
                                    <button class="btn btn-warning" type="button" onclick="togglePassword()" data-toggle="tooltip" data-placement="top" title="Lihat password">
                                        <i id="toggleIcon" class="ti ti-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Level</label>
                        <div class="col-sm-10">
                            <select name="level" class="form-control">
                                <option value="Admin" <?= ($row['level'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                                <option value="Pimpinan" <?= ($row['level'] == 'Pimpinan') ? 'selected' : ''; ?>>Pimpinan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option value="Aktif" <?= ($row['status'] == 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
                                <option value="Non-Aktif" <?= ($row['status'] == 'Non-Aktif') ? 'selected' : ''; ?>>Non-Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <img src="assets/gambar/admin/<?= $row['foto']; ?>" width="100"> <br>
                            <input type="file" class="form-control" name="foto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" name="ubah" class="btn btn-success btn-sm">Simpan</button>
                            <a href="?page=admin" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>
                <?php 
                    if (isset($_POST['ubah'])) {
                        $nama = $_POST['nama'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $level = $_POST['level'];
                        $status = $_POST['status'];
                        $foto = $_FILES['foto']['name'];
                     
                        if ($foto != '') { 
                            $result = $con->query("SELECT foto FROM admin WHERE id_admin='$id_admin'");
                            $data = $result->fetch_assoc();
                            if ($data['foto'] != '') {
                                unlink("assets/gambar/admin/" . $data['foto']);
                            }
                     
                            $foto_tmp = $_FILES['foto']['tmp_name'];
                            $foto_dir = "assets/gambar/admin/" . $foto;
                            move_uploaded_file($foto_tmp, $foto_dir);
                        } else { 
                            $foto = $_POST['foto_lama'];
                        }
                     
                        $query = "UPDATE admin SET nama='$nama', username='$username', password='$password', level='$level', status='$status', foto='$foto' WHERE id_admin='$id_admin'";
                        if ($con->query($query) === TRUE) {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Data berhasil diperbarui.',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '?page=admin';
                                        }
                                    });
                                  </script>";
                        } else {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: 'Terjadi kesalahan saat memperbarui data.',
                                        confirmButtonText: 'OK'
                                    });
                                  </script>";
                        }
                    }
                ?>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->  

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var toggleIcon = document.getElementById("toggleIcon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("ti ti-eye");
            toggleIcon.classList.add("ti ti-eye-slash");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("ti ti-eye-slash");
            toggleIcon.classList.add("ti ti-eye");
        }
    }
</script> 