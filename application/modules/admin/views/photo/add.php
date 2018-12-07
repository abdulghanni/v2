<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Slider Image</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_content">
						<div class="row">
							<form action="<?php echo base_url().'admin/photo/do_add'?>" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Judul
									</label>
									<div class="col-md-9 col-sm-6 col-xs-12">
										<input type="text" id="last-name" name="title" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>
								<br/>
								<br/>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi
									</label>
									<div class="col-md-9 col-sm-6 col-xs-12">
										<textarea name="description" style="width: 100%"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="container">
										<h2>Pilih File Untuk Diupload</h2>
										<?php for ($i=1; $i <=10 ; $i++) :?>
											<div class="row">
												<div class="col-md-3">
													<input type="file" name="filefoto<?php echo $i;?>"><br/>
												</div>
												<div class="col-md-3">
													<input type="text" class="form-control" name="caption<?php echo $i;?>"><br/>
												</div>
											</div>
										<?php endfor;?>
									</div>
								</div>
								<div class="col-md-12">
									<button type="submit" class="btn btn-primary pull-right">Upload</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->