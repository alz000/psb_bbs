<?php
$nisn = $_GET['nisn'];
$sql = $con->query("SELECT * FROM calon_santri WHERE nisn='$nisn'");
$row = mysqli_fetch_assoc($sql);
?> 

<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Ubah Data</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>                
            <li class="breadcrumb-item"><a href="javascript: void(0);">Calon Santri</a></li>            
            <li class="breadcrumb-item active">Ubah Data</li>
        </ol>
    </div>
</div> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Ubah Data Calon Santri</h4> 
                <br> 

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
                                        <input type="radio" id="mts" name="jenjang" value="Madrasah Tsanawiyah (MTS)" class="form-check-input" <?php echo ($row['jenjang'] == 'Madrasah Tsanawiyah (MTS)') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="mts">Madrasah Tsanawiyah (MTS)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="ma" name="jenjang" value="Madrasah Aliyah (MA)" class="form-check-input" <?php echo ($row['jenjang'] == 'Madrasah Aliyah (MA)') ? 'checked' : ''; ?>>
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
                                <input type="text" class="form-control" name="nisn" value="<?php echo $row['nisn']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 text-end">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 text-end">Nama Panggilan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_panggilan" value="<?php echo $row['nama_panggilan']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 text-end">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="jk" required>
                                    <option value="">Pilih</option>
                                    <option value="Laki-Laki" <?php echo ($row['jk'] == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php echo ($row['jk'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 text-end">Tempat, Tanggal Lahir</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="tmp" value="<?php echo $row['tmp']; ?>" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="tgl" value="<?php echo $row['tgl']; ?>" required>
                            </div>
                        </div> 
                        <div class="row mb-2">
                            <label class="col-sm-3 text-end">Anak Ke</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="anak_ke" value="<?php echo $row['anak_ke']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 text-end">Jumlah Saudara</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="jumlah_saudara" value="<?php echo $row['jumlah_saudara']; ?>" required>
                            </div>
                        </div> 
                        <div class="row mb-2">
                            <label class="col-sm-3 text-end">Tinggi dan Berat Badan</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="tinggi" value="<?php echo $row['tinggi']; ?>" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="berat" value="<?php echo $row['berat']; ?>" required>
                            </div>
                        </div> 
                        <div class="row mb-2">
                            <label class="col-sm-3 text-end">Golongan Darah</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" data-toggle="select2" name="id_darah" required>
                                    <option selected disabled>Pilih</option>
                                    <?php
                                    $sql = mysqli_query($con, "SELECT * FROM darah");
                                    while ($kar = mysqli_fetch_array($sql)) {
                                        $selected = ($row['id_darah'] == $kar['id_darah']) ? 'selected' : '';
                                        echo "<option value='$kar[id_darah]' $selected>$kar[darah]</option>";
                                    }
                                    ?>
                                </select> 
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 text-end">Riwayat Penyakit</label>
                            <div class="col-sm-9">
                                <textarea name="riwayat_penyakit" class="form-control" required rows="4"><?php echo $row['riwayat_penyakit']; ?></textarea> 
                            </div>
                        </div>
                    </div>



                    <br>



                    <div class="card-body border-dark border">
                        <div class="row mb-2">
                             <strong class="col-sm-2" style="font-size: 18px;"><u>Data Tempat Tinggal</u></strong>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-3 text-end">Alamat</label>
                            <div class="col-sm-9">
                                <textarea name="alamat" class="form-control" required rows="4"><?php echo $row['alamat']; ?></textarea> 
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 text-end">Nomor Telepon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="notelp" value="<?php echo $row['notelp']; ?>" required>
                            </div>
                        </div> 
                        <div class="row mb-2">
                            <label class="col-sm-3 text-end">Tinggal Bersama</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="tempat_tinggal" required>
                                    <option value="">Pilih</option>
                                    <option value="Orang Tua" <?php echo ($row['tempat_tinggal'] == 'Orang Tua') ? 'selected' : ''; ?>>Orang Tua</option>
                                    <option value="Saudara Kandung" <?php echo ($row['tempat_tinggal'] == 'Saudara Kandung') ? 'selected' : ''; ?>>Saudara Kandung</option>
                                    <option value="Saudara Tiri" <?php echo ($row['tempat_tinggal'] == 'Saudara Tiri') ? 'selected' : ''; ?>>Saudara Tiri</option>
                                    <option value="Keluarga" <?php echo ($row['tempat_tinggal'] == 'Keluarga') ? 'selected' : ''; ?>>Keluarga</option>
                                    <option value="Asrama" <?php echo ($row['tempat_tinggal'] == 'Asrama') ? 'selected' : ''; ?>>Asrama</option>
                                    <option value="Kost" <?php echo ($row['tempat_tinggal'] == 'Kost') ? 'selected' : ''; ?>>Kost</option>  
                                </select>
                            </div>
                        </div> 
                        <div class="row mb-2">
                            <label class="col-sm-3 text-end">Jarak Tempuh Ke MTS-MA</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="jarak" value="<?php echo $row['jarak']; ?>" required>
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
                                <input type="text" class="form-control" name="sekolah_asal" value="<?php echo $row['sekolah_asal']; ?>" required>
                            </div>
                        </div> 
                        <div class="row mb-2">
                            <label class="col-sm-3 text-end">Tanggal, Nomor Ijazah dan Lama Belajar</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="tgl_ijazah" value="<?php echo $row['tgl_ijazah']; ?>" required>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="no_ijazah" value="<?php echo $row['no_ijazah']; ?>" required>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="lama_belajar" value="<?php echo $row['lama_belajar']; ?>" required>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-9 ms-auto">
                                <button type="submit" name="ubah" class="btn btn-success btn-sm">Simpan</button>
                                <a href="?page=calon_santri" class="btn btn-danger btn-sm">Kembali</a> 
                            </div>
                        </div>
                    </div>
                    
                </form>
                
                <?php 
                    if (isset($_POST['ubah'])) { 

                        $jenjang = $_POST['jenjang'];
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
                        $alamat = $_POST['alamat'];
                        $notelp = $_POST['notelp'];
                        $tempat_tinggal = $_POST['tempat_tinggal'];
                        $jarak = $_POST['jarak'];
                        $sekolah_asal = $_POST['sekolah_asal'];
                        $tgl_ijazah = $_POST['tgl_ijazah'];
                        $no_ijazah = $_POST['no_ijazah'];
                        $lama_belajar = $_POST['lama_belajar'];
 
                         
                        $query = "UPDATE calon_santri SET 
                            jenjang='$jenjang', 
                            nama_lengkap='$nama_lengkap', 
                            nama_panggilan='$nama_panggilan', 
                            jk='$jk', 
                            tmp='$tmp', 
                            tgl='$tgl', 
                            anak_ke='$anak_ke', 
                            jumlah_saudara='$jumlah_saudara', 
                            tinggi='$tinggi', 
                            berat='$berat', 
                            id_darah='$id_darah', 
                            riwayat_penyakit='$riwayat_penyakit', 
                            alamat='$alamat', 
                            notelp='$notelp', 
                            tempat_tinggal='$tempat_tinggal', 
                            jarak='$jarak', 
                            sekolah_asal='$sekolah_asal', 
                            tgl_ijazah='$tgl_ijazah', 
                            no_ijazah='$no_ijazah', 
                            lama_belajar='$lama_belajar' 
                            WHERE nisn='$nisn'";
 
                        if ($con->query($query) === TRUE) {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Data berhasil diperbarui.',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '?page=calon_santri';
                                        }
                                    });
                                  </script>";
                        } else {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: 'Terjadi kesalahan saat memperbarui data: " . $con->error . "',
                                        confirmButtonText: 'OK'
                                    });
                                  </script>";
                        }
                    }
                    
                ?>

            </div>
        </div>
    </div>
</div>
