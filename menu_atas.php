<nav class="main-nav-area">
    <ul class="list-unstyled fluxi-desktop-menu">
        <li class="menu-item"><a class="main-element fluxi-dropdown-main-element" href="index.php">Beranda</a></li>
        <li class="menu-item fluxi-has-dropdown">
            <a href="#" class="fluxi-dropdown-main-element">Tentang Kami</a>
            <!-- Start Dropdown Menu -->
            <ul class="fluxi-submenu list-unstyled menu-home">
                <li class="nav-item"><a class="nav-link page" href="detail.php?id_artikel=4">Sejarah</a></li>
                <li class="nav-item"><a class="nav-link" href="detail.php?id_artikel=3">Visi dan Misi</a></li>
                <li class="nav-item"><a class="nav-link" href="detail.php?id_artikel=2">Struktur Organisasi</a></li> 
            </ul>
            <!-- End Dropdown Menu -->
        </li> 
        <li class="menu-item"><a class="main-element fluxi-dropdown-main-element" href="detail.php?id_artikel=5">Kontak Kami</a></li>
    </ul>
</nav>
<div class="button-area-start">   
    <a class="call-us" href="#">&nbsp;</a> 
    <?php
        // Ambil data setting_pendaftaran terbaru atau yang aktif
        $today = date('Y-m-d');

        $query = $con->query("SELECT tgl_mulai,tgl_selesai FROM setting_pendaftaran 
                            WHERE '$today' BETWEEN tgl_mulai AND tgl_selesai
                            LIMIT 1");

        if ($query && $query->num_rows > 0) {
            // Tampilkan tombol jika ada data yang sesuai
            echo '<a href="santri/formulir.php" class="rts-btn btn-primary">Formulir Pendaftaran</a>';
        }
    ?>

    <a href="santri/login.php" class="rts-btn btn-primary">Login</a>
    <div class="menu-btn" id="menu-btn">

        <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect y="14" width="20" height="2" fill="#1F1F25"></rect>
            <rect y="7" width="20" height="2" fill="#1F1F25"></rect>
            <rect width="20" height="2" fill="#1F1F25"></rect>
        </svg>

    </div>
</div>