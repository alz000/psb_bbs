<?php
$id_meta = $_GET['id_meta'];
$sql = $con->query("SELECT * FROM meta WHERE id_meta='$id_meta'");
$row = mysqli_fetch_assoc($sql);
?>

<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Pengaturan</h4>
    </div>
    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>            
            <li class="breadcrumb-item active">Pengaturan</li>
        </ol>
    </div>
</div> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Pengaturan
                    <a href="?page=pengaturan&aksi=ubah&id_meta=<?= $row['id_meta'] ?>" class="btn btn-success btn-sm float-end">Ubah</a>
                </h4>

                <br>
                
                <table class="table table-bordered">
                    <tr>
                        <td rowspan="6" class="text-center align-middle" style="width: 20%;">
                            <img src="assets/gambar/<?php echo $row['logo']; ?>" alt="Logo" class="img-fluid" style="max-width: 100px;">
                        </td>
                        <th>Instansi</th>
                        <td><?php echo $row['instansi']; ?></td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td><?php echo $row['telp']; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $row['alamat']; ?></td>
                    </tr>
                    <tr>
                        <th>Pimpinan</th>
                        <td><?php echo $row['pimpinan']; ?></td>
                    </tr>
                    <tr>
                        <th>Singkatan</th>
                        <td><?php echo $row['singkat']; ?></td>
                    </tr>
                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->
