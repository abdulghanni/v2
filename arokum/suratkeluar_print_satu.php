<body onLoad="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
?>
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><strong><p style='margin-bottom:-9px'>PEMERINTAHAN PROVINSI DKI JAKARTA </p> <p style='margin-bottom:-9px'>SEKRETARIAT DAERAH </p> <p style='margin-bottom:9px'>BIRO HUKUM</p></strong></td>
  </tr>
  <tr>
    <td align="center"><p>Jln Merdeka Selatan No 8-9  <br> Telp. (021) 3822014, Kode Pos. 10110</p></td>
  </tr>   
</table>
<br><br>
<?php	
$in = mysql_fetch_array(mysql_query("SELECT * FROM suratkeluar where suratkeluar_id='$_GET[id]'"));
  echo "<table>
            <tr>
                <td width='150'>No Surat</td>
                <td width=20px> : </td>
                <td>$in[no_surat]</td>
            </tr>

            <tr>
                <td>Pengonsep</td>
                <td width=20px> : </td>
                <td>$in[pengonsep]</td>
            </tr>

            <tr>
                <td>Tgl Surat</td>
                <td width=20px> : </td>
                <td>$in[tgl_surat]</td>
            </tr>

            <tr>
                <td>Ditujukan</td>
                <td width=20px> : </td>
                <td>$in[ditujukan]</td>
            </tr>

            
            <tr>
                <td>Jenis Surat</td>
                <td width=20px> : </td>
                <td>$in[jenis_surat]</td>
            </tr>

            <tr>
                <td>Perihal</td>
                <td width=20px> : </td>
                <td>$in[perihal]</td>
            </tr>
			 <tr>
                <td>Tgl Keluar</td>
                <td width=20px> : </td>
                <td>$in[tgl_keluar]</td>
            </tr>

            <tr>
                <td>Keterangan</td>
                <td width=20px> : </td>
                <td>$in[keterangan]</td>
            </tr>
			
        </table><br><br>";
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