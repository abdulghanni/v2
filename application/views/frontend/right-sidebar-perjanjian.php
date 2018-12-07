<div class="main--sidebar col-md-3 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
    <div class="sticky-content-inner">
        <div class="widget">
            <div class="widget--title">
                <h2 class="h4">Cari Perjanjian</h2> <i class="icon fa fa-search"></i> </div>
            <div class="subscribe--widget">
                <div class="content">
                    <p>Gunakan fitur ini untuk mempermudah pencarian.</p>
                </div>
                 <form method="POST" action="<?=base_url('himpunan/produk_hukum_search')?>">
                    <div class="input-group">
                        <input type="text" name="title" placeholder="Judul Perjanjian" class="form-control" autocomplete="off">
                    </div></br>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-lg btn-default active"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="status"></div>
                </form>
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