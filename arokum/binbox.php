<?php 
    if ($_GET[aksi]==''){
?>
        <h4 style='padding-top:15px'>Semua Data Undangan</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<?php if ($_SESSION[level]=='user_admin'){ ?>
                    	<a class='btn btn-primary' href='index.php?page=binbox&aksi=tambah'><i class='fa fa-plus'></i> Tambah Undangan</a>
                    	<a class='btn btn-info' target='BLANK' href='print_undangan.php'><i class='fa fa-print'></i> Print Undangan</a>
    					<a class='btn btn-success' href='undangan_excel.php'><i class='fa fa-file'></i> Export ke Excel</a>
                	<?php }elseif ($_SESSION[level]=='user_input'){ ?>
                		<a class='btn btn-primary' href='index.php?page=binbox&aksi=tambah'><i class='fa fa-plus'></i> Tambah Undangan</a>
                        <a class='btn btn-info' target='BLANK' href='print_undangan.php'><i class='fa fa-print'></i> Print Undangan</a>
    					<a class='btn btn-success' href='undangan_excel.php'><i class='fa fa-file'></i> Export ke Excel</a>
                	<?php } ?>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead class='alert-info'>
                    <tr>
                        <th width='50px'>No</th>
                        <th>Tgl Masuk</th>
                        <th>Asal</th>
                         <th>Perihal</th>
                        <th>Hari</th>
                         <th>Tempat</th>
                        <th>Pukul</th>
                         <th>Disposisi</th>
                        <th>Disp Kabag</th>
                        <th>Keterangan</th>
                        <th>Unit</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if ($_SESSION[unit]=='0'){
                            $undangan = mysql_query("SELECT * FROM undangan ORDER BY undangan_id ASC");
                        }else{
                            $undangan = mysql_query("SELECT * FROM undangan where unit_kerja='$_SESSION[unit]' ORDER BY undangan_id ASC");
                        }
                        $no = 1;
                        while ($i = mysql_fetch_array($undangan)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[tgl_masuk]</td>
                                    <td>$i[asal]</td>
									<td>$i[perihal]</td>
									<td>$i[hari]</td>
                                    <td>$i[tempat]</td>
									<td>$i[pukul]</td>
                                    <td>$i[disp]</td>
									<td>$i[disp_kabag]</td>
                                    <td>$i[keterangan]</td>
									<td>$i[unit_kerja]</td>";
                                    	if ($_SESSION[level]=='user_admin'){ 
	                                        echo "<td style='width:165px' class='text-right'><a class='btn' href='index.php?page=binbox&aksi=detail&id=$i[undangan_id]' title='Lihat Detai Undangan'><i class='fa fa-folder-open'></i></a>
	                                        	  <a class='btn' target='BLANK' href='undangan_print_satu.php?id=$i[undangan_id]' title='Print Undangan'><i class='fa fa-print'></i></a>
	                                       		  <a class='btn' href='index.php?page=binbox&aksi=edit&id=$i[undangan_id]' title='Edit Undangan'><i class='fa fa-pencil-square-o'></i></a>
	                                        	  <a class='btn' href='index.php?page=binbox&aksi=hapus&id=$i[undangan_id]' title='Hapus Undangan ini' onclick=\"return confirm('Apakah anda Yakin Data ini Dihapus?')\"><i class='fa fa-trash-o'></i></a>";
                						}elseif ($_SESSION[level]=='user_input'){ 
                							echo "<td style='width:90px' class='text-right'><a class='btn' href='index.php?page=binbox&aksi=detail&id=$i[undangan_id]' title='Lihat Detail Undangan ini'><i class='fa fa-folder-open'></i></a>
	                                       		  <a class='btn' href='index.php?page=binbox&aksi=edit&id=$i[undangan_id]' title='Edit Undangan ini'><i class='fa fa-pencil-square-o'></i></a>";
                						}else{
                							echo "<td style='width:50px' class='text-right'><a class='btn' href='index.php?page=binbox&aksi=detail&id=$i[undangan_id]' title='Lihat Detail Undangan'><i class='fa fa-folder-open'></i></a>";
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
	mysql_query("DELETE FROM undangan where undangan_id='$_GET[id]'");
	echo "<script>window.alert('Data Undangan Berhasil Di Hapus.');
                                window.location='binbox'</script>";

}elseif ($_GET[aksi]=='tambah'){ 
    if (isset($_POST[simpan])){
        if ($_SESSION[unit] == '0'){
            $unit = $_POST[unit];
        }else{
            $unit = $_SESSION[unit];
        }
            $dir_gambar = 'undangan/';
            $filename = basename($_FILES['j']['name']);
            $uploadfile = $dir_gambar . $filename;
            $tanggaleks = date("Y-m-d H:i:s");
                if ($filename != ''){
                    if (move_uploaded_file($_FILES['j']['tmp_name'], $uploadfile)) {            
                        mysql_query("INSERT INTO undangan (tgl_masuk,
                                               				asal, 
											  				 perihal, 
											  				 hari, 
											  				 tempat,
											   				  pukul, 
											  				 disp, 
											  				 disp_kabag,
											  				 keterangan,
															 upload_file,
															 unit_kerja)           
                                                         VALUES('$_POST[a]',
                                                                '$_POST[b]',
                                                                '$_POST[c]',
                                                                '$_POST[d]',
                                                                '$_POST[e]',
                                                                '$_POST[f]',
                                                                '$_POST[g]',
                                                                '$_POST[h]',
																'$_POST[i]',
																'$filename',
																'$unit')");
                        echo "<script>window.alert('Sukses Menambahkan Data Undangan.');
                                window.location='binbox'</script>";
                    }else{
                        echo "<script>window.alert('Gagal Menambahkan Data Undangan.');
                                window.location='index.php?page=binbox&aksi=tambah'</script>";
                    }
                }else{
                        mysql_query("INSERT INTO undangan (tgl_masuk,
                                               				asal, 
											  				 perihal, 
											  				 hari, 
											  				 tempat,
											   				  pukul, 
											  				 disp, 
											  				 disp_kabag,
											  				 keterangan,
															 upload_file,
															 unit_kerja)           
                                                         VALUES('$_POST[a]',
                                                                '$_POST[b]',
                                                                '$_POST[c]',
                                                                '$_POST[d]',
                                                                '$_POST[e]',
                                                                '$_POST[f]',
                                                                '$_POST[g]',
                                                                '$_POST[h]',
																'$_POST[i]',
																'$_POST[j]',
																'$unit')");
                        
                        echo "<script>window.alert('Sukses Menambahkan Data Undangan.');
                                window.location='binbox'</script>";
                }
    }
?>

                <h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><strong>Tambahkan Data Undangan</strong></div>
                <div class="panel-body">
                    <form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>      

                       <div class="form-group">
                            <label class="col-lg-2 control-label">Tgl Masuk</label>
                            <div class="col-lg-2">
                            <input type="text" name="a" placeholder="" data-required="true" class="bg-focus form-control">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Asal</label>
                            <div class="col-lg-4">
                            <input type="text" name="b" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Perihal</label>
                            <div class="col-lg-6">
                            <textarea placeholder="" name='c' rows="2" class="textarea form-control" data-trigger="keyup"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Hari</label>
                            <div class="col-lg-2">
                            <input type="text" name="d" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tempat</label>
                            <div class="col-lg-2">
                             <input type="text" name="e" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Pukul</label>
                            <div class="col-lg-2">
                            <input type="text" name="f" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Disp Karo</label>
                            <div class="col-lg-2">
                            <input type="text" name="g" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Disp Kabag</label>
                            <div class="col-lg-2">
                            <input type="text" name="h" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Keterangan</label>
                            <div class="col-lg-6">
                            <input type="text" name="i" placeholder="" data-required="true" class="bg-focus form-control">
                            </div>
                        </div>


					<div class="form-group">
                        <label class="col-lg-2 control-label">Cari File</label>
                            <div class="col-lg-10">
                            <input type="file" name="j" title="Pilih File" class="btn-success btn-small"> 
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
	$e = mysql_fetch_array(mysql_query("SELECT * FROM undangan where undangan_id='$_GET[id]'"));

    if (isset($_POST[update])){
            $dir_gambar = 'undangan/';
            $filename = basename($_FILES['j']['name']);
            $uploadfile = $dir_gambar . $filename;
                if ($filename != ''){
                    if (move_uploaded_file($_FILES['j']['tmp_name'], $uploadfile)) {            
                        mysql_query("UPDATE undangan SET	 tgl_masuk   = '$_POST[a]',
                                             				 asal    = '$_POST[b]',
                                             				 perihal      = '$_POST[c]',
											  				hari   = '$_POST[d]',
                                              				 tempat    = '$_POST[e]',
                                              				 pukul      = '$_POST[f]',
											   				disp  = '$_POST[g]',
                                               				disp_kabag    = '$_POST[h]',
                                               				keterangan      = '$_POST[i]',
                                                            upload_file   = '$filename' 
															where undangan_id='$_GET[id]'");
                        
                        echo "<script>window.alert('Sukses Update Data Undangan.');
                                window.location='binbox'</script>";
                    }else{
                        echo "<script>window.alert('Gagal Update Data Undangan.');
                                window.location='index.php?page=binbox&aksi=edit&id=$_GET[id]'</script>";
                    }
                }else{
                        mysql_query("UPDATE undangan SET    tgl_masuk   = '$_POST[a]',
                                             				 asal  		 = '$_POST[b]',
                                             				 perihal      = '$_POST[c]',
											  				 hari   		= '$_POST[d]',
                                              				 tempat   	 = '$_POST[e]',
                                              				 pukul     		= '$_POST[f]',
											   				 disp  			= '$_POST[g]',
                                               				disp_kabag    = '$_POST[h]',
                                               				keterangan      = '$_POST[i]'
											   				where undangan_id='$_GET[id]'");
                        
                        echo "<script>window.alert('Sukses Update Data Undangan.');
                                window.location='binbox'</script>";
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
                            <label class="col-lg-2 control-label">Tgl Masuk</label>
                            <div class="col-lg-2">
                            <input type="text" name="a" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[tgl_masuk]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Asal</label>
                            <div class="col-lg-4">
                            <input type="text" name="b" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[asal]; ?>">
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Perihal</label>
                            <div class="col-lg-6">
                            <textarea placeholder="" name='c' rows="2" class="textarea form-control" data-trigger="keyup"><?php echo $e[perihal]; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Hari</label>
                            <div class="col-lg-2">
                            <input type="text" name="d" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[hari]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tempat</label>
                            <div class="col-lg-6">
                            <input type="text" name="e" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[tempat]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Pukul</label>
                            <div class="col-lg-2">
                             <input type="text" name="f" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[pukul]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Disp Karo</label>
                            <div class="col-lg-2">
                            <input type="text" name="g" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[disp]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Disp Kabag</label>
                            <div class="col-lg-2">
                            <input type="text" name="h" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[disp_kabag]; ?>">
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Keterangan</label>
                            <div class="col-lg-6">
                            <input type="text" name="i" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[keterangan]; ?>">
                            </div>
                        </div>

				<div class="form-group">
                        <label class="col-lg-2 control-label">Ganti File</label>
                            <div class="col-lg-4">
                            <input type="file" name="j" title="Pilih File" class="btn-success btn-small"> 
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
	$in = mysql_fetch_array(mysql_query("SELECT * FROM undangan where undangan_id='$_GET[id]'"));
	echo "<h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class='col-md-12'>
            <div class='panel panel-default'>
            <div class='panel-heading'><strong>Detail Data Undangan</strong></div>
                <div class='panel-body'>
                	<form action='' class='form-horizontal' data-validate='parsley' enctype='multipart/form-data'>
                
                       
                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Tgl Masuk</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                $in[tgl_masuk]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Asal</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            	$in[asal]
                            </div>
                        </div>

                        
                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Perihal</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                $in[perihal]
                            </div>
                        </div>
                
                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Hari</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                 $in[hari] <br><br>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Tempat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                 $in[tempat] <br><br>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Pukul</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                 $in[pukul] <br><br>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Disp Karo</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                 $in[disp] <br><br>
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
                                 $in[keterangan] <br><br>
                            </div>
                        </div>
						<div class='form-group'>
                        <label class='col-lg-2 control-label'>File Surat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                <a href='download_undangan.php?file=$in[upload_file]'>Download File Surat</a>
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
            
            