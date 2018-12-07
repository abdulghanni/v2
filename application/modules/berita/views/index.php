<div class="main--breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html" class="btn-link"><i class="fa fm fa-home"></i>Beranda</a></li>
                    <li class="active"><span>Berita</span></li>
                </ul>
            </div>
        </div>
        <div class="main-content--section pbottom--30">
            <div class="container">
                <div class="row">
                    <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                        <div class="sticky-content-inner">
                            <div class="post--items post--items-2 pd--30-0">
                                <ul class="nav row AdjustRow">
                                    <?php 
                                    if(!empty($results)):$i=0;
                                    foreach($results as $r){
                                        $i++;
                                    ?>
                                    <li class="col-md-6 col-sm-12 col-xs-6 col-xss-12">
                                        <div class="post--item post--layout-2">
                                            <div class="post--img">
                                                <a href="berita_detail.html" class="thumb"><img src="<?=base_url()?>frontend/assets/img/blog-img/post-01.png" alt=""></a>
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#">Admin</a></li>
                                                        <li><a href="#"><?=date('d-M-Y', $r->created_on)?></a></li>
                                                    </ul>
                                                    <div class="title">
                                                        <h3 class="h4"><a href="<?=base_url()?>berita/detail/<?=$r->id?>" class="btn-link"><?=$r->title?></a></h3> </div>
                                                </div>
                                                <div class="post--content">
                                                    <?=$ci->limit_kata($r->body)?>
                                                </div>
                                                <div class="post--action"> <a href="<?=base_url()?>berita/detail/<?=$r->id?>">Lanjutkan Membaca.....</a> </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-xs-12 <?=($i%2) ? ' hidden-lg hidden-md hidden-xs shown-xss' : '';?>">
                                        <hr class="divider divider--25"> 
                                    </li>
                                    <?php }
                                    else:
                                        echo "Berita Tidak Ditemukan";
                                    endif;
                                     ?>
                                </ul>
                            </div>
                            <div class="pagination--wrapper clearfix bdtop--1 bd--color-2 ptop--60 pbottom--30">
                                <ul class="pagination float--right">
                                    <?php if (isset($links)) { ?>
                                        <?php echo $links ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>