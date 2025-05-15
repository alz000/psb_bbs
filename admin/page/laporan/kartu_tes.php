<?php
$nama_dokumen = 'KARTU PSB';
define('_MPDF_PATH', 'mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf = new mPDF('utf-8', [200, 145], '', '', 10, 10, 10, 10, 5, 5);
ob_start();
include "../../inc/koneksi.php";
include "../../inc/tanggal.php"; 

$id_tes_masuk = $_GET['id_tes_masuk']; 
$sql = $con->query("SELECT * FROM tes_masuk NATURAL JOIN calon_santri WHERE id_tes_masuk='$id_tes_masuk'");
$row = mysqli_fetch_assoc($sql);
$hari = getHari($row['tgl_tes']);
$tgl = tgl_indo($row['tgl_tes']); 

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title><?php echo $meta['instansi'] ?></title>
    <link rel="icon" type="image/png" href="../../assets/images/<?= $meta['logo'] ?>">
    <link rel="icon" href="../../assets/images/<?= $meta['logo'] ?>"> 
    <style>
        .horizontal_center
        {
            border-top: 2px solid black;
            height: 5px; 
        }
        .border-left-right {
            border-left: 2px solid black;
            border-right: 2px solid black; 
        }
    </style>
</head>

<body> 
    <div class="border-left-right">
        <div class="horizontal_center"></div>

        <table align="center">
            <tr>
                <td align="center">
                    <img src="../../assets/gambar/<?= $meta['logo'] ?>" width="11%" height="11%">
                </td> 
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="center">
                    <p style="font-size: 20px; text-transform: uppercase; line-height: 100px;"><b><?php echo $meta['instansi'] ?></b></p> 
                    <p style="font-size: 11px;">
                        Alamat : <?php echo $meta['alamat'] ?> <br>
                        Email : <?php echo $meta['email'] ?> | Telp : <?php echo $meta['telp'] ?>
                    </p>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="center">
                    <img src="../../assets/gambar/mts.png" width="9%" height="9%">
                </td>
            </tr>
        </table>

        <div class="horizontal_center"></div>

        <p align="center"><b><u>KARTU CALON SANTRI BARU</u></b></p> 

        
        <table>  
            <tr>
                <td align="left" style="font-size: 12px;">Hari, Tanggal & Waktu Tes</td> 
                <td align="left" style="font-size: 12px;">:</td>
                <td align="left" style="font-size: 12px;"><?= $hari ?>, <?= $tgl ?> & <?= $row['jam_tes'] ?></td>
            </tr> 
            <tr>
                <td align="left" style="font-size: 12px;">NISN</td> 
                <td align="left" style="font-size: 12px;">:</td>
                <td align="left" style="font-size: 12px;"><?= $row['nisn'] ?></td>
            </tr> 
            <tr>
                <td align="left" style="font-size: 12px;">Nama</td> 
                <td align="left" style="font-size: 12px;">:</td>
                <td align="left" style="font-size: 12px;"><?= $row['nama_lengkap'] ?></td>
            </tr> 
            <tr>
                <td align="left" style="font-size: 12px;">Jenis Kelamin</td> 
                <td align="left" style="font-size: 12px;">:</td>
                <td align="left" style="font-size: 12px;"><?= $row['jk'] ?></td>
            </tr> 
            <tr>
                <td align="left" style="font-size: 12px;">Asal Sekolah</td> 
                <td align="left" style="font-size: 12px;">:</td>
                <td align="left" style="font-size: 12px;"><?= $row['sekolah_asal'] ?></td>
            </tr> 
            <tr>
                <td align="left" style="font-size: 12px;">Ruangan</td> 
                <td align="left" style="font-size: 12px;">:</td>
                <td align="left" style="font-size: 12px;"><?= $row['ruangan_tes'] ?></td>
            </tr> 
            <tr>
                <td align="left" style="font-size: 12px;">Penguji Tes</td> 
                <td align="left" style="font-size: 12px;">:</td>
                <td align="left" style="font-size: 12px;"><?= $row['penguji_satu'] ?></td>
            </tr> 
            <tr>
                <td align="left" style="font-size: 12px;">Penguji Kedua</td> 
                <td align="left" style="font-size: 12px;">:</td>
                <td align="left" style="font-size: 12px;"><?= $row['penguji_dua'] ?></td>
            </tr> 
            <tr>
                <td align="left" style="font-size: 12px; vertical-align: top;">Materi</td> 
                <td align="left" style="font-size: 12px; vertical-align: top;">:</td>
                <td align="left" style="font-size: 12px;">1. Akademik / Pengetahuan Umum <br>2. BTQ, dan <br>3. Interview Calon Santri</td>
            </tr>   
        </table> 
        <p align="justify" style="font-size: 12px;">
            <b>
                PERHATIAN ! <br>
                * Kartu peserta wajib dibawa ketika tes seleksi <br>* kepada calon santri baru untuk datang 15 menit sebelum waktu sudah ditentukan. <br>* Terima Kasih.
            </b>
        </p>

        <div class="horizontal_center"></div>

    </div>
</body>

<?php
$html = ob_get_contents();  
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen . ".pdf", 'I');
exit;
?>
