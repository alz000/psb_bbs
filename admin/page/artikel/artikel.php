<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Artikel</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>            
            <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>            
            <li class="breadcrumb-item active">Artikel</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Data Artikel 
                    <a href="?page=artikel&aksi=tambah" class="btn btn-primary btn-sm float-end">Tambah</a>
                </h4> 

                <br>

                <table id="dtTabel" class="table table-striped table-sm w-100">
                    <thead class="table-light">
                        <tr>
                            <th width="10" class="text-center">#</th>
                            <th width="5" class="text-center">No.</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis / Diposting</th>
                            <th>Hari, Tanggal Posting</th> 
                            <th class="text-center">Dilihat</th>
                            <th class="text-center">Status</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $nomor = 1; 
                            $ambil = $con->query("SELECT * FROM artikel ORDER BY id_artikel ASC"); 
                            while ($row = $ambil->fetch_assoc()) { 
                                $hari = getHari($row['tanggal']); 
                                $tgl = tgl_indo($row['tanggal']); 
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-warning btn-sm dropdown-toggle text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ti ti-settings"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="?page=artikel&aksi=ubah&id_artikel=<?= $row['id_artikel'] ?>"><i class="ti ti-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="#" onclick="confirmDelete(<?= $row['id_artikel']; ?>)"><i class="ti ti-trash"></i> Hapus</a> 
                                            </div>
                                        </div> 
                                    </td>
                                    <td class="text-center"><?= $nomor; ?></td>
                                    <td><?= $row['judul']; ?></td>
                                    <td><?= $row['kategori']; ?></td>
                                    <td><?= $row['posting']; ?></td>
                                    <td><?= $hari; ?>, <?= $tgl; ?></td>
                                    <td class="text-center"><?= $row['view']; ?></td>
                                    <td class="text-center"><?= $row['status_artikel']; ?></td> 
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
    function confirmDelete(id_artikel) {
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
                window.location.href = "?page=artikel&aksi=hapus&id_artikel=" + id_artikel;
            }
        });
    }
</script> 