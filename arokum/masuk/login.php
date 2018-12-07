<!DOCTYPE html>
<html>
<head>
  <title>Login - Administrator</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- theme -->
    <link rel="stylesheet" type="text/css" href="css/theme/default.css" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="css/elements/signin.css" />
 

    <!-- open sans font -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400italic,700italic,400,700" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
      <script src="js/html5.js"></script>
    <![endif]-->

</head>
<body class="onepage">
    <?php 
        if (isset($_POST[login])){
            $user = $_POST['user'];
            $pass = md5($_POST['pass']);
            $login=mysql_query("SELECT * FROM phpmu_user
                WHERE username='$user' AND password='$pass' AND status='Y'");
            $cocok=mysql_num_rows($login);
            $r=mysql_fetch_array($login);

            if ($cocok > 0){
                $_SESSION[login]        = $r[id_user];
                $_SESSION[username]     = $r[username];
                $_SESSION[namalengkap]  = $r[nama_lengkap];
                $_SESSION[password]     = $r[password];
                $_SESSION[level]        = $r[level];
                $_SESSION[unit]        = $r[unit_kerja];

                header('location:index.php');
            }else{
                echo "<script>window.alert('Maaf, Anda Tidak Memiliki akses');
                        window.location=('index.php')</script>";
            }
        }

        if (isset($_POST[aksidaftar])){
        		$waktu = date("Y-m-d H:i:s");
        		$pass = md5($_POST[b]);
        		mysql_query("INSERT INTO phpmu_user (username, password, nama_lengkap, alamat_email, no_telpon, alamat_lengkap, level, status, waktu_daftar, unit_kerja)
        									 VALUES ('$_POST[a]','$pass','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','user_biasa','N','$waktu','$_POST[unit]')");
                header('location:index.php?daftar=success');

        }

if (isset($_GET[daftar])){
?>

     <div class="col-md-4 col-md-offset-4 text-center">
        <h2 class='logo'>PENDAFTARAN </h2>

        <div>
            <?php if ($_GET[daftar]=='success'){ ?>
            	<p><i style='color:red'>Sukses dan anda baru bisa login jika akun anda sudah di Aktifkan Oleh Administrator, <a href='index.php'>Login Disini!</a></i></p>
            <?php }else{ ?>
            	<p>Selamat Datang  di Aplikasi Surat<br>Develope by www.fatazaid.com</p>
            	<p>Masukkan Data anda Pada Form berikut untuk Mendaftar.</p>
            <?php } ?>

            <form class="m-t" role="form" action="" method='POST'>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required name='a'>
                    <input type="text" class="form-control" placeholder="Password" required name='b'>
                    <input type="text" class="form-control" placeholder="Nama Lengkap" required name='c'>
                    <input type="email" class="form-control" placeholder="Alamat Email" required name='d'>
                    <input type="text" class="form-control" placeholder="No Telepon" required name='e'>
                    <textarea style='height:90px' class="form-control" placeholder="Alamat Lengkap" required name='f'></textarea>
                    <select name="unit" class="form-control">
                            <option value="" selected>- Pilih Unit Kerja -</option>
                            <option value="A">BANKUM</option>
                            <option value="A">DOKUMENTASI</option>
                            <option value="A">PERUNDANGAN</option>
                            <option value="A">YANKUM</option>
                            <option value="E">PERKARA</option>
                            
                          </select>
                </div>
                
                <button name='aksidaftar' type="submit" class="btn btn-primary block full-width signin-btn">Kirimkan Data Pendaftaran</button>

            </form>
            <p class="m-t"> <small>&copy;  2017, Develop By Riyan</small> </p>
        </div>
    </div>

<?php }else{ ?>
     <div class="col-md-4 col-md-offset-4 text-center">
        <h2 class='logo'>LOGIN</h2>

        <div>
            <p>Selamat Datang di Aplikasi Surat  <br> Develop by Riyan - www.fatazaid.com</p>

            <p>Silahkan Login Melalui Form Dibawah ini.</p>
            
            <form class="m-t" role="form" action="" method='POST'>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required name='user'>
                    <input type="password" class="form-control" placeholder="Password" required name='pass'>
                </div>
                
                <button name='login' type="submit" class="btn btn-primary block full-width signin-btn">Masuk</button>


                <p class="text-muted text-center"><small>Anda Belum Punya Account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="?daftar">Daftarkan Account Baru</a>
            </form>
            <p class="m-t"> <small>&copy; surat  2017, Develop By Riyan</small> </p>
        </div>
    </div>

<?php } ?>



    <!-- scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/theme.js"></script>


</body>

<!-- Mirrored from istran.net/myxdashboard/signin.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 03 Jun 2015 04:33:17 GMT -->
</html>