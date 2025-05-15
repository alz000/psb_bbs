<!-- Sweet-Alert  -->
<script src="assets/js/sweetalert2@11.js"> </script> 

<?php   
	$id_kategori = $_GET['id_kategori'];
    $query = "DELETE FROM kategori WHERE id_kategori='$id_kategori'";
    if ($con->query($query) === TRUE) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil dihapus.',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '?page=kategori_artikel';
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