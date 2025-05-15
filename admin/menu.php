<div class="sidenav-menu">

    <!-- Brand Logo -->
    <a href="index.php" class="logo">
        <span class="logo-light">
            <span class="logo-lg text-white" style="font-size: 20px;"><?= $meta['instansi'] ?></span>
            <span class="logo-sm"><img src="assets/gambar/<?= $meta['logo'] ?>" ></span>
        </span>

        <span class="logo-dark">
            <span class="logo-lg text-dark" style="font-size: 20px;"><?= $meta['instansi'] ?></span>
            <span class="logo-sm"><img src="assets/gambar/<?= $meta['logo'] ?>" ></span>
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <button class="button-sm-hover">
        <i class="ti ti-circle align-middle"></i>
    </button>

    <!-- Full Sidebar Menu Close Button -->
    <button class="button-close-fullsidebar">
        <i class="ti ti-x align-middle"></i>
    </button>

    <div data-simplebar>

        <!--- Sidenav Menu -->
        <ul class="side-nav table-responsive">

            <li class="side-nav-title">Main Menu</li>

            <li class="side-nav-item">
                <a href="index.php" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-home"></i></span>
                    <span class="menu-text"> Beranda </span> 
                </a>
            </li> 

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDTMaster" aria-expanded="false" aria-controls="sidebarDTMaster"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-database"></i></span>
                    <span class="menu-text"> Data Master</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarDTMaster">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="?page=admin" class="side-nav-link">
                                <span class="menu-text">Admin</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="?page=pengaturan&id_meta=<?=$meta['id_meta'] ?>" class="side-nav-link">
                                <span class="menu-text">Setting</span>
                            </a>
                        </li> 
                        <li class="side-nav-item">
                            <a href="?page=darah" class="side-nav-link">
                                <span class="menu-text">Golongan Darah</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="?page=pendidikan" class="side-nav-link">
                                <span class="menu-text">Pendidikan</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="?page=pekerjaan" class="side-nav-link">
                                <span class="menu-text">Pekerjaan</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="?page=ruangan" class="side-nav-link">
                                <span class="menu-text">Ruangan</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="?page=bidang" class="side-nav-link">
                                <span class="menu-text">Bidang Kompetensi</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="?page=kategori_artikel" class="side-nav-link">
                                <span class="menu-text">Kategori Artikel</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="?page=artikel" class="side-nav-link">
                                <span class="menu-text">Artikel</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="?page=pendidik" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-user"></i></span>
                    <span class="menu-text"> Pendidik </span> 
                </a>
            </li> 

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCsantri" aria-expanded="false" aria-controls="sidebarCsantri"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-users"></i></span>
                    <span class="menu-text"> Calon Santri</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCsantri">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="?page=calon_santri" class="side-nav-link">
                                <span class="menu-text">Calon Santri</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="?page=pembayaran" class="side-nav-link">
                                <span class="menu-text">Pembayaran</span>
                            </a>
                        </li> 
                        <li class="side-nav-item">
                            <a href="?page=formulir" class="side-nav-link">
                                <span class="menu-text">Upload Berkas</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>  

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarWaliSantri" aria-expanded="false" aria-controls="sidebarWaliSantri"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-users"></i></span>
                    <span class="menu-text"> Wali Santri</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarWaliSantri">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="?page=ayah" class="side-nav-link">
                                <span class="menu-text">Ayah</span>
                            </a>
                        </li> 
                        <li class="side-nav-item">
                            <a href="?page=ibu" class="side-nav-link">
                                <span class="menu-text">Ibu</span>
                            </a>
                        </li> 
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="?page=tes_masuk" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-edit"></i></span>
                    <span class="menu-text"> Tes Masuk </span> 
                </a>
            </li>
            
            <li class="side-nav-item">
                <a href="?page=livechat" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-message-circle"></i></span>
                    <span class="menu-text"> Livechat </span> 
                </a>
            </li>

            <li class="side-nav-item">
                <a href="?page=pengaturan_gelombang" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-message-circle"></i></span>
                    <span class="menu-text"> Pengaturan Gelombang </span> 
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLaporan" aria-expanded="false" aria-controls="sidebarLaporan"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-printer"></i></span>
                    <span class="menu-text"> Laporan</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarLaporan">
                    <ul class="sub-menu">
                        <li class="side-nav-item"><a href="page/laporan/csb.php" target="_blank" class="side-nav-link"><span class="menu-text">Calon Santri Baru</span></a></li>  
                        <li class="side-nav-item"><a href="page/laporan/belum_berkas.php" target="_blank" class="side-nav-link"><span class="menu-text">Calon Santri Baru Belum Lengkap Berkas</span></a></li>  
                        <li class="side-nav-item"><a href="page/laporan/csb_hasil.php" target="_blank" class="side-nav-link"><span class="menu-text">Hasil Tes Calon Santri Baru</span></a></li>  
                        <li class="side-nav-item"><a href="page/laporan/csb_kip.php" target="_blank" class="side-nav-link"><span class="menu-text">Calon Santri Baru Penerima KIP</span></a></li>  
                        <li class="side-nav-item"><a href="page/laporan/csb_lulus.php" target="_blank" class="side-nav-link"><span class="menu-text">Calon Santri Baru Diterima / Lulus</span></a></li>  
                        <li class="side-nav-item"><a href="page/laporan/csb_tlulus.php" target="_blank" class="side-nav-link"><span class="menu-text">Calon Santri Baru Tidak Lulus</span></a></li>  
                        <li class="side-nav-item"><a href="page/laporan/belum_bayar.php" target="_blank" class="side-nav-link"><span class="menu-text">Calon Santri Baru Belum Pembayaran</span></a></li> 
                        <li class="side-nav-item"><a href="page/laporan/sudah_bayar.php" target="_blank" class="side-nav-link"><span class="menu-text">Calon Santri Baru Sudah Pembayaran</span></a></li> 
                        <li class="side-nav-item"><a href="#" data-bs-toggle="modal" data-bs-target="#csb_kabupaten" class="side-nav-link"><span class="menu-text">Calon Santri Baru /Kabupaten</span></a></li> 
                        <li class="side-nav-item"><a href="#" data-bs-toggle="modal" data-bs-target="#csb_jenjang" class="side-nav-link"><span class="menu-text">Calon Santri Baru /Jenjang</span></a></li>  
                    </ul>
                </div>
            </li>

             
        </ul> 
    </div>
</div>