<?php
include 'admin/inc/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($con, $_POST['nama_user']);
    $pesan = mysqli_real_escape_string($con, $_POST['pesan']);
    mysqli_query($con, "INSERT INTO chat (nama_user, pesan) VALUES ('$nama', '$pesan')");
    exit;
}

$result = mysqli_query($con, "SELECT * FROM chat ORDER BY id_chat DESC LIMIT 50");
$chats = [];
while ($row = mysqli_fetch_assoc($result)) {
    $chats[] = $row;
}
echo json_encode(array_reverse($chats)); // Tampilkan dari yang paling awal