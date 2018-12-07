<div class="main--sidebar col-md-3 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
    <div class="sticky-content-inner">
        <div class="widget">
            <div class="widget--title">
                <h2 class="h4">Cari Produk Hukum</h2> <i class="icon fa fa-search"></i> </div>
            <div class="subscribe--widget">
                <div class="content">
                    <p>Gunakan fitur ini untuk mempermudah pencarian produk hukum yang anda cari.</p>
                </div>
                 <form method="POST" action="<?=base_url('himpunan/produk_hukum_search')?>">
                    <div class="input-group">
                        <input type="text" name="title" placeholder="Nomor" class="form-control" autocomplete="off">
                    </div></br>
                    <div class="input-group">
                        <input type="text" name="year" placeholder="Tahun" class="form-control" autocomplete="off">
                    </div></br>
                    <div class="input-group">
                        <input type="text" name="tentang" placeholder="Tentang" class="form-control" autocomplete="off">
                    </div></br>
                    <div class="input-group">
                        <select name="category" style="width: 100%" class="form-control">
                            <option value="">Semua Kategori</option>
                            <?php foreach($categories as $c){ ?>
                            <option value="<?=$c->category_id?>"><?=$c->description?></option>
                            <?php } ?>
                        </select>
                    </div></br>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-lg btn-default active"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="status"></div>
                </form>
            </div>
        </div>
        <div class="widget">
            <div class="widget--title">
                <h2 class="h4">Produk Hukum</h2> <i class="icon fa fa-folder-open-o"></i> </div>
            <div class="list--widget list--widget-1">
                <div class="list--widget-nav" data-ajax="tab">
                    <ul class="nav nav-justified">
                        <li class="active"> <a href="#" data-ajax-action="load_widget_hot_news" onclick="showTerbaru()">Terbaru</a> </li>
                        <li> <a href="#" data-ajax-action="load_widget_trendy_news" onclick="showPopuler()">Terpopuler</a> </li>
                        <!-- <li> <a href="#" data-ajax-action="load_widget_most_watched" onclick="showTerunduh()">Diunduh</a> </li> -->
                    </ul>
                </div>
                <div class="post--items post--items-3" data-ajax-content="outer">
                    <ul class="nav" data-ajax-content="inner" id="terbaru" >
                        <?php foreach($list_produk as $r){?>
                        <li>
                            <div class="post--item post--layout-3">
                                <div class="post--img">
                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li><a href="#"><?=date('d M Y', strtotime($r->date_added))?></a></li>
                                            <li><a href="#" class="fa fa-eye"> <?=$r->hits?></a></li>
                                            <li><a href="#" class="fa fa-download"> <?=$r->downloaded?></a></li>
                                        </ul>
                                        <div class="title">
                                            <h4 class="h5"><a href="#" class="btn-link"><?=$r->c_description.' No. '.$r->title.' Tahun '.$r->regyear?></a></h4> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <ul class="nav" data-ajax-content="inner" id="terpopuler" style="display: none">
                        <?php foreach($list_produk_populer as $r){?>
                        <li>
                            <div class="post--item post--layout-3">
                                <div class="post--img">
                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li><a href="#"><?=date('d M Y', strtotime($r->date_added))?></a></li>
                                            <li><a href="#" class="fa fa-eye"> <?=$r->hits?></a></li>
                                            <li><a href="#" class="fa fa-download"> <?=$r->downloaded?></a></li>
                                        </ul>
                                        <div class="title">
                                            <h4 class="h5"><a href="#" class="btn-link"><?=$r->c_description.' No. '.$r->title.' Tahun '.$r->regyear?></a></h4> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <!-- <ul class="nav" data-ajax-content="inner" id="terunduh" style="display: none">
                        <?php foreach($list_produk_terunduh as $entry){?>
                        <li>
                            <div class="post--item post--layout-3">
                                <div class="post--img">
                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li><a href="#"><?=date('d M Y', strtotime($r->date_added))?></a></li>
                                            <li><a href="#" class="fa fa-eye"> <?=$r->hits?></a></li>
                                            <li><a href="#" class="fa fa-download"> <?=$r->downloaded?></a></li>
                                        </ul>
                                        <div class="title">
                                            <h4 class="h5"><a href="<?=site_url('himpunan/produkhukum_detail')?>/<?=$entry->entry_id?>" class="btn-link"><?=$r->c_description.' No. '.$r->title.' Tahun '.$r->regyear?></a></h4> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul> -->
                    <div class="preloader bg--color-0--b" data-preloader="1">
                        <div class="preloader--inner"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget">
            <div class="widget--title" data-ajax="tab">
                <h2 class="h4">Jejak Pendapat</h2>
                <div class="nav">
                    <a href="#" class="prev btn-link" data-ajax-action="load_prev_poll_widget"> <i class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span>
                    <a href="#" class="next btn-link" data-ajax-action="load_next_poll_widget"> <i class="fa fa-long-arrow-right"></i> </a>
                </div>
            </div>
            <div class="poll--widget" data-ajax-content="outer">
                <ul class="nav" data-ajax-content="inner">
                    <li class="title">
                        <h3 class="h4">Menurut Anda, bagaimana tampilan, fitur dan isi konten dari website ini ?</h3> </li>
                    <li class="options">
                        <form action="#">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="id" value="4" checked="checked"> <span>Sangat Bagus</span> </label>
                                <p><?=get_percentage_vote(4)?>%<span style="width: <?=get_percentage_vote(4)?>%;"></span></p>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="id" value="3"> <span>Bagus</span> </label>
                                  <p><?=get_percentage_vote(3)?>%<span style="width: <?=get_percentage_vote(3)?>%;"></span></p>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="id" value="2"> <span>Cukup Bagus</span> </label>
                                  <p><?=get_percentage_vote(2)?>%<span style="width: <?=get_percentage_vote(2)?>%;"></span></p>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="id" value="1"> <span>Kurang</span> </label>
                                  <p><?=get_percentage_vote(1)?>%<span style="width: <?=get_percentage_vote(1)?>%;"></span></p>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="vote()">Vote</button>
                        </form>
                    </li>
                </ul>
                <div class="preloader bg--color-0--b" data-preloader="1">
                    <div class="preloader--inner"></div>
                </div>
            </div>
        </div>
        <div class="widget">
            <div class="widget--title" data-ajax="tab">
                <h2 class="h4">Total Pengunjung</h2>
            </div>
            <div class="list--widget list--widget-2" data-ajax-content="outer">
                <div class="post--items post--items-3">
                    <ul class="nav" data-ajax-content="inner">
                        <li>
                            <div class="text-center">
                                <div class="text-center">
                                    <div class="post--info">
                                        <div class="">
                                            <h3 class="title text-center"><?=getTotalVisitorsToday()?></h3> 
                                        </div>
                                        <ul class="nav meta">
                                            <li><span>Total Pengunjung Hari Ini</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="text-center">
                                    <div class="post--info">
                                        <div class="">
                                            <h3 class="title text-center"><?=getTotalVisitorsMonth()?></h3> 
                                        </div>
                                        <ul class="nav meta">
                                            <li><span>Total Pengunjung Bulan Ini</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="preloader bg--color-0--b" data-preloader="1">
                        <div class="preloader--inner"></div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
</div>
</div>
    </div>
</div>