<div class="main--breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html" class="btn-link"><i class="fa fm fa-home"></i>Beranda</a></li>
            <li><a href="berita.html" class="btn-link">Direktori Hukum</a></li>
            <li class="active"><span><?=$title?></span></li>
        </ul>
    </div>
</div>
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row">
            <div class="main--content col-md-8" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <div class="post--item post--single post--title-largest pd--30-0">
                        <div class="post--info">
                            <div class="title">
                                <h2 class="h4"><?=$title?></h2> </div>
                        </div>
                        <div class="post--content">
                            <?=$content?>
                        </div>
                    </div>
                </div>
            </div>
            <?=$ci->load->view('frontend/right-sidebar')?>    
        </div>
    </div>
</div>