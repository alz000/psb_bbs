<div class="sidenav-menu">

    <!-- Brand Logo -->
    <a href="index.php" class="logo">
        <span class="logo-light">
            <span class="logo-lg text-white" style="font-size: 20px;"><?= $meta['instansi'] ?></span>
            <span class="logo-sm"><img src="assets/gambar/<?= $meta['logo'] ?>" ></span>
        </span>

        <span class="logo-dark">
            <span class="logo-lg"><img src="assets/images/logo-dark.png"></span>
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
        <ul class="side-nav">

            <li class="side-nav-title">Main Menu</li>

            <li class="side-nav-item">
                <a href="index.php" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-home"></i></span>
                    <span class="menu-text"> Beranda </span> 
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

             
        </ul> 

        <div class="clearfix"></div>
    </div>
</div>