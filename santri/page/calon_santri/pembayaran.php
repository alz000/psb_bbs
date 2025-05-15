<?php
$nisn = $_GET['nisn'];
$sql = $con->query("SELECT * FROM calon_santri WHERE nisn='$nisn'");
$row = mysqli_fetch_assoc($sql);
?> 

<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Pembayaran</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>                
            <li class="breadcrumb-item"><a href="javascript: void(0);">Calon Santri</a></li>            
            <li class="breadcrumb-item active">Pembayaran</li>
        </ol>
    </div>
</div> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Pembayaran Calon Santri</h4> 
                <br> 

                <form method="post" enctype="multipart/form-data" action=""> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nisn" value="<?= $row['nisn']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_lengkap" value="<?= $row['nama_lengkap']; ?>" required>
                            <input type="text" hidden class="form-control" name="notelp" value="<?= $row['notelp']; ?>" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_bayar" value="<?= date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Jumlah Pembayaran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="jumlah" id="jumlah" value="250000" onkeypress="return angka(event);" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Bukti Pembayaran</label>
                        <div class="col-sm-10"> 
                            <input type="file" class="form-control" name="bukti" required>
                        </div>
                    </div> 
 
                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" name="tambah" class="btn btn-success btn-sm">Simpan</button>
                            <a href="?page=calon_santri" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div>
                </form>
                
                <?php 
                    if (isset($_POST['tambah'])) { 
                        $nisn = $_POST['nisn'];  
                        $nama_lengkap = $_POST['nama_lengkap'];  
                        $notelp = $_POST['notelp'];  
                        $tgl_bayar = $_POST['tgl_bayar'];
                        $jumlah1 = $_POST['jumlah'];
                        $jumlah = str_replace(".", "", $jumlah1);   
                        $bukti = $_FILES['bukti']['name'];  

                        if ($bukti != '') {
                            $foto_tmp = $_FILES['bukti']['tmp_name'];
                            $foto_dir = "../admin/assets/gambar/santri/" . $bukti;
                            move_uploaded_file($foto_tmp, $foto_dir);
                        }  
                         
                        $query = "INSERT INTO pembayaran (nisn, tgl_bayar, jumlah, bukti) 
                                  VALUES ('$nisn', '$tgl_bayar', '$jumlah', '$bukti')";
                        
                        if ($con->query($query) === TRUE) { 
                            $update_query = "UPDATE calon_santri SET status_santri = 'Sudah Melakukan Pembayaran' WHERE nisn = '$nisn'";

                            if ($con->query($update_query) === TRUE) {
                                $token = "AuMZdsjBJY3iyPTGq3CA"; 
                                $pesan = "Terima kasih sudah melakukan pembayaran, pembayaran anda akan kami lakukan verifikasi terlebih dahulu dan akan kami beritahukan secepatnya.";

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

                                // Display success message
                                echo "<script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: 'Data berhasil disimpan.',
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
                                            text: 'Terjadi kesalahan saat menyimpan data.',
                                            confirmButtonText: 'OK'
                                        });
                                      </script>";
                            }}
                        }
                    ?>

            </div>
        </div>
    </div>
</div>


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

    var jumlah = document.getElementById('jumlah');
    jumlah.addEventListener('keyup', function(e)
    {
        jumlah.value = formatRupiah(this.value);
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