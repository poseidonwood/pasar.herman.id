<?php
           include "../../setting/koneksi.php";
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      </li>
      <li class="nav-item">
      <a href="<?=$domain;?>pages/tables/timeline.php" class="nav-link"><i class="nav-icon fas fa-history"></i></a>
      </li>
      </ul>
     <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>-->
    

    <!-- SEARCH FORM -->
    <!--<form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
      
        <a class="nav-link" data-toggle="dropdown"  href="#">
          <i class="fas fa"></i>
          <?php
           include "../../setting/koneksi.php";
          $saldo = mysqli_query($koneksi,"select *from tbl_saldo");
          $fetch_saldo = mysqli_fetch_array($saldo);
          $get_saldo = $fetch_saldo['total_saldo'];
          $get_id_s= $fetch_saldo['id_saldo'];
          echo "Rp. ".number_format( $get_saldo, 0, ',', '.');
          
          ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
       
          <div class="dropdown-divider"></div>
          <!--<a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>-->
          <div class="dropdown-divider"></div>
         <a data-toggle="modal" data-target="#modal-tambah" href="#" class="dropdown-item bg-success">
         <i class='fas fa-plus mr-2'></i> Tambah Saldo
         <span class="float-right text-muted text-sm"></span>
          </a>
          <div class="dropdown-divider"></div>
          <a data-toggle="modal" data-target="#modal-success" href="#" class="dropdown-item bg-primary">
          <i class='fas fa-wallet mr-2 '></i> Dompet
          <span class="float-right text-muted text-sm"></span>
          </a>
        </div>
        
      </li>
      <!-- Notifications Dropdown Menu -->
       <!-- Notifications Dropdown Menu -->
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          
          <?php 
          include "../../setting/koneksi.php";
          include "../../setting/time_since.php";
          //notifikasi acc tbl log
          $notif_sql = mysqli_query($koneksi,"select count(*)as notif from tbl_log where keterangan = 'DATA SEMENTARA'");
          //notifikasi timestamps tbl log
          $notif_sql2 = mysqli_query($koneksi,"SELECT * FROM tbl_log  where keterangan ='DATA SEMENTARA' order by timestamps desc limit 1");
          $notif2 = mysqli_fetch_array($notif_sql2);
          $notif = mysqli_fetch_array($notif_sql);
          //notifikasi stok mau habis
          $notif_stok = mysqli_query($koneksi,"select count(*)as stok from inventory where ket = 'MAU HABIS' or ket = 'HABIS'");
          $notif_stok2 = mysqli_query($koneksi,"SELECT * FROM inventory  where ket = 'MAU HABIS' or ket = 'HABIS' order by last_upt desc limit 1");
          $notif_stok3 = mysqli_fetch_array($notif_stok);
          $notif_stok4 = mysqli_fetch_array($notif_stok2);

          $tmpil_hitung = $notif['notif']+$notif_stok3['stok'];
          $count_notif = $notif['notif'];
          $count_stok = $notif_stok3['stok'];
          if($tmpil_hitung==0){
            echo"";
          }else{
            echo"
            <span class='badge badge-danger navbar-badge'>
            $tmpil_hitung
            </span>";
          }
          
          ?>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <?php
            
            if( $tmpil_hitung!==0){
                echo "<span class='dropdown-item dropdown-header'> $tmpil_hitung Notifications</span>";
            }else{
                echo "<span class='dropdown-item dropdown-header'>Tidak ada notifikasi</span>";

            }
            
            
            ?>
          <div class="dropdown-divider"></div>
          <!--<a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>-->
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#ltbarang">
            
          <?php
            if($count_stok==0){
                echo "<i class='fas fa-shopping-cart mr-2'></i> Item Aman";

            }else{
                echo "<i class='fas fa-shopping-cart mr-2'></i> $count_stok limited stock";


            }
            
            
            ?>
            <span class="float-right text-muted text-sm"><?php $notifi_stok=$notif_stok4['last_upt'];
             if($notifi_stok==0){
                echo "";
             }else{
                echo time_since(strtotime($notifi_stok));
             }
               ?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="../tables/acc_page.php" class="dropdown-item">
            
            <?php
            if($count_notif==0){
                echo "<i class='fas fa-file mr-2'></i> Tidak ada transaksi baru";

            }else{
                echo "<i class='fas fa-file mr-2'></i> $count_notif transaksi baru";


            }
            
            
            ?>
            <span class="float-right text-muted text-sm">
            <?php $notifi=$notif2['timestamps'];
             if($notifi==0){
                echo "";
             }else{
                echo time_since(strtotime($notifi));
             }
               ?></span>
          </a>
          <div class="dropdown-divider"></div>
        </div>
        
      </li> <!-- Notifications Dropdown Menu -->
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-sign-out-alt"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
          <div class="dropdown-divider"></div>
          <a href="<?=$domain;?>pages/login" class="dropdown-item">
            <i class="fas fa-sign-out"></i>Sign Out
          </a>
         
          <div class="dropdown-divider"></div>
        
        </div>
      </li>
     <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
    </ul>
  </nav>
  <!-- /.navbar -->
<!-- Modal Saldo-->
  <div class="modal fade" id="modal-success">
        <div class="modal-dialog">
          <div class="modal-content bg-light">
            <div class="modal-header">
              <h4 class="modal-title">Rincian Saldo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active "  data-toggle="modal" href="#"> <i class="fas fa-wallet"></i> Dompet</a>
                  </li>
                  <li class="nav-item">
                   <!-- <a class="nav-link" data-toggle="modal" data-target="#modal-success1" href="#"> <i class="fas fa-plus"></i> Tambah Saldo</a>
                  --></li>
                  </ul>
              </div>
              <div class="card-body">
              
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <?php
                  include "../../setting/koneksi.php";
                  $query_logsaldo = mysqli_query($koneksi,"select * from log_saldo ORDER BY id_transaksi DESC");
                  while($fetch_logsaldo = mysqli_fetch_array($query_logsaldo)){
                    $harga =  number_format($fetch_logsaldo['harga'], 0, ',', '.');
                    $ket = $fetch_logsaldo['keterangan'];
                    $saldo_akhir = number_format($fetch_logsaldo['saldo_akhir'], 0, ',', '.');
                    $tanggal1 = date_create($fetch_logsaldo['tanggal']);
                    $tanggal = date_format($tanggal1,"d M, yy");
                    $nm_barang = $fetch_logsaldo['nm_barang'];
                    $id_transaksi1 = $fetch_logsaldo['id_transaksi'];
                   
                    if($ket=='Transaksi Keluar'){
                    echo "
                    <div class='info-box bg-default'>
                    <div class='info-box-content'>
                    <div class='tab-pane fade show active' id='custom-tabs-three-home' role='tabpanel' aria-labelledby='custom-tabs-three-home-tab'>
                    <p style='color:green;'> <i class='fas fa-arrow-circle-up bg-success'></i> + Rp $harga </p><hr>
                    <p style='color:black;'> $tanggal </p>
                    <p style='color:black;'>$ket - $nm_barang , #$id_transaksi1</p>
                    <hr>
                    <p style='color:black;'>Saldo Sekarang Rp $saldo_akhir </p>
                   </div>
                   </div> 
                   </div> 
                   
                    ";
                    }elseif($ket=='Saldo Plus # '){
                      echo "
                      <div class='info-box bg-default'>
                      <div class='info-box-content'>
                      <div class='tab-pane fade show active' id='custom-tabs-three-home' role='tabpanel' aria-labelledby='custom-tabs-three-home-tab'>
                      <p style='color:green;'> <i class='fas fa-arrow-circle-up bg-success'></i> + Rp $harga </p><hr>
                      <p style='color:black;'> $tanggal </p>
                      <p style='color:black;'>$ket - $nm_barang , #$id_transaksi1</p>
                      <hr>
                      <p style='color:black;'>Saldo Sekarang Rp $saldo_akhir </p>
                     </div>
                     </div> 
                     </div> 
                     
                      ";
                      }else{
                      echo "
                    <div class='info-box bg-default'>
                    <div class='info-box-content'>
                    <div class='tab-pane fade show active' id='custom-tabs-three-home' role='tabpanel' aria-labelledby='custom-tabs-three-home-tab'>
                    <p style='color:red;'> <i class='fas fa-arrow-circle-down  bg-danger'></i> - Rp.$harga </p><hr>
                    <p style='color:black;'> $tanggal </p>
                    <p style='color:black;'>$ket - $nm_barang , #$id_transaksi1</p>
                    <hr>
                    <p style='color:black;'>Saldo Sekarang Rp. $saldo_akhir </p>
                   </div>
                   </div> 
                   </div> 
                   
                    ";
                    }
                  }
                  ?>
                  
                  
                  </div>
              
              <!-- /.card -->
            </div>
          </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <!--  <button type="button" class="btn btn-outline-light">Save changes</button>-->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<!-- Modal Tambah Saldo-->
<div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
          <div class="modal-content bg-light">
            <div class="modal-header">
              <h4 class="modal-title">Update Saldo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Update Saldo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Alasan Update</a>
                  </li>                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                      <!-- cek pesan notifikasi -->
                  <?php 
                  if(isset($_GET['pesan'])){
                    if($_GET['pesan'] == "success"){
                      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>Mantap !!</strong> Data Berhasil Disimpan
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }else if($_GET['pesan'] == "fail"){
                      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                      <strong>Gagal !!</strong> Data Gagal Disimpan
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }else if($_GET['pesan'] == "unknown"){
                      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                      <strong>Kode Barang</strong> tidak di temukan !!
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }else if($_GET['pesan'] == "overstock"){
                      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                      <strong>Qty </strong> lebih besar dari inventory !! !!
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }
                  }
                  ?>
                
                
                <form role="form" method="post" action="../../proses/update-saldo.php">
                <div class="card-body">                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Saldo Lama</label>
                    <input type="text" class="form-control" name="nominal_awal" value="<?=$get_saldo;?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Saldo Baru</label>
                    <input type="number" class="form-control" name="nominal_akhir" placeholder="Nominal Saldo" required autofocus>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alasan Ubah Saldo</label>
                    <select class ="form-control" name ="alasan" required>
                    <option value="">--Pilih Alasan--</option>
                    <?php
                      include "../../setting/koneksi.php";
                      $alasan_saldo_sql = mysqli_query($koneksi,"select *from alasan_saldo");
                      while($fetch_alasan_saldo = mysqli_fetch_array($alasan_saldo_sql)){
                        $alasan_get = $fetch_alasan_saldo['alasan'];
                        echo "<option value='$alasan_get'>$alasan_get</option>";
                      }
                      
                      ?>
                    </select> 
                  </div>
                  <button type="submit" class="btn btn-info">Submit</button>
                  </form>
                </div>
                <!-- /.card-body -->


               
               
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                    <!-- cek pesan notifikasi -->
                    <?php 
                  if(isset($_GET['pesan'])){
                    if($_GET['pesan'] == "success"){
                      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>Mantap !!</strong> Data Berhasil Disimpan
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }else if($_GET['pesan'] == "fail"){
                      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                      <strong>Gagal !!</strong> Data Gagal Disimpan
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }else if($_GET['pesan'] == "unknown"){
                      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                      <strong>Kode Barang</strong> tidak di temukan !!
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }else if($_GET['pesan'] == "overstock"){
                      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                      <strong>Qty </strong> lebih besar dari inventory !! !!
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }
                  }
                  ?>
                
                <h4></h4>
                
                <form method="post" action="../../proses/proses-alasan.php">
                <?php
                date_default_timezone_set("Asia/Jakarta");
                $tanggal = date("Y-m-d")
                ?>
                  <input type="hidden" class="form-control" name="tanggal" placeholder="Tanggal" value="<?=$tanggal?>" required >

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                  </div>
                  <input type="text" class="form-control" name ="alasan" placeholder="Alasan Ubah Saldo" >
                </div>
                

                <button type="submit" class="btn btn-info">Submit</button>
                </form>

  
                </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
           </div>
            
          </div>
        
        </div>
       
      </div>
     
