 <?php 
    if ($_GET[aksi]==''){
?>
        <h4 style='padding-top:15px'>Semua Data Tamu</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php if ($_SESSION[level]=='user_admin'){ ?>
                        <a class='btn btn-primary' href='index.php?page=outboxg&aksi=tambah'><i class='fa fa-plus'></i> Tambah Data Tamu</a>
                        <a class='btn btn-info' target='BLANK' href='tamu_print.php'><i class='fa fa-print'></i> Print Data Tamu</a>
                        <a class='btn btn-success' href='tamu_excel.php'><i class='fa fa-file'></i> Export ke Excel</a>
                    <?php }elseif ($_SESSION[level]=='user_input'){ ?>
                        <a class='btn btn-primary' href='index.php?page=outboxg&aksi=tambah'><i class='fa fa-plus'></i> Tambah Data tamu</a>
                          <a class='btn btn-info' target='BLANK' href='print_suratkeluar.php'><i class='fa fa-print'></i> Print Data Surat Keluar</a>
                        <a class='btn btn-success' href='excel_suratkeluar.php'><i class='fa fa-file'></i> Export ke Excel</a>
                   
                    <?php } ?>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead  class='alert-success'>
                    <tr>
                        <th>No</th>
                        <th>Tgl Kunjungan</th>
                        <th>Identitas Tamu</th>
                        <th>Jumlah Tamu</th>
                        <th>Maksud Kunjungan</th>
                        <th>Pejabat Penerima</th>
                        <th>Tempat</th>
                         <th>Unit</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
					 if ($_SESSION[unit] == '0'){
                        $tamu = mysql_query("SELECT * FROM tamu ORDER BY id_tamu ASC");
				}else{
                            $tamu = mysql_query("SELECT * FROM tamu where unit_kerja='$_SESSION[unit]' ORDER BY tamu_id ASC");
					  } 
                        $no = 1;
                        while ($i = mysql_fetch_array($tamu)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[tgl_masuk]</td>
                                    <td>$i[identitas]</td>
                                    <td>$i[jml_tamu]</td>
                                    <td>$i[maksud]</td>
                                    <td>$i[penerima]</td>
                                    <td>$i[tempat]</td>
									<td>$i[unit_kerja]</td>";
                                        if ($_SESSION[level]=='user_admin'){ 
                                            echo "<td style='width:170px' class='text-right'><a class='btn' href='index.php?page=outboxg&aksi=detail&id=$i[id_tamu]' title='Lihat Detail'><i class='fa fa-folder-open'></i></a>
                                                  <a class='btn' target='BLANK' href='tamu_print_satu.php?id=$i[id_tamu]' title='Print Data ini'><i class='fa fa-print'></i></a>
                                                  <a class='btn' href='index.php?page=outboxg&aksi=edit&id=$i[id_tamu]' title='Edit Data Tamu'><i class='fa fa-pencil-square-o'></i></a>
                                                  <a class='btn' href='index.php?page=outboxg&aksi=hapus&id=$i[id_tamu]' title='Hapus Surat ini' onclick=\"return confirm('Apakah anda Yakin Data ini Dihapus?')\"><i class='fa fa-trash-o'></i></a>";
                                        }elseif ($_SESSION[level]=='user_input'){ 
                                            echo "<td style='width:90px' class='text-right'><a class='btn' href='index.php?page=outboxg&aksi=detail&id=$i[id_tamu]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>
                                                  <a class='btn' href='index.php?page=outboxg&aksi=edit&id=$i[id_tamu]' title='Edit Data Surat ini'><i class='fa fa-pencil-square-o'></i></a>";
                                        }else{
                                            echo "<td style='width:50px' class='text-right'><a class='btn' href='index.php?page=outboxg&aksi=detail&id=$i[id_tamu]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>";
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
    mysql_query("DELETE FROM tamu where id_tamu='$_GET[id]'");
    echo "<script>window.alert('Data Tamu Berhasil Di Hapus.');
                                window.location='outboxg'</script>";

}elseif ($_GET[aksi]=='tambah'){ 
    if (isset($_POST[simpan])){
        if ($_SESSION[unit] == '0'){
            $unit = $_POST[unit];
        }else{
            $unit = $_SESSION[unit];
        }
        $dir_gambar = 'tamu/';
            $filename = basename($_FILES['g']['name']);
            $uploadfile = $dir_gambar . $filename;
            $tanggaleks = date("Y-m-d H:i:s");
                if ($filename != ''){
                    if (move_uploaded_file($_FILES['g']['tmp_name'], $uploadfile)) {            
                         mysql_query("INSERT INTO tamu (tgl_masuk, identitas, jml_tamu, maksud, penerima, tempat, upload_file, unit_kerja)           
                                        VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$filename','$unit')");
                                       
                        echo "<script>window.alert('Sukses Menambahkan Data Tamu .');
                                window.location='outboxg'</script>";
                    }else{
                        echo "<script>window.alert('Gagal Menambahkan Data Tamu.');
                                window.location='index.php?page=outboxg&aksi=tambah'</script>";
                    }
                }else{
                       mysql_query("INSERT INTO tamu (tgl_masuk, identitas, jml_tamu, maksud, penerima, tempat, unit_kerja)           
                                        VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$unit')");

                        echo "<script>window.alert('Sukses Menambahkan Data tamu .');
                                window.location='outboxg'</script>";
                }
    }
?>


                <h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><strong>Tambahkan Data Tamu</strong></div>
                <div class="panel-body">
                    <form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>      

                        <div align="left">
                        <label class="col-lg-2 control-label">Tgl Kunjungan</label>
                        
                         <div class="input-group input-lg">
                         
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <input type="date" id="tgl_masuk" name="a" placeholder="Tgl Kunjungan" value="<?php echo $row['tgl_masuk']?>" class="form-control input-lg" required style="width: 10%;" />
                       
                        
                        </span>
                    </div>

                    	<div class="form-group">
                            <label class="col-lg-2 control-label">Identitas Tamu</label>
                            <div class="col-lg-4">
                                <input type="text" name="b" placeholder="" data-required="true" class="bg-focus form-control ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Jumlah Tamu</label>
                            <div class="col-lg-2">
                                <input type="text" name="c" placeholder="" data-required="true" class="bg-focus form-control ">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Maksud Kunjungan</label>
                            <div class="col-lg-4">
                            <textarea placeholder="" name='d' rows="2" class="form-control" data-trigger="keyup"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Pejabat Penerima</label>
                            <div class="col-lg-4">
                            <input type="text" name="e" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                		<div class="form-group">
                            <label class="col-lg-2 control-label">Tempat</label>
                            <div class="col-lg-4">
                            <input type="text" name="f" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>


                        <div class="form-group">
                        <label class="col-lg-2 control-label">Cari File</label>
                            <div class="col-lg-10">
                            <input type="file" name="g" title="Pilih File" class="btn-success btn-small"> 
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
    $e = mysql_fetch_array(mysql_query("SELECT * FROM tamu where id_tamu='$_GET[id]'"));
    if (isset($_POST[update])){
    	    $dir_gambar = 'tamu';
            $filename = basename($_FILES['g']['name']);
            $uploadfile = $dir_gambar . $filename;
            $tanggaleks = date("Y-m-d H:i:s");
                if ($filename != ''){
                    if (move_uploaded_file($_FILES['g']['tmp_name'], $uploadfile)) {            
                         mysql_query("UPDATE tamu SET         tgl_masuk     = '$_POST[a]',
                                                              identitas       = '$_POST[b]',
                                                              jml_tamu            = '$_POST[c]',
                                                              maksud 		 = '$_POST[d]',
                                                              penerima             = '$_POST[e]',
                                                              tempat         = '$_POST[f]',
                                                              
                                                              upload_file       = '$filename'
                                                               where id_tamu='$_GET[id]'");
                                       
                        echo "<script>window.alert('Sukses Update Data Tamu .');
                                window.location='outboxg'</script>";
                    }else{
                        echo "<script>window.alert('Gagal Update Data Tamu.');
                                window.location='outboxg'</script>";
                    }
                }else{
                       mysql_query("UPDATE tamu SET 			tgl_masuk     = '$_POST[a]',
                                                              identitas       = '$_POST[b]',
                                                              jml_tamu            = '$_POST[c]',
                                                              maksud 		 = '$_POST[d]',
                                                              penerima             = '$_POST[e]',
                                                              tempat         = '$_POST[f]',
                                                              
                                                              upload_file       = '$filename'
                                                               where id_tamu='$_GET[id]'");
                                       
                        echo "<script>window.alert('Sukses Update Data Tamu .');
                                window.location='outboxg'</script>";
                }
    }
?>

                <h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><strong>Edit Data Tamu</strong></div>
                <div class="panel-body">
                    <form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>      

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tgl Kunjungan</label>
                            <div class="col-lg-2">
                                <input type="text" name="a" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[tgl_masuk]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Identitas Tamu</label>
                            <div class="col-lg-4">
                                <input type="text" name="b" placeholder="" data-required="true" class="bg-focus form-control " value="<?php echo $e[identitas]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Jumlah Tamu</label>
                            <div class="col-lg-2">
                                <input type="text" name="c" placeholder="" data-required="true" class="bg-focus form-control " value="<?php echo $e[jml_tamu]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Maksud Kunjungan</label>
                            <div class="col-lg-4">
                           <textarea placeholder="" name='d' rows="2" class="form-control" data-trigger="keyup"><?php echo $e[maksud]; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Pejabat Penerima</label>
                            <div class="col-lg-4">
                            <input type="text" name="e" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[penerima]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tempat</label>
                            <div class="col-lg-4">
                            <input type="text" name="f" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[tempat]; ?>">
                            </div>
                        </div>

                        

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Ganti File</label>
                            <div class="col-lg-4">
                            <input type="file" name="g" title="Pilih File" class="btn-success btn-small"> 
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
    $e = mysql_fetch_array(mysql_query("SELECT * FROM tamu where id_tamu='$_GET[id]'"));
    echo "<h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class='col-md-12'>
            <div class='panel panel-default'>
            <div class='panel-heading'><strong>Detail Data Tamu</strong></div>
                <div class='panel-body'>
                    <form action='' class='form-horizontal' data-validate='parsley' enctype='multipart/form-data'>

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Tanggal Kunjungan</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                 $e[tgl_masuk]
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Identitas Tamu</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                $e[identitas]
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Jumlah Tamu</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                $e[jml_tamu]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Maksud Kunjungan</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                $e[maksud]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Pejabat Penerima</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                $e[penerima]
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>Tempat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                $e[tempat]
                            </div>
                        </div>

                       

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>File Surat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                 <a href='download_tamu.php?file=$e[upload_file]'>Download File </a>
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