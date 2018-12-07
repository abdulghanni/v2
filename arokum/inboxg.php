 <?php 
    if ($_GET[aksi]==''){
?>
        <h4 style='padding-top:15px'>Semua Data Perbal</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php if ($_SESSION[level]=='user_admin'){ ?>
                        <a class='btn btn-primary' href='index.php?page=inboxg&aksi=tambah'><i class='fa fa-plus'></i> Tambah Data Perbal</a>
                        <a class='btn btn-info' target='BLANK' href='print_perbal.php'><i class='fa fa-print'></i> Print Data Perbal</a>
                        <a class='btn btn-success' href='perbal_exel.php'><i class='fa fa-file'></i> Export ke Excel</a>
                    <?php }elseif ($_SESSION[level]=='user_input'){ ?>
                        <a class='btn btn-primary' href='index.php?page=inboxg&aksi=tambah'><i class='fa fa-plus'></i> Tambah Data Perbal</a>
                          <a class='btn btn-info' target='BLANK' href='print_perbal.php'><i class='fa fa-print'></i> Print Data Perbal</a>
                        <a class='btn btn-success' href='perbal_exel.php'><i class='fa fa-file'></i> Export ke Excel</a>
                    <?php } ?>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead  class='alert-success'>
                    <tr>
                        <th>No</th>
                        <th>No Perbal</th>
                        <th>Tgl Masuk</th>
                        <th>Asal</th>
                        <th>Perihal</th>
                        <th>Bagian</th>
                        <th>Disp Kabag</th>
                        <th>Keterangan</th>
                         <th>Unit</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                      
                        $perbal = mysql_query("SELECT * FROM perbal a JOIN bagian b ON a.id_bagian=b.id_bagian ORDER BY a perbal_id ASC");
						
                    
                        $no = 1;
                        while ($i = mysql_fetch_array($perbal)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[no_perbal]</td>
                                    <td>$i[tgl_masuk]</td>
                                    <td>$i[asal]</td>
									<td>$i[perihal]</td>
                                    <td>$i[id_bagian]</td>
                                    <td>$i[disp_kabag]</td>
									
                                    <td>$i[keterangan]</td>
									<td>$i[unit_kerja]</td>";					                                        if ($_SESSION[level]=='user_admin'){ 
                                            echo "<td style='width:165px' class='text-right'><a class='btn' href='index.php?page=inboxg&aksi=detail&id=$i[perbal_id]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>
                                                  <a class='btn' target='BLANK' href='print_perbal_satu.php?id=$i[perbal_id]' title='Print Surat ini'><i class='fa fa-print'></i></a>
                                                  <a class='btn' href='index.php?page=inboxg&aksi=edit&id=$i[perbal_id]' title='Edit Data Surat ini'><i class='fa fa-pencil-square-o'></i></a>
                                                  <a class='btn' href='index.php?page=inboxg&aksi=hapus&id=$i[perbal_id]' title='Hapus Surat ini' onclick=\"return confirm('Apakah anda Yakin Data ini Dihapus?')\"><i class='fa fa-trash-o'></i></a>";
                                        }elseif ($_SESSION[level]=='user_input'){ 
                                            echo "<td style='width:90px' class='text-right'><a class='btn' href='index.php?page=inboxg&aksi=detail&id=$i[perbal_id]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>
                                                  <a class='btn' href='index.php?page=inboxg&aksi=edit&id=$i[perbal_id]' title='Edit Data Surat ini'><i class='fa fa-pencil-square-o'></i></a>";
                                        }else{
                                            echo "<td style='width:50px' class='text-right'><a class='btn' href='index.php?page=inboxg&aksi=detail&id=$i[perbal_id]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>";
                                        }
                                    echo "</td>
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
}elseif ($_GET[aksi]=='hapus'){ 
    mysql_query("DELETE FROM perbal where perbal_id='$_GET[id]'");
    echo "<script>window.alert('Data Surat Keluar Berhasil Di Hapus.');
                                window.location='inboxg'</script>";

}elseif ($_GET[aksi]=='tambah'){ 
    if (isset($_POST[simpan])){
        if ($_SESSION[unit] == '0'){
            $unit = $_POST[unit];
        }else{
            $unit = $_SESSION[unit];
        }
        $dir_gambar = 'surat_perkara/';
            $filename = basename($_FILES['h']['name']);
            $uploadfile = $dir_gambar . $filename;
            $tanggaleks = date("Y-m-d H:i:s");
                if ($filename != ''){
                    if (move_uploaded_file($_FILES['h']['tmp_name'], $uploadfile)) {            
                         mysql_query("INSERT INTO perbal (no_perbal, 
                                                                  tgl_masuk, 
                                                                  asal, 
                                                                  perihal, 
                                                                  id_bagian, 
                                                                  disp_kabag, 
                                                                  
                                                                  keterangan,
                                                                  
                                                                  upload_file,
																  unit_kerja)           
                                                           VALUES('$_POST[a]',
                                                                  '$_POST[b]',
                                                                  '$_POST[c]',
                                                                  '$_POST[d]',
                                                                  '$e',
                                                                  '$_POST[f]',
                                                                  '$_POST[g]',
                                                                  
                                                                  '$filename',
																   '$unit')");
                                       
                        echo "<script>window.alert('Sukses Menambahkan Data perbal .');
                                window.location='inboxg'</script>";
                    }else{
                        echo "<script>window.alert('Gagal Menambahkan Data perbal.');
                                window.location='index.php?page=perbal&aksi=tambah'</script>";
                    }
                }else{
                       mysql_query("INSERT INTO perbal (no_perbal, 
                                                                  tgl_masuk, 
                                                                  asal, 
                                                                  perihal, 
                                                                  id_bagian, 
                                                                  disp_kabag, 
                                                                
                                                                  keterangan,
                                                                  
                                                                  upload_file,
																  unit_kerja)           
                                                           VALUES('$_POST[a]',
                                                                  '$_POST[b]',
                                                                  '$_POST[c]',
                                                                  '$_POST[d]',
                                                                  '$e',
                                                                  '$_POST[f]',
                                                                  '$_POST[g]',
                                                                  
                                                                  '$_POST[h]',
																  '$unit')");
                                       
                        echo "<script>window.alert('Sukses Menambahkan Data perbal .');
                                window.location='inboxg'</script>";
                }
    }
?>

                <h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><strong>Tambahkan Data perbal</strong></div>
                <div class="panel-body">
                    <form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>      

                    	<div class="form-group">
                            <label class="col-lg-2 control-label">No Perbal</label>
                            <div class="col-lg-2">
                                <input type="text" name="a" placeholder="" data-required="true" class="bg-focus form-control ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tgl Masuk</label>
                            <div class="col-lg-2">
                             <input type="text" name="b" placeholder="" data-required="true" class="bg-focus form-control ">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Asal</label>
                            <div class="col-lg-6">
                            <input type="text" name="c" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Perihal</label>
                            <div class="col-lg-6">
                            <input type="text" name="d" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Bagian</label>
                            <div class="col-lg-2">
                            <select name="e" class="form-control"> 
                    <option value='' selected>- Pilih -</option>
                      <?php $bag = mysql_query("SELECT * FROM bagian");
                        while ($r = mysql_fetch_array($bag)){
                          echo "<option value='$r[id_bagian]'>$r[bagian] - $r[keterangan]</option>";
                      } ?>
                    </select>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Disp Kabag</label>
                            <div class="col-lg-2">
                            <input type="text" name="f" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                     
                		<div class="form-group">
                        <label class="col-lg-2 control-label">Keterangan</label>
                            <div class="col-lg-6">
                            <input type="text" name="g" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Cari File</label>
                            <div class="col-lg-4">
                            <input type="file" name="h" title="Pilih File" class="btn-success btn-small"> 
                            </div>
                        </div>

                         <?php if ($_SESSION[unit] == '0'){ ?>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Unit Kerja</label>
                            <div class="col-lg-4">
                            <select name='unit' class="form-control">
                                <option value=''>- Pilih Unit Kerja -</option>
                                <option value='A'>Bankum</option>
                                <option value='A'>Dokumentasi</option>
                                <option value='A'>Perundangan</option>
                                <option value='A'>Yankum</option>
                                
                            </select>
                            </div>
                        </div>
                        <?php } ?>
                       

                        <div class="form-group">
                            <div class="col-lg-9 pull-right">    
                            <button type="submit" name='simpan' class="btn btn-info">Simpan Data</button>                  
                            <button type="reset" class="btn btn-default">Reset</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
<?php    
}elseif ($_GET[aksi]=='edit'){ 
    $e = mysql_fetch_array(mysql_query("SELECT * FROM perbal where perbal_id='$_GET[id]'"));
    if (isset($_POST[update])){
    	    $dir_gambar = 'perbal/';
            $filename = basename($_FILES['j']['name']);
            $uploadfile = $dir_gambar . $filename;
            $tanggaleks = date("Y-m-d H:i:s");
                if ($filename != ''){
                    if (move_uploaded_file($_FILES['j']['tmp_name'], $uploadfile)) {            
                        mysql_query("UPDATE perbal SET 	no_perbal   = '$_POST[a]',
                                             				 tgl_masuk    = '$_POST[b]',
                                             				 asal      = '$_POST[c]',
											  				
                                              				 perihal    = '$_POST[d]',
                                              				 disposisi     = '$_POST[e]',
											   				disp_kabag = '$_POST[f]',
                                               				
                                               				keterangan      = '$_POST[g]',
                                                            upload_file   = '$filename' where perbal_id='$_GET[id]'");
                                       
                        echo "<script>window.alert('Sukses Update Data perbal .');
                                window.location='inboxg'</script>";
                    }else{
                        echo "<script>window.alert('Gagal Update Data .');
                                window.location='inboxg'</script>";
                    }
                }else{
                       mysql_query("UPDATE perbal SET no_perbal   = '$_POST[a]',
                                             				 tgl_masuk   = '$_POST[b]',
                                             				 asal    	 = '$_POST[c]',
											  				perihal  	 = '$_POST[d]',
                                              				 disposisi    = '$_POST[e]',
                                              				 disp_kabag   = '$_POST[f]',
											   				
                                               				keterangan    = '$_POST[g]'
											   				where perbal_id='$_GET[id]'");
                                       
                        echo "<script>window.alert('Sukses Update Data perbal .');
                                window.location='inboxg'</script>";
                }
    }
?>

                <h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><strong>Edit Data perbal</strong></div>
                <div class="panel-body">
                    <form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>      

                        <div class="form-group">
                            <label class="col-lg-2 control-label">No Perbal</label>
                            <div class="col-lg-2">
                                <input type="text" name="a" placeholder="" data-required="true" class="bg-focus form-control " value="<?php echo $e[no_perbal]; ?>">
                            </div>
                        </div>

                        

                       
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tgl Masuk</label>
                            <div class="col-lg-2">
                             <input type="text" name="b" placeholder="" data-required="true" class="bg-focus form-control " value="<?php echo $e[tgl_masuk]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Asal</label>
                            <div class="col-lg-6">
                            <input type="text" name="c" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[asal]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Perihal</label>
                            <div class="col-lg-6">
                            <input type="text" name="d" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[perihal]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Disposisi</label>
                            <div class="col-lg-2">
                            <input type="text" name="e" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[disposisi]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Disp Kabag</label>
                            <div class="col-lg-2">
                            <input type="text" name="f" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[disp_kabag]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Keterangan</label>
                            <div class="col-lg-6">
                            <input type="text" name="g" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[keterangan]; ?>">
                            </div>
                        </div>

                      

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Ganti File</label>
                            <div class="col-lg-10">
                            <input type="file" name="h" title="Pilih File" class="btn-success btn-small"> 
                            </div>
                        </div>

                       


                        <div class="form-group">
                            <div class="col-lg-9 pull-right">    
                            <button type="submit" name='update' class="btn btn-info">Update Data</button>                  
                            <button type="reset" class="btn btn-default">Reset</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>   
<?php     
}elseif ($_GET[aksi]=='detail'){  
    $e = mysql_fetch_array(mysql_query("SELECT * FROM perbal where perbal_id='$_GET[id]'"));
    echo "<h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class='col-md-12'>
            <div class='panel panel-default'>
            <div class='panel-heading'><strong>Detail Data perbal</strong></div>
                <div class='panel-body'>
                    <form action='' class='form-horizontal' data-validate='parsley' enctype='multipart/form-data'>

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>No Perbal</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                $e[no_perbal]
                            </div>
                        </div>

                        

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Tgl Masuk</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[tgl_masuk]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Asal</label>
                        <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                          $e[asal]
                        </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Perihal</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[perihal]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Disposisi</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[disposisi]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Disp Kabag</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[disp_kabag]
                            </div>
                        </div>

                       

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Keterangan</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[keterangan]
                            </div>
                        </div>

                        

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>File Surat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                 <a href='download_perbal.php?file=$e[upload_file]'>Download File Surat</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>";
} 
?>
             <footer id="footer"> 
                <div class="text-center clearfix">
                    <p><small>&copy 2015 - Develop by Riyan - www.fatazaid.com</small>
                        <br /><br /> 
                        <a href="https://twitter.com/robbyprihandaya" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a> 
                        <a href="https://web.facebook.com/robbyprihandaya" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="https://plus.google.com/106633506064864167239/posts" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a> 
                    </p> 
                </div> 
            </footer>