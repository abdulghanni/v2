<div class="main-content--section pbottom--30 background_khusus">
    <div class="container">
        
        <div class="main--content">
            <div class="post--items post--items-1 pd--30-0">
                <div class="row gutter--15">
                    <div class="col-md-6">
                        <div class="post--item post--layout-1 post--title-larger">
                            <div class="post--img">
                                <a href="#" class="thumb"><img src="<?=base_url()?>frontend/assets/img/home-img/4-6.jpg?>" alt=""></a> <a href="#" class="cat">Pemerintahan</a> <a href="#" class="icon"><i class="fa fa-flash"></i></a>
                                <div class="post--map">
                                </div>
                                <div class="post--info">
                                    <ul class="nav meta">
                                        <li><a href="#">Admin</a></li>
                                        <li><a href="#">12 April 2018</a></li>
                                    </ul>
                                    <div class="title">
                                        <h2 class="h4"><a href="#" class="btn-link">Anies-Sandi Apresiasi Pandangan Fraksi DPRD atas RPJMD 2017-2022</a></h2> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row gutter--15">
                            <div class="col-xs-6 col-xss-12">
                                <div class="post--item post--layout-1 post--title-large">
                                    <div class="post--img">
                                        <a href="#" class="thumb"><img src="<?=base_url()?>frontend/assets/img/home-img/4-6.jpg?>" alt=""></a> <a href="#" class="cat">Pendidikan</a> <a href="#" class="icon"><i class="fa fa-heart-o"></i></a>
                                        <div class="post--info">
                                            <ul class="nav meta">
                                                <li><a href="#">Admin</a></li>
                                                <li><a href="#">06 April 2018</a></li>
                                            </ul>
                                            <div class="title">
                                                <h2 class="h4"><a href="#" class="btn-link">Sekolah di Jakarta Diliburkan Saat Asian Games</a></h2> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 hidden-xss">
                                <div class="post--item post--layout-1 post--title-large">
                                    <div class="post--img">
                                        <a href="#" class="thumb"><img src="<?=base_url()?>frontend/assets/img/home-img/4-6.jpg?>" alt=""></a> <a href="#" class="cat">Potret Jakarta</a> <a href="#" class="icon"><i class="fa fa-star-o"></i></a>
                                        <div class="post--map">
                                            <p class="btn-link"><i class="fa fa-map-o"></i>Location in Google Map</p>
                                            <div class="map--wrapper">
                                                <div data-map-latitude="23.790546" data-map-longitude="90.375583" data-map-zoom="6" data-map-marker="[[23.790546, 90.375583]]"></div>
                                            </div>
                                        </div>
                                        <div class="post--info">
                                            <ul class="nav meta">
                                                <li><a href="#">Admin</a></li>
                                                <li><a href="#">10 April 2018</a></li>
                                            </ul>
                                            <div class="title">
                                                <h2 class="h4"><a href="#" class="btn-link">Wagub Buka OK OCE Goes to Mall</a></h2> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 hidden-sm hidden-xs">
                                <div class="post--item post--layout-1 post--title-larger">
                                    <div class="post--img">
                                        <a href="#" class="thumb"><img src="<?=base_url()?>frontend/assets/img/home-img/27-9.jpg?>" alt=""></a> <a href="#" class="cat">Pemerintahan</a> <a href="#" class="icon"><i class="fa fa-fire"></i></a>
                                        <div class="post--info">
                                            <ul class="nav meta">
                                                <li><a href="#">Admin</a></li>
                                                <li><a href="#">03 April 2018</a></li>
                                            </ul>
                                            <div class="title">
                                                <h2 class="h4"><a href="#" class="btn-link">Kepala Daerah Jabodetabekjur Sepakati Pembentukan Pokja</a></h2> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="main--content col-md-9 col-sm-7" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <div class="row">
                        <div class="col-md-6 ptop--30 pbottom--30">
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Produk Hukum</h2>
                                <div class="nav">
                                    <a href="#" class="prev btn-link" data-ajax-action="load_prev_sports_posts"> <i class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span>
                                    <a href="#" class="next btn-link" data-ajax-action="load_next_sports_posts"> <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                            <div class="post--items post--items-3" data-ajax-content="outer">
                                <ul class="nav" data-ajax-content="inner">
                                    <?php foreach($list_produk as $entry){?>
                                    <li>
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">
                                                <a href="#" class="thumb">
                                                    <img class="media-object" style="height: 75px;width: 75px" src="<?=base_url()?>frontend/assets/img/home-img/prokum-list.jpg" alt="...">
                                                </a>
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#"><?=date('d M Y', strtotime($entry->date_added))?></a></li>
                                                        <li><a href="#" class="fa fa-eye"> <?=$entry->hits?></a></li>
                                                        <li><a href="#" class="fa fa-download"> <?=$entry->downloaded?></a></li>
                                                    </ul>
                                                    <div class="title">
                                                        <h3 class="h4"><a href="<?=site_url('himpunan/produkhukum_detail')?>/<?=$entry->entry_id?>"><?=$entry->c_description.' Nomor '.$entry->title.' Tahun '.$entry->regyear?></a></h3>
                                                    </div>
                                                    <div class="" style="font-size: 12px"><?=$ci->limit_kata(ucfirst(strtolower($entry->e_description)))?>...</div>
                                                    <a href="<?=base_url('himpunan/produk_download/'.$entry->entry_id)?>" target="_blank" onclick="downloadProduk()"><span class="pull-right" style="margin-right:10px"><i class="fa fa-download"></i> Klik Untuk Download </span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ptop--30 pbottom--30">
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Non-Produk Hukum</h2>
                                <div class="nav">
                                    <a href="#" class="prev btn-link" data-ajax-action="load_prev_sports_posts"> <i class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span>
                                    <a href="#" class="next btn-link" data-ajax-action="load_next_sports_posts"> <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                            <div class="post--items post--items-3" data-ajax-content="outer">
                                <ul class="nav" data-ajax-content="inner">
                                    <?php foreach($list_himpunan as $entry){?>
                                    <li>
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">
                                                <a href="#" class="thumb">
                                                    <img class="media-object" style="height: 75px;width: 75px" src="<?=base_url()?>frontend/assets/img/home-img/prokum-list.jpg" alt="...">
                                                </a>
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#"><?=date('d M Y', strtotime($entry->date_added))?></a></li>
                                                        <li><a href="#" class="fa fa-eye"> <?=$entry->hits?></a></li>
                                                        <li><a href="#" class="fa fa-download"> <?=$entry->downloaded?></a></li>
                                                    </ul>
                                                    <div class="title">
                                                        <h3 class="h4"><a href="<?=site_url('himpunan/produkhukum_detail')?>/<?=$entry->entry_id?>"><?=$entry->c_description.' Nomor '.$entry->title.' Tahun '.$entry->regyear?></a></h3>
                                                    </div>
                                                    <div class="" style="font-size: 12px"><?=$ci->limit_kata(ucfirst(strtolower($entry->e_description)))?>...</div>
                                                    <a href="<?=base_url('himpunan/produk_download/'.$entry->entry_id)?>" target="_blank" onclick="downloadProduk()"><span class="pull-right" style="margin-right:10px"><i class="fa fa-download"></i> Klik Untuk Download </span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- <div class="col-md-12 ptop--30 pbottom--30">
                            <div class="ad--space">
                                <a href="#"> <img src="img/ads-img/ad-728x90-01.jpg" alt="" class="center-block"> </a>
                            </div>
                        </div> -->
                        <div class="col-md-6 ptop--30 pbottom--30">
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Berita Terkini</h2>
                                <div class="nav">
                                    <a href="#" class="prev btn-link" data-ajax-action="load_prev_world_news_posts"> <i class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span>
                                    <a href="#" class="next btn-link" data-ajax-action="load_next_world_news_posts"> <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                            <div class="post--items post--items-2" data-ajax-content="outer">
                                <ul class="nav row gutter--15" data-ajax-content="inner">
                                    <li class="col-xs-12">
                                        <div class="post--item post--layout-1">
                                            <div class="post--img">
                                                <a href="<?=base_url()?>berita/detail/<?=$berita_terbaru->id?>" class="thumb"><img src="<?=base_url()?>frontend/assets/img/home-img/4-6.jpg?>" alt=""></a> <a href="#" class="cat">Berita Hukum</a> <a href="#" class="icon"><i class="fa fa-flash"></i></a>
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#">Admin</a></li>
                                                        <li><a href="#"><?=date('d M Y H:i:s', $berita_terbaru->created_on)?></a></li>
                                                    </ul>
                                                    <div class="title">
                                                        <h3 class="h4"><a href="<?=base_url()?>berita/detail/<?=$berita_terbaru->id?>" class="btn-link"><?=$berita_terbaru->title?></a></h3> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-xs-12">
                                        <hr class="divider"> 
                                    </li>
                                    <?php $i=1;foreach($berita_baru as $r){
                                        $i++;
                                    ?>
                                    <li class="col-xs-6">
                                        <div class="post--item post--layout-2">
                                            <div class="post--img">
                                                <a href="#" class="thumb"><img src="<?=base_url()?>frontend/assets/img/home-img/4-6.jpg?>" alt=""></a>
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#">Admin</a></li>
                                                        <li><a href="#"><?=date('d M Y H:i:s', $r->created_on)?></a></li>
                                                    </ul>
                                                    <div class="title">
                                                        <h3 class="h4"><a href="<?=base_url()?>berita/detail/<?=$r->id?>" class="btn-link"><?=$r->title?></a></h3> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php if($i%2){?>
                                    <li class="col-xs-12">
                                        <hr class="divider"> </li>
                                    <?php } } ?>
                                </ul>
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ptop--30 pbottom--30">
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Berita Terpopuler</h2>
                                <div class="nav">
                                    <a href="#" class="prev btn-link" data-ajax-action="load_prev_technology_posts"> <i class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span>
                                    <a href="#" class="next btn-link" data-ajax-action="load_next_technology_posts"> <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                            <div class="post--items post--items-3" data-ajax-content="outer">
                                <ul class="nav" data-ajax-content="inner">
                                    <li>
                                        <div class="post--item post--layout-1">
                                            <div class="post--img">
                                                <a href="#" class="thumb"><img src="<?=base_url()?>frontend/assets/img/home-img/4-6.jpg?>" alt=""></a> <a href="#" class="cat">Berita Hukum</a> <a href="#" class="icon"><i class="fa fa-heart-o"></i></a>
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#">Admin</a></li>
                                                        <li><a href="#"><?=date('d M Y', $berita_terpopuler->created_on)?></a></a></li>
                                                    </ul>
                                                    <div class="title">
                                                        <h3 class="h4"><a href="<?=base_url()?>berita/detail/<?=$berita_terpopuler->id?>" class="btn-link"><?=$berita_terpopuler->title?></a></h3> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php foreach($berita_populer as $r){?>
                                    <li>
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">
                                                <a href="#" class="thumb"><img src="<?=base_url()?>frontend/assets/img/home-img/4-6.jpg?>" alt=""></a>
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#">Admin</a></li>
                                                        <li><a href="#"><?=date('d M Y', $r->created_on)?></a></li>
                                                    </ul>
                                                    <div class="title">
                                                        <h3 class="h4"><a href="<?=base_url()?>berita/detail/<?=$r->id?>" class="btn-link"><?=$r->title?></a></h3> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                                </ul>
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        

