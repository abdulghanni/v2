<title>Print Data Perkara</title>
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
                        <th width='50px'>No</th>
                        <th>No Perkara</th>
                        <th>Penggugat</th>
                        <th>Tergugat</th>
                        <th>Obyek Gugatan</th>
                        <th>Pengadilan TUN</th>
                        <th>Pengadilan Tinggi TUN</th>
                        <th>Kasasi(MA)</th>
                        <th>PK(MA)</th>
                        <th>Keterangan</th>
                    </tr>
                    </thead>
                    <tbody>";
                      
                      $pengadilan = mysql_query("SELECT * FROM pengadilan ORDER BY pengadilan_id ASC");
                    
                      $no = 1;
                        while ($i = mysql_fetch_array($pengadilan)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td valign=top>$i[no_perkara]</td>
                                    <td valign=top>$i[penggugat]</td>
                                    
                                    <td valign=top>$i[tergugat]</td>
                                    <td valign=top>$i[obyek_gugatan]</td>
                                    <td valign=top>$i[ptun]</td>
                                    <td valign=top>$i[ptn]</td>
                                    <td valign=top>$i[kasasi_ma]</td>
                                    <td valign=top>$i[pk_ma]</td>
                                    <td valign=top>$i[keterangan]</td>";
                                    
                                
                            $no++;
                        }
?>

<table width=100%>
  <tr>
    <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <td width="230" align="center">Mengetahui <br> Direktur FATA</td>
    <td width="530"></td>
    <td align="center">Mengetahui <br> Manager ZAID</td>
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