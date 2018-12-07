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
    <td align="center"><strong><p style='margin-bottom:-9px'>PEMERINTAHAN PROVINSI DKI JAKARTA</p> <p style='margin-bottom:-9px'>SEKRETARIAT DAERAH </p> <p style='margin-bottom:9px'>BIRO HUKUM</p></strong></td>
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
                        <th>Tgl Kunjungan</th>
                        <th>Identitas Tamu</th>
                        <th>Jumlah Tamu</th>
                        <th>Maksud Kunjungan</th>
                        <th>Pejabat Penerima</th>
                        <th>Tempat</th>
                    </tr>
                    </thead>
                    <tbody>";
                        $in = mysql_query("SELECT * FROM tamu ORDER BY id_tamu ASC");
                        $no = 1;
                        while ($i = mysql_fetch_array($in)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                     <td>$i[tgl]</td>
                                    <td>$i[identitas]</td>
                                    <td>$i[jml_tamu]</td>
                                    <td>$i[maksud]</td>
                                    <td>$i[penerima]</td>
                                    <td>$i[tempat]</td>
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
    <td width="230" align="center">Mengetahui <br>.......</td>
    <td width="530"></td>
    <td align="center">Mengetahui <br> .......</td>
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