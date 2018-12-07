<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=laporan-surat-keluar.xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");

  session_start();
  error_reporting(0);
  include "koneksi.php";
?>
<head>
<title>Print - Semua Data Surat Keluar</title>
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
                        <th width=30px>No</th>
                        <th>Tgl Kunjungan</th>
                        <th>Identitas Tamu</th>
                        <th>Jumlah Tamu</th>
                        <th>Maksud Kunjungan</th>
                        <th>Pejabat Penerima</th>
                        <th>Tempat</th>
                    </tr>
                    </thead>
                    <tbody>";
                        $inbox = mysql_query("SELECT * FROM phpmu_outbox_g ORDER BY id_outbox ASC");
                        $no = 1;
                        while ($i = mysql_fetch_array($inbox)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[tgl_masuk]</td>
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
    <td width="230" align="center" colspan="3">Mengetahui <br> ````````</td>
    <td align="center" colspan="4">Mengetahui <br> ``````````````</td>
  </tr>
  <tr>
    <td align="center" colspan="3"><br /><br /><br /><br /><br />
      ( ...................................... )<br /><br /><br /></td>
    <td align="center" colspan="4"><br /><br /><br /><br /><br />
      ( ...................................... )<br />
    </td>
  </tr>
</table> 
