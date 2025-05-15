<?php
$nama_dokumen = 'SURAT PERMOHONAN MENJADI SANTRI';
define('_MPDF_PATH', 'mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf = new mPDF('utf-8', 'A4');
ob_start();
include "../../inc/koneksi.php";
include "../../inc/tanggal.php"; 

$nisn = $_GET['nisn']; 
$sql = $con->query("SELECT * FROM calon_santri WHERE nisn='$nisn'");
$row = mysqli_fetch_assoc($sql);
$tgl = tgl_indo($row['tgl']);
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
    </style>
</head>

<body>  
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

    <p align="center"><b><u>SURAT PERMOHONAN MENJADI SANTRI</u></b></p>  

    <p style="font-size: 12px;">
        Kepada Yth. <br>
        <b><i>Bapak Pimpinan <br>
        MTS-MA Babussalam Tanah Grogot</i></b> <br>
        di-<b><u>TEMPAT</u></di-b>
    </p>

    <p align="center">
        <img src="../../assets/gambar/salam.png">
    </p>

    <p style="font-size: 12px;">
        Dengan hormat, yang bertanda tangan di bawah ini, saya: 
        <br>
        <table align="left">
            <tr>
                <th align="left" style="font-size: 12px;">Nama Lengkap</th>
                <td style="font-size: 12px;">:</td>
                <td style="font-size: 12px;"><?= $row['nama_lengkap'] ?></td>
            </tr>
            <tr>
                <th align="left" style="font-size: 12px;">Tempat / Tanggal Lahir</th>
                <td style="font-size: 12px;">:</td>
                <td style="font-size: 12px;"><?= $row['tmp'] ?> / <?= $tgl ?></td>
            </tr>
            <tr>
                <th align="left" style="font-size: 12px;">Alamat</th>
                <td style="font-size: 12px;">:</td>
                <td style="font-size: 12px;"><?= $row['alamat'] ?></td>
            </tr>
        </table>
    </p>

    <p align="justify" style="font-size: 12px;">
        dengan segala kerendahan hati dan penuh harapan memohon kepada Bapak untuk diterima menjadi santri <?= $meta['instansi'] ?> Tanah Grogot Tahun Pelajaran Sekarang. <br><br>
        Dan sesuai dengan ketentuan-ketentuan yang berlaku, maka dengan sepenuh hati saya berjanji untuk:  
        <br>
        <table align="left">
            <tr>
                <th align="left" style="vertical-align: top; font-size: 12px;">a.</th>
                <th align="left" style="vertical-align: top; font-size: 12px;">:</td>
                <th align="left" style="font-size: 12px;">Mematuhi ketentuan pembayaran yang telah ditetapkan oleh <?= $meta['instansi'] ?> Tanah Grogot, baik pada waktu pendaftaran ataupun setiap bulannya. </th>
            </tr>
            <tr>
                <th align="left" style="vertical-align: top; font-size: 12px;">b.</th>
                <th align="left" style="vertical-align: top; font-size: 12px;">:</td>
                <th align="left" style="font-size: 12px;">Memenuhi dan menjalankan pernyataan perjanjian santri yang terlampir</th>
            </tr> 
        </table>
        <br>
        Demikian surat permohonan ini saya sampaikan, kiranya dapat diterima. Aamiin. 
    </p>

    <p align="center">
        <img src="../../assets/gambar/salam_tutup.png">
    </p>

    <table align="center" style="margin-top: 20px;">
        <tr><th>&nbsp;</th><th>&nbsp;</th><th  style="font-size: 12px;">Tanah Grogot, <?php echo tgl_indo(date('Y-m-d')); ?></th></tr>
        <tr><th  style="font-size: 12px;">Ikut Memohon <br>Orang Tua / Wali</th><th>&nbsp;</th><th  style="font-size: 12px;">&nbsp; <br> Calon Santri</th></tr>  
        <tr><th>&nbsp;</th></tr>
        <tr><th>&nbsp;</th></tr>
        <tr><th>&nbsp;</th></tr>
        <tr><th  style="font-size: 12px;"><u>(................)</u></th><th>&nbsp;</th><th align="center"  style="font-size: 12px;"><u><?= $row['nama_lengkap'] ?></u></th></tr>
    </table> 
</body>

<?php
$html = ob_get_contents();  
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen . ".pdf", 'I');
exit;
?>
