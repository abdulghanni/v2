<title>Print Data Surat Masuk</title>
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
                    </tr>
                    </thead>
                    <tbody>";
                      if ($_SESSION[unit]=='0'){
                        $inbox = mysql_query("SELECT * FROM undangan ORDER BY undangan_id ASC");
                      }else{
                        $inbox = mysql_query("SELECT * FROM phpmu_inbox_b where unit_kerja='$_SESSION[unit]' ORDER BY id_inbox_b ASC");
                      } 
                      $no = 1;
                        while ($i = mysql_fetch_array($inbox)){
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
    <td width="230" align="center">Mengetahui <br> Direktur PHP[mu]</td>
    <td width="530"></td>
    <td align="center">Mengetahui <br> Manager Keuangan</td>
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