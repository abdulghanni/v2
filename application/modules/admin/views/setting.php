 <!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Pengaturan</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Pengaturan Pengguna</h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <div class="row">
                <a href="<?=base_url('admin/user_add')?>">
                  <button type="button"  title="Tambah Produk Hukum" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Pengguna Baru </button>
                </a>
              </div>
              <table border="0" class="table table-bordered" id="datatable">    
                <thead>
                  <tr>
                    <th width="30%"><a href="#">Username</a></th>
                    <th width="40%"><a href="#">Email</a></th>
                    <th width="20%"><a href="#">Otoritas</a></th>
                    <th class="8%"><span>Action</span></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($data as $r): ?>
                <tr>
                  <td><?=$r->username?></td>
                  <td><?=$r->email?></td>
                  <td><?=($r->group_id == 1) ? 'Administrator' : 'Operator'?></td>
                  <td style="text-align:center" valign="top">
                    <a href="<?=base_url('admin/user_edit/'.$r->id)?>">
                      <button type="button"  title="Ubah Data User" class="btn btn-success btn-xs"> <i class="fa fa-pencil"></i> Ubah </button>
                    </a> | 
                      <button type="button"  title="Hapus Data User" class="btn btn-danger btn-xs" onclick="doDelete('<?=$r->id?>')"> <i class="fa fa-close"></i> Hapus </button>
                  
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
  function doDelete(id){
    if(confirm("Apakah anda yakin ingin menghapus user ini ?")){
      $.ajax({
        url : "<?=base_url()?>admin/user_delete/"+id,
        success: function(data){
          alert("Hapus User Berhasil");
          location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown){
          alert("Terjadi Kesalahan, Silakan Coba Lagi");
        }
      });
    }
  }
</script>