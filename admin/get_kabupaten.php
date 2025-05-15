<?php
require 'inc/koneksi.php';

$kode_provinsi = $_POST['kode_provinsi'];

$query = "SELECT kode, nama FROM wilayah_2022 WHERE kode LIKE '$kode_provinsi.__' AND LENGTH(kode) = 5";
$result = $con->query($query);

$options = "<option value=''>Pilih Kabupaten/Kota</option>";

while ($row = $result->fetch_assoc()) {
    $options .= "<option value='{$row['kode']}'>{$row['nama']}</option>";
}

echo $options;
?>
