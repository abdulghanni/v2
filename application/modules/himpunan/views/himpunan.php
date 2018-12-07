<div class="main--breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html" class="btn-link"><i class="fa fm fa-home"></i>Beranda</a></li>
            <li class="active"><span>Himpunan Perundangan</span></li>
        </ul>
    </div>
</div>
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row">
            <div class="main--content col-md-9 col-sm-7" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <div class="page--title ptop--30">
                        <h2 class="h2">HIMPUNAN PERUNDANGAN</h2> </div>
                    <div class="post--items post--items-5 pd--30-0">
                        <ul class="nav">
                            <?php 
                                    if(!empty($results)):
                                    foreach($results as $entry){?>
                            <li>
                                <div class="post--item post--title-larger">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-4 col-xxs-12">
                                            <div class="post--img">
                                                <a href="news-single-v1.html" class="thumb"><img src="<?=base_url()?>frontend/assets/img/prokum.jpg?>" alt=""></a> </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12 col-xs-8 col-xxs-12">
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="#"><i class="fa fa-eye"></i> Dilihat <?=$entry->hits?> kali</a></li>
                                                    <li><a href="#"><i class="fa fa-download"></i> Diunduh <?=$entry->downloaded?> kali</a></li>
                                                </ul>
                                                <div class="title">
                                                    <h3 class="h4"><a href="<?=site_url('himpunan/himpunan_detail')?>/<?=$entry->entry_id?>"><?=$entry->c_description.' Nomor '.$entry->title.' Tahun '.$entry->regyear?></a></h3> </div>
                                            </div>
                                            <div class="post--content">
                                                <div class="" style="font-size: 10px"><?=$entry->e_description?></div>
                                            </div>
                                            <div class="post--action"> <a href="<?=base_url('himpunan/himpunan_download/'.$entry->entry_id)?>" target="_blank"><i class="fa fa-download"></i> Unduh</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php }
                                    else:
                                        echo "Produk Hukum Tidak Ditemukan";
                                    endif;
                                     ?>
                        </ul>
                    </div>
                    <div class="pagination--wrapper clearfix bdtop--1 bd--color-2 ptop--60 pbottom--30">
                        <!-- <p class="pagination-hint float--left">Halaman 02 dari 03</p> -->
                        <ul class="pagination float--right">
                            <?php if (isset($links)) { ?>
                                <?php echo $links ?>
                            <?php } ?>
                            <!-- <li><a href="#"><i class="fa fa-long-arrow-left"></i></a></li>
                            <li><a href="#">01</a></li>
                            <li class="active"><span>02</span></li>
                            <li><a href="#">03</a></li>
                            <li> <i class="fa fa-angle-double-right"></i> <i class="fa fa-angle-double-right"></i> <i class="fa fa-angle-double-right"></i> </li>
                            <li><a href="#">20</a></li>
                            <li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>