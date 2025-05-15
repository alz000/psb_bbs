<?php
if (isset($_POST['password_santri']) && isset($_POST['nisn']) && isset($_POST['nama_lengkap']) && isset($_POST['notelp'])) {
    $notelp = $_POST['notelp'];
    $nisn = $_POST['nisn'];
    $nama_lengkap = $_POST['nama_lengkap']; 
    $password_santri = $_POST['password_santri'];
    
    $update_query = "UPDATE calon_santri SET password_santri = '$password_santri' WHERE nisn = '$nisn'";

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
    }
}
?>