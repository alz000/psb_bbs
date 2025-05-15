<div id="csb_jenjang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="csb_jenjangLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Laporan Calon Santri Baru <br> <span class="text-danger"><small>Berdasarkan Jenjang Pendidikan</small></span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="page/laporan/csb_jenjang.php" target="_blank"> 
                <div class="modal-body">
                    <div class="mb-1">
                        <label class="form-label">Jenjang Pendidikan</label>
                        <select name="jenjang" class="form-control" required>
                            <option selected disabled>Pilih</option> 
                            <?php
                            $sql_kar=mysqli_query($con, "SELECT DISTINCT jenjang FROM calon_santri ");
                            while ($kar=mysqli_fetch_array($sql_kar))
                            {
                                echo "<option value='$kar[jenjang]'>$kar[jenjang]</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cetak</button> 
                </div>
            </form> <!-- /.form -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="csb_kabupaten" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="csb_kabupatenLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Laporan Calon Santri Baru <br> <span class="text-danger"><small>Berdasarkan Kabupaten</small></span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="page/laporan/csb_kabupaten.php" target="_blank"> 
                <div class="modal-body">
                    <div class="mb-1">
                        <label class="form-label">Kabupaten</label>
                        <select name="kabupaten" class="form-control" required>
                            <option selected disabled>Pilih</option> 
                            <?php  
                            $sql_kab = mysqli_query($con, "SELECT DISTINCT calon_santri.kabupaten, wilayah_2022.nama FROM calon_santri JOIN wilayah_2022 ON calon_santri.kabupaten = wilayah_2022.kode");
                             
                            while ($kab = mysqli_fetch_array($sql_kab)) {
                                echo "<option value='$kab[kabupaten]'>$kab[nama]</option>";
                            }
                            ?>
                        </select>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cetak</button> 
                </div>
            </form> <!-- /.form -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 