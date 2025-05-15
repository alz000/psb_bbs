<?php
if (isset($_POST['status_santri']) && isset($_POST['nisn']) && isset($_POST['nama_lengkap']) && isset($_POST['notelp'])) {
    $notelp = $_POST['notelp'];
    $nisn = $_POST['nisn'];
    $nama_lengkap = $_POST['nama_lengkap']; 
    $status_santri = $_POST['status_santri'];
    
    $update_query = "UPDATE calon_santri SET status_santri = '$status_santri' WHERE nisn = '$nisn'";

    if ($con->query($update_query) === TRUE) {
        $token = "AuMZdsjBJY3iyPTGq3CA"; 
        $pesan = "Berikut hasil verifikasi berkas anda yang sudah kami lakukan verifikasi ;\n\n" .
                 "Hasil : $status_santri\n";

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
}
?>