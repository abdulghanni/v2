<style>
.bs-glyphicons {
  margin: 5px 20px 20px 0px;
  overflow: hidden;
}
.bs-glyphicons-list {
  padding-left: 0;
  list-style: none;
}

.bs-glyphicons-list a {
  color:#8a8a8a !important;
}
ol, ul {
  margin-top: 0;
  margin-bottom: 10px;
}
.bs-glyphicons li {
  float: left;
  width: 20%;
  height: 155px;
  padding: 30px;
  font-size: 10px;
  line-height: 1.4;
  text-align: center;
  border: 1px solid #cecece;
  background-color: #ffffff;
}
.bs-glyphicons li:hover {
  background-color: #e3e3e3;
}
.bs-glyphicons .glyphicon {
  margin-top: 5px;
  margin-bottom: 10px;
  font-size: 74px;
}
.glyphicon {
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: 400;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.bs-glyphicons .glyphicon-class {
  display: block;
  text-align: center;
  word-wrap: break-word;
}
</style>
<div class="bs-docs-section">
  <h4 style='padding-top:15px'>Selamat Datang 
  <?php 
  if ($_SESSION[unit] == '0'){
    echo "$_SESSION[namalengkap] Di"; 
  }else{
    echo "$_SESSION[namalengkap] Di <b style='color:red'>Biro Hukum</b>"; 
  }
  
  ?> Aplikasi Surat Menyurat ...</h4>
  <p style='margin-left:17px'>Aplikasi surat dan juga hak akses masing-masing user terhadap data-data surat masuk dan keluar , 
                              Silahkan Mengelola Semua Data yang ada Melalui menu-menu yang telah tersedia di bawah ini : </p><br>
<div style='margin-left:20px' class="bs-glyphicons">
    <ul class="bs-glyphicons-list">
      

        <a href='index.php'><li>
          <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
          <span class="glyphicon-class">Dashboard</span>
        </li></a>
      
      <?php if ($_SESSION[unit] == '0'){ ?> 

        <a href='index.php?page=inbox'><li>
          <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
          <span class="glyphicon-class">Surat</span>
        </li></a>

        <a href='index.php?page=binbox'><li>
          <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
          <span class="glyphicon-class">Undangan</span>
        </li></a>

        <a href=href="index.php?page=inboxg"><li>
          <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
          <span class="glyphicon-class">Perbal</span>
        </li></a>
      
        <a href="index.php?page=outbox"><li>
          <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
          <span class="glyphicon-class">Surat Keluar</span>
        </li></a>
        
         <a href="index.php?page=boutbox"><li>
          <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
          <span class="glyphicon-class">Surat Pengaduan</span>
        </li></a>
		
        
        
         <a href="index.php?page=pengadilan"><li>
          <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
          <span class="glyphicon-class">Data Pengadilan</span>
        </li></a>
        
		 <a href="index.php?page=outboxg"><li>
          <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
          <span class="glyphicon-class">Tamu</span>
        </li></a>
        
          <a href="index.php?page=cuti"><li>
          <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
          <span class="glyphicon-class">Data Cuti</span>
        </li></a>

          <a href="index.php?page=mutasi"><li>
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          <span class="glyphicon-class">Data Mutasi</span>
        </li></a>
  
          <a href="index.php?page=jeniscuti"><li>
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          <span class="glyphicon-class">Jenis Cuti</span>
        </li></a>


        <?php }elseif ($_SESSION[unit] == 'E'){ ?>

        <a href="index.php?page=pengadilan"><li>
          <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
          <span class="glyphicon-class">Data Pengadilan</span>
        </li></a>




      
       
        <?php }elseif ($_SESSION[unit] == 'A'){ ?>

          <a href="index.php?page=inbox"><li>
          <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
          <span class="glyphicon-class">Surat</span>
        </li></a>

        <a href="index.php?page=binbox"><li>
          <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
          <span class="glyphicon-class">Undangan</span>
        </li></a>

        <a href='href="index.php?page=inboxg"'><li>
          <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
          <span class="glyphicon-class">Perbal</span>
        </li></a>
      
        <a href="index.php?page=outbox"><li>
          <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
          <span class="glyphicon-class">Surat Keluar</span>
        </li></a>
        
		 <a href="index.php?page=boutbox"><li>
          <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
          <span class="glyphicon-class">Surat Pengaduan</span>
        </li></a>
        
		 <a href="index.php?page=outboxg"><li>
          <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
          <span class="glyphicon-class">Tamu</span>
        </li></a>
       

        <?php } ?>
      
        <a href='index.php?page=user&stat=1'><li>
          <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
          <span class="glyphicon-class">Data User Biasa</span>
        </li></a>
        
        <a href='index.php?page=user&stat=2'><li>
          <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
          <span class="glyphicon-class">Data User Input</span>
        </li></a>
        
        <?php if ($_SESSION[level] == 'user_admin'){ ?>
        <a href='index.php?page=user&stat=3'><li>
          <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
          <span class="glyphicon-class">Data User Admin</span>
        </li></a>
        <?php } ?>

        <a href='logout.php'><li>
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          <span class="glyphicon-class">Logout</span>
        </li></a>
    </ul>
  </div>
</div>