<div class="col-xl-4 col-lg-4 sticky-coloum-item">
    <div class="fluxi-right-ct-1">
        <div class="rts-single-wized search">
            <div class="wized-body mt--0">
                <div class="rts-search-wrapper">
                    <input class="Search" type="text" placeholder="Enter Keyword">
                    <button><i class="fal fa-search"></i></button>
                </div>
            </div>
        </div>
        <!-- single wizered End -->
        <!-- single wizered start -->
        <div class="rts-single-wized Categories">
            <div class="wized-header">
                <h5 class="title">
                    Kategori
                </h5>
            </div>
            <div class="wized-body">
                <?php 
                $menu = mysqli_query($con, "SELECT * FROM kategori WHERE s_kategori='Aktif' ORDER BY id_kategori ASC LIMIT 0,10");
                while ($mn = mysqli_fetch_array($menu))
                {
                    extract($mn);
                    echo  ' <ul class="single-categories">
                                <li><a href="#">'.$kategori.' <i class="far fa-long-arrow-right"></i></a></li> 
                            </ul>
                          ';
                }
                ?>   
            </div>
        </div>
        <!-- single wizered End -->
        <!-- single wizered start -->
        <div class="rts-single-wized Recent-post">
            <div class="wized-header">
                <h5 class="title">
                    Recent Posts
                </h5>
            </div>
            <div class="wized-body">
                <!-- recent-post -->
                <?php 
                $pop = mysqli_query($con, "SELECT * FROM artikel WHERE status_artikel='Aktif' ORDER BY id_artikel DESC LIMIT 0,5 ");
                while ($r = mysqli_fetch_array($pop))
                {
                    $hari = getHari($r['tanggal']);
                    $tgl = tgl_indo($r['tanggal']);
                    extract($r);
                    echo '
                            <div class="recent-post-single">
                                <div class="thumbnail">
                                    <a href="detail.php?id_artikel='.$id_artikel.'"><img src="admin/assets/gambar/artikel/'.$gambar.'"></a>
                                </div>
                                <div class="content-area text-start">
                                    <div class="user">
                                        <i class="fal fa-clock"></i>
                                        <span>'.$tgl.'</span>
                                    </div>
                                    <a class="post-title" href="detail.php?id_artikel='.$id_artikel.'">
                                        <h6 class="title">'.$judul.'</h6>
                                    </a>
                                </div>
                            </div>

                         ';
                }
                ?> 
                <!-- recent-post End --> 
            </div>
        </div>
        <!-- single wizered End --> 
    </div>
</div>