<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Produk Hukum</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Produk Hukum List</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          	<?php echo form_open_multipart('admin/edit_prokum/'.$entries->entry_id, array('class'=>'form-horizontal form-label-left'));?>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="select2" name="category_id" style="width: 100%">
                  	<option value="0">-- Pilih Kategori --</option>
                    <?php foreach($categories as $c){ 
                      $selected = ($entries->FK_category_id == $c->category_id) ? 'selected="selected"' : '';
                      ?>
                  	<option value="<?=$c->category_id?>" <?=$selected?>><?=$c->description?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="" name="title" required="required" class="form-control col-md-7 col-xs-12" value="<?=$entries->title?>">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="regyear" value="<?=$entries->regyear?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">File Download</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<input type="file" name="userfile" size="20" />
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?=$entries->url?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tentang
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea name="description" style="width: 100%"><?=$entries->description?></textarea>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button class="btn btn-primary" type="button">Cancel</button>
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