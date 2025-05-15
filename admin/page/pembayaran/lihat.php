<?php
$id_pembayaran = $_GET['id_pembayaran'];
$sql = $con->query("SELECT * FROM pembayaran NATURAL JOIN calon_santri WHERE id_pembayaran='$id_pembayaran'");
$row = mysqli_fetch_assoc($sql);
$hari = getHari($row['tgl_bayar']); 
$tgl = tgl_indo($row['tgl_bayar']); ?> 

<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Lihat Data</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>                
            <li class="breadcrumb-item"><a href="javascript: void(0);">Calon Santri</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Pembayaran</a></li>            
            <li class="breadcrumb-item active">Lihat Data</li>
        </ol>
    </div>
</div> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">Lihat Data Pembayaran</h4> 
                <br> 
                <table class="table table-borderless"> 
                    <tr>
                        <th>Hari Bayar</th>
                        <td><?php echo $hari; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Bayar</th>
                        <td><?php echo $tgl; ?></td>
                    </tr>
                    <tr>
                        <th>NISN</th>
                        <td><?php echo $row['nisn']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $row['nama_lengkap']; ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp. <?= number_format($row['jumlah'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <th>Administrasi</th>
                        <td><?php echo $row['nama_admin']; ?></td>
                    </tr>
                </table> 

            </div>
        </div>
    </div>
</div>
