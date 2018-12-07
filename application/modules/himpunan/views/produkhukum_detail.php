<div class="main--breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html" class="btn-link"><i class="fa fm fa-home"></i>Beranda</a></li>
            <li><a href="#" class="btn-link">Produk Hukum</a></li>
            <li class="active"><span>Produk Hukum Detail</span></li>
        </ul>
    </div>
</div>
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row">
            <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <div class="product--single ptop--30">
                        <div class="row">
                            <div class="col-md-12 pbottom--30">
                                <div class="product--summery">
                                    <div class="title">
                                        <h2 class="h4"><?=$l->c_description.' Nomor '.$l->title.' Tahun '.$l->regyear?></h2> 
                                    </div>
                                    <p class="note"><strong>Tanggal Perundangan:</strong><?=date('d M Y', strtotime($l->date_added))?></p>
                                    <p class="note"><strong>Status:</strong>Aktif</p>
                                    <div class="description">
                                        <p class="note"><strong>Tentang:</strong></p>
                                        <p><?=$l->e_description?></p>
                                    </div>
                                    <form action="#" class="cart">
                                         <a href="<?=base_url('himpunan/produk_download/'.$l->entry_id)?>" class="btn btn-primary"><i class="fa fa-download"> Unduh</i></a></form>
                                    <ul class="meta nav cat">
                                        <li><span>Kategori:</span></li>
                                        <li><a href="#"><?=$l->c_description?></a></li></ul>
                                    <!-- <ul class="meta nav tag">
                                        <li><span>Tags:</span></li>
                                        <li><a href="#">Modal</a></li>
                                        <li><a href="#">Saham</a></li>
                                        <li><a href="#">Persero</a></li>
                                    </ul> -->
                                </div>
                            </div>
                            <div class="col-md-12 ptop--30 pbottom--30">
                                <ul class="nav tab-nav">
                                    <li class="active"><a href="#productDetails01" data-toggle="tab">Riwayat</a></li>
                                </ul>
                                <div class="product--details tab-content ptop--30">
                                    <div class="tab-pane fade in active" id="productDetails01">
                                        <div class="content clearfix">
                                            <?=(!empty($l->riwayat)) ? !empty($l->riwayat) : 'Belum Ada Riwayat';?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>