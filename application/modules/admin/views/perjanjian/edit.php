                                <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Perjanjian Kerjasama</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit PErjanjian Kerjasama</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          	<?php echo form_open_multipart('admin/perjanjian/do_edit', array('class'=>'form-horizontal form-label-left'));?>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">File Download</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<input type="file" name="userfile" size="20" value="<?=$r->url?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea name="description" style="width: 100%"><?=$r->description?></textarea>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?=base_url('admin/produk_hukum')?>"><button class="btn btn-primary" type="button">Cancel</button></a>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
	        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>