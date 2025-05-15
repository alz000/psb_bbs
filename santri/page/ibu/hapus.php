<!-- Sweet-Alert  -->
<script src="assets/js/sweetalert2@11.js"> </script> 

<?php   
	$id_ibu = $_GET['id_ibu'];
    $query = "DELETE FROM ibu WHERE id_ibu='$id_ibu'";
    if ($con->query($query) === TRUE) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil dihapus.',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '?page=ibu';
                    }
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan saat menghapus data.',
                    confirmButtonText: 'OK'
                });
              </script>";
    }
 
?>