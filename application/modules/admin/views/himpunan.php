 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Himpunan Perundangan</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Himpunan Perundangan</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <div class="row">
                <a href="<?=base_url('admin/himpunan_add')?>">
                  <button type="button"  title="Tambah Produk Hukum" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Himpunan Perundangan Baru </button>
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
                    <th class="2%">Status</a></th>
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
                  <td style="text-align:center" valign="top"><?=$entry->active?></td>
                  <td style="text-align:center" valign="top">
                    <?php if( $entry->active == 1 ): ?>
                      <?php //anchor('produkhukum/listings/details/' .$entry->entry_id, 'status', 'target="_blank"') . ' | '; ?>
                    <?php endif; ?>
                    <a href="<?=base_url('admin/produkhukum_edit/'.$entry->entry_id)?>">
                      <button type="button"  title="Tambah Produk Hukum" class="btn btn-success btn-xs"> <i class="fa fa-pencil"></i> Ubah </button>
                    </a> | 
                    <a href="<?=base_url('admin/produkhukum_add')?>">
                      <button type="button"  title="Tambah Produk Hukum" class="btn btn-danger btn-xs"> <i class="fa fa-close"></i> Hapus </button>
                    </a>
                  
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