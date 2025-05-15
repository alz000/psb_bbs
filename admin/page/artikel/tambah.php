
<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Tambah Data</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Artikel</a></li>            
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Tambah Data Artikel 
                </h4> 

                <br> 

                <form method="post" enctype="multipart/form-data" action=""> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="judul" required>
                            <input type="text" class="form-control" name="view" value="0" hidden required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" data-toggle="select2" name="kategori" required>
                                <option selected disabled>Pilih</option>
                                <?php
                                $sql_kar=mysqli_query($con, "SELECT * FROM kategori ORDER BY kategori ASC");
                                while ($kar=mysqli_fetch_array($sql_kar))
                                {
                                    echo "<option value='$kar[kategori]'>$kar[kategori]</option>";
                                }
                                ?>
                            </select> 
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Isi Artikel</label>
                        <div class="col-sm-10">
                            <textarea name="isi" class="form-control ckeditor" required rows="5"></textarea>  
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Gambar Tentang Artikel</label>
                        <div class="col-sm-10"> 
                            <input type="file" class="form-control" name="gambar" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Penulis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="posting" value="<?= $admin['nama'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Tanggal Postingan</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d') ?>" required>
                        </div>
                    </div>   
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status_artikel" class="form-control">
                                <option selected disabled>Pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" name="tambah" class="btn btn-info btn-sm">Simpan</button>
                            <a href="?page=artikel" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>
                <?php
                    if (isset($_POST['tambah'])) {
                        $judul = $_POST['judul'];
                        $kategori = $_POST['kategori'];
                        $isi = $_POST['isi'];
                        $tanggal = $_POST['tanggal'];
                        $posting = $_POST['posting'];
                        $view = $_POST['view'];
                        $status_artikel = $_POST['status_artikel'];
                        $gambar = $_FILES['gambar']['name'];
 
                        $cek_query = "SELECT COUNT(*) AS jumlah FROM artikel WHERE judul = '$judul'";
                        $cek_result = $con->query($cek_query);
                        $cek_data = $cek_result->fetch_assoc();

                        if ($cek_data['jumlah'] > 0) { 
                            echo "<script>
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Peringatan!',
                                        text: 'Artikel sudah terdaftar.',
                                        confirmButtonText: 'OK'
                                    });
                                  </script>";
                        } else { 
                            if ($gambar != '') {
                                $foto_tmp = $_FILES['gambar']['tmp_name'];
                                $foto_dir = "assets/gambar/artikel/" . $gambar;
                                move_uploaded_file($foto_tmp, $foto_dir);
                            }

                            $query = "INSERT INTO artikel (judul, kategori, isi, gambar, tanggal, posting,view,status_artikel) 
                                      VALUES ('$judul', '$kategori', '$isi', '$gambar', '$tanggal', '$posting','$view','$status_artikel')";

                            if ($con->query($query) === TRUE) {
                                echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: 'Data berhasil disimpan.',
                                            confirmButtonText: 'OK'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '?page=artikel';
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