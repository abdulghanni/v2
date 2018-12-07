<footer class="footer--section">
            <div class="footer--widgets pd--30-0 bg--color-2">
                <div class="container">
                    <div class="row AdjustRow">
                        <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Tentang Kami</h2> <i class="icon fa fa-exclamation"></i> </div>
                                <div class="about--widget">
                                    <ul class="nav">
                                        <li> <i class="fa fa-map"></i> <span>Gambir, Kota Jakarta Pusat, DKI Jakarta, Indonesia</span> </li>
                                        <li> <i class="fa fa-envelope-o"></i> <a href="#"><span class="__cf_email__" data-cfemail="8beef3eae6fbe7eecbeef3eae6fbe7eea5e8e4e6">birohukum@jakarta.go.id</span></a> </li>
                                        <li> <i class="fa fa-phone"></i> <a href="tel:+123456789">(021) 3822014</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Tautan</h2> <i class="icon fa fa-expand"></i> </div>
                                <div class="links--widget">
                                    <ul class="nav">
                                        <li><a href="<?=base_url('himpunan/visi')?>" class="fa-angle-right">Visi Misi</a></li>
                                        <li><a href="<?=base_url('himpunan/produk_hukum')?>" class="fa-angle-right">Produk Hukum</a></li>
                                        <li><a href="<?=base_url('himpunan/himpunan_perundangan')?>" class="fa-angle-right">Himpunan Perundangan</a></li>
                                        <li><a href="<?=base_url('himpunan/perjanjian_kerjasama')?>" class="fa-angle-right">Perjanjian Kerjasama</a></li>
                                        <li><a href="<?=base_url('himpunan/galeri')?>" class="fa-angle-right">Galeri</a></li>
                                        <li><a href="<?=base_url('himpunan/kontak')?>" class="fa-angle-right">Kontak</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Produk Hukum Terbaru</h2> <i class="icon fa fa-bullhorn"></i> </div>
                                <div class="links--widget">
                                    <ul class="nav">
                                        <?php foreach($list_produk as $entry){?>
                                        <li style="font-size: 12px"><a class="fa-angle-right" href="<?=site_url('himpunan/produkhukum_detail')?>/<?=$entry->entry_id?>"><?=$entry->c_description.' Nomor '.$entry->title.' Tahun '.$entry->regyear?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Link Terkait</h2> <i class="icon fa fa-user-o"></i> </div>
                                <div class="links--widget">
                                    <ul class="nav">
                                        <li><a href="#" class="fa-angle-right">Pemerintah Kota DKI Jakarta</a></li>
                                        <li><a href="#" class="fa-angle-right">JDIH Nasional</a></li>
                                        <li><a href="#" class="fa-angle-right">Kementerian Dalam Negeri</a></li>
                                        <li><a href="#" class="fa-angle-right">Badan Pembinaan Hukum Nasional</a></li>
                                        <li><a href="#" class="fa-angle-right">Direktorat Jenderal Peraturan Perundang-undangan</a></li>
                                        <li><a href="#" class="fa-angle-right">Mahkamah Agung</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer--copyright bg--color-3">
                <div class="social--bg bg--color-1"></div>
                <div class="container">
                    <p class="text float--left">&copy; 2018 <a href="#">Jaringan Dokumentasi & Informasi Hukum DKI Jakarta</a>. All Rights Reserved.</p>
                    <ul class="nav social float--right">
                        <li><a href="https://web.facebook.com/biro.hukumdkijakarta?_rdc=1&_rdr"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/birohukumdki"><i class="fa fa-twitter"></i></a></li>
                        <!-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> -->
                        <li><a href="https://www.instagram.com/birohukum.dki/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <ul class="nav links float--right">
                        <li><a href="<?=base_url()?>">Beranda</a></li>
                        <!-- <li><a href="#">FAQ</a></li> -->
                        <li><a href="<?=base_url('kontak')?>">Bantuan</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    <!-- <div id="stickySocial" class="sticky--right">
        <ul class="nav">
            <li>
                <a href="#"> <i class="fa fa-facebook"></i> <span>Follow Us On Facebook</span> </a>
            </li>
            <li>
                <a href="#"> <i class="fa fa-twitter"></i> <span>Follow Us On Twitter</span> </a>
            </li>
            <li>
                <a href="#"> <i class="fa fa-google-plus"></i> <span>Follow Us On Google Plus</span> </a>
            </li>
            <li>
                <a href="#"> <i class="fa fa-rss"></i> <span>Follow Us On RSS</span> </a>
            </li>
            <li>
                <a href="#"> <i class="fa fa-vimeo"></i> <span>Follow Us On Vimeo</span> </a>
            </li>
            <li>
                <a href="#"> <i class="fa fa-youtube-play"></i> <span>Follow Us On Youtube Play</span> </a>
            </li>
            <li>
                <a href="#"> <i class="fa fa-linkedin"></i> <span>Follow Us On LinkedIn</span> </a>
            </li>
        </ul>
    </div> -->
    <div id="backToTop"> <a href="#"><i class="fa fa-angle-double-up"></i></a> </div>
    <?=front_js('jquery-3.2.1.min.js')?>
    <?=front_js('bootstrap.min.js')?>
    <?=front_js('jquery.sticky.min.js')?>
    <?=front_js('jquery.hoverIntent.min.js')?>
    <?=front_js('jquery.marquee.min.js')?>
    <?=front_js('jquery.validate.min.js')?>
    <?=front_js('isotope.min.js')?>
    <?=front_js('resizesensor.min.js')?>
    <?=front_js('theia-sticky-sidebar.min.js')?>
    <?=front_js('jquery.zoom.min.js')?>
    <?=front_js('jquery.barrating.min.js')?>
    <?=front_js('jquery.countdown.min.js')?>
    <?=front_js('retina.min.js')?>
    <?=front_js('main.js')?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK9f7sXWmqQ1E-ufRXV3VpXOn_ifKsDuc"></script>
    <script type="text/javascript">
            function startTime() {
                var today=new Date(),
                curr_hour=today.getHours(),
                curr_min=today.getMinutes(),
                curr_sec=today.getSeconds();
                curr_hour=checkTime(curr_hour);
                curr_min=checkTime(curr_min);
                curr_sec=checkTime(curr_sec);

                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                var date = new Date();
                var day = date.getDate();
                var month = date.getMonth();
                var thisDay = date.getDay(),
                    thisDay = myDays[thisDay];
                var yy = date.getYear();
                var year = (yy < 1000) ? yy + 1900 : yy;

                document.getElementById('clock').innerHTML= thisDay + ', ' + day + ' ' + months[month] + ' ' + year+ ' ' + curr_hour+":"+curr_min+":"+curr_sec;
            }
            function checkTime(i) {
                if (i<10) {
                    i="0" + i;
                }
                return i;
            }

            function vote(){
                id = $('input[name=id]:checked').val();
                base_url = '<?=base_url()?>';
                $.ajax({
                    type: 'POST',
                    url: base_url+'home/vote/',
                    data: {id : id},
                    success: function(data) {
                        alert(data);
                    }
                });
            }

            function showPopuler(){
                $('#terbaru').hide();
                $('#terunduh').hide();
                $('#terpopuler').show();
            }

            function showTerbaru(){
                $('#terbaru').show();
                $('#terunduh').hide();
                $('#terpopuler').hide();
            }

            function showTerunduh(){
                $('#terbaru').hide();
                $('#terunduh').show();
                $('#terpopuler').hide();
            }

            setInterval(startTime, 500);
    </script>
</body>

</html>