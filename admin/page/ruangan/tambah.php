 

<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Tambah Data</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Ruangan Tes</a></li>            
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Tambah Data Ruangan Tes 
                </h4> 

                <br> 

                <form method="post" enctype="multipart/form-data" action=""> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Ruangan Tes</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="ruangan" required>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" name="tambah" class="btn btn-info btn-sm">Simpan</button>
                            <a href="?page=ruangan" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>
                <?php
                    if (isset($_POST['tambah'])) {
                        $ruangan = $_POST['ruangan']; 
 
                        $cek_username_query = "SELECT COUNT(*) AS jumlah FROM ruangan WHERE ruangan = '$ruangan'";
                        $cek_username_result = $con->query($cek_username_query);
                        $cek_username_data = $cek_username_result->fetch_assoc();

                        if ($cek_username_data['jumlah'] > 0) {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Peringatan!',
                                        text: 'Data sudah terdaftar.',
                                        confirmButtonText: 'OK'
                                    });
                                  </script>";
                        } else { 
                            $query = "INSERT INTO ruangan (ruangan) VALUES ('$ruangan')";

                            if ($con->query($query) === TRUE) {
                                echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: 'Data berhasil disimpan.',
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
                                            text: 'Terjadi kesalahan saat menyimpan data.',
                                            confirmButtonText: 'OK'
                                        });
                                      </script>";
                            }
                        }
                    }
                ?>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->  