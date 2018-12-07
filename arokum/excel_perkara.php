<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=laporan-surat-masuk_b.xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");

  session_start();
  error_reporting(0);
  include "koneksi.php";
?>
<head>
<title>Print - Semua Data Perkara</title>
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
    <td align="center" colspan="12"><strong>PEMERINTAHAN PROVINSI DKI JAKARTA <br>
    									   SEKRETARIAT DAERAH <br>
    									   BIRO HUKUM</strong></td>
  </tr>
  <tr>
    <td align="center" colspan="12"><p>Jln. Merdeka Selatan No 8-9  <br> Telp. (021) 3822014, Kode Pos. 10110</p></td>
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
                      
                        $inbox = mysql_query("SELECT * FROM pengadilan ORDER BY pengadilan_id ASC");
                      
                      $no = 1;
                        while ($i = mysql_fetch_array($inbox)){
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
    <td width="230" align="center" colspan="3">Mengetahui <br> Direktur RIYAN</td>
    <td align="center" colspan="4">Mengetahui <br> Manager ZAID</td>
  </tr>
  <tr>
    <td align="center" colspan="3"><br /><br /><br /><br /><br />
      ( ...................................... )<br /><br /><br /></td>
    <td align="center" colspan="4"><br /><br /><br /><br /><br />
      ( ...................................... )<br />
    </td>
  </tr>
</table> 
