<title>Print Data Perbal</title>
<body onLoad="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
?>
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td width="550" align="center">&nbsp;</td>
	<td width="65" rowspan="6"><img src="images/" width="90" height="90"></td>
  </tr>
  <tr>
    <td align="center"><strong><p style='margin-bottom:-9px'>PEMERINTAH PROVINSI DKI JAKARTA  </p> <p style='margin-bottom:-9px'>SEKRETARIAT DAERAH </p> <p style='margin-bottom:9px'>BIRO HUKUM</p></strong></td>
  </tr>
  <tr>
    <td align="center"><p>Jln. Merdeka Selatan No 8-9 Lantai 9  <br> Telp. (021) 3282014, Kode Pos. 10110</p></td>
  </tr>   
</table>
<br><br>
<?php	
	echo "<table width=100% border=1>
					<tr bgcolor='green'>
			<th>No</th>	
                      <th>No Perbal</th>	  
                        <th>Tgl Masuk</th>
                         <th>Asal</th>
                        <th>Perihal</th>
                        <th>Disp Karo</th>
                        <th>Disp Kabag</th>
                        
                        <th>Keterangan</th>
                    </tr>
                    </thead>
                    <tbody>";
                     
                        $inbox = mysql_query("SELECT * FROM perbal ORDER BY perbal_id ASC");
                     
                     
                        $no = 1;
                        while ($i = mysql_fetch_array($inbox)){
                            echo "<tr class='gradeX'>
                            		<td>$no</td>
                                    <td>$i[no_perbal]</td>
                                    <td>$i[tgl_masuk]</td>
                                     <td>$i[asal]</td>
                                    <td>$i[perihal]</td>
                                    <td>$i[disposisi]</td>
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