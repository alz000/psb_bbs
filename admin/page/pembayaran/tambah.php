
<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Tambah Data</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>               
            <li class="breadcrumb-item"><a href="javascript: void(0);">Calon Santri</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Pembayaran</a></li>            
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Tambah Data Pembayaran
                </h4> 

                <br> 

                <form method="post" enctype="multipart/form-data" action="">
                     <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" data-toggle="select2" name="nisn" id="nisn" required onchange="tampilkanNotelp()">
                                <option selected disabled>Pilih</option>
                                <?php
                                $sql_kar = mysqli_query($con, "SELECT * FROM calon_santri WHERE status_santri='Pending'");
                                while ($kar = mysqli_fetch_array($sql_kar)) {
                                    echo "<option value='$kar[nisn]' data-notelp='$kar[notelp]' data-nisn='$kar[nisn]' data-nama_lengkap='$kar[nama_lengkap]'>$kar[nisn] - $kar[nama_lengkap]</option>";
                                }
                                ?> 
                            </select>
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
                        <label class="col-sm-2 col-form-label">Administrasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_admin" value="<?= $admin['nama']; ?>" readonly required> 
                        </div>
                    </div>  
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Password Santri</label>
                        <div class="col-sm-8 ms-auto">
                            <input type="text" class="form-control bg-light" id="password_santri" name="password_santri" readonly required>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-primary" onclick="generatePassword()">Generate Password</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" name="tambah" class="btn btn-info btn-sm">Simpan</button>
                            <a href="?page=pembayaran" class="btn btn-danger btn-sm">Kembali</a>
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
                        $nama_admin = $_POST['nama_admin'];   
                        $password_santri = $_POST['password_santri'];   
                         
                        $query = "INSERT INTO pembayaran (nisn, tgl_bayar, jumlah, nama_admin) 
                                  VALUES ('$nisn', '$tgl_bayar', '$jumlah', '$nama_admin')";
                        
                        if ($con->query($query) === TRUE) { 
                            $update_query = "UPDATE calon_santri SET status_santri = 'Sudah Melakukan Pembayaran, Silahkan Upload Berkas', password_santri = '$password_santri' WHERE nisn = '$nisn'";

                            if ($con->query($update_query) === TRUE) {
                                $token = "AuMZdsjBJY3iyPTGq3CA"; 
                                $pesan = "Terima kasih sudah melakukan pembayaran, pembayaran anda sudah kami terima dan kami konfirmasi:\n\n" .
                                         " - Nama : $nama_lengkap\n" . 
                                         " - NISN : $nisn\n" . 
                                         " - Password Login : $password_santri\n\n" .  
                                         "Silahkan login dan lengkapi persyaratan berkas berkas yang di butuhkan.";

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
                                                window.location.href = '?page=pembayaran';
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

 
    function tampilkanNotelp() {
        var selectElement = document.getElementById("nisn");
        var selectedOption = selectElement.options[selectElement.selectedIndex]; 
        var nama_lengkap = selectedOption.getAttribute("data-nama_lengkap");
        document.getElementById("nama_lengkap").value = nama_lengkap;
        var notelp = selectedOption.getAttribute("data-notelp");
        document.getElementById("notelp").value = notelp;
    } 
</script>  