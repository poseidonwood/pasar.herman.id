<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kedai Bu Puji | Form Update Barang Masuk</title>
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
  <!-- Main Sidebar Container -->
  <?php 
 include "../pages-headside.php";
 include "../pages-mainside.php";
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
              <li class="breadcrumb-item active">Form Update Barang Masuk</li>
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
            
         <!--  <a href="#" class="btn btn-success " data-toggle="modal" data-target="#ltmodal" > <i class="fas fa-calendar"></i>&nbsp;List Transaksi Hari Ini</a>&nbsp;
           <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ltbarang"><i class="fas fa-shopping-cart"></i>&nbsp;List Barang</a>&nbsp;
           <a href="#" class="btn btn-info" data-toggle="modal" data-target="#ltsortir"><i class="fas fa-sort"></i>&nbsp;Sortir Berdasarkan Tanggal</a>
-->
          </br><hr>
            <!-- Input addon -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Form Update Barang Masuk</h3>                
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
                    }
                  }
                  ?>
                
                <h4></h4>
                <?php
                    include '../../koneksi.php';
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi,"select * from inventory where id_barang='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>
                <form method="post" action="../../proses/update-inventory.php">
                <?php
                date_default_timezone_set("Asia/Jakarta");
                $id_transaksi = date("YmdHis");
                $tanggal = date("Y-m-d")
                ?>
                <input type="hidden" class="form-control" name="id_transaksi" value="<?= $id_transaksi?>" >
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-cart-plus">&nbsp;Kode Barang</i></span>
                  </div>
                  <input type="text" class="form-control" name="id_barang" placeholder="Kode Barang" value = "<?=$d['id_barang'];?>" readonly>
                </div>
              <!--  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar">&nbsp;Tgl Transaksi</i></span>
                  </div>
                  <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" value="<?=$tanggal?>" required >
                </div>
	-->
              <!--<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sort"></i></span>
                  </div>-->
                  <input type="hidden" class="form-control" name="jenis_transaksi"  value="Masuk" >
                 <!-- <input type="text" class="form-control" placeholder="Jenis Transaksi">
                </div>-->

                <!--<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                  </div>
                  <input type="text" class="form-control" name ="nm_pembeli" placeholder="Nama Agen" >
                </div>-->

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-shopping-cart">&nbsp;Nama Barang</i></span>
                  </div>
                  <input type="text" class="form-control" name ="nm_barang" placeholder="Nama Barang" value="<?= $d['nm_barang'];?>" required autofocus>
                </div>

                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sort-amount-up">&nbsp;Qty</i></span>
                  </div>
                  <input type="number" class="form-control" name ="qty" placeholder="Qty Barang" value="<?= $d['qty'];?>" required>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-dollar-sign">&nbsp;Harga Beli</i></span>
                  </div>
                  <input type="number" class="form-control" name ="harga_beli" placeholder="Harga Beli" value="<?= $d['harga_beli'];?>"required>
                </div>
              <!--  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-dollar-sign">&nbsp;Qty Total</i></span>
                  </div>
                  <input type="hidden" class="form-control" name ="qty_total"  required>
                </div>-->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-dollar-sign">&nbsp;Harga Jual</i></span>
                  </div>
                  <input type="number" class="form-control" name ="harga_jual" placeholder="Harga Jual" value="<?= $d['harga_jual'];?>" required>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt">&nbsp;Exp</i></span>
                  </div>
                  <input type="date" class="form-control" name="exp" placeholder="Expired" value="<?= $d['expired'];?>" required >
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file">&nbsp;Ket</i></span>
                  </div>
                  <select class="form-control" name="ket">
                  <?php
                    $tampil_ktr = $d['ket'];
                    
                    if($tampil_ktr=='MAU HABIS'){
                      echo "<option value ='$tampil_ktr'>$tampil_ktr</option>
                      <option value ='HABIS'>HABIS</option>
                      <option value ='AMAN'>AMAN</option>";
                    }elseif($tampil_ktr=='AMAN'){
                      echo"<option value ='$tampil_ktr'>$tampil_ktr</option>
                      <option value ='HABIS'>HABIS</option>
                      <option value ='MAU HABIS'>MAU HABIS</option>";
                    }else{
                      echo"<option value ='$tampil_ktr'>$tampil_ktr</option>
                      <option value ='AMAN'>AMAN</option>
                      <option value ='MAU HABIS'>MAU HABIS</option>";

                    }
                  ?>
               
                  </select>
                  
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
                $data = mysqli_query($koneksi,"select id_transaksi,tanggal,nm_pembeli,nm_barang,qty,harga,SUM(harga) AS total from transaksi where jenis_transaksi='Masuk' and tanggal='$date' GROUP BY id_transaksi,tanggal,nm_pembeli,nm_barang,qty,harga DESC");
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
                      <a href="hapus.php?id=<?php echo $d['id_transaksi']; ?>" class="fas fa-trash"></a>
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
      <form method="post" action="edit.php">
      <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" value="<?=$tanggal?>" required >
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

  
<?php 
 include "../pages-footer.php";
 ?>

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
