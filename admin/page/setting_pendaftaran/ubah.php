<?php
$id = $_GET['id'];
$sql = $con->query("SELECT * FROM setting_pendaftaran WHERE id='$id'");
$row = mysqli_fetch_assoc($sql);
?> 

<!-- Judul Halaman -->
<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Ubah Data</h4>
    </div>
    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Setting Pendaftaran</a></li>            
            <li class="breadcrumb-item active">Ubah Data</li>
        </ol>
    </div>
</div> 

<!-- Form Edit -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Ubah Data Setting Pendaftaran</h4> 
                <br> 

                <form method="post" enctype="multipart/form-data" action=""> 
                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Gelombang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="gelombang" value="<?= $row['gelombang']; ?>" required>
                        </div>
                    </div> 

                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Tingkat</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="tingkat" required>
                                <option value="">-- Pilih Tingkat --</option>
                                <option value="Madrasah Tsanawiyah (MTS)" <?= $row['tingkat'] == 'Madrasah Tsanawiyah (MTS)' ? 'selected' : '' ?>>Madrasah Tsanawiyah (MTS)</option>
                                <option value="Madrasah Aliyah (MA)" <?= $row['tingkat'] == 'Madrasah Aliyah (MA)' ? 'selected' : '' ?>>Madrasah Aliyah (MA)</option>
                            </select>
                        </div>
                    </div> 

                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_mulai" value="<?= $row['tgl_mulai']; ?>" required>
                        </div>
                    </div> 

                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_selesai" value="<?= $row['tgl_selesai']; ?>" required>
                        </div>
                    </div> 

                    <div class="row mb-2">
                        <label class="col-sm-2 col-form-label">Kuota</label>
                        <div class="col-sm-10">
                            <input type="number" min="1" class="form-control" name="kuota" value="<?= $row['kuota']; ?>" required>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" name="ubah" class="btn btn-success btn-sm">Simpan</button>
                            <a href="?page=setting_pendaftaran" class="btn btn-danger btn-sm">Kembali</a> 
                        </div>
                    </div> 
                </form>

                <?php 
                if (isset($_POST['ubah'])) {
                    $gelombang = $_POST['gelombang']; 
                    $tingkat = $_POST['tingkat']; 
                    $tgl_mulai = $_POST['tgl_mulai']; 
                    $tgl_selesai = $_POST['tgl_selesai']; 
                    $kuota = $_POST['kuota']; 

                    $query = "UPDATE setting_pendaftaran 
                              SET gelombang='$gelombang', 
                                  tingkat='$tingkat', 
                                  tgl_mulai='$tgl_mulai', 
                                  tgl_selesai='$tgl_selesai', 
                                  kuota='$kuota' 
                              WHERE id='$id'";

                    if ($con->query($query) === TRUE) {
                        echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Data berhasil diperbarui.',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '?page=setting_pendaftaran';
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
            </div>
        </div>
    </div>
</div>
