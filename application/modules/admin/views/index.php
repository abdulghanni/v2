 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Halaman Admin Birohukum DKI Jakarta</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Main Menu</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="col-md-12">
                        <div class="">
                          <div class="x_content">
                            <div class="row">
                              <?php foreach($menu as $m){?>
                              <div class="col-md-3 col-sm-4">
                                <div class="wrimagecard wrimagecard-topimage">
                                  <a href="<?=base_url('admin/').$m->filez?>">
                                    <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                                      <center><i class="<?=$m->img?>" style="color:#BB7824"></i></center>
                                    </div>
                                    <div class="wrimagecard-topimage_title">
                                      <h4><?=$m->title?></h4>
                                    </div>
                                  </a>
                                </div>
                              </div>
                              <?php } ?>
                            </div>
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