                                <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Pengaturan Pengguna</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Pengguna</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          	<?php echo form_open_multipart('admin/user_edit', array('class'=>'form-horizontal form-label-left'));?>
            <input type="hidden" name="id" value="<?=$r->id?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?=$r->username?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?=$r->email?>">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="password" name="password"  value="<?=$r->password?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Otoritas</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<select class="form-control" name="group_id">
                   <option value="1" <?=($r->group_id == 1) ? 'selected="selected"' : ''?>>Administrator</option> 
                   <option value="2" <?=($r->group_id == 2) ? 'selected="selected"' : ''?>>Operator</option> 
                  </select>
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