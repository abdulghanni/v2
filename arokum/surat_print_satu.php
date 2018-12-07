<body onLoad="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
?>
<table class="basic" width=50% border="0" align="LEFT" cellpadding="0" cellspacing="0">
  <tr>
    <td width='170'align="center">LEMBAR DISPOSISI</td>
  </tr>

</table>
<br><br>
<?php	
$in = mysql_fetch_array(mysql_query("SELECT * FROM surat where surat_id='$_GET[id]'"));
  echo "<table >
            <tr>
			
                <td  width='170' >No Agenda</td>
                <td width=20px> : </td>
                <td>$in[no_agenda]</td>
            </tr>

            <tr>
                <td > Tanggal Masuk</td>
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
                <td>Tgl Surat </td>
                <td width=20px> : </td>
                <td>$in[tgl_surat]</td>
            </tr>
                
            <tr>
                <td valign=top>Perihal </td>
                <td width=20px valign=top> : </td>
                <td>$in[perihal]</td>
            </tr>
			
        </table><br><br>";
		
		
?>

<table width=50% border="1">
  <tr>
    <td colspan="1"></td>
    
  </tr>
  <tr>
    <td width="287" align="center">Ditujukan Kepada </td>
    <td align="center">Disposisi/Catatan</td>
    </tr>
    <tr>
    <td align="left">1. Kepala Bagian Perundang-undangan</td>
  </tr>
  <tr>
    <td align="left">2. Kepala Bagian Pelayanan Hukum dan HAM</td>
  </tr>
  <tr>
    <td align="left">3. Kepala Bagian Bantuan hukum</td>
  </tr>
   <tr>
  <td align="left">4. Kepala Bagian Dokumentasi dan Publikasi Hukum </td>
   </tr>
</table> 
 <tr>
  <td align="left">Catatan Lain : </td>
   </tr>
</body>