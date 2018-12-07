<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><?='Berita'?></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Berita</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <div class="row">
                <a href="<?=base_url('admin/berita/add')?>">
                  <button type="button"  title="Tambah Berita Baru" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Berita Baru </button>
                </a>
              </div>
              <table border="0" class="table table-bordered" id="datatable">    
                <thead>
                  <tr>
                    <!-- <th width="1%"><div></div></th> -->
                    <th width="10%"><a href="#">Tanggal</a></th>
                    <th width="50%"><a href="#">Judul</a></th>
                    <th width="15%"><a href="#">Ditulis Oleh</a></th>
                    <th width="10%"><a href="#">Status</th>
                    <th width="15%"><a href="#">#</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($list as $r){
                    $author = getValue('username', 'users_login', array('id'=> 'where/'.$r->author_id));
                  ?>
                  <tr>
                    <td class="text-center"><?=date('Y-m-d',$r->created_on)?></td>
                    <td><?=$r->title?></td>
                    <td><?=(!empty($author)) ? $author : 'Riswanto' ?></td>
                    <td class="text-center"><?=$r->status?></td>
                    <td class="text-center">
                      <a href="<?=base_url('admin/berita/edit/'.$r->id)?>"><button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</button></a> |
                      <button class="btn btn-danger btn-xs" type="button" onclick="hapus('<?=$r->id?>')"><i class="fa fa-remove"></i> Hapus</button> 
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
