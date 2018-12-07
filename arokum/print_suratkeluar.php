<title>Print Data Surat Keluar</title>
<body onLoad="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
?>
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td width="550" align="center">&nbsp;</td>
	<td width="65" rowspan="6"><img src="images/logo.jpg" width="90" height="90"></td>
  </tr>
  <tr>
    <td align="center"><strong><p style='margin-bottom:-9px'>PEMERINTAHAN PROVINSI DKI JAKARTA </p> <p style='margin-bottom:-9px'>SEKRETARIAT DAERAH </p> <p style='margin-bottom:9px'>BIRO HUKUM</p></strong></td>
  </tr>
  <tr>
    <td align="center"><p>Jln. Merdeka Selatan No 8-9  <br> Telp. (021) 3822014, Kode Pos. 10110</p></td>
  </tr>   
</table>
<br><br>
<?php	
	echo "<table width=100% border=1>
					<tr bgcolor='green'>
                         <th>No</th>
                        <th>No.Surat</th>
                        <th>Pengonsep</th>
                        <th>Tgl Surat</th>
                        <th>Ditujukan</th>
                        <th>Jenis Surat</th>
                        <th>Perihal</th>
                        <th>Tgl Keluar</th>
                        <th>Keterangan</th>
                       
                    </tr>
                    </thead>
                    <tbody>";
                      if ($_SESSION[unit]=='0'){
                        $outbox = mysql_query("SELECT * FROM suratkeluar ORDER BY suratkeluar_id ASC");
                      }else{
                        $outbox = mysql_query("SELECT * FROM phpmu_outbox_b where unit_kerja='$_SESSION[unit]' ORDER BY id_outbox_b ASC"); 
                      }
                        $no = 1;
                        while ($i = mysql_fetch_array($outbox)){
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
                                  
                                 </tr>";
                            $no++;
                        }
?>

<table width=100%>
  <tr>
    <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <td width="230" align="center">Mengetahui <br> Direktur Riyan</td>
    <td width="530"></td>
    <td align="center">Mengetahui <br> Manager Fata</td>
  </tr>
  <tr>
    <td align="center"><br /><br /><br /><br /><br />
      ( ...................................... )<br /><br /><br /></td>
    <td>&nbsp;</td>
    <td align="center" valign="top"><br /><br /><br /><br /><br />
      ( ...................................... )<br />
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table> 
</body>