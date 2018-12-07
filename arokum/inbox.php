<?php 
    if ($_GET[aksi]==''){
?>

        <h4 style='padding-top:15px'>Semua Data Surat Masuk</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<?php if ($_SESSION[level]=='user_admin'){ ?>
                    	<a class='btn btn-primary' href='index.php?page=inbox&aksi=tambah'><i class='fa fa-plus'></i> Tambah Surat Masuk</a>
                    	<a class='btn btn-info' target='BLANK' href='print_surat.php'><i class='fa fa-print'></i> Print Surat Masuk</a>
    					<a class='btn btn-success' href='inbox_excel.php'><i class='fa fa-file'></i> Export ke Excel</a>
                	<?php }elseif ($_SESSION[level]=='user_input'){ ?>
                		<a class='btn btn-primary' href='index.php?page=inbox&aksi=tambah'><i class='fa fa-plus'></i> Tambah Surat Masuk</a>
                        <a class='btn btn-info' target='BLANK' href='print_surat.php'><i class='fa fa-print'></i> Print Surat Masuk</a>
    					<a class='btn btn-success' href='inbox_excel.php'><i class='fa fa-file'></i> Export ke Excel</a>
                	<?php } ?>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead class='alert-info'>
                    <tr>
                        <th>No</th>
                        <th>No Agenda</th>
                        <th>Tanggal Masuk</th>
                        <th>Asal</th>
                        <th>No.Surat</th>
                        <th>Tgl Surat</th>
                        <th>Perihal</th>
                        <th>Disp Pimp</th>
                        <th>Disp Karo</th>
                        <th>Keterangan</th>
                        <th>Disp Kabag</th>
                        <th>Keterangan</th>
                         <th>Unit</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if ($_SESSION[unit] == '0'){
                        $inbox = mysql_query("SELECT * FROM surat ORDER BY surat_id ASC");
                    }else{
                        $inbox = mysql_query("SELECT * FROM surat where unit_kerja='$_SESSION[unit]' ORDER BY surat_id ASC");
                    }
                        $no = 1;
                        while ($i = mysql_fetch_array($inbox)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[no_agenda]</td>
                                    <td>$i[tgl_masuk]</td>
                                    <td>$i[asal]</td>
									<td>$i[no_surat]</td>
                                    <td>$i[tgl_surat]</td>
                                    <td>$i[perihal]</td>
                                    <td>$i[disp_pim]</td>
									<td>$i[disp_karo]</td>
                                    <td>$i[keterangan]</td>
                                    <td>$i[disp_kabag]</td>
                                    <td>$i[keterangan1]</td>
									<td>$i[unit_kerja]</td>";
                                    	if ($_SESSION[level]=='user_admin'){ 
	                                        echo "<td style='width:170px' class='text-right'><a class='btn' href='index.php?page=inbox&aksi=detail&id=$i[surat_id]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>
	                                        	  <a class='btn' target='BLANK' href='surat_print_satu.php?id=$i[surat_id]' title='Print Surat ini'><i class='fa fa-print'></i></a>
	                                       		  <a class='btn' href='index.php?page=inbox&aksi=edit&id=$i[surat_id]' title='Edit Data Surat ini'><i class='fa fa-pencil-square-o'></i></a>
	                                        	  <a class='btn' href='index.php?page=inbox&aksi=hapus&id=$i[surat_id]' title='Hapus Surat ini' onclick=\"return confirm('Apakah anda Yakin Data ini Dihapus?')\" ><i class='fa fa-trash-o'></i></a>";
                						}elseif ($_SESSION[level]=='user_input'){ 
                							echo "<td style='width:90px' class='text-right'><a class='btn' href='index.php?page=inbox&aksi=detail&id=$i[surat_id]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>
	                                       		  <a class='btn' href='index.php?page=inbox&aksi=edit&id=$i[surat_id]' title='Edit Data Surat ini'><i class='fa fa-pencil-square-o'></i></a>";
                						}else{
                							echo "<td style='width:50px' class='text-right'><a class='btn' href='index.php?page=inbox&aksi=detail&id=$i[surat_id]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>";
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
	mysql_query("DELETE FROM surat where surat_id='$_GET[id]'");
	echo "<script>window.alert('Data Surat Masuk Berhasil Di Hapus.');
                                window.location='inbox'</script>";

}elseif ($_GET[aksi]=='tambah'){ 
    if (isset($_POST[simpan])){
        if ($_SESSION[unit] == '0'){
            $unit = $_POST[unit];
        }else{
            $unit = $_SESSION[unit];
        }
            $dir_gambar = 'surat_masuk/';
            $filename = basename($_FILES['l']['name']);
            $uploadfile = $dir_gambar . $filename;
            $tanggaleks = date("Y-m-d H:i:s");
                if ($filename != ''){
                    if (move_uploaded_file($_FILES['l']['tmp_name'], $uploadfile)) {            
                        mysql_query("INSERT INTO surat (no_agenda, tgl_masuk, asal, no_surat, tgl_surat, perihal, disp_pim, disp_karo,keterangan,disp_kabag, keterangan1, upload_file,unit_kerja)           
                                        VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$_POST[i]','$_POST[j]','$_POST[k]','$filename','$unit')");
                        
                        echo "<script>window.alert('Sukses Menambahkan Data Surat Masuk.');
                                window.location='inbox'</script>";
                    }else{
                        echo "<script>window.alert('Gagal Menambahkan Data Surat Masuk.');
                                window.location='index.php?page=inbox&aksi=tambah'</script>";
                    }
                }else{
                        mysql_query("INSERT INTO surat (no_agenda, tgl_masuk, asal, no_surat, tgl_surat, perihal, disp_pim,disp_karo,keterangan,disp_kabag, keterangan1,unit_kerja)           
                                        VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$_POST[i]','$_POST[j]','$_POST[k]','$unit')");
                                     
                        echo "<script>window.alert('Sukses Menambahkan Data Surat Masuk .');
                                window.location='inbox'</script>";
                }
    }
?>

                <h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><strong>Tambahkan Data Surat Masuk</strong></div>
                <div class="panel-body">
                    <form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>      

                        <div class="form-group">
                        <label class="col-lg-2 control-label">No Agenda</label>
                            <div class="col-lg-2">
                     <input type="text" class="form-control" name="a" required>
                         
                            </div>
                        </div>

                       <div align="left">
                        <label class="col-lg-2 control-label">Tgl Masuk</label>
                        
                         <div class="input-group input-lg">
                         
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <input type="date" id="tgl_masuk" name="b" placeholder="Tgl Masuk" value="<?php echo $row['tgl_masuk']?>" class="form-control input-lg" required style="width: 10%;" />
                       
                        
                        </span>
                    </div>
                
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Asal</label>
                            <div class="col-lg-6">
                             <input type="text" class="form-control" name="c" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">No Surat</label>
                            <div class="col-lg-6">
                            <input type="text" class="form-control" name="d" required>
                            </div>
                        </div>

                        <div align="left">
                        <label class="col-lg-2 control-label">Tgl Surat</label>
                        
                         <div class="input-group input-lg">
                         
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <input type="date" id="tgl_surat" name="e" placeholder="Tgl Surat" value="<?php echo $row['tgl_surat']?>" class="form-control input-lg" required style="width: 10%;" />
                       
                        
                        </span>
                    </div>
                        
                        
                        
                        
 <div class="form-group">
                        <label class="col-lg-2 control-label">Perihal</label>
                            <div class="col-lg-6">
                            <textarea placeholder="" name='f' rows="2" class="textarea form-control" data-trigger="keyup"></textarea>
                            
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Disp Pim</label>
                            <div class="col-lg-6">
                            <input type="text" name="g" placeholder="" data-required="true" class="bg-focus form-control">
                            </div>
                        </div>
                
                            
                       
						<div align="left">
                        <label class="col-lg-2 control-label">Disp Karo</label>
                       
                        <div id="disp_karo" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-info <?php echo $row['disp_karo'] == 'Disp Karo' ? 'active':''; ?>">
                                <input type="radio" id="disp_karo" name="h" value="Dokumentasi"  <?php echo $row['disp_karo'] == 'Dokumentasi' ? 'checked':''; ?>> Dokumentasi
                            </label>
                            <label class="btn btn-info <?php echo $row['disp_karo'] == 'Bankum' ? 'active':''; ?>">
                                <input type="radio" id="disp_karo" name="h" value="Bankum" <?php echo $row['disp_karo'] == 'Bankum' ? 'checked':''; ?>> Bankum
                            </label>
                            <label class="btn btn-info <?php echo $row['disp_karo'] == 'Yankum' ? 'active':''; ?>">
                                <input type="radio" id="disp_karo" name="h" value="Yankum" <?php echo $row['disp_karo'] == 'Yankum' ? 'checked':''; ?>> Yankum 
                            </label> 
                             <label class="btn btn-info <?php echo $row['disp_karo'] == 'Perundangan' ? 'active':''; ?>">
                                <input type="radio" id="disp_karo" name="h" value="Perundagan" <?php echo $row['disp_karo'] == 'Perundangan' ? 'checked':''; ?>> Perundangan 
                            </label> 
                        </div>




                        <div class="form-group">
                        <br>
                            <label class="col-lg-2 control-label">Keterangan</label>
                            <div class="col-lg-6">
                            <textarea placeholder="" name='i' rows="2" class="form-control" data-trigger="keyup"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Disp Kabag</label>
                            <div class="col-lg-6">
                             <input type="text" name="j" placeholder="" data-required="true" class="bg-focus form-control">
                            </div>
                        </div>

<div class="form-group">
                            <label class="col-lg-2 control-label">Keterangan</label>
                            <div class="col-lg-6">
                            <textarea placeholder="" name='k' rows="2" class="form-control" data-trigger="keyup"></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                        <label class="col-lg-2 control-label">Cari File</label>
                            <div class="col-lg-10">
                            <input type="file" name="l" title="Pilih File" class="btn-success btn-small"> 
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
	$e = mysql_fetch_array(mysql_query("SELECT * FROM surat where surat_id='$_GET[id]'"));

    if (isset($_POST[update])){
            $dir_gambar = 'surat_masuk/';
            $filename = basename($_FILES['l']['name']);
            $uploadfile = $dir_gambar . $filename;
                if ($filename != ''){
                    if (move_uploaded_file($_FILES['l']['tmp_name'], $uploadfile)) {            
                        mysql_query("UPDATE surat SET no_agenda		 = '$_POST[a]',
															tgl_masuk		 = '$_POST[b]',
                                                            asal    = '$_POST[c]',
                                                            no_surat    = '$_POST[d]',
                        									
                        									tgl_surat		 = '$_POST[e]',
                        									perihal 		 = '$_POST[f]',
                                                            disp_pim    = '$_POST[g]',
                        									disp_karo 	= '$_POST[h]',
															keterangan     = '$_POST[i]',
															disp_kabag    ='$_POST[j]',
															keterangan1     = '$_POST[k]',
															upload_file='$filename' where surat_id='$_GET[id]'");
                        
                        echo "<script>window.alert('Sukses Update Data Surat Masuk.');
                                window.location='inbox'</script>";
                    }else{
                        echo "<script>window.alert('Gagal Update Data Surat Masuk.');
                                window.location='index.php?page=inbox&aksi=edit&id=$_GET[id]'</script>";
                    }
                }else{
                        mysql_query("UPDATE surat SET no_agenda		 = '$_POST[a]',
															tgl_masuk		 = '$_POST[b]',
                                                            asal    = '$_POST[c]',
                                                            no_surat    = '$_POST[d]',
                        									
                        									tgl_surat		 = '$_POST[e]',
                        									perihal 		 = '$_POST[f]',
                                                            disp_pim    = '$_POST[g]',
                        									disp_karo 	= '$_POST[h]',
															keterangan     = '$_POST[i]',
															disp_kabag    ='$_POST[j]',
															keterangan1     = '$_POST[k]'
															 where surat_id='$_GET[id]'");
                                       
                        echo "<script>window.alert('Sukses Update Data Surat Masuk .');
                                window.location='inbox'</script>";
                }
    }
?>

                <h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><strong>Edit Data Surat Masuk</strong></div>
                <div class="panel-body">
                    <form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>      

                        <div class="form-group">
                        <label class="col-lg-2 control-label">No Agenda</label>
                            <div class="col-lg-2">
                            <input type="text" name="a" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[no_agenda]; ?>">
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tgl Masuk</label>
                            <div class="col-lg-2">
                            <input type="text" name="b" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[tgl_masuk]; ?>">
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Asal</label>
                            <div class="col-lg-4">
                             <input type="text" name="c" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[asal]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">No Surat</label>
                            <div class="col-lg-2">
                              <input type="text" name="d" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[no_surat]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tgl Surat</label>
                            <div class="col-lg-2">
                              <input type="text" name="e" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[tgl_surat]; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                        <label class="col-lg-2 control-label">Perihal</label>
                            <div class="col-lg-6">
                            <textarea placeholder="" name='f' rows="2" class="textarea form-control" data-trigger="keyup"><?php echo $e[perihal]; ?></textarea>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Disp Pimp</label>
                            <div class="col-lg-6">
                            <input type="text" name="g" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[disp_pim]; ?>">
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Disp Karo</label>
                            <div class="col-lg-2">
                           <input type="text" name="h" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[disp_karo]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Keterangan</label>
                            <div class="col-lg-6">
                            <textarea placeholder="" name='i' rows="2" class="form-control" data-trigger="keyup"><?php echo $e[keterangan]; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Disp Kabag</label>
                            <div class="col-lg-2">
                           <input type="text" name="j" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[disp_kabag]; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Keterangan</label>
                            <div class="col-lg-6">
                            <textarea placeholder="" name='k' rows="2" class="form-control" data-trigger="keyup"><?php echo $e[keterangan1]; ?></textarea>
                            </div>
                        </div>

                        
                        
                        

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Ganti File</label>
                            <div class="col-lg-6">
                            <input type="file" name="l" title="Pilih File" class="btn-success btn-small"> 
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
	$in = mysql_fetch_array(mysql_query("SELECT * FROM surat where surat_id='$_GET[id]'"));
	echo "<h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class='col-md-12'>
            <div class='panel panel-default'>
            <div class='panel-heading'><strong>Detail Data Surat Masuk</strong></div>
                <div class='panel-body'>
                	<form action='' class='form-horizontal' data-validate='parsley' enctype='multipart/form-data'>
                
                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>No Agenda</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            	$in[no_agenda]
                            </div>
                        </div>

                      

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Tgl Masuk</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                $in[tgl_masuk]
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>asal</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                $in[asal]
                            </div>
                        </div>
                
                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>no_surat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                           		 $in[no_surat] <br><br>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>tgl_surat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                 $in[tgl_surat] <br><br>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Perihal</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                 $in[perihal] <br><br>
                            </div>
                        </div>
						
						
                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Disp Pim</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                $in[disp_pim]
                            </div>
                        </div>
                
                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Disp Karo</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                           		 $in[disp_karo] <br><br>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Keterangan</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                 $in[keterangan] <br><br>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Disp Kabag</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                 $in[disp_kabag] <br><br>
                            </div>
                        </div>
						
						<div class='form-group'>
                            <label class='col-lg-2 control-label'>Keterangan</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                 $in[keterangan1] <br><br>
                            </div>
                        </div>


                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>File Surat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                <a href='download_surat.php?file=$in[upload_file]'>Download File Surat</a>
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
                    <p><small>&copy 2017 - Develop by Riyan - www.fatazaid.com</small>
                        <br /><br /> 
                        <a href="https://twitter.com/robbyprihandaya" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a> 
                        <a href="https://web.facebook.com/robbyprihandaya" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="https://plus.google.com/106633506064864167239/posts" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a> 
                    </p> 
                </div> 
            </footer>