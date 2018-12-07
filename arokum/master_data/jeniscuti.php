        <h4 style='padding-top:15px'>Semua Data </h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class='btn btn-primary' href='' data-toggle="modal" data-target="#tambahjeniscuti"><i class='fa fa-plus'></i> Tambahkan Data Baru</a>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead class='alert-info'>
                    <tr>
                        <th width='50px'>No</th>
                        <th>Nama Cuti</th>
                        <th>Jumlah Cuti</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $jnscti = mysql_query("SELECT * FROM jeniscuti ORDER BY id_jeniscuti ASC");
                        $no = 1;
                        while ($i = mysql_fetch_array($jnscti)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[nama_cuti]</td>
                                    <td>$i[jml_cuti]</td>
                                    <td style='width:70px'><center>
                                       <a class='open-AddBookDialog' data-id='$i[id_jeniscuti]' data-id1='$i[nama_cuti]' data-id2='$i[jml_cuti]' style='margin-right:10px' data-toggle='modal' href='#' data-target='#editjeniscuti' title='Edit Data ini'><i class='fa fa-pencil-square-o'></i></a>
	                                   <a href='index.php?page=jeniscuti&delete=$i[id_jeniscuti]' title='Hapus Data ini' onclick=\"return confirm('Apakah anda Yakin Data ini Dihapus?')\" ><i class='fa fa-trash-o'></i></a>

                                    </center></td>
                                 </tr>";
                            $no++;
                        }
                    ?>

                    </tbody>


                    </table>
                </div>
            </div>
            </div>
            <!-- /Basic Data Tables Example --> 

<?php 
    if (isset($_POST[simpan])){
        mysql_query("INSERT INTO jeniscuti VALUES('','$_POST[a]','$_POST[b]')");
           echo "<script>window.alert('Sukses Menambahkan Data Jenis Cuti.');
                                window.location='jeniscuti'</script>";
    }

    if (isset($_POST[update])){
        mysql_query("UPDATE jeniscuti SET nama_cuti        = '$_POST[a]',
                                               jml_cuti    = '$_POST[b]' where id_jeniscuti='$_POST[id]'");
            echo "<script>window.location='jeniscuti';</script>";
    }

    if (isset($_GET[delete])){
        mysql_query("DELETE FROM jeniscuti where id_jeniscuti='$_GET[delete]'");
        echo "<script>window.location='jeniscuti';</script>";
    }
?>
<div class="modal fade" id="tambahjeniscuti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Jenis Cuti</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="jeniscuti" method='POST'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Cuti</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="a" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Jumlah Cuti</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="b" required>
                  </div>
                </div>
                
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='simpan' class="btn btn-info btn-sm">Tambahkan</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Tutup</span></button>
          </div>
          </form>
        </div>
      </div>
</div>

<div class="modal fade" id="editjeniscuti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Jenis Cuti</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="jeniscuti" method='POST'>
                <input type="hidden" name='id' id='bookId'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Cuti</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="a" id='bookId1' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Jumlah Cuti</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="b" id='bookId2' required>
                  </div>
                </div>
                
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='update' class="btn btn-info btn-sm">Update</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Tutup</span></button>
          </div>
          </form>
        </div>
      </div>
</div>

             <footer id="footer"> 
                <div class="text-center clearfix">
                    <p><small>&copy 2015 - Develop by Riyan - www.fatazaid.com</small>
                        <br /><br /> 
                        <a href="https://twitter.com/fatazaid" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a> 
                        <a href="https://web.facebook.com/fatazaid" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="https://plus.google.com/106633506064864167239/posts" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a> 
                    </p> 
                </div> 
            </footer>