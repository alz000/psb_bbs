<?php
$id_pendidik = $_GET['id_pendidik'];
$sql = $con->query("SELECT * FROM pendidik WHERE id_pendidik='$id_pendidik'");
$data = mysqli_fetch_assoc($sql);
 
$bidang_pendidik = [];
$result = $con->query("SELECT id_bidang FROM pendidik_detail WHERE id_pendidik='$id_pendidik'");
while ($row = mysqli_fetch_assoc($result)) {
    $bidang_pendidik[] = $row['id_bidang'];
}
?> 

<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Ubah Data</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>               
            <li class="breadcrumb-item"><a href="javascript: void(0);">Pendidik</a></li>            
            <li class="breadcrumb-item active">Ubah Data</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Ubah Data Pendidik 
                </h4> 

                <br> 

                <form method="post" enctype="multipart/form-data">
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nik_pendidik" value="<?= $data['nik_pendidik'] ?>" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_pendidik" value="<?= $data['nama_pendidik'] ?>" required>
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select name="jk_pendidik" class="form-control">
                                <option selected disabled>Pilih</option>
                                <option value="Laki-Laki" <?= ($data['jk_pendidik'] == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                                <option value="Perempuan" <?= ($data['jk_pendidik'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option> 
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="tmp_pendidik" value="<?= $data['tmp_pendidik'] ?>" required>
                        </div>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="tgl_pendidik" value="<?= $data['tgl_pendidik'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="alamat_pendidik" required><?= $data['alamat_pendidik'] ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="notelp_pendidik" value="<?= $data['notelp_pendidik'] ?>" required>
                        </div>
                    </div> 
                    <div class="row mb-2"> 
                        <label class="col-sm-2 col-form-label">Bidang Kompetensi</label>
                        <div class="col-sm-10">
                            <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" name="id_bidang[]" data-placeholder="Bidang yang diajarkan oleh pendidik, bisa lebih dari 1 ...">
                                <?php
                                $sql_kar = mysqli_query($con, "SELECT * FROM bidang ORDER BY bidang ASC");
                                while ($kar = mysqli_fetch_array($sql_kar)) {
                                    $selected = in_array($kar['id_bidang'], $bidang_pendidik) ? 'selected' : '';
                                    echo "<option value='$kar[id_bidang]' $selected>$kar[bidang]</option>";
                                }
                                ?>
                            </select> 
                        </div>
                    </div>
 

                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" name="ubah" class="btn btn-success btn-sm">Simpan</button>
                            <a href="?page=pendidik" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>
                <?php 
                    if (isset($_POST['ubah'])) {
                        $nik_pendidik = $_POST['nik_pendidik'];
                        $nama_pendidik = $_POST['nama_pendidik'];
                        $jk_pendidik = $_POST['jk_pendidik'];
                        $tmp_pendidik = $_POST['tmp_pendidik'];
                        $tgl_pendidik = $_POST['tgl_pendidik'];
                        $alamat_pendidik = $_POST['alamat_pendidik'];
                        $notelp_pendidik = $_POST['notelp_pendidik'];
                        $id_bidang = isset($_POST['id_bidang']) ? $_POST['id_bidang'] : [];
 
                        $query = "UPDATE pendidik SET 
                                    nik_pendidik='$nik_pendidik', 
                                    nama_pendidik='$nama_pendidik', 
                                    jk_pendidik='$jk_pendidik', 
                                    tmp_pendidik='$tmp_pendidik', 
                                    tgl_pendidik='$tgl_pendidik', 
                                    alamat_pendidik='$alamat_pendidik', 
                                    notelp_pendidik='$notelp_pendidik'
                                  WHERE id_pendidik='$id_pendidik'";

                        if ($con->query($query) === TRUE) { 
                            $con->query("DELETE FROM pendidik_detail WHERE id_pendidik='$id_pendidik'");
 
                            foreach ($id_bidang as $bidang) {
                                $con->query("INSERT INTO pendidik_detail (id_pendidik, id_bidang) VALUES ('$id_pendidik', '$bidang')");
                            }

                            echo "<script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Data berhasil diubah.',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = '?page=pendidik';
                                        }
                                    });
                                  </script>";
                        } else {
                            echo "<script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: 'Terjadi kesalahan saat mengubah data.',
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