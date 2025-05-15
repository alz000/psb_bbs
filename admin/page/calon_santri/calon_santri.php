<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-tabs d-flex align-items-center">
                <div class="flex-grow-1">
                    <thead>

                    <h4 class="header-title">Data Calon Santri</h4>
                </div>
                <ul class="nav nav-tabs nav-justified card-header-tabs nav-bordered">
                    <li class="nav-item">
                        <a href="#profile-ct" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                            <i class="ti ti-user-circle d-md-none d-block"></i>
                            <span class="d-none d-md-block">MTS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#home-ct" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            <i class="ti ti-home d-md-none d-block"></i>
                            <span class="d-none d-md-block">MA</span>
                        </a>
                    </li> 
                    <a href="?page=calon_santri&aksi=tambah" class="btn btn-primary btn-sm float-end">Tambah</a>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active table-responsive" id="profile-ct">
                        <table id="dtTabel" class="table table-striped table-sm w-100 nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th width="5" class="text-center">No.</th>
                                    <th>Jenjang</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Alamat</th> 
                                    <th>Asal Sekolah</th>
                                    <th>Anak Ke</th>
                                    <th>No Telepon</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $nomor = 1; 
                                $ambil = $con->query("SELECT * FROM calon_santri WHERE jenjang='Madrasah Tsanawiyah (MTS)' ORDER BY nisn ASC"); 
                                while ($row = $ambil->fetch_assoc()) { 
                                    $tgl = tgl_indo($row['tgl']); ?>
                                    <tr>
                                        <td class="text-center" style="vertical-align: top;">
                                            <div class="dropdown">
                                                <button class="btn btn-warning btn-sm dropdown-toggle text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti ti-settings"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="page/laporan/permohonan_menjadi_santri.php?nisn=<?= $row['nisn'] ?>" target="_blank"><i class="ti ti-mail"></i> Surat Permohonan Menjadi Santri</a>
                                                    <a class="dropdown-item" href="page/laporan/formulir_santri.php?nisn=<?= $row['nisn'] ?>" target="_blank"><i class="ti ti-mail"></i> Formulir Pendaftaran Santri</a>
                                                    <a class="dropdown-item" href="?page=calon_santri&aksi=ubah&nisn=<?= $row['nisn'] ?>"><i class="ti ti-edit"></i> Ubah</a>
                                                    <a class="dropdown-item" href="#" onclick="confirmDelete('<?= $row['nisn']; ?>')"><i class="ti ti-trash"></i> Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center" style="vertical-align: top;"><?= $nomor; ?></td>
                                        <td style="vertical-align: top;"><?= $row['jenjang']; ?></td>
                                        <td style="vertical-align: top;"><?= $row['nisn']; ?></td>
                                        <td style="vertical-align: top;"><?= $row['nama_lengkap']; ?> / <?= $row['nama_panggilan']; ?></td>
                                        <td style="vertical-align: top;"><?= $row['jk']; ?></td>
                                        <td style="vertical-align: top;"><?= $row['tmp']; ?>, <?= $tgl ?></td>
                                        <td style="vertical-align: top;"><?= $row['alamat']; ?></td> 
                                        <td style="vertical-align: top;"><?= $row['sekolah_asal']; ?></td>
                                        <td style="vertical-align: top;"><?= $row['anak_ke']; ?></td>
                                        <td style="vertical-align: top;"><?= $row['notelp']; ?></td>
                                        <td style="vertical-align: top;">
                                            <?php
                                            if ($row['status_santri'] == 'Pending') {
                                                echo "Belum melakukan pembayaran. <br> <a href='?page=calon_santri&aksi=pembayaran&nisn=$row[nisn]' class='text-primary'>Klik untuk pembayaran</a>";
                                            } else {
                                                echo $row['status_santri'];
         
                                                if ($row['status_santri'] == 'Sudah Melakukan Pembayaran, Silahkan Upload Berkas' && is_null($row['password_santri'])) {
                                                    echo "<br><br>";
                                                    echo "<form action='?page=calon_santri&aksi=update_password' method='POST'>
                                                            <label for='password'>Masukkan Password:</label>
                                                            <input type='text' name='password_santri' id='password_santri' class='form-control' required>
                                                            <input type='hidden' name='nisn' value='{$row['nisn']}'>
                                                            <input type='hidden' name='nama_lengkap' value='{$row['nama_lengkap']}'>
                                                            <input type='hidden' name='notelp' value='{$row['notelp']}'>
                                                            <button type='submit' class='btn btn-primary mt-2'>Simpan Password</button>
                                                          </form>";
                                                }
                                            }
                                            ?>
                                        </td>

                                    </tr>
                                <?php 
                                $nomor++; 
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane table-responsive" id="home-ct">
                        <table id="dtTabel1" class="table table-striped table-sm w-100 nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th width="10" class="text-center">#</th>
                                    <th width="5" class="text-center">No.</th>
                                    <th>Jenjang</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Alamat</th> 
                                    <th>Asal Sekolah</th>
                                    <th>Anak Ke</th>
                                    <th>No Telepon</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $nomor = 1; 
                                $ambil = $con->query("SELECT * FROM calon_santri WHERE jenjang='Madrasah Aliyah (MA)' ORDER BY nisn ASC"); 
                                while ($row = $ambil->fetch_assoc()) { 
                                    $tgl = tgl_indo($row['tgl']); ?>
                                    <tr>
                                        <td class="text-center" style="vertical-align: top;">
                                            <div class="dropdown">
                                                <button class="btn btn-warning btn-sm dropdown-toggle text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti ti-settings"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="page/laporan/permohonan_menjadi_santri.php?nisn=<?= $row['nisn'] ?>" target="_blank"><i class="ti ti-mail"></i> Surat Permohonan Menjadi Santri</a>
                                                    <a class="dropdown-item" href="page/laporan/formulir_santri.php?nisn=<?= $row['nisn'] ?>" target="_blank"><i class="ti ti-mail"></i> Formulir Pendaftaran Santri</a>
                                                    <a class="dropdown-item" href="?page=calon_santri&aksi=ubah&nisn=<?= $row['nisn'] ?>"><i class="ti ti-edit"></i> Ubah</a>
                                                    <a class="dropdown-item" href="#" onclick="confirmDelete('<?= $row['nisn']; ?>')"><i class="ti ti-trash"></i> Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center" style="vertical-align: top;"><?= $nomor; ?></td>
                                        <td style="vertical-align: top;"><?= $row['jenjang']; ?></td>
                                        <td style="vertical-align: top;"><?= $row['nisn']; ?></td>
                                        <td style="vertical-align: top;"><?= $row['nama_lengkap']; ?> / <?= $row['nama_panggilan']; ?></td>
                                        <td style="vertical-align: top;"><?= $row['jk']; ?></td>
                                        <td style="vertical-align: top;"><?= $row['tmp']; ?>, <?= $tgl ?></td>
                                        <td style="vertical-align: top;"><?= $row['alamat']; ?></td> 
                                        <td style="vertical-align: top;"><?= $row['sekolah_asal']; ?></td>
                                        <td style="vertical-align: top;"><?= $row['anak_ke']; ?></td>
                                        <td style="vertical-align: top;"><?= $row['notelp']; ?></td>
                                        <td style="vertical-align: top;">
                                            <?php
                                            if ($row['status_santri'] == 'Pending') {
                                                echo "Belum melakukan pembayaran. <br> <a href='?page=calon_santri&aksi=pembayaran&nisn=$row[nisn]' class='text-primary'>Klik untuk pembayaran</a>";
                                            } else {
                                                echo $row['status_santri'];
         
                                                if ($row['status_santri'] == 'Sudah Melakukan Pembayaran, Silahkan Upload Berkas' && is_null($row['password_santri'])) {
                                                    echo "<br><br>";
                                                    echo "<form action='?page=calon_santri&aksi=update_password' method='POST'>
                                                            <label for='password'>Masukkan Password:</label>
                                                            <input type='text' name='password_santri' id='password_santri' class='form-control' required>
                                                            <input type='hidden' name='nisn' value='{$row['nisn']}'>
                                                            <input type='hidden' name='nama_lengkap' value='{$row['nama_lengkap']}'>
                                                            <input type='hidden' name='notelp' value='{$row['notelp']}'>
                                                            <button type='submit' class='btn btn-primary mt-2'>Simpan Password</button>
                                                          </form>";
                                                }
                                            }
                                            ?>
                                        </td>

                                    </tr>
                                <?php 
                                $nomor++; 
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card--> 
    </div><!-- end col-->
</div> <!-- end row--> 

<script>
    function confirmDelete(nisn) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak bisa mengembalikan data yang telah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "?page=calon_santri&aksi=hapus&nisn=" + nisn;
            }
        });
    }
</script> 