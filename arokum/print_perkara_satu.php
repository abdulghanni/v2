<title>Print Data Perkara</p></title>
<body onLoad="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
?>
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><strong><p style='margin-bottom:-9px'>PEMERINTAH PROVINSI DKI JAKARTA </p> <p style='margin-bottom:-9px'>SEKRETARIAT DAERAH </p> <p style='margin-bottom:9px'>BIRO HUKUM</p></strong></td>
  </tr>
  <tr>
    <td align="center"><p>Jln. Merdeka Selatan No 8-9 <br> Telp. (021)382 2014, Kode Pos. 10110</p></td>
  </tr>   
</table>
<br><br>
<?php	
$e = mysql_fetch_array(mysql_query("SELECT * FROM pengadilan where pengadilan_id='$_GET[id]'"));
  echo "<table>
            

            <tr>
                <td width='150'>No Perkara</td>
                <td width=20px> : </td>
                <td>$e[no_perkara]</td>
            </tr>

            

            <tr>
                <td>Tujuan Penggugat</td>
                <td width=20px> : </td>
                <td>$e[penggugat]</td>
            </tr>

            <tr>
                <td>Tergugat</td>
                <td width=20px> : </td>
                <td>$e[tergugat]</td>
            </tr>

            <tr>
                <td>Obyek Gugatan</td>
                <td width=20px> : </td>
                <td>$e[obyek_gugatan]</td>
            </tr>

            <tr>
                <td>Pengadilan TUN</td>
                <td width=20px> : </td>
                <td>$e[ptun]</td>
            </tr>

            <tr>
                <td>Pengadilan Tinggi TUN</td>
                <td width=20px> : </td>
                <td>$e[ptn]</td>
            </tr>

            <tr>
                <td>Kasasi MA</td>
                <td width=20px> : </td>
                <td>$e[kasasi_ma]</td>
            </tr>

            <tr>
                <td>Pk MA</td>
                <td width=20px> : </td>
                <td>$e[pk_ma]</td>
            </tr>


             <tr>
                <td>Keterangan</td>
                <td width=20px> : </td>
                <td>$e[keterangan]</td>
            </tr>
        </table><br><br>";
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