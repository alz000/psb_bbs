<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Ayah</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Wali Santri</a></li>           
            <li class="breadcrumb-item active">Ayah</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Data Ayah  
                </h4> 

                <br>

                <table id="dtTabel" class="table table-striped table-sm w-100">
                    <thead class="table-light">
                        <tr>
                            <th width="10" class="text-center">#</th>
                            <th width="5" class="text-center">No.</th>
                            <th>Santri</th> 
                            <th>NIK</th> 
                            <th>Nama</th> 
                            <th>Tempat, Tanggal Lahir</th> 
                            <th>Umur</th> 
                            <th>Alamat</th> 
                            <th>Pendidikan</th> 
                            <th>Pekerjaan</th> 
                            <th>Penghasilan</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $nomor = 1; 
                        $nisn = $_SESSION['santri']['nisn']; 
                        $ambil = $con->query("SELECT 
                                                    ayah.nisn, 
                                                    ayah.id_ayah, 
                                                    ayah.nik_ayah, 
                                                    ayah.nama_ayah, 
                                                    ayah.tmp_ayah, 
                                                    ayah.tgl_ayah, 
                                                    ayah.alamat_ayah, 
                                                    ayah.penghasilan_ayah, 
                                                    ayah.id_pendidikan_ayah, 
                                                    ayah.id_pekerjaan_ayah, 
                                                    calon_santri.nisn, 
                                                    calon_santri.nama_lengkap AS nama_santri, 
                                                    pendidikan.pendidikan, 
                                                    pekerjaan.pekerjaan,
                                                    TIMESTAMPDIFF(YEAR, ayah.tgl_ayah, CURDATE()) AS umur
                                                FROM ayah 
                                                LEFT JOIN calon_santri ON ayah.nisn = calon_santri.nisn 
                                                LEFT JOIN pendidikan ON ayah.id_pendidikan_ayah = pendidikan.id_pendidikan
                                                LEFT JOIN pekerjaan ON ayah.id_pekerjaan_ayah = pekerjaan.id_pekerjaan WHERE calon_santri.nisn='$nisn'
                                                ORDER BY ayah.id_ayah ASC;"); 

                        while ($row = $ambil->fetch_assoc()) { 
                            $tgl = tgl_indo($row['tgl_ayah']); 
                            $lahir = new DateTime($row['tgl_ayah']);
                            $sekarang = new DateTime();
                            $umur = $lahir->diff($sekarang)->y;
                            ?>
                            <tr>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-warning btn-sm dropdown-toggle text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti ti-settings"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="?page=ayah&aksi=ubah&id_ayah=<?= $row['id_ayah'] ?>"><i class="ti ti-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="#" onclick="confirmDelete(<?= $row['id_ayah']; ?>)"><i class="ti ti-trash"></i> Hapus</a> 
                                        </div>
                                    </div> 
                                </td>
                                <td class="text-center"><?= $nomor; ?></td>
                                <td><?= $row['nisn'] . ' - ' . $row['nama_santri']; ?></td> 
                                <td><?= $row['nik_ayah']; ?></td> 
                                <td><?= $row['nama_ayah']; ?></td> 
                                <td><?= $row['tmp_ayah'] . ', ' . $tgl; ?></td> 
                                <td><?= $umur; ?> Tahun</td>
                                <td><?= $row['alamat_ayah']; ?></td> 
                                <td><?= $row['pendidikan']; ?></td> 
                                <td><?= $row['pekerjaan']; ?></td> 
                                <td>Rp. <?= number_format($row['penghasilan_ayah'], 0, ',', '.'); ?></td> 
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
    function confirmDelete(id_ayah) {
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
                window.location.href = "?page=ayah&aksi=hapus&id_ayah=" + id_ayah;
            }
        });
    }
</script> 