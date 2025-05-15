<?php
if (isset($_GET['status_santri']) && isset($_GET['nisn']) && isset($_GET['nama_lengkap']) && isset($_GET['notelp'])) {
    $notelp = $_GET['notelp'];
    $nisn = $_GET['nisn'];
    $nama_lengkap = $_GET['nama_lengkap']; 
    $status_santri = $_GET['status_santri']; 
    
    $update_query = "UPDATE calon_santri SET status_santri = 'Sudah Melakukan Pembayaran, Silahkan Upload Berkas' WHERE nisn = '$nisn'";

    if ($con->query($update_query) === TRUE) {
        $token = "AuMZdsjBJY3iyPTGq3CA"; 
        $pesan = "$nama_lengkap Anda sudah melakukan pembayaran, segara untuk melakukan upload berkas anda untuk melanjutkan langkah selanjutnya.";

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
                        window.location.href = 'index.php';
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