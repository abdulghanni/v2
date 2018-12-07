 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Photo Activity</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Photo List</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <div class="row">
                <a href="<?=base_url('admin/produkhukum_add')?>">
                  <button type="button"  title="Tambah Produk Hukum" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Album Photo Baru </button>
                </a>
              </div>
              <table border="0" class="table table-bordered" id="datatable">    
                <thead>
                  <tr>
                    <th width="10%"><a href="#">Thumbnail</a></th>
                    <th width="20%"><a href="#">Title</a></th>
                    <th width="15%"><a href="#">Category</a></th>
                    <!-- <th width="15%"><a href="#">Total Photo</a></th> -->
                    <th width="10%"><a href="#">Last Update</th>
                    <th width="8%"><span>Action</span></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach( $albums as $album ): ?>
                <tr>
                    <td><a href="<?=base_url('admin/photo_edit/'.$album->id)?>"><img height="150px" width="250px" src="<?=base_url().'uploads/server/default/photos/'.$album->thumbnail?>"></a></td>
                    <td><?php echo $album->title; ?></td>
                  <td><?php echo $album->category; ?></td>
                    <!-- <td><?php echo $album->total_photo; ?></td> -->
                    <td><?php echo date('d-M-Y', $album->updated_on); ?></td>
                    <td>
                      <?php //echo
                     //  anchor('photo_activity/' . $album->slug, lang('photos.view_label'), 'target="_blank"') . ' | ' .
                     //  anchor('admin/photo_activity/manage/' . $album->id, lang('photos.manage_label')) . ' | ' .
                     // anchor('admin/photo_activity/editalbum/' . $album->id, lang('photos.edit_label')) . ' | ' .
                     //  anchor('admin/photo_activity/deletealbum/' . $album->id, lang('photos.delete_label'), array('class'=>'confirm')); ?>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
              </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<script type="text/javascript">
  $("#datatable").dataTable();
</script>