<?php
$id_meta = $_GET['id_meta'];
$sql = $con->query("SELECT * FROM meta WHERE id_meta='$id_meta'");
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
            <li class="breadcrumb-item"><a href="javascript: void(0);">Pengaturan</a></li>            
            <li class="breadcrumb-item active">Ubah Data</li>
        </ol>
    </div>
</div> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Ubah Data Pengaturan</h4>

                <br>
                
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Instansi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="instansi" value="<?= $row['instansi'] ?>" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" value="<?= $row['alamat'] ?>" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="telp" value="<?= $row['telp'] ?>" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" value="<?= $row['email'] ?>" required>
                        </div>
                    </div>   
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Pimpinan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pimpinan" value="<?= $row['pimpinan'] ?>" required>
                        </div>
                    </div>     
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Singkatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="singkat" value="<?= $row['singkat'] ?>" required>
                        </div>
                    </div>  
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">
                            <?php if (!empty($row['logo'])): ?>
                                <img src="assets/gambar/<?= $row['logo'] ?>" alt="Logo" style="width: 100px; height: auto;">
                            <?php endif; ?>
                            <input type="file" class="form-control" name="logo">
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" name="ubah" class="btn btn-success btn-sm">Ubah</button>
                            <a href="?page=pengaturan&id_meta=<?= $row['id_meta'] ?>" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>
                <?php 
                if (isset($_POST['ubah'])) 
                {
                    
                    $instansi     = $_POST['instansi']; 
                    $telp      = $_POST['telp']; 
                    $email     = $_POST['email']; 
                    $alamat    = $_POST['alamat'];  
                    $pimpinan  = $_POST['pimpinan'];      
                    $singkat  = $_POST['singkat'];   
                    $logo      = $_FILES['logo']['name'];
                    $lokasi         = $_FILES['logo']['tmp_name'];
                    if (!empty($lokasi)) 
                    {
                        move_uploaded_file($lokasi, "assets/gambar/".$logo);
                        $con->query("UPDATE meta SET instansi='$instansi',
                                                     telp='$telp',
                                                     email='$email',
                                                     alamat='$alamat', 
                                                     pimpinan='$pimpinan',  
                                                     singkat='$singkat', 
                                                     logo='$logo' WHERE id_meta='$_GET[id_meta]'"); 
                    }
                    else
                    {
                        $con->query("UPDATE meta SET instansi='$instansi',
                                                     telp='$telp',
                                                     email='$email',
                                                     alamat='$alamat', 
                                                     pimpinan='$pimpinan',  
                                                     singkat='$singkat' WHERE id_meta='$_GET[id_meta]'"); 
                    } 
                    echo " 
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Data berhasil diubah!',
                            timer: 1700,
                            showConfirmButton: false
                        }).then(function() {
                            window.location = '?page=pengaturan&id_meta=$id_meta';
                        });
                    </script>";
                }
                ?> 
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->
