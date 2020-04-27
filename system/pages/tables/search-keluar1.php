<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kedai Bu Puji | Search Result</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
            <h1></h1>
            <a href="../../pages/forms/keluar.php" class="btn btn-success"><i class="fas fa-arrow-left"></i>&nbsp;</i></a>&nbsp;
              <a href="#" onClick="window.print()" class="btn btn-success"><i class="fas fa-print"></i>&nbsp;</a>&nbsp;
              <a href="#" class="btn btn-info" data-toggle="modal" data-target="#ltsortir"><i class="fas fa-sort"></i>&nbsp;</a>&nbsp;
              <a href="#" class="btn btn-info" data-toggle="modal" data-target="#ltbetween"><i class="fas fa-calendar"></i>&nbsp;</a>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Search</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
         <!--   <div class="card-header">
          <!--    <a href="../../pages/forms/keluar.php" class="btn btn-success"><i class="fas fa-arrow-left"></i>&nbsp;</i>Kembali</a>&nbsp;
              <a href="#" onClick="window.print()" class="btn btn-success"><i class="fas fa-print"></i>&nbsp;</a>&nbsp;
              <a href="#" class="btn btn-info" data-toggle="modal" data-target="#ltsortir"><i class="fas fa-sort"></i>&nbsp;Sortir Berdasarkan Tanggal</a>

            </div>-->
            <!-- /.card-header -->
            <div class="card-body">
            <center><h3>List Transaksi Per <?php $tgl=$_POST['tanggal1']; $tgl1 = $_POST['tanggal2'];  echo "$tgl sampai $tgl1";?></h3></center></br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr>
                <th>No</th>
                  <th>Id</th>
                  <th>Transaksi?</th>
                  <th>Nama Pembeli</th>
                  <th>Nama Barang</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Laba</th>
                  <th>Action</th>




                </tr>
                </thead>
                <tbody>
                <?php 
                include '../../koneksi.php';
                $tgl=$_POST['tanggal1'];
                $tgl1=$_POST['tanggal2'];
                $jenis = $_POST['jenis_transaksi'];
                $no = 1;
                $total = 0;
                $laba = 0;
                $data = mysqli_query($koneksi,"select id_transaksi,untung,tanggal,nm_pembeli,jenis_transaksi,nm_barang,qty,harga,SUM(harga) AS total from transaksi where jenis_transaksi='$jenis' and tanggal='$tgl' GROUP BY jenis_transaksi,id_transaksi,tanggal,nm_pembeli,nm_barang,qty,harga DESC");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['id_transaksi']; ?></td>
                    <td><?php echo $d['jenis_transaksi']; ?></td>
                    <td><?php echo $d['nm_pembeli']; ?></td>
                    <td><?php echo $d['nm_barang']; ?></td>
                    <td><?php echo $d['qty']; ?></td>
                    <td><?php echo number_format($d['harga'],0,',','.'); ?></td>
                    <td><?php echo number_format($d['untung'],0,',','.'); ?></td>
                    <td>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $d['id_transaksi'];?>"><i class="fas fa-check"></i></a>
                      <a href="hapus.php?id=<?php echo $d['id_transaksi']; ?> " class="btn btn-danger" ><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php $total += $d['total'];
                  $laba += $d['untung'];
                   $pajak = $total * 0.5/100;
                  ?>
                  <?php 
                }
                ?>
               <tr>
               <td colspan="6">TOTAL</td>
                  <td>Rp. <?= number_format($total,0,',','.');?></td>
                  <td>Rp. <?= number_format($laba,0,',','.');?></td>
                  </tr>
                  <td colspan="6">Pajak</td>
                  <td>Rp. <?php 
                  if($total ==0){
                    echo "0";
                  }else {
          echo number_format($pajak,0,',','.');
                  } ?></td>
                  </tr>
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
  </div>
  <!-- /.content-wrapper -->
<!-- Modal Sortir Tanggal-->

<div class="modal fade" id="edit<?php echo $d['id_transaksi'];?>" tabindex="-1" role="dialog" aria-labelledby="editdata" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editdata">Sortir Berdasarkan Tanggal</h5>        
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
                  <input type="date" class="form-control" name="tanggal1" placeholder="Tanggal" value="" required >
                </div>
                <select name="jenis_transaksi" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
        <option value="Keluar">Keluar</option>
        <option value="Masuk">Masuk</option>
      </select> 
     
      </div>

      
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
      </div>
      
      </form>
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
                  <input type="date" class="form-control" name="tanggal1" placeholder="Tanggal" value="" required >
                </div>
                <select name="jenis_transaksi" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
        <option value="Keluar">Keluar</option>
        <option value="Masuk">Masuk</option>
      </select> 
     
      </div>

      
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
      </div>
      
      </form>
    </div>
  </div>
</div>

<!-- End Modal -->
<!-- Modal Sortir-->
<div class="modal fade" id="ltbetween" tabindex="-1" role="dialog" aria-labelledby="listbetween" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listbetween">Sortir Diantara Tanggal</h5>        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="../../pages/tables/search-keluar1.php">
      <div class="input-group mb-3">
                  
                  <input type="date" class="form-control" name="tanggal1" placeholder="Tanggal 1" value="" required >
                  <input type="date" class="form-control" name="tanggal2" placeholder="Tanggal 2" value="" required >

                </div>
               
                  <select name="jenis_transaksi" class="form-control" >
        <option value="Keluar">Keluar</option>
        <option value="Masuk">Masuk</option>
      </select> 
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

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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
</body>
</html>
