


<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Dashboard</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">MTS-MA Babussalam Tanah Grogot</a></li>
            
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div> 




<div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1">
    <div class="col">
        <div class="card overflow-hidden text-bg-secondary">
            <div class="card-body">
                <h5 class="text-white fs-16 text-uppercase">Total Calon Santri</h5>
                <div class="d-flex align-items-center gap-2 my-2 py-1"> 
                    <?php  
                    $sql = mysqli_query($con,"SELECT * FROM calon_santri "); 
                    $jum = mysqli_num_rows($sql);
                    ?>  
                    <h3 class="mb-0 fw-bold"><?= $jum ?></h3> 
                </div> 
            </div>
        </div>
    </div><!-- end col -->
    <div class="col">
        <div class="card overflow-hidden text-bg-primary">
            <div class="card-body">
                <h5 class="text-white fs-16 text-uppercase">Calon Santri MTS</h5>
                <div class="d-flex align-items-center gap-2 my-2 py-1"> 
                    <?php  
                    $sql = mysqli_query($con,"SELECT * FROM calon_santri WHERE jenjang='Madrasah Tsanawiyah (MTS)' "); 
                    $jum = mysqli_num_rows($sql);
                    ?>  
                    <h3 class="mb-0 fw-bold"><?= $jum ?></h3> 
                </div> 
            </div>
        </div>
    </div><!-- end col -->
    <div class="col">
        <div class="card overflow-hidden text-bg-success">
            <div class="card-body">
                <h5 class="text-white fs-16 text-uppercase">Calon Santri MA</h5>
                <div class="d-flex align-items-center gap-2 my-2 py-1"> 
                    <?php  
                    $sql = mysqli_query($con,"SELECT * FROM calon_santri WHERE jenjang='Madrasah Aliyah (MA)' "); 
                    $jum = mysqli_num_rows($sql);
                    ?>  
                    <h3 class="mb-0 fw-bold"><?= $jum ?></h3> 
                </div> 
            </div>
        </div>
    </div><!-- end col -->
    <div class="col">
        <div class="card overflow-hidden text-bg-info">
            <div class="card-body">
                <h5 class="text-white fs-16 text-uppercase">Total Santri Yang Lolos</h5>
                <div class="d-flex align-items-center gap-2 my-2 py-1"> 
                    <?php  
                    $sql = mysqli_query($con,"SELECT * FROM calon_santri WHERE status_santri='Lulus, Segera Daftar Ulang' "); 
                    $jum = mysqli_num_rows($sql);
                    ?>  
                    <h3 class="mb-0 fw-bold"><?= $jum ?></h3> 
                </div> 
            </div>
        </div>
    </div><!-- end col --> 
</div><!-- end row --> 


<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">
                    Data Calon Santri Yang Belum Melakukan Pembayaran&nbsp;&nbsp;
                </h4>
                <?php  
                $sql = mysqli_query($con,"SELECT * FROM calon_santri WHERE status_santri='Pending' "); 
                $blm_bayar = mysqli_num_rows($sql);
                ?>  
                <span class="badge bg-danger "><?= $blm_bayar ?> Orang</span>
            </div>
            <div class="card-body"> 
                <div class="table-responsive">
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nomor = 1; 
                            $ambil = $con->query("SELECT * FROM calon_santri WHERE status_santri='Pending' ORDER BY jenjang ASC"); 
                            while ($row = $ambil->fetch_assoc()) { 
                                $tgl = tgl_indo($row['tgl']); ?>
                                <tr>
                                    <td class="text-center" style="vertical-align: top;">
                                        <a class="btn btn-sm btn-success" href="?page=calon_santri&aksi=ingatkan&nisn=<?= $row['nisn'] ?>&nama_lengkap=<?= $row['nama_lengkap'] ?>&notelp=<?= $row['notelp'] ?>&password_santri=<?= $row['password_santri'] ?>"><i class="ti ti-send"></i> &nbsp;WA</a>
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

                                </tr>
                            <?php 
                            $nomor++; 
                            } 
                            ?>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">
                    Data Calon Santri Yang Belum Melakukan Upload Berkas&nbsp;&nbsp;
                </h4>
                <?php  
                $sql = mysqli_query($con,"SELECT * FROM calon_santri WHERE status_santri='Sudah Melakukan Pembayaran, Silahkan Upload Berkas' "); 
                $blm_berkas = mysqli_num_rows($sql);
                ?>  
                <span class="badge bg-danger "><?= $blm_berkas ?> Orang</span>
            </div>
            <div class="card-body"> 
                <div class="table-responsive">
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nomor = 1; 
                            $ambil = $con->query("SELECT * FROM calon_santri WHERE status_santri='Sudah Melakukan Pembayaran, Silahkan Upload Berkas' ORDER BY jenjang ASC"); 
                            while ($row = $ambil->fetch_assoc()) { 
                                $tgl = tgl_indo($row['tgl']); ?>
                                <tr>
                                    <td class="text-center" style="vertical-align: top;">
                                        <a class="btn btn-sm btn-success" href="?page=formulir&aksi=ingatkan&nisn=<?= $row['nisn'] ?>&nama_lengkap=<?= $row['nama_lengkap'] ?>&notelp=<?= $row['notelp'] ?>&status_santri=<?= $row['status_santri'] ?>"><i class="ti ti-send"></i> &nbsp;WA</a>
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

                                </tr>
                            <?php 
                            $nomor++; 
                            } 
                            ?>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->