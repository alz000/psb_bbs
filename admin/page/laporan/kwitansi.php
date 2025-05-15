<?php
$nama_dokumen = 'KWITANSI';
define('_MPDF_PATH', 'mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf = new mPDF('utf-8', [210, 130], '', '', 10, 10, 10, 10, 5, 5);
ob_start();
include "../../inc/koneksi.php";
include "../../inc/tanggal.php"; 

$id_pembayaran = $_GET['id_pembayaran']; 
$sql = $con->query("SELECT * FROM pembayaran NATURAL JOIN calon_santri WHERE id_pembayaran='$id_pembayaran'");
$row = mysqli_fetch_assoc($sql);
$tgl_bayar = tgl_indo($row['tgl_bayar']);
$sejumlah = terbilang($row['jumlah']);

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

        <p align="center"><b><u>KWITANSI</u></b></p> 

        
        <table> 
            <tr>
                <td align="left" style="font-size: 12px;">No</td> 
                <td align="left" style="font-size: 12px;">:</td>
                <td align="left" style="font-size: 12px;"><?= $row['id_pembayaran'] ?></td>
            </tr> 
            <tr>
                <td align="left" style="font-size: 12px;">Telah diterima dari</td> 
                <td align="left" style="font-size: 12px;">:</td>
                <td align="left" style="font-size: 12px;"><?= $row['nama_lengkap'] ?></td>
            </tr> 
            <tr>
                <td align="left" style="font-size: 12px;">Untuk Pembayaran</td> 
                <td align="left" style="font-size: 12px;">:</td>
                <td align="left" style="font-size: 12px;">Pendaftaran Calon Santri Baru</td>
            </tr>  
            <tr>
                <td align="left" style="font-size: 12px;">Uang sejumlah</td> 
                <td align="left" style="font-size: 12px;">:</td>
                <td align="left" style="font-size: 12px;"><b><i>Rp. <?= number_format($row['jumlah'], 0, ',', '.') ?>,-</i></b></td>
            </tr> 
            <tr>
                <td align="left" style="font-size: 12px;" colspan="3">&nbsp;</td>  
            </tr>  
            <tr>
                <td align="left" style="font-size: 12px;" colspan="3"><b><i>Sejumlah : <?= $sejumlah ?> Rupiah</i></b></td>  
            </tr> 
        </table>
        

        <table align="right" style="margin-top: 10px;">
            <tr><th style="font-size: 12px;">Tanah Grogot, <?php echo tgl_indo(date('Y-m-d')); ?> <br> Calon Santri Baru</th></tr> 
            <tr><th>&nbsp;</th></tr> 
            <tr><th>&nbsp;</th></tr> 
            <tr><th align="center" style="font-size: 12px;"><u><?= $row['nama_lengkap'] ?></u></th></tr>
            <tr><th>&nbsp;</th></tr> 
        </table> 

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
