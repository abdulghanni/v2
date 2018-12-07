<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?=$ci->title?></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="col-md-3">&nbsp;</div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih Pengguna
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2" name="user_id" id="user_id" style="width: 100%">
                            <option value="0">-- Pilih Users --</option>
                            <?php foreach($users as $u){ ?>
                            <option value="<?=$u->id?>"><?=$u->username?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">&nbsp;</div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="content">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <script>
          
        </script>