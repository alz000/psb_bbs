<?php
$id_ruangan = $_GET['id_ruangan'];
$sql = $con->query("SELECT * FROM ruangan WHERE id_ruangan='$id_ruangan'");
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
            <li class="breadcrumb-item"><a href="javascript: void(0);">Ruangan Tes</a></li>            
            <li class="breadcrumb-item active">Ubah Data</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Ubah Data Ruangan Tes 
                </h4> 

                <br> 

                <form method="post" enctype="multipart/form-data" action=""> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Ruangan Tes</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="ruangan" value="<?= $row['ruangan']; ?>" required>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" name="ubah" class="btn btn-success btn-sm">Simpan</button>
                            <a href="?page=ruangan" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>
                <?php 
                    if (isset($_POST['ubah'])) {
                        $ruangan = $_POST['ruangan']; 

                        $query = "UPDATE ruangan SET ruangan='$ruangan' WHERE id_ruangan='$id_ruangan'";
                        if ($con->query($query) === TRUE) {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Data berhasil diperbarui.',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '?page=ruangan';
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