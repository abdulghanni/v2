<body onLoad="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
?>
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><strong><p style='margin-bottom:-9px'>PEMERINTAH PROVINSI DKI JAKARTA </p> <p style='margin-bottom:-9px'>SEKRETARIAT DAERAH  </p> <p style='margin-bottom:9px'> BIRO HUKUM</p></strong></td>
  </tr>
  <tr>
    <td align="center"><p>Jln. Merdeka Selatan No 8-9 Lantai 9  <br> Telp. (021) 3282014, Kode Pos. 10110</p></td>
  </tr>  
  <tr>
  
</table>
<br><br>
<?php	
$in = mysql_fetch_array(mysql_query("SELECT * FROM tamu where id_tamu='$_GET[id]'"));
  echo "<table>
            <tr>
                <td width='150'>Tgl Kunjungan</td>
                <td width=20px> : </td>
                <td>$in[tgl_masuk]</td>
            </tr>

            <tr>
                <td>Identitas Tamu</td>
                <td width=20px> : </td>
                <td>$in[identitas]</td>
            </tr>

            <tr>
                <td>Jumlah Tamu</td>
                <td width=20px> : </td>
                <td>$in[jml_tamu]</td>
            </tr>

            <tr>
                <td>Maksud Kunjungan</td>
                <td width=20px> : </td>
                <td>$in[maksud]</td>
            </tr>

            <tr>
                <td>Penerima</td>
                <td width=20px> : </td>
                <td>$in[penerima]</td>
            </tr>

            <tr>
                <td>Tempat</td>
                <td width=20px> : </td>
                <td>$in[tempat]</td>
            </tr>
        </table><br><br>";
?>

<table width=100%>
  <tr>
    <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <td width="230" align="center">Mengetahui <br> ..........</td>
    <td width="530"></td>
    <td align="center">Mengetahui <br> ...........</td>
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