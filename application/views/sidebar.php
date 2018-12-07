<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=base_url()?>" class="site_title"><img src="<?=assets_url('img/logo-jdihn.png')?>" alt="..." class="" height="50px" width="75px" /> <span>JDIH</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=assets_url('img/photo-default.png')?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=sessName()?></h2>
                <h2>(<?=(sessGroup()==1) ? 'Administrator' : 'Operator';?>)</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <?php
              $menu=getAll('default_menu',array('id_parents'=>'where/0','sort'=>'order/asc'))->result();
              $idp=GetValue('id_parents','default_menu',array('filez'=>'where/'.$this->uri->segment(1).'/'.$this->uri->segment(2)));
            ?>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <?php
		              foreach($menu as $isi){
				            // $isi->filez=str_replace('base_url()',base_url('admin/'),$isi->filez);
				            $id_user=$this->session->userdata('user_id');
		                if(GetValue('view','users_permission',array('menu_id'=>'where/'.$isi->id,'user_id'=>'where/'.$id_user))=='1'){?>
			                <li>
                        <a href="<?php echo base_url('admin/').$isi->filez ?>">
                          <i class="<?php echo $isi->icon?>"></i> 
                          <?php echo $isi->title ?><?php if($isi->filez=='#'){?><span class="fa fa-chevron-down"></span><?php }?>
                        </a>
		                    <?php if($isi->filez=='#'){?>
                          <ul class="nav child_menu">
                            <?php 
                              $submenu=getAll('menu',array('is_active'=>'where/Active', 'id_parents'=>'where/'.$isi->id,'sort'=>'order/asc'))->result();
                              foreach ($submenu as $sb){
                                if(GetValue('view','users_permission',array('menu_id'=>'where/'.$sb->id,'user_id'=>'where/'.$id_user))=='1'){?>
                                  <li>
                                    <a href="<?php echo base_url('admin/').$sb->filez ?>">
                                      <i class="<?php echo $sb->icon?>"></i> <?php echo $sb->title ?>
                                    </a>
                                  </li>    
                                <?php 
                                }
                              }
                            ?>
                          </ul>
                        <?php }	?>
                      </li>
                    <?php 
                    }
                    ?>
                  <?php
                  }
                  ?>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="User Guide" href="<?=base_url('user_guide')?>">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="toggleFullScreen()">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <!-- <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a> -->
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?=base_url('auth/login/do_logout')?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
