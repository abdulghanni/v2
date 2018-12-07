 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Perjanjian Kerjasama</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Perjanjian Kerjasama</h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <div class="row">
                <a href="<?=base_url('admin/perjanjian/add')?>">
                  <button type="button"  title="Tambah Produk Hukum" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Perjanjian Baru </button>
                </a>
              </div>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Deskripsi</th>
                    <th>File</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;foreach($data as $r){?>
                    <tr>
                      <td><?=$i++?></td>
                      <td><?=$r->description?></td>
                      <td><?=$r->url?></td>
                      <td>
                        <button class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Ubah</button>|
                        <button class="btn btn-xs btn-danger"><i class="fa fa-remove"></i> Hapus</button> 
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->