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
                    <h2>Tambah <?=$ci->title?></h2>
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
                        <?php echo form_open_multipart('admin/berita/do_edit/'.$r->id, array('class'=>'form-horizontal form-label-right'));?>
                        <div class="form-group">
                          <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Kategori
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2 form-control" name="category_id" style="width: 100%">
                              <option value="1">Berita Hukum</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Judul
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="title" required="required" class="form-control col-md-7 col-xs-12" value="<?=$r->title?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Kata Kunci
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="keyword" required="" class="form-control col-md-7 col-xs-12" value="<?=$r->keywords?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Status
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2 form-control" name="status" style="width: 100%">
                              <option value="draft">Draft</option>
                              <option value="live">Publikasikan</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-2 col-sm-3 col-xs-12">Isi <?=$ci->title?></label>
                          <h2><label class="label label-success"><?=(!empty($msg))?$msg:''?></label></h2>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <textarea class="resizable_textarea form-control" rows="20" placeholder="
                            isi popup notifikasi disini..." name="body"><?=$r->body?></textarea>
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