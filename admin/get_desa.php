<?php
require 'inc/koneksi.php';

$kode_kecamatan = $_POST['kode_kecamatan'];

$query = "SELECT kode, nama FROM wilayah_2022 WHERE kode LIKE '$kode_kecamatan.____' AND LENGTH(kode) = 13";
$result = $con->query($query);

$options = "<option value=''>Pilih Kelurahan / Desa</option>";

while ($row = $result->fetch_assoc()) {
    $options .= "<option value='{$row['kode']}'>{$row['nama']}</option>";
}

echo $options;
?>
