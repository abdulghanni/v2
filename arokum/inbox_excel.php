<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=laporan-surat-masuk.xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");

  session_start();
  error_reporting(0);
  include "koneksi.php";
?>
<head>
<title>Print - Semua Data Surat Masuk</title>
<style>
.input1 {
	height: 20px;
	font-size: 12px;
	padding-left: 5px;
	margin: 5px 0px 0px 5px;
	width: 97%;
	border: none;
	color: red;
}
#kiri{
width:50%;
float:left;
}

#kanan{
width:50%;
float:right;
padding-top:20px;
margin-bottom:9px;
}

td { border:1px solid #000; }
th { border:2px solid #000; }
</style>
</head>
<body onLoad="window.print()">
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" colspan="8"><strong>PEMERINTAHAN PROVINSI DKI JAKARTA <br>
    									   SEKRETARIAT DAERAH <br>
    									   BIRO HUKUM</strong></td>
  </tr>
  <tr>
    <td align="center" colspan="8"><p>Jln. Merdeka Selatan No 8-9  <br> Telp. (021) 3822014, Kode Pos. 10110</p></td>
  </tr>   
</table>
<br><br>
<?php	
	echo "<table width=100% border=1>
					<tr bgcolor='green'>
                         <th>No</th>
                        <th>No Agenda</th>
                        <th>Tanggal Masuk</th>
                        <th>Asal</th>
                        <th>No.Surat</th>
                        <th>Tgl Surat</th>
                        <th>Perihal</th>
                        <th>Disp Pimp</th>
                        <th>Disp Karo</th>
                        <th>Keterangan</th>
                        <th>Disp Kabag</th>
                        <th>Keterangan</th>
                    </tr>
                    </thead>
                    <tbody>";
                      if ($_SESSION[unit] == '0'){
                        $inbox = mysql_query("SELECT * FROM surat ORDER BY surat_id ASC");
                      }else{
                        $inbox = mysql_query("SELECT * FROM surat where unit_kerja='$_SESSION[unit]' ORDER BY surat_id ASC");
                      }
                        $no = 1;
                        while ($i = mysql_fetch_array($inbox)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[no_agenda]</td>
                                    <td>$i[tgl_masuk]</td>
                                    <td>$i[asal]</td>
									<td>$i[no_surat]</td>
                                    <td>$i[tgl_surat]</td>
                                    <td>$i[perihal]</td>
                                    <td>$i[disp_pim]</td>
									<td>$i[disp_karo]</td>
                                    <td>$i[keterangan]</td>
                                    <td>$i[disp_kabag]</td>
                                    <td>$i[keterangan1]</td>
                                 </tr>";
                            $no++;
                        }
?>

<table width=100%>
  <tr>
    <td width="230" align="center" colspan="3">Mengetahui <br> Direktur Fata</td>
    <td align="center" colspan="4">Mengetahui <br> Manager Zaid</td>
  </tr>
  <tr>
    <td align="center" colspan="3"><br /><br /><br /><br /><br />
      ( ...................................... )<br /><br /><br /></td>
    <td align="center" colspan="4"><br /><br /><br /><br /><br />
      ( ...................................... )<br />
    </td>
  </tr>
</table> 
