 

<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Tambah Data</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Wali Santri</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Ibu</a></li>            
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Tambah Data Ibu 
                </h4> 

                <br> 

                <form method="post" enctype="multipart/form-data" action=""> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">NISN Santri</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" data-toggle="select2" name="nisn" required>
                                <option selected disabled>Pilih</option>
                                <?php
                                $sql = mysqli_query($con, "SELECT * FROM calon_santri "); 
                                while ($kar = mysqli_fetch_array($sql)) {
                                    $selected = ($row['nisn'] == $kar['nisn']) ? 'selected' : '';
                                    echo "<option value='$kar[nisn]' $selected>$kar[nisn] - $kar[nama]</option>";
                                }
                                ?>
                            </select> 
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nik_ibu" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_ibu" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="tmp_ibu" required>
                        </div>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="tgl_ibu" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="alamat_ibu" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Pendidikan</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" data-toggle="select2" name="id_pendidikan" required>
                                <option selected disabled>Pilih</option>
                                <?php
                                $sql = mysqli_query($con, "SELECT * FROM pendidikan "); 
                                while ($kar = mysqli_fetch_array($sql)) {
                                    $selected = ($row['id_pendidikan'] == $kar['id_pendidikan']) ? 'selected' : '';
                                    echo "<option value='$kar[id_pendidikan]' $selected>$kar[pendidikan]</option>";
                                }
                                ?>
                            </select> 
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" data-toggle="select2" name="id_pekerjaan" required>
                                <option selected disabled>Pilih</option>
                                <?php
                                $sql = mysqli_query($con, "SELECT * FROM pekerjaan "); 
                                while ($kar = mysqli_fetch_array($sql)) {
                                    $selected = ($row['id_pekerjaan'] == $kar['id_pekerjaan']) ? 'selected' : '';
                                    echo "<option value='$kar[id_pekerjaan]' $selected>$kar[pekerjaan]</option>";
                                }
                                ?>
                            </select> 
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Penghasilan /Bulan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="penghasilan_ibu" id="penghasilan_ibu" onkeypress="return angka(event);" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" name="tambah" class="btn btn-info btn-sm">Simpan</button>
                            <a href="?page=ibu" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>

                <?php 
                    if (isset($_POST['tambah'])) { 
                        $nisn = $_POST['nisn'];  
                        $nama_ibu = $_POST['nama_ibu'];
                        $nik_ibu = $_POST['nik_ibu'];
                        $tmp_ibu = $_POST['tmp_ibu'];
                        $tgl_ibu = $_POST['tgl_ibu'];
                        $alamat_ibu = $_POST['alamat_ibu'];
                        $id_pendidikan = $_POST['id_pendidikan'];
                        $id_pekerjaan = $_POST['id_pekerjaan'];
                        $penghasilan_ibu1 = $_POST['penghasilan_ibu'];
                        $penghasilan_ibu = str_replace(".", "", $penghasilan_ibu1);   

                        $cek_query = "SELECT COUNT(*) AS jumlah FROM ibu WHERE nik_ibu = '$nik_ibu'";
                        $cek_result = $con->query($cek_query);
                        $cek_data = $cek_result->fetch_assoc();

                        if ($cek_data['jumlah'] > 0) {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Peringatan!',
                                        text: 'NIK sudah terdaftar.',
                                        confirmButtonText: 'OK'
                                    });
                                  </script>";
                        } else { 

                            $query = "INSERT INTO ibu (nisn, nama_ibu, nik_ibu, tmp_ibu, tgl_ibu, alamat_ibu, id_pendidikan, id_pekerjaan, penghasilan_ibu) VALUES ('$nisn', '$nama_ibu', '$nik_ibu', '$tmp_ibu', '$tgl_ibu', '$alamat_ibu', '$id_pendidikan', '$id_pekerjaan', '$penghasilan_ibu')";

                            if ($con->query($query) === TRUE) {
                                echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: 'Data berhasil disimpan.',
                                            confirmButtonText: 'OK'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = '?page=ibu';
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
</script> 