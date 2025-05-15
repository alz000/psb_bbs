<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Tes Masuk</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>                 
            <li class="breadcrumb-item active">Tes Masuk</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Data Tes Masuk 
                    <a href="?page=tes_masuk&aksi=tambah" class="btn btn-primary btn-sm float-end">Tambah</a>
                </h4> 

                <br>

                <table id="dtTabel" class="table table-striped table-sm w-100">
                    <thead class="table-light">
                        <tr>
                            <th width="10" class="text-center">#</th>
                            <th width="5" class="text-center">No.</th>
                            <th>NISN</th> 
                            <th>Nama</th> 
                            <th>Tanggal Tes</th> 
                            <th>Waktu Tes</th>
                            <th>Hasil</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $nomor = 1; 
                            $ambil = $con->query("SELECT * FROM calon_santri NATURAL JOIN tes_masuk ORDER BY id_tes_masuk ASC"); 
                            while ($row = $ambil->fetch_assoc()) { 
                                $hari = getHari($row['tgl_tes']); 
                                $tgl = tgl_indo($row['tgl_tes']); 
                                $nilai_kosong = (empty($row['btq']) || empty($row['pengetahuan_umum']) || empty($row['total_nilai']) || empty($row['keterangan']));
                        ?>
                            <tr>
                                <td class="text-center" style="vertical-align: top;">
                                    <div class="dropdown">
                                        <button class="btn btn-warning btn-sm dropdown-toggle text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti ti-settings"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="page/laporan/kartu_tes.php?id_tes_masuk=<?= $row['id_tes_masuk'] ?>" target="_blank"><i class="ti ti-edit"></i> Kartu Tes</a>
                                            <?php if ($nilai_kosong): ?> 
                                                <a class="dropdown-item"  href="?page=tes_masuk&aksi=penilaian&id_tes_masuk=<?= $row['id_tes_masuk'] ?>"><i class="ti ti-file"></i> Penilaian</a>
                                            <?php else: ?> 
                                                <a class="dropdown-item"  href="page/laporan/hasil_tes.php?id_tes_masuk=<?= $row['id_tes_masuk'] ?>" target="_blank"><i class="ti ti-printer"></i> Cetak Hasil Penilaian</a>
                                            <?php endif; ?>
                                        </div>
                                    </div> 
                                </td> 
                                <td class="text-center" style="vertical-align: top;"><?= $nomor; ?></td>
                                <td style="vertical-align: top;"><?= $row['nisn']; ?></td> 
                                <td style="vertical-align: top;"><?= $row['nama_lengkap']; ?></td> 
                                <td style="vertical-align: top;"><?= $hari; ?>, <?= $tgl; ?></td> 
                                <td style="vertical-align: top;"><?= $row['jam_tes']; ?></td> 
                                <td style="vertical-align: top;">
                                    <?php
                                    if (empty($row['btq']) && empty($row['pengetahuan_umum']) && empty($row['total_nilai']) && empty($row['grade']) && empty($row['keterangan'])) {
                                        echo '<span class="text-danger">Calon santri belum melakukan tes</span>';
                                    } else {
                                        echo "BTQ: <strong>{$row['btq']}</strong><br>";
                                        echo "Pengetahuan Umum: <strong>{$row['pengetahuan_umum']}</strong><br>";
                                        echo "Total Nilai: <strong>{$row['total_nilai']}</strong><br>";
                                        echo "Grade: <strong>{$row['grade']}</strong><br>";
                                        echo "Keterangan: <strong>{$row['keterangan']}</strong>";
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

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row--> 

<script>
    function confirmDelete(id_darah) {
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
                window.location.href = "?page=darah&aksi=hapus&id_darah=" + id_darah;
            }
        });
    }
</script> 