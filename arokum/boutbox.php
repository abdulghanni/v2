 <?php 
    if ($_GET[aksi]==''){
?>
        <h4 style='padding-top:15px'>Semua Data Surat Pengaduan</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php if ($_SESSION[level]=='user_admin'){ ?>
                        <a class='btn btn-primary' href='index.php?page=boutbox&aksi=tambah'><i class='fa fa-plus'></i> Tambah Data Surat Pengaduan</a>
                        <a class='btn btn-info' target='BLANK' href='print_pengaduan.php'><i class='fa fa-print'></i> Print Data Surat Pengaduan</a>
                        <a class='btn btn-success' href='excel_pengaduan.php'><i class='fa fa-file'></i> Export ke Excel</a>
                    <?php }elseif ($_SESSION[level]=='user_input'){ ?>
                        <a class='btn btn-primary' href='index.php?page=boutbox&aksi=tambah'><i class='fa fa-plus'></i> Tambah Data Surat Pengaduan</a>
                          <a class='btn btn-info' target='BLANK' href='print_pengaduan.php'><i class='fa fa-print'></i> Print Data Surat Pengaduan</a>
                        <a class='btn btn-success' href='excel_pengaduan.php'><i class='fa fa-file'></i> Export ke Excel</a>
                    <?php } ?>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead  class='alert-success'>
                    <tr>
                        <th>No</th>
                        <th>No Agenda</th>
                        <th>Tanggal Masuk</th>
                        <th>Asal</th>
                        <th>No.Surat</th>
                        <th>Tgl Surat</th>
                        <th>Perihal</th>
                        <th>Disposisi</th>
                       
                        <th>Tgl TL Surat</th>
                        <th>Bentuk TL</th>
                         <th>Unit</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                      
                       if ($_SESSION[unit] == '0'){
                        $pengaduan = mysql_query("SELECT * FROM pengaduan ORDER BY pengaduan_id ASC");
                     }else{
                            $pengaduan = mysql_query("SELECT * FROM pengaduan where unit_kerja='$_SESSION[unit]' ORDER BY pengaduan_id ASC");
					  } 
                        $no = 1;
                        while ($i = mysql_fetch_array($pengaduan)){
                            echo "<tr class='gradeX'>
                                     <td>$no</td>
                                    <td>$i[no_agenda]</td>
                                    <td>$i[tgl_masuk]</td>
                                    <td>$i[asal]</td>
									<td>$i[no_surat]</td>
                                    <td>$i[tgl_surat]</td>
                                    <td>$i[perihal]</td>
                                    <td>$i[disp_pim]</td>
									
									<td>$i[tgl_tl]</td>
                                    <td>$i[btl]</td>
									<td>$i[unit_kerja]</td>";
                                        if ($_SESSION[level]=='user_admin'){ 
                                            echo "<td style='width:165px' class='text-right'><a class='btn' href='index.php?page=boutbox&aksi=detail&id=$i[pengaduan_id]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>
                                                  <a class='btn' target='BLANK' href='pengaduan_print_satu.php?id=$i[pengaduan_id]' title='Print Surat ini'><i class='fa fa-print'></i></a>
                                                  <a class='btn' href='index.php?page=boutbox&aksi=edit&id=$i[pengaduan_id]' title='Edit Data Surat ini'><i class='fa fa-pencil-square-o'></i></a>
                                                  <a class='btn' href='index.php?page=boutbox&aksi=hapus&id=$i[pengaduan_id]' title='Hapus Surat ini' onclick=\"return confirm('Apakah anda Yakin Data ini Dihapus?')\"><i class='fa fa-trash-o'></i></a>";
                                        }elseif ($_SESSION[level]=='user_input'){ 
                                            echo "<td style='width:90px' class='text-right'><a class='btn' href='index.php?page=boutbox&aksi=detail&id=$i[pengaduan_id]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>
                                                  <a class='btn' href='index.php?page=boutbox&aksi=edit&id=$i[pengaduan_id]' title='Edit Data Surat ini'><i class='fa fa-pencil-square-o'></i></a>";
                                        }else{
                                            echo "<td style='width:50px' class='text-right'><a class='btn' href='index.php?page=boutbox&aksi=detail&id=$i[pengaduan_id]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>";
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
    mysql_query("DELETE FROM pengaduan where pengaduan_id='$_GET[id]'");
    echo "<script>window.alert('Data Surat Pengaduan Berhasil Di Hapus.');
                                window.location='boutbox'</script>";

}elseif ($_GET[aksi]=='tambah'){ 
    if (isset($_POST[simpan])){
        if ($_SESSION[unit] == '0'){
            $unit = $_POST[unit];
        }else{
            $unit = $_SESSION[unit];
        }
        $dir_gambar = 'pengaduan/';
            $filename = basename($_FILES['j']['name']);
            $uploadfile = $dir_gambar . $filename;
            $tanggaleks = date("Y-m-d H:i:s");
                if ($filename != ''){
                    if (move_uploaded_file($_FILES['j']['tmp_name'], $uploadfile)) {            
                        mysql_query("INSERT INTO pengaduan (no_agenda, tgl_masuk, asal, no_surat, tgl_surat, perihal, disp_pim,tgl_tl, btl,upload_file,unit_kerja)           
                                    VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$_POST[i]','$filename','$unit')");
                                       
                        echo "<script>window.alert('Sukses Menambahkan Data Surat Pengaduan .');
                                window.location='boutbox'</script>";
                    }else{
                        echo "<script>window.alert('Gagal Menambahkan Data Surat Pengaduan.');
                                window.location='index.php?page=boutbox&aksi=tambah'</script>";
                    }
                }else{
                       mysql_query("INSERT INTO pengaduan (no_agenda, tgl_masuk, asal, no_surat, tgl_surat, perihal, disp_pim,tgl_tl, btl,upload_file,unit_kerja)           
                                        VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$_POST[i]','$_POST[j]','$unit')");
                                       
                        echo "<script>window.alert('Sukses Menambahkan Data Surat Pengaduan .');
                                window.location='boutbox'</script>";
                }
    }
?>

                <h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><strong>Tambahkan Data Surat Pengaduan</strong></div>
                <div class="panel-body">
                    <form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>      

                    	 <div class="form-group">
                        <label class="col-lg-2 control-label">No Agenda</label>
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
                             <input type="text" name="c" placeholder="" data-required="true" class="bg-focus form-control ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">No Surat</label>
                            <div class="col-lg-6">
                            <input type="text" name="d" placeholder="" data-required="true" class="bg-focus form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tgl Surat</label>
                            <div class="col-lg-6">
                            <input type="text" name="e" placeholder="" data-required="true" class="bg-focus form-control">
                            </div>
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
                            <textarea placeholder="" name='g' rows="4" class="textarea form-control" data-trigger="keyup"></textarea>
                            </div>
                        </div>
                
                        
<div class="form-group">
                            <label class="col-lg-2 control-label">Tgl TL Surat</label>
                            <div class="col-lg-6">
                             <input type="text" name="h" placeholder="" data-required="true" class="bg-focus form-control">
                            </div>
                        </div>

<div class="form-group">
                            <label class="col-lg-2 control-label">Bentuk TL</label>
                            <div class="col-lg-6">
                            <textarea placeholder="" name='i' rows="2" class="form-control" data-trigger="keyup"></textarea>
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
    $e = mysql_fetch_array(mysql_query("SELECT * FROM pengaduan where pengaduan_id='$_GET[id]'"));
    if (isset($_POST[update])){
    	    $dir_gambar = 'pengaduan/';
            $filename = basename($_FILES['j']['name']);
            $uploadfile = $dir_gambar . $filename;
            $tanggaleks = date("Y-m-d H:i:s");
                if ($filename != ''){
                    if (move_uploaded_file($_FILES['j']['tmp_name'], $uploadfile)) {            
                        mysql_query("UPDATE pengaduan SET no_agenda		 = '$_POST[a]',
															tgl_masuk		 = '$_POST[b]',
                                                            asal    = '$_POST[c]',
                                                            no_surat    = '$_POST[d]',
                        									
                        									tgl_surat		 = '$_POST[e]',
                        									perihal 		 = '$_POST[f]',
                                                            disp_pim    = '$_POST[g]',
                        									
															tgl_tl    ='$_POST[h]',
															btl    = '$_POST[i]',
															upload_file='$filename' where pengaduan_id='$_GET[id]'");
                                       
                        echo "<script>window.alert('Sukses Update Data Surat Pengaduan .');
                                window.location='boutbox'</script>";
                    }else{
                        echo "<script>window.alert('Gagal Update Data .');
                                window.location='boutbox'</script>";
                    }
                }else{
                       mysql_query("UPDATE pengaduan SET no_agenda		 = '$_POST[a]',
															tgl_masuk		 = '$_POST[b]',
                                                            asal    = '$_POST[c]',
                                                            no_surat    = '$_POST[d]',
                        									
                        									tgl_surat		 = '$_POST[e]',
                        									perihal 		 = '$_POST[f]',
                                                            disp_pim    = '$_POST[g]',
                        									
															tgl_tl    ='$_POST[h]',
															btl    = '$_POST[i]'
															 where pengaduan_id='$_GET[id]'");
                                       
                        echo "<script>window.alert('Sukses Update Data Surat Pengaduan .');
                                window.location='boutbox'</script>";
                }
    }
?>

                <h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><strong>Edit Data Pengadilan</strong></div>
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
                            <textarea placeholder="" name='g' rows="4" class="textarea form-control" data-trigger="keyup"><?php echo $e[disp_pim]; ?></textarea>
                            </div>
                        </div>
                
                       
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tgl TL Surat</label>
                            <div class="col-lg-2">
                           <input type="text" name="h" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[tgl_tl]; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Bentuk TL</label>
                            <div class="col-lg-6">
                            <textarea placeholder="" name='i' rows="2" class="form-control" data-trigger="keyup"><?php echo $e[btl]; ?></textarea>
                            </div>
                        </div>
                        

                        
   <div class="form-group">
                        <label class="col-lg-2 control-label">Ganti File</label>
                            <div class="col-lg-10">
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
    $e = mysql_fetch_array(mysql_query("SELECT * FROM pengaduan where pengaduan_id='$_GET[id]'"));
    echo "<h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class='col-md-12'>
            <div class='panel panel-default'>
            <div class='panel-heading'><strong>Detail Data Surat Keluar</strong></div>
                <div class='panel-body'>
                    <form action='' class='form-horizontal' data-validate='parsley' enctype='multipart/form-data'>
 <div class='form-group'>
                            <label class='col-lg-2 control-label'>No Agenda</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                $e[no_agenda]
                            </div>
                        </div>

                        

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Tgl Masuk</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[tgl_masuk]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>asal</label>
                        <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                          $e[asal]
                        </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>No Surat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[no_surat]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Tgl Surat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[tgl_surat]
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
                            $e[disp_pim]
                            </div>
                        </div>

                        

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Tgl TL Surat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[tgl_tl]
                            </div>
                        </div>

					<div class='form-group'>
                        <label class='col-lg-2 control-label'>Bentuk TL Surat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[btl]
                            </div>
                        </div>
						
                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>File Surat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                 <a href='download_pengaduan.php?file=$e[upload_file]'>Download File Surat</a>
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
                    <p><small>&copy 2015 - Develop by Robby Riyan - www.fatazaid.com</small>
                        <br /><br /> 
                        <a href="https://twitter.com/robbyprihandaya" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a> 
                        <a href="https://web.facebook.com/robbyprihandaya" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="https://plus.google.com/106633506064864167239/posts" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a> 
                    </p> 
                </div> 
            </footer>