<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0"> Upload Berkas</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>              
            <li class="breadcrumb-item"><a href="javascript: void(0);">Calon Santri</a></li>              
            <li class="breadcrumb-item active"> Upload Berkas</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Data Upload Berkas 
                    <a href="?page=formulir&aksi=tambah" class="btn btn-primary btn-sm float-end">Tambah</a>
                </h4> 

                <br>

                <table id="dtTabel" class="table table-striped table-sm w-100 nowrap">
                    <thead class="table-light">
                        <tr> 
                            <th width="5" class="text-center">No.</th>
                            <th>Hari</th>
                            <th>Tanggal</th>
                            <th>NISN</th>
                            <th>Nama</th> 
                            <th>Status</th>
                            <th>Berkas</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $nisn = $_SESSION['santri']['nisn']; 
                        $nomor = 1; 
                        $ambil = $con->query("SELECT * FROM berkas NATURAL JOIN pembayaran WHERE nisn='$nisn' ORDER BY tgl_berkas DESC");

                        while ($row = $ambil->fetch_assoc()) { 
                            $hari = getHari($row['tgl_berkas']); 
                            $tgl = tgl_indo($row['tgl_berkas']); 
                        ?>
                            <tr> 
                                <td class="text-center"><?= $nomor; ?></td>
                                <td><?= $hari; ?></td>
                                <td><?= $tgl; ?></td>
                                <td>
                                    <?php  
                                    $sql_barang = mysqli_query($con, "SELECT * FROM calon_santri WHERE nisn = '$row[nisn]'");
                                    $data_barang = mysqli_fetch_array($sql_barang);
                                    echo $data_barang['nisn'].""; 
                                    ?>
                                </td>
                                <td>
                                    <?php  
                                    $sql_barang = mysqli_query($con, "SELECT * FROM calon_santri WHERE nisn = '$row[nisn]'");
                                    $data_barang = mysqli_fetch_array($sql_barang);
                                    echo $data_barang['nama_lengkap'].""; 
                                    ?>
                                </td>
                                <td>
                                    <?php  
                                    $sql_barang = mysqli_query($con, "SELECT * FROM calon_santri WHERE nisn = '$row[nisn]'");
                                    $data_barang = mysqli_fetch_array($sql_barang);
                                    echo $data_barang['status_santri'].""; 
                                    ?>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalBerkas<?= $row['id_pembayaran'] ?>">
                                        <i class="ti ti-folder"></i> &nbsp; Lihat Berkas
                                    </button>
                                    
                                    <!-- Modal untuk menampilkan berkas -->
                                    <div class="modal fade" id="modalBerkas<?= $row['id_pembayaran'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $row['id_pembayaran'] ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel<?= $row['id_pembayaran'] ?>">Berkas <?= $row['nama']; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="list-group">
                                                        <li class="list-group-item"><b>Ijazah:</b> 
                                                            <?= $row['ijazah'] ? "<a href='{$row['ijazah']}' target='_blank'>Lihat</a>" : "Belum diunggah" ?>
                                                        </li>
                                                        <li class="list-group-item"><b>Akta Lahir:</b> 
                                                            <?= $row['akta_lahir'] ? "<a href='{$row['akta_lahir']}' target='_blank'>Lihat</a>" : "Belum diunggah" ?>
                                                        </li>
                                                        <li class="list-group-item"><b>KTP Ayah:</b> 
                                                            <?= $row['ktp_ayah'] ? "<a href='{$row['ktp_ayah']}' target='_blank'>Lihat</a>" : "Belum diunggah" ?>
                                                        </li>
                                                        <li class="list-group-item"><b>KTP Ibu:</b> 
                                                            <?= $row['ktp_ibu'] ? "<a href='{$row['ktp_ibu']}' target='_blank'>Lihat</a>" : "Belum diunggah" ?>
                                                        </li>
                                                        <li class="list-group-item"><b>Kartu Keluarga:</b> 
                                                            <?= $row['kartu_keluarga'] ? "<a href='{$row['kartu_keluarga']}' target='_blank'>Lihat</a>" : "Belum diunggah" ?>
                                                        </li>
                                                        <li class="list-group-item"><b>KIP:</b> 
                                                            <?= $row['kip'] ? "<a href='{$row['kip']}' target='_blank'>Lihat</a>" : "Belum diunggah / Bukan Penerima" ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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