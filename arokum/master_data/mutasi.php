        <h4 style='padding-top:15px'>Semua Data Mutasi</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class='btn btn-primary' href='' data-toggle="modal" data-target="#tambahmutasi"><i class='fa fa-plus'></i> Tambahkan Data Baru</a>
                    <a class='btn btn-success' href='mutasi_excel.php'><i class='fa fa-file'></i> Export ke Excel</a>
                </div>
              
                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead class='alert-info'>
                    <tr>
                        <th width='50px'>No</th>
                         <th>Nama</th>
                        <th>Nip</th>
                        <th>Pangkat/Gol</th>
                      
                        <th>TMT Golongan</th>
                        <th>Jabatan</th>
                        <th>Masa Kerja</th>
                        <th>Pendidikan</th>
                        <th>Catatan Mutasi</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $mutasi = mysql_query("SELECT * FROM mutasi ORDER BY id_mutasi ASC");
                        $no = 1;
                        while ($i = mysql_fetch_array($mutasi)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[nama]</td>
                                    <td>$i[nip]</td>
                                    <td>$i[pangkat]</td>
									 <td>$i[tgl_tmt]</td>
									<td>$i[jabatan]</td>
                                   
                                    <td>$i[masa_kerja]</td>
									<td>$i[pendidikan]</td>
                                    <td>$i[catatan_mutasi]</td>
                                    <td style='width:70px'><center>
                                       <a class='open-AddBookDialog' data-id='$i[id_mutasi]' data-id1='$i[nama]' data-id2='$i[nip]' data-id3='$i[pangkat]' data-id4='$i[jabatan]' data-id5='$i[tgl_tmt]'data-id6='$i[masa_kerja]' data-id7='$i[pendidikan]' data-id8='$i[catatan_mutasi]'  style='margin-right:10px' data-toggle='modal' href='#' data-target='#editmutasi' title='Edit Data ini'><i class='fa fa-pencil-square-o'></i></a>
	                                   <a href='index.php?page=mutasi&delete=$i[id_mutasi]' title='Hapus Data ini' onclick=\"return confirm('Apakah anda Yakin Data ini Dihapus?')\" ><i class='fa fa-trash-o'></i></a>
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
		
        mysql_query("INSERT INTO mutasi VALUES('','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]')");
             echo "<script>window.alert('Sukses Menambahkan Data Mutasi.');
                                window.location='mutasi'</script>";
    }

    if (isset($_POST[update])){
		$tgl_tmt = $_POST[tc]."-".$_POST[tb]."-".$_POST[ta];
        mysql_query("UPDATE mutasi SET nama = '$_POST[a]',
										                   nip   = '$_POST[b]',
                                      pangkat      = '$_POST[c]',
													              jabatan    = '$_POST[d]',
                                        tgl_tmt     = '$_POST[e]',
													            
													             masa_kerja    = '$_POST[f]',
                                      pendidikan      = '$_POST[g]',
										
										
													 catatan_mutasi     = '$_POST[h]'
													 where id_mutasi='$_POST[id]'");
				
     
            echo "<script>window.location='mutasi';</script>";
    }

    if (isset($_GET[delete])){
        mysql_query("DELETE FROM mutasi where id_mutasi='$_GET[delete]'");
        echo "<script>window.location='mutasi';</script>";
    }
?>
<div class="modal fade" id="tambahmutasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Data Mutasi</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="mutasi" method='POST'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="a" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">NIP/NRK</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="b" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Pangkat</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c" required>
                  </div>
                </div>
                
               

               
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Jabatan</label>
                                <div class="col-sm-8">
                    <input type="text" class="form-control" name="d" required>
                  </div>
                </div>
                
                  <div class="form-group">
                  <label class="col-sm-3 control-label">TMT</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="e" required>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Masa Kerja</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="f" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Pendidikan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="g" required>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Catatan Mutasi</label>
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

<div class="modal fade" id="editmutasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Mutasi</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="mutasi" method='POST'>
                <input type="hidden" name='id' id='bookId'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="a" id='bookId1' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Nip</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="b" id='bookId2' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Pangkat</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c" id='bookId3' required>
                  </div>
                </div>
                
                

                <div class="form-group">
                  <label class="col-sm-3 control-label">Jabatan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="d" id='bookId4' required>
                  </div>
                </div>


 				<div class="form-group">
                  <label class="col-sm-3 control-label">TMT</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="e" id='bookId5' required>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Masa Kerja</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="f" id='bookId6' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Pendidikan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="g" id='bookId7' required>
                  </div>
                </div>
                
               <div class="form-group">
                  <label class="col-sm-3 control-label">Catatan Mutasi</label>
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