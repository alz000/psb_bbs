<?php
include "inc/koneksi.php";  
 
    $token = "AuMZdsjBJY3iyPTGq3CA"; 
    $nisn = $_GET['nisn'];
    $nama = $_GET['nama']; 
    $notelp = $_GET['notelp'];  

    $pesan = "Pemberitahuan: Pendaftaran calon santri $nama berhasil. Silakan lakukan pembayaran Rp. 250.000,- ke rekening berikut:\n\n" .
             " - Nama Bank: MANDIRI\n". 
             " - No. Rekening: 1570000591553\n". 
             " - Atas Nama: YAYAH UMMU ADIYAH\n\n". 
             " - Kirim bukti pembayaran ke WhatsApp Bendahara Panitia: 089626067119\n dengan mencantumkan Nama Calon Santri dan Nomor WA yang digunakan.\n\n" . 
             " - Setelah terkonfirmasi, panitia akan mengirimkan NISN dan password untuk pengisian formulir.";

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


$con->close(); 
header('Location: index.php?page=calon_santri');   
?>
