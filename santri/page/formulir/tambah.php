
<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Tambah Data</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>               
            <li class="breadcrumb-item"><a href="javascript: void(0);">Calon Santri</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Upload Berkas</a></li>            
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Tambah Data Upload Berkas
                </h4> 

                <br> 

                <form method="post" enctype="multipart/form-data" action="">
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Pembayaran</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" data-toggle="select2" name="id_pembayaran" id="id_pembayaran" required onchange="tampilkanNotelp()">
                                <option selected disabled>Pilih</option>
                                <?php
                                $nisn = $_SESSION['santri']['nisn']; 
                                $sql_kar = mysqli_query($con, "SELECT * FROM pembayaran NATURAL JOIN calon_santri WHERE nisn='$nisn' AND status_santri='Sudah Melakukan Pembayaran, Silahkan Upload Berkas'");
                                while ($kar = mysqli_fetch_array($sql_kar)) {
                                    echo "<option value='$kar[id_pembayaran]' data-notelp='$kar[notelp]' data-nisn='$kar[nisn]'>$kar[nisn] - $kar[nama_lengkap]</option>";
                                }
                                ?> 
                            </select>
                        </div>  
                    </div>

                    <div class="row mb-3" hidden>
                        <label class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nisn" id="nisn" required readonly>
                        </div>
                    </div>

                    <div class="row mb-3" hidden>
                        <label class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="notelp" id="notelp" required readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_berkas" value="<?= date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-10">
                            <strong class="text-danger">Catatan : Dokumen diupload ASLI berupa Foto / Scan yang jelas dan menampilkan seluruh isi dokumen. (Format file : jpg, jpeg, png, pdf)</strong>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Ijazah Terakhir</label>
                        <div class="col-sm-10"> 
                            <input type="file" class="form-control" name="ijazah" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Akta Kelahiran</label>
                        <div class="col-sm-10"> 
                            <input type="file" class="form-control" name="akta_lahir" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">KTP Ayah</label>
                        <div class="col-sm-10"> 
                            <input type="file" class="form-control" name="ktp_ayah" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">KTP Ibu</label>
                        <div class="col-sm-10"> 
                            <input type="file" class="form-control" name="ktp_ibu" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Kartu Keluarga</label>
                        <div class="col-sm-10"> 
                            <input type="file" class="form-control" name="kartu_keluarga" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Kartu KIP/PKH/KKS</label>
                        <div class="col-sm-10"> 
                            <input type="file" class="form-control" name="kip">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" name="tambah" class="btn btn-info btn-sm">Simpan</button>
                            <a href="?page=formulir" class="btn btn-danger btn-sm">Kembali</a>
                        </div>
                    </div>
                </form>

                <?php
                    if (isset($_POST['tambah'])) { 
 
                        $nisn = mysqli_real_escape_string($con, $_POST['nisn']);
                        $notelp = mysqli_real_escape_string($con, $_POST['notelp']);
                        $id_pembayaran = mysqli_real_escape_string($con, $_POST['id_pembayaran']);
                        $tgl_berkas = mysqli_real_escape_string($con, $_POST['tgl_berkas']);
                  
                        $cek_query = "SELECT COUNT(*) AS jumlah FROM berkas WHERE id_pembayaran = ?";
                        $stmt = $con->prepare($cek_query);
                        $stmt->bind_param("s", $id_pembayaran);
                        $stmt->execute();
                        $cek_result = $stmt->get_result();
                        $cek_data = $cek_result->fetch_assoc();

                        if ($cek_data['jumlah'] > 0) {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Peringatan!',
                                        text: 'Berkas sudah terdaftar.',
                                        confirmButtonText: 'OK'
                                    });
                                  </script>";
                            exit;  
                        }
                 
                        $folderTujuan = "../admin/assets/gambar/berkas/";
                  
                        if (!file_exists($folderTujuan)) {
                            mkdir($folderTujuan, 0777, true);
                        }
                  
                        function uploadFile($file, $namaFileBaru) {
                            global $folderTujuan;
                            $fileTmp = $file['tmp_name'];
                            $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                            $fileTujuan = $folderTujuan . $namaFileBaru . "." . $fileExt;

                            $ekstensiDiperbolehkan = ['jpg', 'jpeg', 'png', 'pdf'];
                            if (in_array($fileExt, $ekstensiDiperbolehkan)) {
                                if (move_uploaded_file($fileTmp, $fileTujuan)) {
                                    return $fileTujuan;  
                                } else {
                                    return false;  
                                }
                            }
                            return false;
                        }
                  
                        $ijazah = uploadFile($_FILES['ijazah'], "ijazah_" . time());
                        $akta_lahir = uploadFile($_FILES['akta_lahir'], "akta_" . time());
                        $ktp_ayah = uploadFile($_FILES['ktp_ayah'], "ktp_ayah_" . time());
                        $ktp_ibu = uploadFile($_FILES['ktp_ibu'], "ktp_ibu_" . time());
                        $kartu_keluarga = uploadFile($_FILES['kartu_keluarga'], "kk_" . time());
                        $kip = !empty($_FILES['kip']['name']) ? uploadFile($_FILES['kip'], "kip_" . time()) : null;
                  
                        if ($ijazah && $akta_lahir && $ktp_ayah && $ktp_ibu && $kartu_keluarga) { 
                            $query = "INSERT INTO berkas (id_pembayaran, tgl_berkas, ijazah, akta_lahir, ktp_ayah, ktp_ibu, kartu_keluarga, kip) 
                                      VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                            $stmt = $con->prepare($query);
                            $stmt->bind_param("ssssssss", $id_pembayaran, $tgl_berkas, $ijazah, $akta_lahir, $ktp_ayah, $ktp_ibu, $kartu_keluarga, $kip);
 
                            $update_query = "UPDATE calon_santri SET status_santri = 'Berkas Sudah di Upload, Menunggu Verifikasi' WHERE nisn = ?";
                            $update_stmt = $con->prepare($update_query);
                            $update_stmt->bind_param("s", $nisn);

                            if ($stmt->execute() && $update_stmt->execute()) {  
                                $token = "AuMZdsjBJY3iyPTGq3CA"; 
                                $pesan = "Terima kasih, berkas yang anda upload akan segera kami lakukan verifikasi. Kami akan memberitahukan apabila sudah selesai.";
                                
                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => 'https://api.fonnte.com/send',
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_POST => true,
                                    CURLOPT_POSTFIELDS => http_build_query(array(
                                        'target' => $notelp,
                                        'message' => $pesan,
                                        'countryCode' => '62',
                                        'delay' => '5-10',
                                    )),
                                    CURLOPT_HTTPHEADER => array(
                                        "Authorization: $token",
                                        "Content-Type: application/x-www-form-urlencoded"
                                    ),
                                ));

                                $response = curl_exec($curl);
                                curl_close($curl);
                 
                                echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: 'Data berhasil disimpan.',
                                            confirmButtonText: 'OK'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '?page=formulir';
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
                        } else { 
                            echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: 'Gagal mengupload berkas.',
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
    function tampilkanNotelp() {
        var selectElement = document.getElementById("id_pembayaran");
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var nisn = selectedOption.getAttribute("data-nisn");
        document.getElementById("nisn").value = nisn;
        var notelp = selectedOption.getAttribute("data-notelp");
        document.getElementById("notelp").value = notelp;
    }
</script>