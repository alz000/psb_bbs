 

<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Tambah Data</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>                
            <li class="breadcrumb-item"><a href="javascript: void(0);">Pendidik</a></li>            
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Tambah Data Pendidik 
                </h4> 

                <br> 

                <form method="post" enctype="multipart/form-data" action="">  
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nik_pendidik" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_pendidik" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select name="jk_pendidik" class="form-control">
                                <option selected disabled>Pilih</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="tmp_pendidik" required>
                        </div>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="tgl_pendidik" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="alamat_pendidik" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="notelp_pendidik" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Bidang Kompetensi</label>
                        <div class="col-sm-10">
                            <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" name="id_bidang[]" data-placeholder="Bidang yang diajarkan oleh pendidik, bisa lebih dari 1 ...">
                                <?php
                                    $sql_kar=mysqli_query($con, "SELECT * FROM bidang ORDER BY bidang ASC");
                                    while ($kar=mysqli_fetch_array($sql_kar))
                                    {
                                        echo "<option value='$kar[id_bidang]'>$kar[bidang]</option>";
                                    }
                                    ?>
                            </select> 
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" name="tambah" class="btn btn-info btn-sm">Simpan</button>
                            <a href="?page=pendidik" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>

                <?php 
                    if (isset($_POST['tambah'])) {  
                        $nik_pendidik = $_POST['nik_pendidik'];
                        $nama_pendidik = $_POST['nama_pendidik'];
                        $jk_pendidik = $_POST['jk_pendidik'];
                        $tmp_pendidik = $_POST['tmp_pendidik'];
                        $tgl_pendidik = $_POST['tgl_pendidik'];
                        $alamat_pendidik = $_POST['alamat_pendidik'];
                        $notelp_pendidik = $_POST['notelp_pendidik'];
                        $id_bidang = isset($_POST['id_bidang']) ? $_POST['id_bidang'] : [];  
 
                        $query = "INSERT INTO pendidik (nik_pendidik, nama_pendidik, jk_pendidik, tmp_pendidik, tgl_pendidik, alamat_pendidik, notelp_pendidik) 
                                  VALUES ('$nik_pendidik', '$nama_pendidik', '$jk_pendidik', '$tmp_pendidik', '$tgl_pendidik', '$alamat_pendidik', '$notelp_pendidik')";
                        
                        if ($con->query($query) === TRUE) {
                            $id_pendidik = $con->insert_id;  
 
                            foreach ($id_bidang as $bidang) {
                                $con->query("INSERT INTO pendidik_detail (id_pendidik, id_bidang) VALUES ('$id_pendidik', '$bidang')");
                            }

                            echo "<script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Data berhasil disimpan.',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '?page=pendidik';
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
                ?>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row--> 