<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Livechat</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0 fs-13">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>                
            <li class="breadcrumb-item active">Livechat</li>
        </ol>
    </div>
</div> 


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-2">
                    Livechat 
                    <a href="?page=pendidik&aksi=tambah" class="btn btn-primary btn-sm float-end">Tambah</a>
                </h4> 

                <br>

                <table id="dtTabel" class="table table-striped table-sm w-100">
                    <thead class="table-light">
                        <tr>
                            <th width="5" class="text-center">No.</th>
                            <th>Nama</th> 
                            <th>Chat</th>
                            <th>Waktu</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $nomor = 1; 
                            $ambil = $con->query("SELECT * FROM chat ORDER BY id_chat DESC"); 
                            while ($row = $ambil->fetch_assoc()) { 
                                $tgl = tgl_indo($row['tgl_pendidik']); 
                                $lahir = new DateTime($row['tgl_pendidik']);
                                $sekarang = new DateTime();
                                $umur = $lahir->diff($sekarang)->y;
                                ?>
                                <tr>
                                    
                                    <td class="text-center" style="vertical-align: top;"><?= $nomor; ?></td>
                                    <td style="vertical-align: top;"><?= $row['nama_user']; ?></td>
                                    <td style="vertical-align: top;"><?= $row['pesan']; ?></td>
                                    <td style="vertical-align: top;"><?= $row['waktu']; ?></td>
                                    <td style="vertical-align: top;">
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
