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
    <td align="center" colspan="8"><p>Jln.Merdeka Selatan No 8-9  <br> Telp. (021) 3822014, Kode Pos. 10110</p></td>
  </tr>   
</table>
<br><br>
<?php	
	echo "<table width=100% border=1>
					<tr bgcolor='green'>
                          <th>No</th>
                        <th>No.Surat</th>
                        <th>Pengonsep</th>
                        <th>Tgl Surat</th>
                        <th>Ditujukan</th>
                        <th>Jenis Surat</th>
                        <th>Perihal</th>
                        <th>Tgl Keluar</th>
                        <th>Keterangan</th>
                    </tr>
                    </thead>
                    <tbody>";
                      if ($_SESSION[unit] == '0'){
                        $inbox = mysql_query("SELECT * FROM suratkeluar ORDER BY suratkeluar_id ASC");
                      }else{
                        $inbox = mysql_query("SELECT * FROM phpmu_outbox where unit_kerja='$_SESSION[unit]' ORDER BY id_outbox ASC");
                      }
                        $no = 1;
                        while ($i = mysql_fetch_array($inbox)){
                            echo "<tr class='gradeX'>
                                   <td>$no</td>
                                    <td valign=top>$i[no_surat]</td>
                                    <td valign=top>$i[pengonsep]</td>
                                    
                                    <td valign=top>$i[tgl_surat]</td>
                                    <td valign=top>$i[ditujukan]</td>
                                    <td valign=top>$i[jenis_surat]</td>
                                    <td valign=top>$i[perihal]</td>
                                    <td valign=top>$i[tgl_keluar]</td>
                                    
                                    <td valign=top>$i[keterangan]</td>
                                 </tr>";
                            $no++;
                        }
?>

<table width=100%>
  <tr>
    <td width="230" align="center" colspan="3">Mengetahui <br> Direktur PHP[mu]</td>
    <td align="center" colspan="4">Mengetahui <br> Manager Keuangan</td>
  </tr>
  <tr>
    <td align="center" colspan="3"><br /><br /><br /><br /><br />
      ( ...................................... )<br /><br /><br /></td>
    <td align="center" colspan="4"><br /><br /><br /><br /><br />
      ( ...................................... )<br />
    </td>
  </tr>
</table> 
