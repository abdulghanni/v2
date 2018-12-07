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
              <div class="row">
                <a href="<?=base_url('admin/produkhukum_add')?>">
                  <button type="button"  title="Tambah Produk Hukum" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Produk Hukum Baru </button>
                </a>
              </div>
              <table border="0" class="table table-bordered" id="datatable">    
                <thead>
                  <tr>
                    <th width="1%"><div></div></th>
                    <th width="10%"><a href="#">Tanggal</a></th>
                    <th width="15%"><a href="#">Title</a></th>
                    <th width="15%"><a href="#">Jenis Perundangan</a></th>
                    <th width="39%"><a href="#">Tentang</th>
                    <th width="39%"><a href="#">Riwayat</th>
                    <th class="2%">Status</a></th>
                    <?php if(sessGroup() == 1){?><th class="10%">Dientry Oleh</a></th><?php } ?>
                    <th class="8%"><span>Action</span></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($entries as $entry): ?>
                <tr>
                  <td style="text-align:center"><input type="checkbox" name="action_to[]" value="<?=$entry->entry_id;?>" /></td>
                  <td valign="top"><?=$entry->date_added?></td>
                  <td valign="top"><?=$entry->c_description?> <br>No. <?=$entry->title?> <br>Tahun <?=$entry->regyear?></td>
                  <td><?=$entry->c_description?></td>
                  <td><?=$entry->e_description?></td>
                  <td><?=$entry->e_riwayat?></td>
                  <td style="text-align:center" valign="top"><?=($entry->active == 0) ? 'Aktif' : 'Tidak Aktif'?></td>
                  <?php if(sessGroup() == 1){?><td><?=getValue('username', 'default_users_login', array('id'=>'where/'.$entry->FK_user_id));?></td><?php } ?>
                  <td style="text-align:center" valign="top">
                    <?php if( $entry->active == 1 ): ?>
                      <?php //anchor('produkhukum/listings/details/' .$entry->entry_id, 'status', 'target="_blank"') . ' | '; ?>
                    <?php endif; ?>
                    <a href="<?=base_url('admin/produkhukum_edit/'.$entry->entry_id)?>">
                      <button type="button"  title="Tambah Produk Hukum" class="btn btn-success btn-xs"> <i class="fa fa-pencil"></i> Ubah </button>
                    </a> | 
                    <a href="<?=base_url('admin/produkhukum_set_active/'.$entry->active.'/'.$entry->entry_id)?>">
                      <button type="button"  title="Tambah Produk Hukum" class="btn btn-danger btn-xs"> <i class="fa fa-close"></i> <?=($entry->active == 0) ? 'Nonaktifkan' : 'Aktifkan'?> </button>
                    </a> |
                    <?php if(sessGroup() == 1){?>
                    <a href="<?=base_url('admin/delete_prokum'.'/'.$entry->entry_id)?>">
                      <button type="button"  title="Tambah Produk Hukum" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Hapus </button>
                    </a> |
                    <?php } ?>
                  
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