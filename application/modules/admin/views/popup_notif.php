<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pengaturan Popup Notifikasi</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pengaturan Popup Notifikasi</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_content">
                        <form method="POST" action="<?=base_url('admin/popup_notif_save')?>">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Popup Notifikasi Teks</label>
                          <h2><label class="label label-success"><?=(!empty($msg))?$msg:''?></label></h2>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <textarea class="resizable_textarea form-control" rows = "12" placeholder="
                            isi popup notifikasi disini..." name="notification"><?=$notif?></textarea>
                          </div>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <div class="row">
                          <div class="col-md-12">
                            <button class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
                          </div>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->