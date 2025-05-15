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
                        <div class="pagimation">
                            <a href="#">Beranda</a><i class="fa-regular fa-chevron-right"></i> 
                            <a href="#" class="current">Artikel</a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single case studies end -->

    <!-- rts service area start -->
    <section class="fluxi-hero-section inner details rts-section-gapBottom inner-post">
        <div class="fluxi-hero">
            <div class="container">
                <div class="fluxi-full-hero-content">
                    <div class="row gx-5 sticky-coloum-wrap">
                        <div class="col-xl-8 col-lg-8">
                            <div class="fluxi-left-post">
                                <?php 
                                $id_artikel = (isset($_GET['id_artikel']) ? $_GET['id_artikel'] : '');
                                $sql = mysqli_query($con, "SELECT * FROM artikel WHERE status_artikel='Aktif' AND id_artikel = '".$id_artikel."' ");
                                while ($b = mysqli_fetch_array($sql))
                                {
                                    $hari = getHari($b['tanggal']);
                                                $tgl = tgl_indo($b['tanggal']);
                                    extract($b);
                                    
                                    $updateviewnum = mysqli_query($con, "UPDATE artikel SET view=view+1 WHERE id_artikel = '".$id_artikel."' ");

                                    echo '

                                    <div class="single-blog-area-style-one">
                                        <a href="#" class="thumbnail">
                                            <img class="w-100" src="admin/assets/gambar/artikel/'.$gambar.'" alt="">
                                        </a>
                                        <div class="inner-content-wrapper text-start">
                                            <div class="bottom-area justify-content-start mb--10">
                                                <span class="admin">'.$posting.'</span>
                                                <span class="date"><span>•</span> '.$tgl.'</span>
                                            </div>
                                            <h6 class="title text-start">
                                                '.$judul.'
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="post-panel">
                                        <div class="post-content">
                                            <p class="first-text">
                                                '.nl2br($isi).'
                                            </p>
                                        </div>
                                        <div class="post-footer">
                                            <ul class="nav-x gap-narrow text-primary">
                                                <li><span class="text-black dark:text-white me-narrow">Kategori:</span></li>
                                                <li>
                                                    <a href="#" class="gap-0">'.$kategori.'</a>
                                                </li> 
                                            </ul>
                                        </div> 
                                    </div>


                                            
                                         '
                                    ;
                                }
                                ?>   
                                
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
    <!-- contact form js -->
    <script defer src="assets/js/plugins/contact-form.js"></script>
    <script defer src="assets/js/main.js"></script>
</body>


<!-- Mirrored from html.themewant.com/fluxi/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2024 14:55:43 GMT -->
</html>