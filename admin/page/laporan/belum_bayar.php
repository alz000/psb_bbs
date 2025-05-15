<?php
$nama_dokumen = 'Laporan Calon Santri Baru Belum Melakukan Pembayaran';
define('_MPDF_PATH', 'mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf = new mPDF('utf-8', 'A4-L');
ob_start();
include "../../inc/koneksi.php";
include "../../inc/tanggal.php";
$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir =$_POST['tgl_akhir'];
$tgl1 = tgl_indo($tgl_awal);
$tgl2 = tgl_indo($tgl_akhir);
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
                <img src="../../assets/gambar/<?= $meta['logo'] ?>" width="8%" height="8%">
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
                <img src="../../assets/gambar/mts.png" width="7%" height="7%">
            </td>
        </tr>
    </table> 

    <p class="horizontal_center"></p> 

    <p align="center"><b>Laporan Calon Santri Baru Belum Melakukan Pembayaran</b></p>

    <table style="width: 100%; border-collapse: collapse; white-space: nowrap;">
        <tr>
            <td width="3%" style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; vertical-align: middle;" align="center">No.
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; vertical-align: middle;" width="15%">Jenjang</td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; vertical-align: middle;">NISN</td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; vertical-align: middle;" width="15%">Nama</td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; vertical-align: middle;">Jenis Kelamin</td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; vertical-align: middle;">Tempat, Tanggal Lahir</td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; vertical-align: middle;">Alamat</td> 
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; vertical-align: middle;">Asal Sekolah</td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; vertical-align: middle;">R.Penyakit</td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; font-weight: bold; vertical-align: middle;">No Telepon</td> 
        </tr> 
        <?php $nomor=1; ?>
        <?php $ambil=$con->query("SELECT * FROM calon_santri WHERE status_santri='Pending' ORDER BY nisn ASC"); ?>
        <?php while ($row = $ambil->fetch_assoc()) { 
            $hari = getHari($row['tgl']); 
            $tgl = tgl_indo($row['tgl']); 
        ?>
        <tr>      
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;" align="center"><?php echo $nomor; ?></td>  
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?= $row['jenjang']; ?></td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?= $row['nisn']; ?></td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?= $row['nama_lengkap']; ?> / <?= $row['nama_panggilan']; ?></td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?= $row['jk']; ?></td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?= $row['tmp']; ?>, <?= $tgl ?></td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?= $row['alamat']; ?></td> 
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?= $row['sekolah_asal']; ?></td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?= $row['riwayat_penyakit']; ?></td>
            <td style="font-size: 10px; border: 1px solid #999; padding: 2px; vertical-align: top;"><?= $row['notelp']; ?></td>    
        </tr> 
        <?php $nomor++; ?>
        <?php } ?> 
    </table> 

    <table align="right" style="margin-top: 20px;">
        <tr>
            <th style="font-size: 12px">Tanah Grogot, <?php echo tgl_indo(date('Y-m-d')); ?></th>
        </tr>
        <tr>
            <th style="font-size: 12px">Mengetahui <br>Pimpinan</th>
        </tr>
        <tr><th>&nbsp;</th></tr> 
        <tr><th>&nbsp;</th></tr> 
        <tr>
            <th align="center" style="font-size: 12px"><u><?php echo $meta['pimpinan'] ?></u></th>
        </tr>
    </table>
    <br />
</body>

<?php
$html = ob_get_contents();  
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen . ".pdf", 'I');
exit;
?>
