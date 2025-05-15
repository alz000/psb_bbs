<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0"> Pembayaran</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>              
            <li class="breadcrumb-item"><a href="javascript: void(0);">Calon Santri</a></li>              
            <li class="breadcrumb-item active"> Pembayaran</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Data Pembayaran  
                </h4> 

                <br>

                <table id="dtTabel" class="table table-striped table-sm w-100 nowrap">
                    <thead class="table-light">
                        <tr>
                            <th width="10" class="text-center">#</th>
                            <th width="5" class="text-center">No.</th>
                            <th>Hari Bayar</th>
                            <th>Tanggal Bayar</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th class="text-end">Jumlah</th> 
                            <th>Status</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $nisn = $_SESSION['santri']['nisn']; 
                        $nomor = 1; 
                        $ambil = $con->query("SELECT * FROM pembayaran NATURAL JOIN calon_santri WHERE nisn='$nisn' ORDER BY nisn ASC");
                        while ($row = $ambil->fetch_assoc()) { 
                            $hari = getHari($row['tgl_bayar']); 
                            $tgl = tgl_indo($row['tgl_bayar']); ?>
                            <tr>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-warning btn-sm dropdown-toggle text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti ti-settings"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="?page=pembayaran&aksi=lihat&id_pembayaran=<?= $row['id_pembayaran'] ?>"><i class="ti ti-eye"></i> Lihat</a>
                                            <a class="dropdown-item" href="../admin/page/laporan/kwitansi.php?id_pembayaran=<?= $row['id_pembayaran'] ?>" target="_blank"><i class="ti ti-mail"></i> Kwitansi</a> 
                                        </div>
                                    </div> 
                                </td> 
                                <td class="text-center"><?= $nomor; ?></td>
                                <td><?= $hari; ?></td>
                                <td><?= $tgl; ?></td>
                                <td><?= $row['nisn']; ?></td>
                                <td><?= $row['nama_lengkap']; ?></td>
                                <td class="text-end">Rp. <?= number_format($row['jumlah'], 0, ',', '.') ?></td>
                                <td><?= $row['status_santri']; ?></td>  

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