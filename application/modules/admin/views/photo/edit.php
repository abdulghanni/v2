<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Slider Image</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Pengaturan Slider Imager</h2>
            <div class="clearfix"></div>
            <a href="<?=base_url('admin/img_slider_add')?>"><button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Gambar</button></a>
          </div><br/>
          <div class="x_content">
              <div class="row">
                <div class="col-md-12">
                  <?php foreach($photo as $r){?>
                    <div class="col-md-4">
                      <button class="btn btn-xs btn-danger" type="button" onclick="deleteImg('<?=$r->photo?>')"><i class="fa fa-remove"></i> Hapus Gambar</button><br/>
                      <img height="300px" width="100%" src="<?=base_url('uploads/server/default/photos/').$r->photo?>">
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
<!-- /page content -->
<script type="text/javascript">
  function deleteImg(img_name){
    if(confirm("Apakah anda yakin ingin menghapus gambar ini ?")){
      
      $.ajax({
        url:"<?=base_url()?>admin/delete_img",
        type: "POST",
        data: "img_name="+img_name,
        success: function(data){
          alert("Gambar berhasil dihapus..");
          location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
          alert("Error, Silakan coba lagi");
        }
      });

    }
  }
</script>