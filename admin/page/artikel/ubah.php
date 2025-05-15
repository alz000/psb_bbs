<?php
$id_artikel = $_GET['id_artikel'];
$sql = $con->query("SELECT * FROM artikel WHERE id_artikel='$id_artikel'");
$row = mysqli_fetch_assoc($sql);
?> 

<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Ubah Data</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Artikel</a></li>            
            <li class="breadcrumb-item active">Ubah Data</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Ubah Data Artikel 
                </h4> 

                <br> 

                <form method="post" enctype="multipart/form-data" action="">
                    <input type="hidden" name="foto_lama" value="<?= $row['gambar']; ?>">
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="judul" value="<?= $row['judul']; ?>" required>
                            <input type="text" class="form-control" hidden name="view" value="<?= $row['view']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" data-toggle="select2" name="kategori" required>
                                <option selected disabled>Pilih</option>
                                <?php
                                $sql=mysqli_query($con, "SELECT * FROM kategori ORDER BY id_kategori ASC");
                                while ($kar=mysqli_fetch_array($sql))
                                {
                                    $selected = ($kar['kategori'] == $row['kategori']) ?
                                    'selected="selected"'  : "";
                                    echo "<option value='$kar[kategori]' $selected>$kar[kategori]</option>";
                                }
                                ?>
                            </select> 
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Isi Artikel</label>
                        <div class="col-sm-10">
                            <textarea name="isi" class="form-control ckeditor" required rows="5"><?= $row['isi']; ?></textarea>  
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Gambar Tentang Artikel</label>
                        <div class="col-sm-10">
                            <img src="assets/gambar/artikel/<?= $row['gambar']; ?>" width="100"> <br>
                            <input type="file" class="form-control" name="gambar">
                        </div>
                    </div>  
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status_artikel" class="form-control">
                                <option selected disabled>Pilih</option>
                                <option value="Aktif" <?= ($row['status_artikel'] == 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
                                <option value="Tidak Aktif" <?= ($row['status_artikel'] == 'Tidak Aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                            </select>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" name="ubah" class="btn btn-success btn-sm">Simpan</button>
                            <a href="?page=artikel" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>
                <?php 
                    if (isset($_POST['ubah'])) {
                        $judul = $_POST['judul'];
                        $kategori = $_POST['kategori'];
                        $isi = $_POST['isi'];
                        $tanggal = $_POST['tanggal'];
                        $posting = $_POST['posting'];
                        $view = $_POST['view'];
                        $status_artikel = $_POST['status_artikel'];
                        $gambar = $_FILES['gambar']['name'];
                     
                        if ($gambar != '') { 
                            $result = $con->query("SELECT gambar FROM artikel WHERE id_artikel='$id_artikel'");
                            $data = $result->fetch_assoc();
                            if ($data['gambar'] != '') {
                                unlink("assets/gambar/artikel/" . $data['gambar']);
                            }
                     
                            $foto_tmp = $_FILES['gambar']['tmp_name'];
                            $foto_dir = "assets/gambar/artikel/" . $gambar;
                            move_uploaded_file($foto_tmp, $foto_dir);
                        } else { 
                            $gambar = $_POST['foto_lama'];
                        }
                     
                        $query = "UPDATE artikel SET judul='$judul', kategori='$kategori', isi='$isi', gambar='$gambar', status_artikel='$status_artikel' WHERE id_artikel='$id_artikel'";
                        if ($con->query($query) === TRUE) {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Data berhasil diperbarui.',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '?page=artikel';
                                        }
                                    });
                                  </script>";
                        } else {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: 'Terjadi kesalahan saat memperbarui data.',
                                        confirmButtonText: 'OK'
                                    });
                                  </script>";
                        }
                    }
                ?>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->   