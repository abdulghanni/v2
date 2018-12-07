
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
<title>Print - Semua Data Cuti</title>
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
                         <th>No</th>
                        <th>Nomor Cuti</th>
                        <th>Nama</th>
                         <th>NIP/NRK</th>
                        <th>Pangkat</th>
                         <th>Jabatan</th>
                        <th>Jenis Cuti</th>
                         <th>Jumnlah Cuti Diambil</th>
                        
                        <th>Keterangan</th>
                    </tr>
                    </thead>
                    <tbody>";
                      if ($_SESSION[unit]=='0'){
                        $cuti = mysql_query("SELECT * FROM cuti a JOIN jeniscuti b ON a. id_jeniscuti=b.id_jeniscuti ORDER BY a.id_cuti ASC");
                     
                      } 
                      $no = 1;
                        while ($i = mysql_fetch_array($cuti)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[nomor]</td>
                                    <td>$i[nama]</td>
									<td>$i[nip]</td>
									<td>$i[pangkat]</td>
                                    <td>$i[jabatan]</td>
									<td>$i[id_jeniscuti]</td>
                                    <td>$i[jml_diambil]</td>
									
                                    <td>$i[keterangan]</td>
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
