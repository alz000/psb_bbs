<?php 
    if(isset($_GET['id_pembayaran']) && isset($_GET['nisn']) && isset($_GET['notelp']) && isset($_GET['nama_admin'])) {
  
 
        $id_pembayaran = $_GET['id_pembayaran'];
        $nisn = $_GET['nisn'];
        $notelp = $_GET['notelp'];
        $nama_admin = $_GET['nama_admin'];
 
        $sql_ubah1 = "UPDATE pembayaran SET nama_admin='$nama_admin' WHERE id_pembayaran='$id_pembayaran'";
        $query_ubah1 = mysqli_query($con, $sql_ubah1);
 
        $sql_ubah2 = "UPDATE calon_santri SET status_santri='Sudah Melakukan Pembayaran, Silahkan Upload Berkas' WHERE nisn='$nisn'";
        $query_ubah2 = mysqli_query($con, $sql_ubah2);
 
        if ($query_ubah1 && $query_ubah2) {
            $token = "AuMZdsjBJY3iyPTGq3CA"; 
        $pesan = "Pembayaran anda sudah kami terima.:\n\n" .  
                 "Segera lengkapi persyaratan berkas berkas yang di butuhkan.";

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
                    text: 'Data berhasil diverifikasi.',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php?page=pembayaran';
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