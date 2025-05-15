<?php
include 'inc/koneksi.php';
$result = mysqli_query($con, "SELECT * FROM chat ORDER BY id_chat DESC");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p><strong>{$row['nama_user']}</strong>: {$row['pesan']} <em>({$row['waktu']})</em></p>";
}
?>
