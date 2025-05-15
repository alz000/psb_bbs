<?php
require 'inc/koneksi.php';

$query = "SELECT kode, nama FROM wilayah_2022 WHERE LENGTH(kode) = 2 ORDER BY nama";
$result = $con->query($query);

$options = "<option value=''>Pilih Provinsi</option>";

while ($row = $result->fetch_assoc()) {
    $options .= "<option value='{$row['kode']}'>{$row['nama']}</option>";
}

echo $options;
?>
