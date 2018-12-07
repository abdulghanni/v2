<title>Print Data Surat Pengaduan</title>
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
</table>
<br><br>
<?php	
$in = mysql_fetch_array(mysql_query("SELECT * FROM pengaduan where pengaduan_id='$_GET[id]'"));
  echo "<table>
            <tr>
                <td width='150'>No Agenda</td>
                <td width=20px> : </td>
                <td>$in[no_agenda]</td>
            </tr>

            <tr>
                <td>Tgl Masuk</td>
                <td width=20px> : </td>
                <td>$in[tgl_masuk]</td>
            </tr>

            <tr>
                <td>Asal</td>
                <td width=20px> : </td>
                <td>$in[asal]</td>
            </tr>

            <tr>
                <td>No Surat</td>
                <td width=20px> : </td>
                <td>$in[no_surat]</td>
            </tr>

            
            <tr>
                <td>Tgl Surat</td>
                <td width=20px> : </td>
                <td>$in[tgl_surat]</td>
            </tr>

            <tr>
                <td>Perihal</td>
                <td width=20px> : </td>
                <td>$in[perihal]</td>
            </tr>
			 <tr>
                <td>Disposisi</td>
                <td width=20px> : </td>
                <td>$in[disp_pim]</td>
            </tr>

            <tr>
                <td>Tgl TL Surat</td>
                <td width=20px> : </td>
                <td>$in[tgl_tl]</td>
            </tr>
			
			<tr>
                <td>Bentuk TL Surat</td>
                <td width=20px> : </td>
                <td>$in[btl]</td>
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
    <td align="center">Mengetahui <br> .............</td>
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