        <h4 style='padding-top:15px'>Semua Data Cuti</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class='btn btn-primary' href='' data-toggle="modal" data-target="#tambahcuti"><i class='fa fa-plus'></i> Tambahkan Data Baru</a>
                    <a class='btn btn-success' href='cuti_excel.php'><i class='fa fa-file'></i> Export ke Excel</a>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead class='alert-info'>
                    <tr>
                        <th width='50px'>No</th>
                         <th>Nomor Cuti</th>
                        <th>Nama</th>
                        <th>NIP/NRK</th>
                        <th>Pangkat</th>
                        <th>Jabatan</th>
                        <th>Jenis Cuti</th>
                        <th>Jumlah Cuti Diambil</th>
                         <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $cuti = mysql_query("SELECT * FROM cuti a JOIN jeniscuti b ON a. id_jeniscuti=b.id_jeniscuti ORDER BY a.id_cuti ASC");
                        $no = 1;
                        while ($i = mysql_fetch_array($cuti)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[nomor]</td>
                                    <td>$i[nama]</td>
                                    <td>$i[nip]</td>
									<td>$i[pangkat]</td>
                                    <td>$i[jabatan]</td>
                                    <td>$i[nama_cuti]</td>
									<td>$i[jml_diambil]</td>
                                    <td>$i[keterangan]</td>
                                    <td style='width:70px'><center>
                                       <a class='open-AddBookDialog' data-id='$i[id_cuti]' data-id1='$i[nomor]' data-id2='$i[nama]' data-id3='$i[nip]' data-id4='$i[pangkat]' data-id5='$i[jabatan]'data-id6='$i[id_jeniscuti]' data-id7='$i[jml_diambil]' data-id8='$i[keterangan]'  style='margin-right:10px' data-toggle='modal' href='#' data-target='#editcuti' title='Edit Data ini'><i class='fa fa-pencil-square-o'></i></a>
	                               
									   
									   <a href='index.php?page=cuti&delete=$i[id_cuti]' title='Hapus Data ini' onclick=\"return confirm('Apakah anda Yakin Data ini Dihapus?')\" ><i class='fa fa-trash-o'></i></a>
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
		 
        mysql_query("INSERT INTO cuti VALUES('','$_POST[f]','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]',
		'$_POST[g]','$_POST[h]')");
            //echo "<script>document.location='cuti.mu';</script>";
            echo "<script>window.alert('Sukses Menambahkan Data  Cuti.');
                                window.location='cuti'</script>";
    }

    if (isset($_POST[update])){
		if ($_POST[f]==''){ $f = $_POST[ff]; }else{ $f = $_POST[f]; }
        mysql_query("UPDATE cuti SET nomor = '$_POST[a]',
										   nama   = '$_POST[b]',
                                                    nip      = '$_POST[c]',
													pangkat   = '$_POST[d]',
                                                    jabatan     = '$_POST[e]',
													id_jeniscuti    = '$f',
                                                    jml_diambil      = '$_POST[g]',
										
										
													 keterangan     = '$_POST[h]'
													 where id_cuti='$_POST[id]'");
				
     
            //echo "<script>document.location='cuti.mu';</script>";
             echo "<script>window.location='cuti';</script>";
    }

    if (isset($_GET[delete])){
        mysql_query("DELETE FROM cuti where id_cuti='$_GET[delete]'");
        //echo "<script>document.location='cuti.mu';</script>";
        echo "<script>window.location='cuti';</script>";
    }
?>
<div class="modal fade" id="tambahcuti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Data Cuti</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="cuti" method='POST'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">No Cuti</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="a" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="b" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">NIP/NRK</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c" required>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Pangkat/Golongan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="d" required>
                  </div>
                </div>

               
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Jabatan</label>
                                  <div class="col-sm-8">
                                 <input type="text" class="form-control" name="e" required>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Jenis Cuti</label>
                 
                   <div class="col-sm-5">
                    <select name="f" class="form-control"> 
                    <option value='' selected>- Pilih -</option>
                      <?php $cti = mysql_query("SELECT * FROM jeniscuti");
                        while ($r = mysql_fetch_array($cti)){
                 echo "<option value='$r[id_jeniscuti]'>$r[nama_cuti] - $r[jml_cuti]</option>";
                      } ?>
                    </select>
                  </div>
                </div>
                <!--
                -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jumlah Cuti Diambil</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="g" required>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="h" required>
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

<div class="modal fade" id="editcuti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Cuti</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="cuti" method='POST'>
                <input type="hidden" name='id' id='bookId'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">No Cuti</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="a" id='bookId1' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="b" id='bookId2' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">NIP/NRK</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c" id='bookId3' required>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Pangkat</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="d" id='bookId4' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Jabatan</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="e" id='bookId5' required>
                  </div>
                </div>
                           
                
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Jenis Cuti</label>
                  <div class="col-sm-8">
                   <input type="hidden" class="form-control" name="ff" id='bookId6' required>
                    <select class="col-sm-5" style='pull-left' name="f" class="form-control"> 
                    <option value='' selected>- Pilih -</option>
                      <?php $cti = mysql_query("SELECT * FROM jeniscuti");
                        while ($r = mysql_fetch_array($cti)){
                          echo "<option value='$r[id_jeniscuti]'>$r[nama_cuti] - $r[jml_cuti]</option>";
                      } ?>
                    </select>
    <input style='margin-left:5px' class="col-sm-2" type="text" class="form-control" id='bookId6' readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Jumlah Cuti Diambil</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="g" id='bookId7' required>
                  </div>
                </div>
                
               <div class="form-group">
                  <label class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="h" id='bookId8' required>
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
                    <p><small>&copy 2017 - Develop by Riyan - www.fatazaid.com</small>
                        <br /><br /> 
                        <a href="https://twitter.com/riyan" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a> 
                        <a href="https://web.facebook.com/riyan" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="https://plus.google.com/106633506064864167239/posts" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a> 
                    </p> 
                </div> 
            </footer>