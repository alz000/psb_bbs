<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start(); 
include 'admin/inc/koneksi.php';
include 'admin/inc/tanggal.php';
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html.themewant.com/fluxi/blog-grid-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2024 14:55:41 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="admin/assets/gambar/<?= $meta['logo'] ?>">
    <title><?= $meta['instansi'] ?></title>
    <!-- swiper css -->
    <link rel="stylesheet preload" href="assets/css/plugins/swiper.min.css" as="style">
    <!-- magnific popup css -->
    <link rel="stylesheet preload" href="assets/css/plugins/magnific-popup.css" as="style">
    <!-- metismenu css -->
    <link rel="stylesheet preload" href="assets/css/plugins/metismenu.css" as="style">
    <!-- bootstrap css -->
    <link rel="stylesheet preload" href="assets/css/vendor/bootstrap.min.css" as="style">
    <!-- fontawesome css -->
    <link rel="stylesheet preload" href="assets/css/plugins/fontawesome.min.css" as="style">
    <!-- Custom css -->
    <link rel="stylesheet preload" href="assets/css/style.css" as="style">
</head>

<body>

    <!-- header area start -->
    <header class="header-style-one header--sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-style-one-wrapper">
                        <div class="logo-area">
                            <a href="index.php" class="logo">
                                <strong><?= $meta['instansi'] ?> Tanah Grogot</strong>
                            </a>
                        </div>
                        <?php include "menu_atas.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->



    <!-- single case studies -->
    <div class="single-case-studies-bread-crumb-area area-2 pt--120 pb--80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner"> 
                        <h5 class="title split-collab">SELAMAT DATANG</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single case studies end -->

    <!-- rts service area start -->
    <section class="fluxi-hero-section inner grid-2 rts-section-gapBottom inner-post">
        <div class="fluxi-hero">
            <div class="container">
                <div class="fluxi-full-hero-content">
                    <div class="row gx-5 sticky-coloum-wrap">
                        <div class="col-xl-8 col-lg-8">
                            <div class="fluxi-left-post">
                                <div class="row mt--0">
                                    <?php
                                    $batas = 4;
                                    $halaman = isset($_GET['open'])?(int)$_GET['open'] : 1;
                                    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;    

                                    $previous = $halaman - 1;
                                    $next = $halaman + 1;
                                                    
                                    $data = mysqli_query($con,"SELECT * FROM artikel WHERE status_artikel='Aktif' ORDER BY id_artikel DESC");
                                    $jumlah_data = mysqli_num_rows($data);  
                                    $total_halaman = ceil($jumlah_data / $batas);

                                    $data_pegawai = mysqli_query($con,"SELECT * FROM artikel WHERE status_artikel='Aktif' ORDER BY id_artikel DESC limit $halaman_awal, $batas ");
                                    $nomor = $halaman_awal+1; 
                                    while ($b = mysqli_fetch_array($data_pegawai))
                                      {
                                        $hari = getHari($b['tanggal']);
                                                $tgl = tgl_indo($b['tanggal']);
                                                extract($b);
                                                echo '
                                                <div class="col-lg-6 col-md-6"> 
                                                    <div class="single-blog-area-style-one">
                                                        <a href="detail.php?id_artikel='.$id_artikel.'" class="thumbnail">
                                                            <img src="admin/assets/gambar/artikel/'.$gambar.'" alt="blog-image">
                                                        </a>
                                                        <div class="inner-content-wrapper">
                                                            <a href="detail.php?id_artikel='.$id_artikel.'">
                                                                <h6 class="title">
                                                                    '.$judul.'
                                                                </h6>
                                                            </a>
                                                            <div class="bottom-area">
                                                                <span class="admin">'.$posting.'</span>
                                                                <span class="date">•   '.$hari.', '.$tgl.'</span>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>';
                                    }
                                    ?> 
                                </div>
                            </div>
                            
                            <div class="rts-fluxi-pagination">
                                <ul>
                                    <li><a class="page-link" <?php if($halaman > 1){ echo "href='?open=$Previous'"; } ?>><i class="fa-solid fa-chevrons-left"></i></a></li>
                                    <?php 
                                    for($x=1;$x<=$total_halaman;$x++){
                                        ?> 
                                        <li><a class="page-link" href="?open=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                        <?php
                                    }
                                    ?> 
                                    <li>
                                        <a class="page-link" <?php if($halaman < $total_halaman) { echo "href='?open=$next'"; } ?>><i class="fa-solid fa-chevrons-right"></i></a>
                                    </li> 
                                </ul> 
                            </div>
                        </div>
                        <?php include "kanan.php" ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- rts service area end -->

    <?php include "bawah.php" ?>


    <div id="anywhere-home" class="">
    </div>


    <!-- side bar area  -->
    <?php include "menu_samping.php" ?>
    <!-- side abr area end -->

    <!-- pre loader start -->
    <div class="loader-wrapper">
        <div class="loader">
        </div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- pre loader end -->

    <!-- THEME MODE SWITCHER -->
    <div class="rts-switcher rts-theme-mode">
        <div class="rts-darkmode">
            <a id="rts-data-toggle" class="rts-dark-light">
                <i class="rts-go-dark fal fa-moon"></i>
                <i class="rts-go-light fa-light fa-sun-bright"></i>
            </a>
        </div>
    </div>
    <!-- THEME MODE SWITCHER END -->

    <!-- progress area start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>
    <!-- progress area end -->
    <div style="position: fixed; bottom: 10px; right: 10px; width: 300px; background: #fff; border: 1px solid #ccc; padding: 10px; z-index: 9999;">
    <h6>Live Chat</h6>
    <form id="chatForm">
        <input type="text" name="nama_user" placeholder="Nama Anda" class="form-control mb-2" required>
        <textarea name="pesan" placeholder="Ketik pesan..." class="form-control mb-2" required></textarea>
        <button type="submit" class="btn btn-primary w-100">Kirim</button>
    </form>
    <div id="chatBox" style="height: 200px; overflow-y: scroll; border-top: 1px solid #ccc; margin-top: 10px; padding-top: 10px;"></div>
</div>
                               
    <script>
    const form = document.getElementById('chatForm');
    const chatBox = document.getElementById('chatBox');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(form);
        fetch('chat_process.php', {
            method: 'POST',
            body: formData
        }).then(() => {
            form.reset();
            loadChat();
        });
    });

    function loadChat() {
        fetch('chat_process.php')
            .then(response => response.json())
            .then(data => {
                chatBox.innerHTML = '';
                data.forEach(chat => {
                    chatBox.innerHTML += `<p><strong>${chat.nama_user}</strong>: ${chat.pesan}</p>`;
                });
                chatBox.scrollTop = chatBox.scrollHeight;
            });
    }

    setInterval(loadChat, 3000); // Update setiap 3 detik
    loadChat(); // Load awal
</script>


    <!-- jquery js -->
    <script defer src="assets/js/plugins/jquery.min.js"></script>
    <script defer src="assets/js/plugins/bootstrap.min.js"></script>
    <script defer src="assets/js/plugins/metismenu.js"></script>
    <script defer src="assets/js/vendor/jqueryui.js"></script>
    <script defer src="assets/js/vendor/waypoint.js"></script>
    <script defer src="assets/js/plugins/swiper.js"></script>
    <script defer src="assets/js/plugins/theia-sticky-sidebar.min.js"></script>
    <script defer src="assets/js/plugins/gsap.min.js"></script>
    <script defer src="assets/js/plugins/scrolltigger.js"></script>
    <script defer src="assets/js/vendor/split-text.js"></script>
    <script defer src="assets/js/vendor/split-type.js"></script>
    <script defer src="assets/js/vendor/waw.js"></script>
    <script defer src="assets/js/plugins/counter-up.js"></script>
    <script defer src="assets/js/plugins/magnific-popup.js"></script>
   
    <script defer src="assets/js/plugins/contact-form.js"></script>
    <script defer src="assets/js/main.js"></script>
</body>


<!-- Mirrored from html.themewant.com/fluxi/blog-grid-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2024 14:55:41 GMT -->
</html>