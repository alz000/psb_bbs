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
            <div class="col-xl-10 col-lg-5 col-md-6">
                <div class="card overflow-hidden h-100 p-xxl-4 p-3 mb-0"> 

                    <h4 class="fw-semibold mb-2 fs-18">Formulir Pendaftaran</h4>

                    <p class="text-muted mb-4">Silahkan lengkapi formulir dibawah ini</p>

                    <form method="post" enctype="multipart/form-data" action="">
                        <div class="card-body border-dark border">
                            <div class="row mb-2">
                                 <strong class="col-sm-2" style="font-size: 18px;"><u>Jenjang Pendidikan</u></strong>
                            </div>

                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">&nbsp;</label>
                                <div class="col-sm-9"> 
                                    <div class="mt-2">
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="mts" name="jenjang" value="Madrasah Tsanawiyah (MTS)" class="form-check-input" checked>
                                            <label class="form-check-label" for="mts">Madrasah Tsanawiyah (MTS)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="ma" name="jenjang" value="Madrasah Aliyah (MA)" class="form-check-input">
                                            <label class="form-check-label" for="ma">Madrasah Aliyah (MA)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="card-body border-dark border">
                            <div class="row mb-2">
                                 <strong class="col-sm-2" style="font-size: 18px;"><u>Data Diri</u></strong>
                            </div>

                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">NISN</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nisn" required>
                                    <input type="date" hidden class="form-control" name="tgl_santri" value="<?= date('Y-m-d') ?>" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_lengkap" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Nama Panggilan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_panggilan" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="jk" required>
                                        <option value="">Pilih</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Tempat, Tanggal Lahir</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="tmp" required>
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="tgl" required>
                                </div>
                            </div> 
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Anak Ke</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="anak_ke" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Jumlah Saudara</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="jumlah_saudara" required>
                                </div>
                            </div> 
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Tinggi dan Berat Badan</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="tinggi" required>
                                </div>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="berat" required>
                                </div>
                            </div> 
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Golongan Darah</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" data-toggle="select2" name="id_darah" required>
                                        <option selected disabled>Pilih</option>
                                        <?php
                                        $sql_kar=mysqli_query($con, "SELECT * FROM darah ORDER BY darah ASC");
                                        while ($kar=mysqli_fetch_array($sql_kar))
                                        {
                                            echo "<option value='$kar[id_darah]'>$kar[darah]</option>";
                                        }
                                        ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Riwayat Penyakit</label>
                                <div class="col-sm-9">
                                    <textarea name="riwayat_penyakit" class="form-control" required rows="4"></textarea> 
                                </div>
                            </div>
                        </div>



                        <br>



                        <div class="card-body border-dark border">
                            <div class="row mb-2">
                                 <strong class="col-sm-2" style="font-size: 18px;"><u>Data Tempat Tinggal</u></strong>
                            </div>

                            <div class="row mb-2"> 
                                <label class="col-sm-3 text-end">Provinsi</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="provinsi" id="provinsi" required> 
                                        <option value="">Memuat data...</option>
                                    </select>
                                </div>
                            </div> 

                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Kabupaten/Kota</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="kabupaten" id="kabupaten" required>
                                        <option value="">Pilih Kabupaten/Kota</option> 
                                    </select>
                                </div>
                            </div>  

                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Kecamatan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="kecamatan" id="kecamatan" required>
                                        <option value="">Pilih Kecamatan</option> 
                                    </select>
                                </div>
                            </div>  

                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Kelurahan / Desa</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="desa" id="desa" required>
                                        <option value="">Pilih Kelurahan / Desa</option> 
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea name="alamat" class="form-control" required rows="4"></textarea> 
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Nomor Telepon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="notelp" required>
                                </div>
                            </div> 
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Tinggal Bersama</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="tempat_tinggal" required>
                                        <option value="">Pilih</option>
                                        <option value="Orang Tua">Orang Tua</option>
                                        <option value="Saudara Kandung">Saudara Kandung</option>
                                        <option value="Saudara Tiri">Saudara Tiri</option>
                                        <option value="Keluarga">Keluarga</option>
                                        <option value="Asrama">Asrama</option>
                                        <option value="Kost">Kost</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Jarak Tempuh Ke MTS-MA</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="jarak" required>
                                </div>
                            </div> 
                        </div>

                        <br>

                        <div class="card-body border-dark border">
                            <div class="row mb-2">
                                 <strong class="col-sm-2" style="font-size: 18px;"><u>Data Pendidikan</u></strong>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Lulusan Dari / Asal Sekolah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="sekolah_asal" required>
                                </div>
                            </div> 
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Tanggal, Nomor Ijazah dan Lama Belajar</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" name="tgl_ijazah" required>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="no_ijazah" required>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="lama_belajar" required>
                                </div>
                            </div> 
                        </div>

                        <br>

                        <div class="card-body border-dark border">
                            <div class="row mb-2">
                                 <strong class="col-sm-2" style="font-size: 18px;"><u>Data Ayah</u></strong>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nik_ayah" required>
                                </div>
                            </div> 
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_ayah" required>
                                </div>
                            </div> 
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Tempat, Tanggal Lahir</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="tmp_ayah" required>
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="tgl_ayah" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="alamat_ayah" rows="4" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Pendidikan</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" data-toggle="select2" name="id_pendidikan_ayah" required>
                                        <option selected disabled>Pilih</option>
                                        <?php
                                        $sql_kar=mysqli_query($con, "SELECT * FROM pendidikan ORDER BY id_pendidikan ASC");
                                        while ($kar=mysqli_fetch_array($sql_kar))
                                        {
                                            echo "<option value='$kar[id_pendidikan]'>$kar[pendidikan]</option>";
                                        }
                                        ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Pekerjaan</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" data-toggle="select2" name="id_pekerjaan_ayah" required>
                                        <option selected disabled>Pilih</option>
                                        <?php
                                        $sql_kar=mysqli_query($con, "SELECT * FROM pekerjaan ORDER BY id_pekerjaan ASC");
                                        while ($kar=mysqli_fetch_array($sql_kar))
                                        {
                                            echo "<option value='$kar[id_pekerjaan]'>$kar[pekerjaan]</option>";
                                        }
                                        ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Penghasilan /Bulan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="penghasilan_ayah" id="penghasilan_ayah" onkeypress="return angka(event);" required>
                                </div>
                            </div> 
                        </div>

                        <br>

                        <div class="card-body border-dark border">
                            <div class="row mb-2">
                                 <strong class="col-sm-2" style="font-size: 18px;"><u>Data Ibu</u></strong>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nik_ibu" required>
                                </div>
                            </div> 
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_ibu" required>
                                </div>
                            </div> 
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Tempat, Tanggal Lahir</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="tmp_ibu" required>
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="tgl_ibu" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="alamat_ibu" rows="4" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Pendidikan</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" data-toggle="select2" name="id_pendidikan_ibu" required>
                                        <option selected disabled>Pilih</option>
                                        <?php
                                        $sql_kar=mysqli_query($con, "SELECT * FROM pendidikan ORDER BY id_pendidikan ASC");
                                        while ($kar=mysqli_fetch_array($sql_kar))
                                        {
                                            echo "<option value='$kar[id_pendidikan]'>$kar[pendidikan]</option>";
                                        }
                                        ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Pekerjaan</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" data-toggle="select2" name="id_pekerjaan_ibu" required>
                                        <option selected disabled>Pilih</option>
                                        <?php
                                        $sql_kar=mysqli_query($con, "SELECT * FROM pekerjaan ORDER BY id_pekerjaan ASC");
                                        while ($kar=mysqli_fetch_array($sql_kar))
                                        {
                                            echo "<option value='$kar[id_pekerjaan]'>$kar[pekerjaan]</option>";
                                        }
                                        ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">Penghasilan /Bulan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="penghasilan_ibu" id="penghasilan_ibu" onkeypress="return angka(event);" required>
                                </div>
                            </div>
                            <div class="row mb-2" hidden>
                                <label class="col-sm-3 col-form-label">Password Santri</label>
                                <div class="col-sm-9 ms-auto">
                                    <input type="text" class="form-control bg-light" id="password_santri" name="password_santri" readonly required>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-primary" onclick="generatePassword()">Generate Password</button>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 text-end">&nbsp;</label>
                                <div class="col-sm-9">
                                    <button type="submit" name="tambah" class="btn btn-info btn-sm">Simpan</button> 
                                </div>
                            </div> 
                        </div>



                        
                    </form>

                    <?php
                        if (isset($_POST['tambah'])) {
                        // data
                            $jenjang = $_POST['jenjang'];
                            $tgl_santri = $_POST['tgl_santri'];
                            $nisn = $_POST['nisn'];
                            $nama_lengkap = $_POST['nama_lengkap'];
                            $nama_panggilan = $_POST['nama_panggilan'];
                            $jk = $_POST['jk'];
                            $tmp = $_POST['tmp'];
                            $tgl = $_POST['tgl'];
                            $anak_ke = $_POST['anak_ke'];
                            $jumlah_saudara = $_POST['jumlah_saudara'];
                            $tinggi = $_POST['tinggi'];
                            $berat = $_POST['berat'];
                            $id_darah = $_POST['id_darah'];
                            $riwayat_penyakit = $_POST['riwayat_penyakit'];
                            $provinsi = $_POST['provinsi'];
                            $kabupaten = $_POST['kabupaten'];
                            $kecamatan = $_POST['kecamatan'];
                            $desa = $_POST['desa'];
                            $alamat = $_POST['alamat'];
                            $notelp = $_POST['notelp'];
                            $tempat_tinggal = $_POST['tempat_tinggal'];
                            $jarak = $_POST['jarak'];
                            $sekolah_asal = $_POST['sekolah_asal'];
                            $tgl_ijazah = $_POST['tgl_ijazah'];
                            $no_ijazah = $_POST['no_ijazah'];
                            $lama_belajar = $_POST['lama_belajar'];
                            $password_santri = $_POST['password_santri'];

                            $nama_ayah = $_POST['nama_ayah'];
                            $nik_ayah = $_POST['nik_ayah'];
                            $tmp_ayah = $_POST['tmp_ayah'];
                            $tgl_ayah = $_POST['tgl_ayah'];
                            $alamat_ayah = $_POST['alamat_ayah'];
                            $id_pendidikan_ayah = $_POST['id_pendidikan_ayah'];
                            $id_pekerjaan_ayah = $_POST['id_pekerjaan_ayah'];
                            $penghasilan_ayah = str_replace(".", "", $_POST['penghasilan_ayah']);

                            $nama_ibu = $_POST['nama_ibu'];
                            $nik_ibu = $_POST['nik_ibu'];
                            $tmp_ibu = $_POST['tmp_ibu'];
                            $tgl_ibu = $_POST['tgl_ibu'];
                            $alamat_ibu = $_POST['alamat_ibu'];
                            $id_pendidikan_ibu = $_POST['id_pendidikan_ibu'];
                            $id_pekerjaan_ibu = $_POST['id_pekerjaan_ibu'];
                            $penghasilan_ibu = str_replace(".", "", $_POST['penghasilan_ibu']);

                            $nisn = $con->real_escape_string($nisn);
                            $nama_lengkap = $con->real_escape_string($nama_lengkap);
                            $notelp = $con->real_escape_string($notelp);
                        // End Data
                            $cek_query = "SELECT COUNT(*) AS jumlah FROM calon_santri WHERE nisn = '$nisn'";
                            $cek_result = $con->query($cek_query);
                            $cek_data = $cek_result->fetch_assoc();
                       
                            if ($cek_data['jumlah'] > 0) {
                                echo "<script>
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Peringatan!',
                                            text: 'NISN sudah terdaftar.',
                                            confirmButtonText: 'OK'
                                        });
                                      </script>";
                            } else { 
                                $today = date('Y-m-d');

                                $cekgelombang = $con->query("SELECT tgl_mulai, tgl_selesai FROM setting_pendaftaran 
                                                            WHERE '$today' BETWEEN tgl_mulai AND tgl_selesai 
                                                            AND tingkat = '$jenjang' 
                                                            LIMIT 1");

                                if ($cekgelombang && $cekgelombang->num_rows > 0) {

                                    // Ambil data setting_pendaftaran yang aktif
                                    $ceksettingkuota_result = $con->query("SELECT id, kuota FROM setting_pendaftaran 
                                                                        WHERE '$today' BETWEEN tgl_mulai AND tgl_selesai 
                                                                        AND tingkat = '$jenjang' 
                                                                        LIMIT 1");

                                    $ceksettingkuota = $ceksettingkuota_result->fetch_assoc();
                                    $gelombang_id = $ceksettingkuota['id'];
                                    $kuota = $ceksettingkuota['kuota'];

                                    // Hitung jumlah pendaftar pada gelombang ini
                                    $cek_pendaftar = "SELECT COUNT(*) AS jumlah FROM calon_santri WHERE gelombang_id = '$gelombang_id'";
                                    $cek_result_cek_pendaftar = $con->query($cek_pendaftar);
                                    $hitung = $cek_result_cek_pendaftar->fetch_assoc();

                                    if ($hitung['jumlah'] < $kuota) {
                                        $query = "INSERT INTO calon_santri (
                                                    jenjang, tgl_santri, nisn, nama_lengkap, nama_panggilan, jk, tmp, tgl, 
                                                    anak_ke, jumlah_saudara, tinggi, berat, id_darah, riwayat_penyakit, 
                                                    provinsi, kabupaten, kecamatan, desa, alamat, notelp, tempat_tinggal, 
                                                    jarak, sekolah_asal, tgl_ijazah, no_ijazah, lama_belajar, 
                                                    status_santri, password_santri, gelombang_id
                                                ) 
                                                VALUES (
                                                    '$jenjang', '$tgl_santri', '$nisn', '$nama_lengkap', '$nama_panggilan', '$jk', '$tmp', '$tgl', 
                                                    '$anak_ke', '$jumlah_saudara', '$tinggi', '$berat', '$id_darah', '$riwayat_penyakit', 
                                                    '$provinsi', '$kabupaten', '$kecamatan', '$desa', '$alamat', '$notelp', '$tempat_tinggal', 
                                                    '$jarak', '$sekolah_asal', '$tgl_ijazah', '$no_ijazah', '$lama_belajar', 
                                                    'Pending', '$password_santri', '$gelombang_id'
                                                )";
                                    }else{
                                         echo "<script>
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Peringatan!',
                                            text: 'Kuota Penuh.',
                                            confirmButtonText: 'OK'
                                        });
                                      </script>";
                                    }
                                }else{
                                     echo "<script>
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Peringatan!',
                                            text: 'Pendaftaran Untuk $jenjang Belum Dibuka.',
                                            confirmButtonText: 'OK'
                                        });
                                      </script>";
                                }

                               

                                if ($con->query($query) === TRUE) {
                                    $query_ayah = "INSERT INTO ayah (nisn, nama_ayah, nik_ayah, tmp_ayah, tgl_ayah, alamat_ayah, id_pendidikan_ayah, id_pekerjaan_ayah, penghasilan_ayah) VALUES ('$nisn', '$nama_ayah', '$nik_ayah', '$tmp_ayah', '$tgl_ayah', '$alamat_ayah', '$id_pendidikan_ayah', '$id_pekerjaan_ayah', '$penghasilan_ayah')";

                                    if ($con->query($query_ayah) === TRUE) {
                                        $query_ibu = "INSERT INTO ibu (nisn, nama_ibu, nik_ibu, tmp_ibu, tgl_ibu, alamat_ibu, id_pendidikan_ibu, id_pekerjaan_ibu, penghasilan_ibu) VALUES ('$nisn', '$nama_ibu', '$nik_ibu', '$tmp_ibu', '$tgl_ibu', '$alamat_ibu', '$id_pendidikan_ibu', '$id_pekerjaan_ibu', '$penghasilan_ibu')";

                                        if ($con->query($query_ibu) === TRUE) { 
                                            $token = "AuMZdsjBJY3iyPTGq3CA"; 
                                            $pesan = "Pemberitahuan: Pendaftaran calon santri $nama_lengkap berhasil. Silakan lakukan pembayaran Rp. 250.000,- ke rekening berikut:\n\n" .
                                                     " - NISN : $nisn\n" . 
                                                     " - Password : $password_santri\n" . 
                                                     " - Nama Bank: MANDIRI\n" . 
                                                     " - No. Rekening: 1570000591553\n" . 
                                                     " - Atas Nama: YAYAH UMMU ADIYAH\n\n" . 
                                                     "Kirim bukti pembayaran ke WhatsApp Bendahara Panitia: 089626067119 dengan mencantumkan Nama Calon Santri dan Nomor WA yang digunakan atau calon santri bisa login menggunakan NISN dan password yang sudah diberikan untuk melakukan upload bukti pembayaran.";

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

                                            if (curl_errno($curl)) {
                                                echo "Error: " . curl_error($curl);
                                            } else {
                                                echo "Pesan berhasil dikirim ke $notelp: $response\n";
                                            }

                                            curl_close($curl);

                                            echo "<script>
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Berhasil!',
                                                        text: 'Data formulir berhasil diterima.',
                                                        confirmButtonText: 'OK'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            window.location.href = 'login.php';
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

    <script type="text/javascript">
        function angka(evt) 
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57)) 
            {
                return false;
            }
            return true;
        } 

        var penghasilan_ayah = document.getElementById('penghasilan_ayah');
        penghasilan_ayah.addEventListener('keyup', function(e)
        {
            penghasilan_ayah.value = formatRupiah(this.value);
        });  

        var penghasilan_ibu = document.getElementById('penghasilan_ibu');
        penghasilan_ibu.addEventListener('keyup', function(e)
        {
            penghasilan_ibu.value = formatRupiah(this.value);
        });  
         
        function formatRupiah(angka, prefix)
        {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split    = number_string.split(','),
                sisa     = split[0].length % 3,
                rupiah     = split[0].substr(0, sisa),
                ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        } 

        function generatePassword() {
            let password = Math.floor(1000000000 + Math.random() * 9000000000);  
            document.getElementById("password_santri").value = password;
        }
     
        generatePassword();
    </script> 
 
    <script>
        $(document).ready(function () {  
            // Load daftar provinsi saat halaman dibuka
            $.post('../admin/get_provinsi.php', function (data) {
                $('#provinsi').html(data);
            });

            // Event saat provinsi dipilih
            $('#provinsi').on('change', function () {
                var kode_provinsi = $(this).val();
                $.post('../admin/get_kabupaten.php', { kode_provinsi: kode_provinsi }, function (data) {
                    $('#kabupaten').html(data); 
                    $('#kecamatan').html('<option value="">Pilih Kecamatan</option>'); 
                    $('#desa').html('<option value="">Pilih Kelurahan / Desa</option>');
                });
            });

            // Event saat kabupaten dipilih
            $('#kabupaten').on('change', function () {
                var kode_kabupaten = $(this).val();
                $.post('../admin/get_kecamatan.php', { kode_kabupaten: kode_kabupaten }, function (data) {
                    $('#kecamatan').html(data); 
                    $('#desa').html('<option value="">Pilih Kelurahan / Desa</option>');
                });
            });

            // Event saat kecamatan dipilih
            $('#kecamatan').on('change', function () {
                var kode_kecamatan = $(this).val();
                $.post('../admin/get_desa.php', { kode_kecamatan: kode_kecamatan }, function (data) {
                    $('#desa').html(data);
                });
            });
        });
    </script>

</body>


<!-- Mirrored from coderthemes.com/greeva-asp/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2025 11:36:01 GMT -->
</html>