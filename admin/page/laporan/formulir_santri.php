<?php
$nama_dokumen = 'FORMULIR PENDAFTARAN SANTRI';
define('_MPDF_PATH', 'mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf = new mPDF('utf-8', 'A4');
ob_start();
include "../../inc/koneksi.php";
include "../../inc/tanggal.php"; 

$nisn = $_GET['nisn']; 
$sql = $con->query("SELECT * FROM calon_santri NATURAL JOIN darah WHERE nisn='$nisn'");
$row = mysqli_fetch_assoc($sql);
$tgl = tgl_indo($row['tgl']);
$tgl2 = tgl_indo($row['tgl_ijazah']);
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

    <p><b><u>FORMULIR PENDAFTARAN SANTRI</u> <br> <?= $row['jenjang'] ?></b></p>  
 
    <table>
        <tr>
            <th colspan="4" align="left" style="font-size: 12px;"><u>Data Diri</u></th>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">1.</th>
            <th align="left" style="font-size: 12px;">NISN</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['nisn'] ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">2.</th>
            <th align="left" style="font-size: 12px;">Nama Lengkap</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['nama_lengkap'] ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">3.</th>
            <th align="left" style="font-size: 12px;">Nama Panggilan</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['nama_panggilan'] ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">4.</th>
            <th align="left" style="font-size: 12px;">Jenis Kelamin</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['jk'] ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">5.</th>
            <th align="left" style="font-size: 12px;">Tempat, Tanggal Lahir</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['tmp'] ?>, <?= $tgl ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">6.</th>
            <th align="left" style="font-size: 12px;">Anak Ke</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['anak_ke'] ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">7.</th>
            <th align="left" style="font-size: 12px;">Jumlah Saudara</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['jumlah_saudara'] ?> Orang</td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">8.</th>
            <th align="left" style="font-size: 12px;">Tinggi dan Berat Badan</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['tinggi'] ?> cm dan <?= $row['tinggi'] ?> kg</td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">9.</th>
            <th align="left" style="font-size: 12px;">Golongan Darah</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['darah'] ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">10.</th>
            <th align="left" style="font-size: 12px;">Riwayat Penyakit</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['riwayat_penyakit'] ?></td>
        </tr>
        <tr>
            <th colspan="4" align="left" style="font-size: 12px;">&nbsp;</th> 
        </tr>
        <tr> 
            <th colspan="4" align="left" style="font-size: 12px;"><u>Data Tempat Tinggal</u></th> 
        </tr> 
        <tr>
            <th align="left" style="font-size: 12px;">11.</th>
            <th align="left" style="font-size: 12px;">Alamat</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['alamat'] ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">12.</th>
            <th align="left" style="font-size: 12px;">Nomor Telepon</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['notelp'] ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">13.</th>
            <th align="left" style="font-size: 12px;">Tinggal Bersama</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['tempat_tinggal'] ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">14.</th>
            <th align="left" style="font-size: 12px;">Jarak Tempuh Ke MTS-MA</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['jarak'] ?> Km</td>
        </tr>
        <tr>
            <th colspan="4" align="left" style="font-size: 12px;">&nbsp;</th> 
        </tr>
        <tr> 
            <th colspan="4" align="left" style="font-size: 12px;"><u>Data Pendidikan</u></th> 
        </tr> 
        <tr>
            <th align="left" style="font-size: 12px;">15.</th>
            <th align="left" style="font-size: 12px;">Lulusan Dari / Asal Sekolah</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['sekolah_asal'] ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">16.</th>
            <th align="left" style="font-size: 12px;">Tanggal Ijazah</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $tgl2 ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">17.</th>
            <th align="left" style="font-size: 12px;">Nomor Ijazah</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['no_ijazah'] ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">18.</th>
            <th align="left" style="font-size: 12px;">Lama Belajar</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row['lama_belajar'] ?> Tahun</td>
        </tr>
        <tr>
            <th colspan="4" align="left" style="font-size: 12px;">&nbsp;</th> 
        </tr>
        <tr> 
            <th colspan="4" align="left" style="font-size: 12px;"><u>Data Ayah</u></th> 
        </tr> 
        <?php 
        $sql = $con->query("SELECT * FROM ayah WHERE nisn='$nisn'");
        $row_ayah = mysqli_fetch_assoc($sql);
        $tgl3 = tgl_indo($row_ayah['tgl_ayah']);
        ?> 
        <tr>
            <th align="left" style="font-size: 12px;">19.</th>
            <th align="left" style="font-size: 12px;">Nama Lengkap</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row_ayah['nama_ayah'] ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">20.</th>
            <th align="left" style="font-size: 12px;">Tempat, Tanggal Lahir</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row_ayah['tmp_ayah'] ?>, <?= $tgl3 ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">21.</th>
            <th align="left" style="font-size: 12px;">Alamat</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row_ayah['alamat_ayah'] ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">22.</th>
            <th align="left" style="font-size: 12px;">Pendidikan</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;">
                <?php 
                $sql_ayah = mysqli_query($con, "SELECT * FROM pendidikan WHERE id_pendidikan = '$row_ayah[id_pendidikan_ayah]'");
                $data_ayah = mysqli_fetch_array($sql_ayah);
                echo $data_ayah['pendidikan']."";
                ?>
            </td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">23.</th>
            <th align="left" style="font-size: 12px;">Pekerjaan</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;">
                <?php 
                $sql_ayah = mysqli_query($con, "SELECT * FROM pekerjaan WHERE id_pekerjaan = '$row_ayah[id_pekerjaan_ayah]'");
                $data_ayah = mysqli_fetch_array($sql_ayah);
                echo $data_ayah['pekerjaan']."";
                ?>
            </td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">24.</th>
            <th align="left" style="font-size: 12px;">Penghasilan /Bulan</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= number_format($row_ayah['penghasilan_ayah'], 0, ',','.') ?> /Bulan</td>
        </tr>
        <tr>
            <th colspan="4" align="left" style="font-size: 12px;">&nbsp;</th> 
        </tr>
        <tr> 
            <th colspan="4" align="left" style="font-size: 12px;"><u>Data Ayah</u></th> 
        </tr> 
        <?php 
        $sql = $con->query("SELECT * FROM ibu WHERE nisn='$nisn'");
        $row_ibu = mysqli_fetch_assoc($sql);
        $tgl4 = tgl_indo($row_ibu['tgl_ibu']);
        ?> 
        <tr>
            <th align="left" style="font-size: 12px;">25.</th>
            <th align="left" style="font-size: 12px;">Nama Lengkap</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row_ibu['nama_ibu'] ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">26.</th>
            <th align="left" style="font-size: 12px;">Tempat, Tanggal Lahir</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row_ibu['tmp_ibu'] ?>, <?= $tgl4 ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">27.</th>
            <th align="left" style="font-size: 12px;">Alamat</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= $row_ibu['alamat_ibu'] ?></td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">28.</th>
            <th align="left" style="font-size: 12px;">Pendidikan</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;">
                <?php 
                $sql_ibu = mysqli_query($con, "SELECT * FROM pendidikan WHERE id_pendidikan = '$row_ibu[id_pendidikan_ibu]'");
                $data_ibu = mysqli_fetch_array($sql_ibu);
                echo $data_ibu['pendidikan']."";
                ?>
            </td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">29.</th>
            <th align="left" style="font-size: 12px;">Pekerjaan</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;">
                <?php 
                $sql_ibu = mysqli_query($con, "SELECT * FROM pekerjaan WHERE id_pekerjaan = '$row_ibu[id_pekerjaan_ibu]'");
                $data_ibu = mysqli_fetch_array($sql_ibu);
                echo $data_ibu['pekerjaan']."";
                ?>
            </td>
        </tr>
        <tr>
            <th align="left" style="font-size: 12px;">30.</th>
            <th align="left" style="font-size: 12px;">Penghasilan /Bulan</th>
            <td align="left" style="font-size: 12px;">:</td>
            <td align="left" style="font-size: 12px;"><?= number_format($row_ibu['penghasilan_ibu'], 0, ',','.') ?> /Bulan</td>
        </tr>
    </table> 

    <p style="font-size: 12px;">Demikian data pribadi ini saya isi dengan sebenar benar nya,</p> 

    <table align="center" style="font-size: 12px;">
        <tr><th>&nbsp;</th><th>Tanah Grogot, <?php echo tgl_indo(date('Y-m-d')); ?></th></tr>
        <tr><th>Ikut Memohon <br>Orang Tua / Wali</th><th>&nbsp; <br> Calon Santri</th></tr>  
        <tr><th>&nbsp;</th></tr> 
        <tr><th>&nbsp;</th></tr> 
        <tr><th>&nbsp;</th></tr> 
        <tr><th><u>(................)</u></th><th align="center"><u><?= $row['nama_lengkap'] ?></u></th></tr>
    </table> 
</body>

<?php
$html = ob_get_contents();  
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen . ".pdf", 'I');
exit;
?>
