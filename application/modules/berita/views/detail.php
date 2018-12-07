<div class="main--breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html" class="btn-link"><i class="fa fm fa-home"></i>Beranda</a></li>
                    <li><a href="berita.html" class="btn-link">Berita</a></li>
                    <li class="active"><span>Berita Detail</span></li>
                </ul>
            </div>
        </div>
        <div class="main-content--section pbottom--30">
            <div class="container">
                <div class="row">
                    <div class="main--content col-md-8" data-sticky-content="true">
                        <div class="sticky-content-inner">
                            <div class="post--item post--single post--title-largest pd--30-0">
                                <div class="post--cats">
                                    <ul class="nav">
                                        <li><span><i class="fa fa-folder-open-o"></i></span></li>
                                        <li><a href="#">Berita Hukum</a></li>
                                    </ul>
                                </div>
                                <div class="post--info">
                                    <ul class="nav meta">
                                        <li><a href="#">Admin</a></li>
                                        <li><a href="#"><?=date('d M Y', $r->created_on)?></a></li>
                                        <li><span><i class="fa fm fa-eye"></i><?=$r->hits?></span></li>
                                    </ul>
                                    <div class="title">
                                        <h2 class="h4"><?=$r->title?></h2> </div>
                                </div>
                                <div class="post--img">
                                    <a href="#" class="thumb"><img src="<?=base_url()?>frontend/assets/img/blog-img/fff.png" alt=""></a>
                                </div>
                                <div class="post--content">
                                    <?=$r->body?>
                                </div>
                            </div>
                            <!-- <div class="ad--space pd--20-0-40">
                                <a href="#"> <img src="img/ads-img/ad-728x90-02.jpg" alt="" class="center-block"> </a>
                            </div> -->
                            <!-- <div class="post--tags">
                                <ul class="nav">
                                    <li><span><i class="fa fa-tags"></i></span></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Image</a></li>
                                    <li><a href="#">Music</a></li>
                                    <li><a href="#">Video</a></li>
                                    <li><a href="#">Audio</a></li>
                                    <li><a href="#">Latest</a></li>
                                    <li><a href="#">Trendy</a></li>
                                    <li><a href="#">Special</a></li>
                                    <li><a href="#">Recipe</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
        