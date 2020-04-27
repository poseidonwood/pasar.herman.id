<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kedai Bu Puji | Form Barang Keluar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
       <!-- Notifications Dropdown Menu -->
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge">
          <?php 
          include "../../setting/koneksi.php";
          include "../../setting/time_since.php";
          $notif_sql = mysqli_query($koneksi,"select count(*)as notif from tbl_log where keterangan = 'DATA SEMENTARA'");
          $notif_sql2 = mysqli_query($koneksi,"SELECT * FROM tbl_log  where keterangan ='DATA SEMENTARA' order by timestamps desc limit 1");
          $notif2 = mysqli_fetch_array($notif_sql2);
          $notif = mysqli_fetch_array($notif_sql);
          echo $notif['notif'];
          ?>
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?=$notif['notif'];?> Notifications</span>
          <div class="dropdown-divider"></div>
         <!-- <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>-->
          <div class="dropdown-divider"></div>
          <a href="pages/tables/acc_page.php" class="dropdown-item">
            <i class="fas fa-file mr-2"></i><?=$notif['notif'];?> transaksi baru
            <span class="float-right text-muted text-sm"><?php echo time_since(strtotime($notif2['timestamps']));?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  include "../pages-mainside.php"
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!--<h1>General Form</h1>-->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../">Home</a></li>
              <li class="breadcrumb-item active">Form Barang Keluar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            
            <!-- /.card -->

            <!-- Form Element sizes -->
            
          <!-- <a href="#" class="btn btn-success " data-toggle="modal" data-target="#ltmodal" > <i class="fas fa-calendar"></i>&nbsp;List Transaksi Hari Ini</a>&nbsp;
           <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ltbarang"><i class="fas fa-shopping-cart"></i>&nbsp;List Barang</a>&nbsp;
           <a href="#" class="btn btn-info" data-toggle="modal" data-target="#ltsortir"><i class="fas fa-sort"></i>&nbsp;Sortir Berdasarkan Tanggal</a>
-->
          </br><hr>
            <!-- Input addon -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Form Keluar</h3>                
              </div>
              <div class="card-body">

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
                    }else if($_GET['pesan'] == "success-hapus"){
                      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>Hapus </strong> data sukses !!
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }else if($_GET['pesan'] == "gagal-hapus"){
                      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                      <strong>Gagal  </strong> hapus data !!
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }
                  }
                  ?>
                
                <h4></h4>
                
                    <?php
                    include '../../koneksi.php';
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi,"select * from transaksi where id_transaksi='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>
                <form method="post" action="../../proses/update-keluar.php">
                <?php
                date_default_timezone_set("Asia/Jakarta");
                $id_transaksi = date("YmdHis");
                $tanggal = date("Y-m-d")
                ?>
                <input type="hidden" class="form-control" name="id_transaksi" value="<?= $d['id_transaksi'];?>" >
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" value="<?= $d['tanggal'];?>" required >
                </div>


              <!--<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sort"></i></span>
                  </div>-->
                  <input type="hidden" class="form-control" name="jenis_transaksi"  value="Keluar" >
                 <!-- <input type="text" class="form-control" placeholder="Jenis Transaksi">
                </div>-->

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" name ="nm_pembeli" value="<?= $d['nm_pembeli'];?>"placeholder="Nama Pembeli" autofocus>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
                  </div>
                  <input type="text" class="form-control" name ="nm_barang" value="<?= $d['nm_barang'];?>" placeholder="Kode Barang" readonly>
                </div>

                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sort-amount-up"></i></span>
                  </div>
                  <input type="number" class="form-control" value="<?= $d['qty'];?>" name ="qty" placeholder="Qty Barang" readonly>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                  </div>
                  <input type="number" class="form-control" value="<?= $d['harga'];?>" name ="harga" placeholder="Harga" required>
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
                </form>


               <?php
                    }
                    ?>
               

               

              </div>

              <!-- /.card-body -->
            </div>

            <!-- /.card -->
            <!-- Horizontal Form -->
            
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal Transaksi-->
<div class="modal fade" id="ltmodal" tabindex="-1" role="dialog" aria-labelledby="listtransaksi" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listtransaksi">List Transaksi <?=$date=date('Y-m-d')?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
    
              <table class="table ">
                <thead>

                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Pembeli?</th>
                  <th>Barang?</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Action</th>



                </tr>
                </thead>
                <tbody>
                <?php 
                include '../../koneksi.php';
                $date=date("Y-m-d");
                $no = 1;
                $data = mysqli_query($koneksi,"select id_transaksi,tanggal,nm_pembeli,nm_barang,qty,harga,SUM(harga) AS total from transaksi where jenis_transaksi='Keluar' and tanggal='$date' GROUP BY id_transaksi,tanggal,nm_pembeli,nm_barang,qty,harga DESC");
                $total = 0;
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['tanggal']; ?></td>
                    <td><?php echo $d['nm_pembeli']; ?></td>
                    <td><?php echo $d['nm_barang']; ?></td>
                    <td><?php echo $d['qty']; ?></td>
                    <td>Rp. <?php echo number_format($d['harga'], 0, ',', '.');?></td>
                    
                    <td>
                      <a href="edit.php?id=<?php echo $d['id_transaksi']; ?>" class="fas fa-check"></a>&nbsp;
                      <a href="../../proses/hapus-keluar.php?id=<?php echo $d['id_transaksi']; ?>" class="fas fa-trash"></a>
                    </td>
                  </tr>
                  <?php $total += $d['total'];?>
                  <?php 
                }
                ?>
               
               <tr>
                  <td colspan="5">TOTAL</td>
                  <td>Rp. <?= number_format($total,0,',','.');?></td>
                  </tr>
                </tbody>
                </table>
           
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <!--  <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->

 <!-- Modal Barang-->
 <div class="modal fade" id="ltbarang" tabindex="-1" role="dialog" aria-labelledby="listbarang" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listbarang">List Barang</h5>
        
      </div>
      
      <section class="content">
      <div class="row">
        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>No</th>
                  <th>Id</th>
                  <th>Nama Barang</th>
                  <th>Qty</th>
                  <th>Last Updt</th>
                  <th>Keterangan</th>

                </tr>
                </thead>
                <tbody>
                <?php 
                include '../../koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"select * from inventory");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['id_barang']; ?></td>
                    <td><?php echo $d['nm_barang']; ?></td>
                    <td><?php echo $d['qty']; ?></td>
                    <td><?php echo $d['last_upt']; ?></td>
                    <td><?php 
                    $ket = $d['ket'];
                    if($ket=="AMAN")
                    {
                     echo " <a class='btn btn-success'>$ket</a>";
                    }elseif($ket=="HABIS"){
                      echo "<a class='btn btn-danger'>$ket</a>";
                    }else{
                      echo "<a class='btn btn-warning'>$ket</a>";
                    }
                     ?></td>
                  </tr>
                  <?php 
                }
                ?>
               
                
                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <!--  <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
<!-- Modal Sortir-->
<div class="modal fade" id="ltsortir" tabindex="-1" role="dialog" aria-labelledby="listsortir" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listsortir">Sortir Berdasarkan Tanggal</h5>        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="../../pages/tables/search-keluar.php">
      <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="date" class="form-control" name="tanggal1" placeholder="Tanggal" value="<?=$tanggal?>" required >
                </div>
     
      </div>

      
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
      </div>
      
      </form>
    </div>
  </div>
</div>

<!-- End Modal -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="http://<?='$domain';?>">Febri Kukuh Santoso</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
