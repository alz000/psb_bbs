<?php
$id_tes_masuk = $_GET['id_tes_masuk'];
$sql = $con->query("SELECT * FROM tes_masuk NATURAL JOIN calon_santri WHERE id_tes_masuk='$id_tes_masuk'");
$row = mysqli_fetch_assoc($sql);
?> 

<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Penilaian</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>               
            <li class="breadcrumb-item"><a href="javascript: void(0);">Tes Masuk</a></li>            
            <li class="breadcrumb-item active">Penilaian</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Penilaian
                </h4> 

                <br> 

                <form method="post" enctype="multipart/form-data" action="">
                    <div class="row">
                        <div class="col-md-5">
                            <table class="table table-borderless"> 
                                <tr>
                                    <th>NISN</th> 
                                    <td>:</td>
                                    <td><?= $row['nisn'] ?></td>
                                </tr> 
                                <tr>
                                    <th>Nama</th> 
                                    <td>:</td>
                                    <td><?= $row['nama_lengkap'] ?></td>
                                </tr> 
                                <tr>
                                    <th>Jenis Kelamin</th> 
                                    <td>:</td>
                                    <td><?= $row['jk'] ?></td>
                                </tr> 
                                <tr>
                                    <th>Asal Sekolah</th> 
                                    <td>:</td>
                                    <td><?= $row['sekolah_asal'] ?></td>
                                </tr> 
                                <tr>
                                    <th style="vertical-align: top;">Materi</th> 
                                    <td style="vertical-align: top;">:</td>
                                    <td>1. Akademik / Pengetahuan Umum <br>2. BTQ, dan <br>3. Interview Calon Santri</td>
                                </tr> 
                            </table>
                        </div>
                        <div class="col-md-7">
                            <input hidden type="text" name="nisn" value="<?= $row['nisn'] ?>" required readonly>
                            <input hidden type="text" name="nama_lengkap" value="<?= $row['nama_lengkap'] ?>" required readonly>
                            <input hidden type="text" name="notelp" value="<?= $row['notelp'] ?>" required readonly>
                            <div class="row mb-2">
                                <label class="col-sm-4 col-form-label">Nilai Akademik / Pengetahuan Umum</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="pengetahuan_umum" id="pengetahuan_umum" required oninput="hitungNilai()">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-4 col-form-label">Nilai BTQ</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="btq" id="btq" required oninput="hitungNilai()">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-4 col-form-label">Total Nilai</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control bg-light" name="total_nilai" id="total_nilai" readonly required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-4 col-form-label">Grade</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control bg-light" name="grade" id="grade" readonly required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-4 col-form-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control bg-light" name="keterangan" id="keterangan" readonly required>
                                </div>
                            </div>
                        </div> 

                    </div>   

                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" name="nilai" class="btn btn-info btn-sm">Simpan</button>
                            <a href="?page=tes_masuk" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>

                <?php
                    if (isset($_POST['nilai'])) { 
                        $nisn = $_POST['nisn']; 
                        $nama_lengkap = $_POST['nama_lengkap']; 
                        $notelp = $_POST['notelp']; 
                        $btq = $_POST['btq']; 
                        $pengetahuan_umum = $_POST['pengetahuan_umum']; 
                        $total_nilai = $_POST['total_nilai']; 
                        $grade = $_POST['grade']; 
                        $keterangan = $_POST['keterangan'];  

                         
 
                        $query = "UPDATE tes_masuk SET  btq = '$btq', 
                                                        pengetahuan_umum = '$pengetahuan_umum', 
                                                        total_nilai = '$total_nilai', 
                                                        grade = '$grade', 
                                                        keterangan = '$keterangan', 
                                                        grade = '$grade'
                                                        WHERE id_tes_masuk = '$id_tes_masuk'"; 

                        if ($con->query($query) === TRUE) {  
                          
                            $update_query = "UPDATE calon_santri SET status_santri = 'Lulus, Segera Daftar Ulang' WHERE nisn = '$nisn'";
                            $con->query($update_query);
                           
 
                            $token = "AuMZdsjBJY3iyPTGq3CA"; 
                            $pesan = "HASIL PENILAIAN TES MASUK CALON SANTRI BARU : \n\n" .
                                     " - Calon Santri : $nama_lengkap\n" .  
                                     " - TES : Akademik / Pengetahuan Umum, BTQ dan Interview Calon Santri\n" . 
                                     " - BTQ : $btq\n" . 
                                     " - Akademik / Pengetahuan Umum : $pengetahuan_umum\n" . 
                                     " - Total Nilai : $total_nilai\n" . 
                                     " - Predikat : $grade\n" . 
                                     " - Keterangan : $keterangan\n\n" . 
                                     "*Diharapkan kepada calon santri baru yang sudah dinyatakan lulus untuk mengisi SURAT PERNYATAAN MENJADI SANTRI dan segera untuk melakukan DAFTAR ULANG dan untuk calon santri yang TIDAK LULUS silahkan untuk menghubungi panitia PSB.*"; 

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
                                            window.location.href = '?page=tes_masuk';
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

<script>
    function hitungNilai() {
        let btq = parseFloat(document.getElementById("btq").value) || 0;
        let pengetahuan_umum = parseFloat(document.getElementById("pengetahuan_umum").value) || 0;
 
        if (btq === 0 || pengetahuan_umum === 0) {
            document.getElementById("total_nilai").value = "";
            document.getElementById("grade").value = "";
            document.getElementById("keterangan").value = "";
            return;
        }
 
        let total_nilai = (btq + pengetahuan_umum) / 2;
        document.getElementById("total_nilai").value = total_nilai.toFixed(1);  
 
        let grade = "";
        let keterangan = "";

        if (total_nilai >= 90) {
            grade = "A";
            keterangan = "Lulus";
        } else if (total_nilai >= 80) {
            grade = "B";
            keterangan = "Lulus";
        } else if (total_nilai >= 70) {
            grade = "C";
            keterangan = "Lulus";
        } else if (total_nilai >= 60) {
            grade = "D";
            keterangan = "Remedial";
        } else {
            grade = "E";
            keterangan = "Tidak Lulus";
        }

        document.getElementById("grade").value = grade;
        document.getElementById("keterangan").value = keterangan;
    }
</script>