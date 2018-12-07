
<ul style='margin-top:25px' id="dashboard-menu">
              <li>
                <a style='padding-top:8px; color:#fff; border-radius:0px; text-align:left; padding-left:15px' class="btn btn-success" href="index.php">
                    <i style='margin-top:-11px; color:#fff' class="fa fa-laptop"></i>
                    <span>Dashboard</span>
                </a>
            </li>  

            <?php if ($_SESSION[unit] == '0'){ ?>  
            <li>
                <a style='padding-top:8px; color:#fff; border-radius:0px; text-align:left; padding-left:15px' class="btn btn-info" href="index.php?page=inbox">
                    <i style='margin-top:-11px; color:#fff' class="fa fa-files-o"></i>
                    <span>Surat</span>
                </a>
            </li>
            <li>
                <a style='padding-top:8px; color:#fff; border-radius:0px; text-align:left; padding-left:15px' class="btn btn-info" href="index.php?page=binbox">
                    <i style='margin-top:-11px; color:#fff' class="fa fa-files-o"></i>
                    <span>Undangan</span>
                </a>
            </li>
            <li>
                <a style='padding-top:8px; color:#fff; border-radius:0px; text-align:left; padding-left:15px' class="btn btn-info" href="index.php?page=inboxg">
                    <i style='margin-top:-11px; color:#fff' class="fa fa-files-o"></i>
                    <span>Perbal</span>
                </a>
            </li>
            <li>
                <a style='padding-top:8px; color:#fff; border-radius:0px; background:#bd2220; text-align:left; padding-left:15px' class="btn btn-danger" href="index.php?page=outbox">
                    <i style='margin-top:-11px; color:#fff' class="fa fa-files-o"></i>
                    <span>Surat Keluar</span>
                </a>
            </li>
            <li>
            <a style='padding-top:8px; color:#fff; border-radius:0px; background:#bd2220; text-align:left; padding-left:15px' class="btn btn-danger" href="index.php?page=boutbox">
                    <i style='margin-top:-11px; color:#fff' class="fa fa-files-o"></i>
                    <span>Surat Pengaduan</span>
                </a>
            </li>
            <li>  
              
              
             <a style='padding-top:8px; color:#fff; border-radius:0px; background:#666b66; text-align:left; padding-left:15px' class="btn " href="href="index.php?page=pengadilan"">
                    <i style='margin-top:-11px; color:#fff' class="fa fa-files-o"></i>
                    <span>Data href="index.php?page=pengadilan"</span>
                </a>
            </li>
            
             <li>
                <a style='padding-top:8px; color:#fff; border-radius:0px; background:#bd2220; text-align:left; padding-left:15px' class="btn btn-danger" href="index.php?page=outboxg">
                    <i style='margin-top:-11px; color:#fff' class="fa fa-files-o"></i>
                    <span>Tamu</span>
                </a>
            </li>


           




            <?php }elseif ($_SESSION[unit] == 'E'){ ?>
            <li>
            <a style='padding-top:8px; color:#fff; border-radius:0px; background:#666b66; text-align:left; padding-left:15px' class="btn " href="href="index.php?page=pengadilan"">
                    <i style='margin-top:-11px; color:#fff' class="fa fa-files-o"></i>
                    <span>Data href="index.php?page=pengadilan"</span>
                </a>
            </li>

          

            <?php }elseif ($_SESSION[unit] == 'A'){ ?>

            <li>
                <a style='padding-top:8px; color:#fff; border-radius:0px; text-align:left; padding-left:15px' class="btn btn-info" href="index.php?page=inbox">
                    <i style='margin-top:-11px; color:#fff' class="fa fa-files-o"></i>
                    <span>Surat</span>
                </a>
            </li>
            <li>
                <a style='padding-top:8px; color:#fff; border-radius:0px; text-align:left; padding-left:15px' class="btn btn-info" href="index.php?page=binbox">
                    <i style='margin-top:-11px; color:#fff' class="fa fa-files-o"></i>
                    <span>Undangan</span>
                </a>
            </li>
            <li>
                <a style='padding-top:8px; color:#fff; border-radius:0px; text-align:left; padding-left:15px' class="btn btn-info" href="index.php?page=inboxg">
                    <i style='margin-top:-11px; color:#fff' class="fa fa-files-o"></i>
                    <span>Perbal</span>
                </a>
            </li>
            <li>
                <a style='padding-top:8px; color:#fff; border-radius:0px; background:#bd2220; text-align:left; padding-left:15px' class="btn btn-danger" href="index.php?page=outbox">
                    <i style='margin-top:-11px; color:#fff' class="fa fa-files-o"></i>
                    <span>Surat Keluar</span>
                </a>
            </li>
            <li>
            <a style='padding-top:8px; color:#fff; border-radius:0px; background:#bd2220; text-align:left; padding-left:15px' class="btn btn-danger" href="index.php?page=boutbox">
                    <i style='margin-top:-11px; color:#fff' class="fa fa-files-o"></i>
                    <span>Surat Pengaduan</span>
                </a>
            </li>
           <li>
                <a style='padding-top:8px; color:#fff; border-radius:0px; background:#bd2220; text-align:left; padding-left:15px' class="btn btn-danger" href="index.php?page=outboxg">
                    <i style='margin-top:-11px; color:#fff' class="fa fa-files-o"></i>
                    <span>Tamu</span>
                </a>
            </li>
             
             
            <?php } ?>

            <li>
                <a style='padding-top:8px; color:#fff; border-radius:0px; background:#865531; text-align:left; padding-left:15px' class="btn dropdown-toggle" href="#">              
                    <i style='margin-top:-11px; color:#fff' class="fa fa-table"></i>
                    <span>Data User</span> <b class="caret"></b>
                </a>
                 <ul class="submenu">
                    <li><a href="index.php?page=user&stat=1">Data User Biasa</a></li>
                    <li><a href="index.php?page=user&stat=2">Data User Input</a></li>
                    <?php if ($_SESSION[level] == 'user_admin'){ ?>
                    <li><a href="index.php?page=user&stat=3">Data User Admin</a></li>
                     <li><a href="index.php?page=cuti">Data Cuti</a></li>
                    
                    <?php } ?>

                </ul>
            </li> 
               
            <li>
                <a style='padding-top:8px; color:#fff; border-radius:0px; background:#865531; text-align:left; padding-left:15px' class="btn dropdown-toggle" href="#">              
                    <i style='margin-top:-11px; color:#fff' class="fa fa-table"></i>
                    <span>Data Pegawai</span> <b class="caret"></b>
                </a>
                 <ul class="submenu">
                   
                    <?php { ?>
                    <li><a href="index.php?page=cuti">Data Cuti</a></li>
                     <li><a href="index.php?page=jeniscuti">Jenis Cuti</a></li>
                    <li><a href="index.php?page=mutasi">Mutasi</a></li>
                    
                    <?php } ?>

                </ul>
            </li> 
           
        </ul>