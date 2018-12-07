<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Biro Hukum | Halaman Utama</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <?=front_css('bootstrap.min.css')?>
        <?=front_css('font-awesome.min.css')?>

        <?=front_css('style.css')?>
        <?=front_css('responsive-style.css')?>
        <?=front_css('colors/theme-color-1.css')?>
        <?=front_css('custom.css')?>
    </head>
    <body>

        <div id="preloader">
            <div class="preloader bg--color-1--b" data-preloader="1">
                <div class="preloader--inner"></div>
            </div>
        </div>
        <!-- Body content -->

        <div class="wrapper">
            <header class="header--section header--style-1">
                <div class="header--topbar bg--color-2">
                    <div class="container">
                        <div class="float--left float--xs-none text-xs-center">
                            <ul class="header--topbar-info nav">
                                <li><i class="fa fm fa-map-marker"></i>DKI Jakarta</li>
                                <!-- <li><i class="fa fm fa-mixcloud"></i>21<sup>0</sup> C</li> -->
                                <li><i class="fa fm fa-calendar"></i><span id="clock"></span></li>
                            </ul>
                        </div>
                        <div class="float--right float--xs-none text-xs-center">
                            <ul class="header--topbar-action nav">
                                <li><a href="login.html"><i class="fa fm fa-user-o"></i>Masuk/Daftar</a></li>
                            </ul>
                            <ul class="header--topbar-social nav hidden-sm hidden-xxs">
                                <li><a href="https://web.facebook.com/biro.hukumdkijakarta?_rdc=1&_rdr"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/birohukumdki"><i class="fa fa-twitter"></i></a></li>
                                <!-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> -->
                                <li><a href="https://www.instagram.com/birohukum.dki/"><i class="fa fa-instagram"></i></a></li>
                                <!-- <li><a href="#"><i class="fa fa-youtube-play"></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header--mainbar">
                    <div class="container">
                        <div class="header--logo float--left float--sm-none text-sm-center">
                            <h1 class="h1"> <a href="index.html" class="btn-link"> <img src="<?=base_url()?>frontend/assets/img/logo.png" alt="JDIH Logo"> <span class="hidden">JDIH Logo</span> </a> </h1> </div>
                        <div class="header--ad float--right float--sm-none hidden-xs">
                            <a href="https://asiangames2018.id/"> <img src="<?=base_url()?>frontend/assets/img/header/ad-728x90-01.jpg" alt="Advertisement"> </a>
                        </div>
                    </div>
                </div>
                <div class="header--navbar style--1 navbar bd--color-1 bg--color-1" data-trigger="sticky">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav" aria-expanded="false" aria-controls="headerNav"> <span class="sr-only">Toggle Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        </div>
                        <div id="headerNav" class="navbar-collapse collapse float--left">
                            <ul class="header--menu-links nav navbar-nav" data-trigger="hoverIntent">
                                <li><a href="<?=base_url()?>">Beranda</a></li>
                                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profil<i class="fa flm fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url('profile/visi_misi')?>">Visi Misi</a></li>
                                        <li><a href="<?=base_url('profile/struktur_organisasi')?>">Struktur Organisasi</a></li>
                                        <li><a href="<?=base_url('profile/renstra')?>">Renstra</a></li>
                                        <li><a href="<?=base_url('profile/tupoksi')?>">Tupoksi</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produk Hukum<i class="fa flm fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url('himpunan/category_search/2')?>">Peraturan Daerah</a></li>
                                        <li><a href="<?=base_url('himpunan/category_search/8')?>">Peraturan Gubernur</a></li>
                                        <li><a href="<?=base_url('himpunan/category_search/1')?>">Keputusan Gubernur</a></li>
                                        <li><a href="<?=base_url('himpunan/category_search/3')?>">Instruksi Gubernur Gubernur</a></li>
                                        <li><a href="<?=base_url('himpunan/produk_hukum')?>">Semua Produk Hukum</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Non Produk Hukum<i class="fa flm fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url('himpunan/himpunan_perundangan')?>">Himpunan Perundangan</a></li>
                                        <li><a href="<?=base_url('informasi/perjanjian_kerjasama')?>">Perjanjian Kerjasama</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Direktori Hukum<i class="fa flm fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url('direktori/peraturan_daerah')?>">Tata Cara Penyusunan Peraturan Daerah</a></li>
                                        <li><a href="<?=base_url('direktori/peraturan_gubernur')?>">Tata Cara Penyusunan Peraturan Gubernur</a></li>
                                        <li><a href="<?=base_url('direktori/keputusan_gubernur')?>">Tata Cara Penyusunan Keputusan Gubernur</a></li>
                                        <li><a href="<?=base_url('direktori/template_kontrak')?>">Template Kontrak</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?=base_url('berita')?>">Berita</a></li>
                                <li><a href="<?=base_url('galeri')?>">Galeri</a></li>
                                <li><a href="<?=base_url('kontak')?>">Kontak</a></li>
                            </ul>
                        </div>
                        <form action="#" class="header--search-form float--right" data-form="validate">
                            <input type="search" name="search" placeholder="Cari..." class="header--search-control form-control" required>
                            <button type="submit" class="header--search-btn btn"><i class="header--search-icon fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </header>
            <div class="news--ticker">
                <div class="container">
                    <div class="title">
                        <h2>Peraturan Hukum Terbaru</h2> <span>(Update 12 menit lalu)</span> </div>
                    <div class="news-updates--list" data-marquee="true">
                        <ul class="nav">
                            <?php foreach($running_produk as $entry){?>
                            <li>
                                <h3 class="h3"><a href="<?=site_url('himpunan/produkhukum_detail')?>/<?=$entry->entry_id?>" target="_blank"><?=$entry->c_description.' Nomor '.$entry->title.' Tahun '.$entry->regyear?> </a></h3> </li>
                            <li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
