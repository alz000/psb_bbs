<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Golongan Darah</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>            
            <li class="breadcrumb-item active">Golongan Darah</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Data Golongan Darah 
                    <a href="?page=darah&aksi=tambah" class="btn btn-primary btn-sm float-end">Tambah</a>
                </h4> 

                <br>

                <table id="dtTabel" class="table table-striped table-sm w-100">
                    <thead class="table-light">
                        <tr>
                            <th width="10" class="text-center">#</th>
                            <th width="5" class="text-center">No.</th>
                            <th>Golongan Darah</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $nomor = 1; 
                            $ambil = $con->query("SELECT * FROM darah ORDER BY id_darah ASC"); 
                            while ($row = $ambil->fetch_assoc()) { ?>
                                <tr>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-warning btn-sm dropdown-toggle text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ti ti-settings"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="?page=darah&aksi=ubah&id_darah=<?= $row['id_darah'] ?>"><i class="ti ti-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="#" onclick="confirmDelete(<?= $row['id_darah']; ?>)"><i class="ti ti-trash"></i> Hapus</a> 
                                            </div>
                                        </div> 
                                    </td>
                                    <td class="text-center"><?= $nomor; ?></td>
                                    <td><?= $row['darah']; ?></td> 
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