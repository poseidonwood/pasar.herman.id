<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kedai Bu Puji | Inventory</title>
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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inventory</li>
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
            <div class="card-header">
              <h3 class="card-title">Inventory List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 350px;">
              <table id="example1" class="table table-bordered table-striped  text-nowrap">
                <thead>

                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Qty</th>
                  <th>Harga Satuan</th>
                  <th>Harga Jual</th>
                  <th>Laba/PCS</th>
                  <th>Last Updt</th>
                  <th>Keterangan</th>
                  <th>Action</th>

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
                    <td><?php echo $d['nm_barang']; ?></td>
                    <td><?php echo $d['qty']; ?></td>
                    <td><?php echo $d['harga_beli_satuan']; ?></td>
                    <td><?php echo $d['harga_jual']; ?></td>
                    <td><?php echo $d['harga_jual']-$d['harga_beli_satuan']; ?></td>

                    <td><?php echo $d['last_upt']; ?></td>
                    <td><?php 
                   $ket = $d['ket'];
                   if($ket=="AMAN")
                   {
                    echo " <span class='badge bg-success'>$ket</span>";
                   }elseif($ket=="HABIS"){
                     echo "<span class='badge bg-danger'>$ket</span>";
                   }else{
                     echo "<span class='badge bg-warning'>$ket</span>";
                   }
                    ?></td>
                    <td>
                    <a href="../forms/inventory-update.php?id=<?php echo $d['id_barang']; ?>" class="btn btn-success btn-sm">
                              <i class="fas fa-pencil-alt">
                              </i>
                          </a>
                          <a href="proses/hapus-inventory.php?id=<?php echo $d['id_barang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                              <i class="fas fa-trash">
                              </i>
                          </a>
                    </td>
                  </tr>
                  
                  <?php 
                }
                ?>
               
                
                </tbody>
                <tfoot>
                <tr>
                <th>No</th>
                  <th>Nama Barang</th>
                  <th>Qty</th>
                  <th>Harga Satuan</th>
                  <th>Harga Jual</th>
                  <th>Laba/PCS</th>
                  <th>Last Updt</th>
                  <th>Keterangan</th>
                  <th>Action</th>


                </tr>
                </tfoot>
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
