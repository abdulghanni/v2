 <?php 
    if ($_GET[aksi]==''){
?>
        <h4 style='padding-top:15px'>Semua Data Surat Keluar</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php if ($_SESSION[level]=='user_admin'){ ?>
                        <a class='btn btn-primary' href='index.php?page=outbox&aksi=tambah'><i class='fa fa-plus'></i> Tambah Data Surat Keluar</a>
                        <a class='btn btn-info' target='BLANK' href='print_suratkeluar.php'><i class='fa fa-print'></i> Print Data Surat Keluar</a>
                        <a class='btn btn-success' href='excel_suratkeluar.php'><i class='fa fa-file'></i> Export ke Excel</a>
                    <?php }elseif ($_SESSION[level]=='user_input'){ ?>
                        <a class='btn btn-primary' href='index.php?page=outbox&aksi=tambah'><i class='fa fa-plus'></i> Tambah Data Surat Keluar</a>
                          <a class='btn btn-info' target='BLANK' href='print_suratkeluar.php'><i class='fa fa-print'></i> Print Data Surat Keluar</a>
                        <a class='btn btn-success' href='excel_suratkeluar.php'><i class='fa fa-file'></i> Export ke Excel</a>
                    <?php } ?>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead  class='alert-success'>
                    <tr>
                        <th>No</th>
                        <th>No.Surat</th>
                        <th>Pengonsep</th>
                        <th>Tgl Surat</th>
                        <th>Ditujukan</th>
                        <th>Jenis Surat</th>
                        <th>Perihal</th>
                        <th>Tgl Keluar</th>
                        <th>Keterangan</th>
                        <th>Unit</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                      
                       if ($_SESSION[unit] == '0'){
                        $suratkeluar = mysql_query("SELECT * FROM suratkeluar ORDER BY suratkeluar_id ASC");
                     }else{
                            $suratkeluar = mysql_query("SELECT * FROM suratkeluar where unit_kerja='$_SESSION[unit]' ORDER BY suratkeluar_id ASC");
					  } 
                        $no = 1;
                        while ($i = mysql_fetch_array($suratkeluar)){
                            echo "<tr class='gradeX'>
                                     <td>$no</td>
                                    <td>$i[no_surat]</td>
                                    <td>$i[pengonsep]</td>
                                    <td>$i[tgl_surat]</td>
                                    <td>$i[ditujukan]</td>
									 <td>$i[jenis_surat]</td>
                                    <td>$i[perihal]</td>
									 <td>$i[tgl_keluar]</td>
                                    <td>$i[keterangan]</td>
									<td>$i[unit_kerja]</td>";
                                        if ($_SESSION[level]=='user_admin'){ 
                                            echo "<td style='width:165px' class='text-right'><a class='btn' href='index.php?page=outbox&aksi=detail&id=$i[suratkeluar_id]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>
                                                  <a class='btn' target='BLANK' href='suratkeluar_print_satu.php?id=$i[suratkeluar_id]' title='Print Surat ini'><i class='fa fa-print'></i></a>
                                                  <a class='btn' href='index.php?page=outbox&aksi=edit&id=$i[suratkeluar_id]' title='Edit Data Surat ini'><i class='fa fa-pencil-square-o'></i></a>
                                                  <a class='btn' href='index.php?page=outbox&aksi=hapus&id=$i[suratkeluar_id]' title='Hapus Surat ini' onclick=\"return confirm('Apakah anda Yakin Data ini Dihapus?')\"><i class='fa fa-trash-o'></i></a>";
                                        }elseif ($_SESSION[level]=='user_input'){ 
                                            echo "<td style='width:90px' class='text-right'><a class='btn' href='index.php?page=outbox&aksi=detail&id=$i[suratkeluar_id]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>
                                                  <a class='btn' href='index.php?page=outbox&aksi=edit&id=$i[suratkeluar_id]' title='Edit Data Surat ini'><i class='fa fa-pencil-square-o'></i></a>";
                                        }else{
                                            echo "<td style='width:50px' class='text-right'><a class='btn' href='index.php?page=outbox&aksi=detail&id=$i[suratkeluar_id]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>";
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
    mysql_query("DELETE FROM suratkeluar where suratkeluar_id='$_GET[id]'");
    echo "<script>window.alert('Data Surat Keluar Berhasil Di Hapus.');
                                window.location='outbox'</script>";

}elseif ($_GET[aksi]=='tambah'){ 
    if (isset($_POST[simpan])){
        if ($_SESSION[unit] == '0'){
            $unit = $_POST[unit];
        }else{
            $unit = $_SESSION[unit];
        }
        $dir_gambar = 'suratkeluar/';
            $filename = basename($_FILES['i']['name']);
            $uploadfile = $dir_gambar . $filename;
            $tanggaleks = date("Y-m-d H:i:s");
                if ($filename != ''){
                    if (move_uploaded_file($_FILES['i']['tmp_name'], $uploadfile)) {            
                         mysql_query("INSERT INTO suratkeluar (no_surat, 
                                                                  pengonsep, 
                                                                  tgl_surat, 
                                                                  ditujukan, 
                                                                  jenis_surat, 
                                                                  perihal, 
                                                                  tgl_keluar,
                                                                  
                                                                   
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
                                                                 
                                                                  '$filename',
																  '$unit')");
                                       
                        echo "<script>window.alert('Sukses Menambahkan Data Surat Keluar .');
                                window.location='outbox'</script>";
                    }else{
                        echo "<script>window.alert('Gagal Menambahkan Data Surat Keluar.');
                                window.location='index.php?page=outbox&aksi=tambah'</script>";
                    }
                }else{
                       mysql_query("INSERT INTO suratkeluar ((no_surat, 
                                                                  pengonsep, 
                                                                  tgl_surat, 
                                                                  ditujukan, 
                                                                  jenis_surat, 
                                                                  perihal, 
                                                                  tgl_keluar,
                                                                  
                                                                   
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
																  '$unit')");
                                       
                        echo "<script>window.alert('Sukses Menambahkan Data Surat Keluar .');
                                window.location='outbox'</script>";
                }
    }
?>

                <h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><strong>Tambahkan Data Surat Keluar</strong></div>
                <div class="panel-body">
                    <form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>      

                    	<div class="form-group">
                            <label class="col-lg-2 control-label">No Surat</label>
                            <div class="col-lg-2">
                                <input type="text" name="a" placeholder="" data-required="true" class="bg-focus form-control ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Pengonsep</label>
                            <div class="col-lg-2">
                             <input type="text" name="b" placeholder="" data-required="true" class="bg-focus form-control ">
                            </div>
                        </div>
<div class="form-group">
                            <label class="col-lg-2 control-label">Tgl Surat</label>
                            <div class="col-lg-2">
                                <input type="text" name="c" placeholder="" data-required="true" class="bg-focus form-control ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Ditujukan</label>
                            <div class="col-lg-2">
                             <input type="text" name="d" placeholder="" data-required="true" class="bg-focus form-control ">
                            </div>
                        </div>

                       
 <div class="form-group">
                            <label class="col-lg-2 control-label">Jenis Surat</label>
                            <div class="col-lg-2">
                             <input type="text" name="e" placeholder="" data-required="true" class="bg-focus form-control ">
                            </div>
                        </div>
<div class="form-group">
                            <label class="col-lg-2 control-label">Perihal</label>
                            <div class="col-lg-6">
                                <input type="text" name="f" placeholder="" data-required="true" class="bg-focus form-control ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tgl Keluar</label>
                            <div class="col-lg-2">
                             <input type="text" name="g" placeholder="" data-required="true" class="bg-focus form-control ">
                            </div>
                        </div>
                       

                       

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Keterangan</label>
                            <div class="col-lg-6">
                            <input type="text" name="h" placeholder="" class="bg-focus form-control">
                            </div>
                        </div>
                        
 						<div class="form-group">
                        <label class="col-lg-2 control-label">Cari File</label>
                            <div class="col-lg-10">
                            <input type="file" name="i" title="Pilih File" class="btn-success btn-small"> 
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
    $e = mysql_fetch_array(mysql_query("SELECT * FROM suratkeluar where suratkeluar_id='$_GET[id]'"));
    if (isset($_POST[update])){
    	    $dir_gambar = 'suratkeluar/';
            $filename = basename($_FILES['i']['name']);
            $uploadfile = $dir_gambar . $filename;
            $tanggaleks = date("Y-m-d H:i:s");
                if ($filename != ''){
                    if (move_uploaded_file($_FILES['i']['tmp_name'], $uploadfile)) {            
                        mysql_query("UPDATE suratkeluar SET no_surat   = '$_POST[a]',
                                             				 pengonsep    = '$_POST[b]',
                                             				 tgl_surat      = '$_POST[c]',
											  				ditujukan   = '$_POST[d]',
                                              				 jenis_surat    = '$_POST[e]',
                                              				 perihal     = '$_POST[f]',
											   				tgl_keluar  = '$_POST[g]',
                                               				
                                               				keterangan      = '$_POST[h]',
                                                            upload_file   = '$filename' 
															where suratkeluar_id='$_GET[id]'");
                                       
                        echo "<script>window.alert('Sukses Update Data Surat Masuk .');
                                window.location='outbox'</script>";
                    }else{
                        echo "<script>window.alert('Gagal Update Data .');
                                window.location='outbox'</script>";
                    }
                }else{
                       mysql_query("UPDATE suratkeluar SET no_surat   = '$_POST[a]',
                                             				 pengonsep    = '$_POST[b]',
                                             				 tgl_surat      = '$_POST[c]',
											  				ditujukan   = '$_POST[d]',
                                              				 jenis_surat    = '$_POST[e]',
                                              				 perihal     = '$_POST[f]',
											   				tgl_keluar  = '$_POST[g]',
                                               				
                                               				keterangan      = '$_POST[h]'
                                                           
															where suratkeluar_id='$_GET[id]'");
                                       
                        echo "<script>window.alert('Sukses Update Data Surat Keluar .');
                                window.location='outbox'</script>";
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
                            <label class="col-lg-2 control-label">No Surat</label>
                            <div class="col-lg-2">
                                <input type="text" name="a" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[no_surat]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Pengonsep</label>
                            <div class="col-lg-2">
                            <input type="text" name="b" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[pengonsep]; ?>">
                            </div>
                        </div>
<div class="form-group">
                      <label class="col-lg-2 control-label">Tgl Surat</label>
                            <div class="col-lg-2">
                                <input type="text" name="c" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[tgl_surat]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Ditujukan</label>
                            <div class="col-lg-2">
                            <input type="text" name="d" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[ditujukan]; ?>">
                            </div>
                        </div>
                         <div class="form-group">
                             <label class="col-lg-2 control-label">Jenis Surat</label>
                            <div class="col-lg-2">
                                <input type="text" name="e" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[jenis_surat]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Perihal</label>
                            <div class="col-lg-6">
                            <input type="text" name="f" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[perihal]; ?>">
                            </div>
                        </div>     
<div class="form-group">
 <label class="col-lg-2 control-label">Tgl Keluar</label>
                            <div class="col-lg-2">
                                <input type="text" name="g" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[tgl_keluar]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Keterangan</label>
                            <div class="col-lg-6">
                            <input type="text" name="h" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[keterangan]; ?>">
                            </div>
                        </div>

                        
   <div class="form-group">
                        <label class="col-lg-2 control-label">Ganti File</label>
                            <div class="col-lg-10">
                            <input type="file" name="i" title="Pilih File" class="btn-success btn-small"> 
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
    $e = mysql_fetch_array(mysql_query("SELECT * FROM suratkeluar where suratkeluar_id='$_GET[id]'"));
    echo "<h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class='col-md-12'>
            <div class='panel panel-default'>
            <div class='panel-heading'><strong>Detail Data Surat Keluar</strong></div>
                <div class='panel-body'>
                    <form action='' class='form-horizontal' data-validate='parsley' enctype='multipart/form-data'>
 <div class='form-group'>
                            <label class='col-lg-2 control-label'>No Surat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                $e[no_surat]
                            </div>
                        </div>

                        

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Pengonsep</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[pengonsep]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Tgl Surat</label>
                        <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                          $e[tgl_surat]
                        </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Ditujukan</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[ditujukan]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Jenis Surat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[jenis_surat]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Perihal</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[perihal]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Tgl Keluar</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[tgl_keluar]
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
                                 <a href='download_suratkeluar.php?file=$e[upload_file]'>Download File Surat</a>
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