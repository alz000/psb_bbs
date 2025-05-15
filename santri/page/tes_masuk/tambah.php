 

<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Tambah Data</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>               
            <li class="breadcrumb-item"><a href="javascript: void(0);">Tes Masuk</a></li>            
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Tambah Data Tes Masuk 
                </h4> 

                <br> 

                <form method="post" enctype="multipart/form-data" action="">
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" data-toggle="select2" name="id_berkas" id="id_berkas" required onchange="tampilkanNotelp()">
                                <option selected disabled>Pilih</option>
                                <?php
                                $sql_kar = mysqli_query($con, "SELECT * FROM berkas JOIN pembayaran ON pembayaran.id_pembayaran=berkas.id_pembayaran JOIN calon_santri ON calon_santri.nisn=pembayaran.nisn WHERE calon_santri.status_santri='Acc - Tunggu jadwal tes diumumkan'");
                                while ($kar = mysqli_fetch_array($sql_kar)) {
                                    echo "<option value='$kar[id_berkas]' data-notelp='$kar[notelp]' data-nisn='$kar[nisn]' data-nama_lengkap='$kar[nama_lengkap]'>$kar[nisn] - $kar[nama_lengkap]</option>";
                                }
                                ?> 
                            </select>
                        </div>  
                    </div>

                    <div class="row mb-2" hidden>
                        <label class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nisn" id="nisn" required readonly>
                        </div>
                    </div>

                    <div class="row mb-2" hidden>
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required readonly>
                        </div>
                    </div>
                    
                    <div class="row mb-2" hidden>
                        <label class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="notelp" id="notelp" required readonly>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Tanggal Tes</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_tes" value="<?= date('Y-m-d') ?>" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Jam Tes</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" name="jam_tes" value="<?= date('H:i') ?>" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-sm-2">Penguji Pertama</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" data-toggle="select2" name="penguji_satu" required>
                                <option selected disabled>Pilih</option>
                                <?php
                                $sql_kar = mysqli_query($con, "SELECT * FROM pendidik ORDER BY nama_pendidik ASC");
                                while ($kar = mysqli_fetch_array($sql_kar)) {
                                    echo "<option value='$kar[nama_pendidik]'>$kar[nama_pendidik]</option>";
                                }
                                ?>
                            </select> 
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-sm-2">Penguji Kedua</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" data-toggle="select2" name="penguji_dua" required>
                                <option selected disabled>Pilih</option>
                                <?php
                                $sql_kar = mysqli_query($con, "SELECT * FROM pendidik ORDER BY nama_pendidik ASC");
                                while ($kar = mysqli_fetch_array($sql_kar)) {
                                    echo "<option value='$kar[nama_pendidik]'>$kar[nama_pendidik]</option>";
                                }
                                ?>
                            </select> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" name="tambah" class="btn btn-info btn-sm">Simpan</button>
                            <a href="?page=tes_masuk" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>

                <?php
                    if (isset($_POST['tambah'])) {
                        $id_berkas = $_POST['id_berkas'];
                        $nisn = $_POST['nisn']; 
                        $nama_lengkap = $_POST['nama_lengkap']; 
                        $notelp = $_POST['notelp']; 
                        $tgl_tes = $_POST['tgl_tes']; 
                        $jam_tes = $_POST['jam_tes']; 
                        $penguji_satu = $_POST['penguji_satu']; 
                        $penguji_dua = $_POST['penguji_dua']; 
     
                        $cek_username_query = "SELECT COUNT(*) AS jumlah FROM tes_masuk WHERE nisn = '$nisn'";
                        $cek_username_result = $con->query($cek_username_query);
                        $cek_username_data = $cek_username_result->fetch_assoc();

                        if ($cek_username_data['jumlah'] > 0) {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Peringatan!',
                                        text: 'Santri ini sudah dijadwalkan.',
                                        confirmButtonText: 'OK'
                                    });
                                  </script>";
                        } else {  
                            $query = "INSERT INTO tes_masuk (nisn, tgl_tes, jam_tes, penguji_satu, penguji_dua) 
                                      VALUES ('$nisn', '$tgl_tes', '$jam_tes', '$penguji_satu', '$penguji_dua')";

                            if ($con->query($query) === TRUE) {
                                $token = "AuMZdsjBJY3iyPTGq3CA"; 
                                $pesan = "Jadwal Pemberitahuan Tes : \n\n" .
                                         " - Calon Santri : $nama_lengkap\n" . 
                                         " - Tanggal Tes : $tgl_tes\n" . 
                                         " - Waktu : $jam_tes\n" . 
                                         " - TES : Akademik / Pengetahuan Umum, BTQ dan Interview Calon Santri\n\n" . 
                                         "Diharapkan kepada calon santri baru untuk datang 15 menit sebelum waktu sudah ditentukan.";
                                 
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
                    }
                ?>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->  

<script>
    function tampilkanNotelp() {
        var selectElement = document.getElementById("id_berkas");
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var nisn = selectedOption.getAttribute("data-nisn");
        document.getElementById("nisn").value = nisn;
        var nama_lengkap = selectedOption.getAttribute("data-nama_lengkap");
        document.getElementById("nama_lengkap").value = nama_lengkap;
        var notelp = selectedOption.getAttribute("data-notelp");
        document.getElementById("notelp").value = notelp;
    }
</script>