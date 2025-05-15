<?php
require 'inc/koneksi.php';

$kode_kabupaten = $_POST['kode_kabupaten'];

$query = "SELECT kode, nama FROM wilayah_2022 WHERE kode LIKE '$kode_kabupaten.__' AND LENGTH(kode) = 8";
$result = $con->query($query);

$options = "<option value=''>Pilih Kecamatan</option>";

while ($row = $result->fetch_assoc()) {
    $options .= "<option value='{$row['kode']}'>{$row['nama']}</option>";
}

echo $options;
?>
