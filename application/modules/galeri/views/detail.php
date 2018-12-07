<?=$ci->load->view('frontend/header')?>
<style type="text/css">
	.hide-bullets {
list-style:none;
margin-left: -40px;
margin-top:20px;
}
.thumbnail {
padding: 0;
}
.carousel-inner>.item>img, .carousel-inner>.item>a>img {
width: 100%;
}
</style>
<div class="page-head">
	<div class="container">
		<div class="row">
			<div class="page-head-content">
				<h1 class="page-title">Galeri</h1>
			</div>
		</div>
	</div>
</div>
<!-- property area -->
<div class="content-area recent-property" style="padding-bottom: 60px; background-color: rgb(252, 252, 252);">
	<div class="container">
		<div class="row">
			<div class="col-md-12  padding-top-40 properties-page">
				<div class="container">
					<div id="main_area">
						<!-- Slider -->
						<div class="row">
							<div class="col-sm-6" id="slider-thumbs">
								<!-- Bottom switcher of slider -->
								<ul class="hide-bullets">
									<?php foreach($data->result() as $r){?>
									<li class="col-sm-3">
										<a class="thumbnail" id="carousel-selector-<?=$r->id?>">
											<img src="<?php echo base_url(); ?>uploads/default/photos/<?php echo $r->photo; ?>">
										</a>
									</li>
									<?php } ?>
								</ul>
							</div>
							<div class="col-sm-6">
								<div class="col-xs-12" id="slider">
									<!-- Top part of the slider -->
									<div class="row">
										<div class="col-sm-12" id="carousel-bounding-box">
											<div class="carousel slide" id="myCarousel">
												<!-- Carousel items -->
												<div class="carousel-inner">
												<?php foreach($data->result() as $r){?>
													<div class="<?=($data->row()->id == $r->id) ? 'active item' : 'item'?>" data-slide-number="<?=$r->id?>">
														<img src="<?php echo base_url(); ?>uploads/default/photos/<?php echo $r->photo; ?>">
													</div>
												<?php } ?>
												</div>
												<!-- Carousel nav -->
												<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
													<span class="glyphicon glyphicon-chevron-left"></span>
												</a>
												<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
													<span class="glyphicon glyphicon-chevron-right"></span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--/Slider-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?=$ci->load->view('frontend/footer')?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
	
	$('#myCarousel').carousel({
	interval: 5000
	});
	
	//Handles the carousel thumbnails
	$('[id^=carousel-selector-]').click(function () {
	var id_selector = $(this).attr("id");
	try {
	var id = /-(\d+)$/.exec(id_selector)[1];
	console.log(id_selector, id);
	jQuery('#myCarousel').carousel(parseInt(id));
	} catch (e) {
	console.log('Regex failed!', e);
	}
	});
	// When the carousel slides, auto update the text
	$('#myCarousel').on('slid.bs.carousel', function (e) {
	var id = $('.item.active').data('slide-number');
	$('#carousel-text').html($('#slide-content-'+id).html());
	});
	});
	</script>