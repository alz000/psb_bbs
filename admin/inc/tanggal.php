<?php
setlocale(LC_TIME, 'id_ID', 'id_ID.utf8');

// Fungsi untuk mendapatkan tanggal dalam format Indonesia
function tgl_indo($tgl){
    $tanggal = substr($tgl,8,2);
    $bulan   = getBulan(substr($tgl,5,2));
    $tahun   = substr($tgl,0,4);
    return $tanggal.' '.$bulan.' '.$tahun;
}

// Fungsi untuk mendapatkan nama bulan dalam bahasa Indonesia
function getBulan($bln){
    switch ($bln){
        case 1: return "Januari"; break;
        case 2: return "Februari"; break;
        case 3: return "Maret"; break;
        case 4: return "April"; break;
        case 5: return "Mei"; break;
        case 6: return "Juni"; break;
        case 7: return "Juli"; break;
        case 8: return "Agustus"; break;
        case 9: return "September"; break;
        case 10: return "Oktober"; break;
        case 11: return "November"; break;
        case 12: return "Desember"; break;
    }
}

// Fungsi untuk mendapatkan nama hari dalam bahasa Indonesia
function getHari($tgl){
    $hari = date('l', strtotime($tgl)); // Mendapatkan nama hari dalam bahasa Inggris
    switch ($hari){
        case 'Monday': return 'Senin'; break;
        case 'Tuesday': return 'Selasa'; break;
        case 'Wednesday': return 'Rabu'; break;
        case 'Thursday': return 'Kamis'; break;
        case 'Friday': return 'Jumat'; break;
        case 'Saturday': return 'Sabtu'; break;
        case 'Sunday': return 'Minggu'; break;
    }
}

// Contoh penggunaan
$tanggal = "2024-11-18"; // Tanggal yang ingin diubah
$hari = getHari($tanggal); // Mendapatkan nama hari
$tanggal_indo = tgl_indo($tanggal); // Mendapatkan format tanggal Indonesia

// echo "Tanggal: $tanggal_indo, Hari: $hari"; // Output: 18 November 2024, Senin

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " Belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " Seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " Seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }           
    return $hasil;
}
?>
