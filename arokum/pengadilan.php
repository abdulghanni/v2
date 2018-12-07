 <?php 
    if ($_GET[aksi]==''){
?>
        <h4 style='padding-top:15px'>Semua Data Pengadilan</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php if ($_SESSION[level]=='user_admin'){ ?>
                        <a class='btn btn-primary' href='index.php?page=pengadilan&aksi=tambah'><i class='fa fa-plus'></i> Tambah Data Pengadilan</a>
                        <a class='btn btn-info' target='BLANK' href='print_perkara.php'><i class='fa fa-print'></i> Print Data Pengadilan</a>
                        <a class='btn btn-success' href='excel_perkara.php'><i class='fa fa-file'></i> Export ke Excel</a>
                    <?php }elseif ($_SESSION[level]=='user_input'){ ?>
                        <a class='btn btn-primary' href='index.php?page=pengadilan&aksi=tambah'><i class='fa fa-plus'></i> Tambah Data Pengadilan</a>
                         <a class='btn btn-info' target='BLANK' href='print_perkara.php'><i class='fa fa-print'></i> Print Data Pengadilan</a>
                        <a class='btn btn-success' href='excel_perkara.php'><i class='fa fa-file'></i> Export ke Excel</a>
                    <?php } ?>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead  class='alert-success'>
                    <tr>
                        <th>No</th>
                        <th>No Perkara</th>
                        <th>Penggugat</th>
                        <th>Tergugat</th>
                        <th>Obyek Gugatan</th>
                        <th>Pengadilan TUN</th>
                        <th>Pengadilan Tinggi TUN</th>
                        <th>Kasasi(MA)</th>
                        <th>PK(MA)</th>
                        <th>Keterangan</th>
                         <th>Unit</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                     
                       if ($_SESSION[unit] == '0'){
                        $pengadilan = mysql_query("SELECT * FROM pengadilan ORDER BY pengadilan_id ASC");
                      }else{
                            $pengadilan = mysql_query("SELECT * FROM pengadilan where unit_kerja='$_SESSION[unit]' ORDER BY pengadilan_id ASC");
					  }
                        $no = 1;
                        while ($i = mysql_fetch_array($pengadilan)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[no_perkara]</td>
                                    <td>$i[penggugat]</td>
                                    <td>$i[tergugat]</td>
									<td>$i[obyek_gugatan]</td>
                                    <td>$i[ptun]</td>
                                    <td>$i[ptn]</td>
									<td>$i[kasasi_ma]</td>
                                    <td>$i[pk_ma]</td>
                                    <td>$i[keterangan]</td>
									<td>$i[unit_kerja]</td>";
                                        if ($_SESSION[level]=='user_admin'){ 
                                            echo "<td style='width:165px' class='text-right'><a class='btn' href='index.php?page=pengadilan&aksi=detail&id=$i[pengadilan_id]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>
                                                  <a class='btn' target='BLANK' href='print_perkara_satu.php?id=$i[pengadilan_id]' title='Print Surat ini'><i class='fa fa-print'></i></a>
                                                  <a class='btn' href='index.php?page=pengadilan&aksi=edit&id=$i[pengadilan_id]' title='Edit Data Surat ini'><i class='fa fa-pencil-square-o'></i></a>
                                                  <a class='btn' href='index.php?page=pengadilan&aksi=hapus&id=$i[pengadilan_id]' title='Hapus Surat ini' onclick=\"return confirm('Apakah anda Yakin Data ini Dihapus?')\"><i class='fa fa-trash-o'></i></a>";
                                        }elseif ($_SESSION[level]=='user_input'){ 
                                            echo "<td style='width:90px' class='text-right'><a class='btn' href='index.php?page=pengadilan&aksi=detail&id=$i[pengadilan_id]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>
                                                  <a class='btn' href='index.php?page=pengadilan&aksi=edit&id=$i[pengadilan_id]' title='Edit Data Surat ini'><i class='fa fa-pencil-square-o'></i></a>";
                                        }else{
                                            echo "<td style='width:50px' class='text-right'><a class='btn' href='index.php?page=pengadilan&aksi=detail&id=$i[pengadilan_id]' title='Lihat Detail Surat ini'><i class='fa fa-folder-open'></i></a>";
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
    mysql_query("DELETE FROM pengadilan where pengadilan_id='$_GET[id]'");
    echo "<script>window.alert('Data Surat Keluar Berhasil Di Hapus.');
                                window.location='pengadilan'</script>";

}elseif ($_GET[aksi]=='tambah'){ 
    if (isset($_POST[simpan])){
        if ($_SESSION[unit] == '0'){
            $unit = $_POST[unit];
        }else{
            $unit = $_SESSION[unit];
        }
        $dir_gambar = 'surat_perkara/';
            $filename = basename($_FILES['j']['name']);
            $uploadfile = $dir_gambar . $filename;
            $tanggaleks = date("Y-m-d H:i:s");
                if ($filename != ''){
                    if (move_uploaded_file($_FILES['j']['tmp_name'], $uploadfile)) {            
                         mysql_query("INSERT INTO pengadilan (no_perkara, 
                                                                  penggugat, 
                                                                  tergugat, 
                                                                  obyek_gugatan, 
                                                                  ptun, 
                                                                  ptn, 
                                                                  kasasi_ma,
                                                                  pk_ma,
                                                                   
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
                                       
                        echo "<script>window.alert('Sukses Menambahkan Data Pengadilan .');
                                window.location='pengadilan'</script>";
                    }else{
                        echo "<script>window.alert('Gagal Menambahkan Data Pengadilan.');
                                window.location='index.php?page=pengadilan&aksi=tambah'</script>";
                    }
                }else{
                       mysql_query("INSERT INTO pengadilan (no_perkara, 
                                                                  penggugat, 
                                                                  tergugat, 
                                                                  obyek_gugatan, 
                                                                  ptun, 
                                                                  ptn, 
                                                                  kasasi_ma,
                                                                  pk_ma,
                                                                   
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
                                       
                        echo "<script>window.alert('Sukses Menambahkan Data Pengadilan .');
                                window.location='pengadilan'</script>";
                }
    }
?>

                <h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading"><strong>Tambahkan Data Pengadilan</strong></div>
                <div class="panel-body">
                    <form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>      

                    	<div class="form-group">
                            <label class="col-lg-2 control-label">No Perkara</label>
                            <div class="col-lg-2">
                                <input type="text" name="a" placeholder="" data-required="true" class="bg-focus form-control ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Penggugat</label>
                            <div class="col-lg-4">
                            <textarea placeholder="" name='b' rows="2" class="textarea form-control" data-trigger="keyup"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Tergugat</label>
                            <div class="col-lg-4">
                            <input type="text" name="c" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Obyek Gugatan</label>
                            <div class="col-lg-4">
                            <input type="text" name="d" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Pengadilan TUN</label>
                            <div class="col-lg-4">
                            <input type="text" name="e" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Pengadilan Tinggi TUN</label>
                            <div class="col-lg-5">
                            <input type="text" name="f" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Kasasi MA</label>
                            <div class="col-lg-4">
                            <input type="text" name="g" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">PK MA</label>
                            <div class="col-lg-4">
                            <input type="text" name="h" placeholder="" class="bg-focus form-control" data-required="true">
                            </div>
                        </div>

                		<div class="form-group">
                        <label class="col-lg-2 control-label">Keterangan</label>
                            <div class="col-lg-4">
                            <input type="text" name="i" placeholder="" class="bg-focus form-control" data-required="true">
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
                                <option value='E'>Perkara</option>
                               
                                
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
    $e = mysql_fetch_array(mysql_query("SELECT * FROM pengadilan where pengadilan_id='$_GET[id]'"));
    if (isset($_POST[update])){
    	    $dir_gambar = 'surat_perkara/';
            $filename = basename($_FILES['j']['name']);
            $uploadfile = $dir_gambar . $filename;
            $tanggaleks = date("Y-m-d H:i:s");
                if ($filename != ''){
                    if (move_uploaded_file($_FILES['j']['tmp_name'], $uploadfile)) {            
                        mysql_query("UPDATE pengadilan SET 	no_perkara   = '$_POST[a]',
                                             				 penggugat    = '$_POST[b]',
                                             				 tergugat      = '$_POST[c]',
											  				obyek_gugatan   = '$_POST[d]',
                                              				 ptun    = '$_POST[e]',
                                              				 ptn      = '$_POST[f]',
											   				kasasi_ma  = '$_POST[g]',
                                               				pk_ma    = '$_POST[h]',
                                               				keterangan      = '$_POST[i]',
                                                            upload_file   = '$filename' 
															where pengadilan_id='$_GET[id]'");
                                       
                        echo "<script>window.alert('Sukses Update Data Pengadilan .');
                                window.location='pengadilan'</script>";
                    }else{
                        echo "<script>window.alert('Gagal Update Data .');
                                window.location='pengadilan'</script>";
                    }
                }else{
                       mysql_query("UPDATE pengadilan SET no_perkara   = '$_POST[a]',
                                             				 penggugat    = '$_POST[b]',
                                             				 tergugat      = '$_POST[c]',
											  				obyek_gugatan   = '$_POST[d]',
                                              				 ptun    = '$_POST[e]',
                                              				 ptn      = '$_POST[f]',
											   				kasasi_ma  = '$_POST[g]',
                                               				pk_ma    = '$_POST[h]',
                                               				keterangan      = '$_POST[i]'
											   				where pengadilan_id='$_GET[id]'");
                                       
                        echo "<script>window.alert('Sukses Update Data Pengadilan .');
                                window.location='pengadilan'</script>";
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
                            <label class="col-lg-2 control-label">No Perkara</label>
                            <div class="col-lg-2">
                                <input type="text" name="a" placeholder="" data-required="true" class="bg-focus form-control " value="<?php echo $e[no_perkara]; ?>">
                            </div>
                        </div>

                        

                       
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Penggugat</label>
                            <div class="col-lg-4">
                            <textarea placeholder="" name='b' rows="2" class="textarea form-control" data-trigger="keyup"><?php echo $e[penggugat]; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Tergugat</label>
                            <div class="col-lg-4">
                            <input type="text" name="c" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[tergugat]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Obyek Gugatan</label>
                            <div class="col-lg-4">
                            <input type="text" name="d" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[obyek_gugatan]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Pengadilan TUN</label>
                            <div class="col-lg-4">
                            <input type="text" name="e" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[ptun]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Pengadilan Tinggi TUN</label>
                            <div class="col-lg-4">
                            <input type="text" name="f" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[ptn]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Kasasi MA</label>
                            <div class="col-lg-4">
                            <input type="text" name="g" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[kasasi_ma]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">PK MA</label>
                            <div class="col-lg-4">
                            <input type="text" name="h" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[pk_ma]; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label">Keterangan</label>
                            <div class="col-lg-6">
                            <input type="text" name="i" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[keterangan]; ?>">
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
    $e = mysql_fetch_array(mysql_query("SELECT * FROM pengadilan where pengadilan_id='$_GET[id]'"));
    echo "<h4 style='padding-top:15px'></h4>
            <!-- Basic Data Tables Example -->
            <div class='col-md-12'>
            <div class='panel panel-default'>
            <div class='panel-heading'><strong>Detail Data Pengadilan</strong></div>
                <div class='panel-body'>
                    <form action='' class='form-horizontal' data-validate='parsley' enctype='multipart/form-data'>

                        <div class='form-group'>
                            <label class='col-lg-2 control-label'>No Perkara</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                                $e[no_perkara]
                            </div>
                        </div>

                        

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Penggugat</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[penggugat]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Tergugat</label>
                        <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                          $e[tergugat]
                        </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Obyek Gugatan</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[obyek_gugatan]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Pengadilan TUN</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[ptun]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Pengadilan Tinggi TUN</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[ptn]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>Kasasi MA</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[kasasi_ma]
                            </div>
                        </div>

                        <div class='form-group'>
                        <label class='col-lg-2 control-label'>PK MA</label>
                            <div style='border-bottom:1px solid #e3e3e3' class='col-lg-9'>
                            $e[pk_ma]
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
                                 <a href='download_perkara.php?file=$e[upload_file]'>Download File Surat</a>
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