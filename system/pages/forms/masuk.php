<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kedai Bu Puji | Form Barang Masuk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- SweetAlert2 -->
      <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<?php
  include "../pages-headside.php";
  include "../pages-mainside.php";
  ?>

<!-- Ajax Cek Kode barang di texbox-->
<script>
$(document).ready(function(){

   $("#id_barang").keyup(function(){

      var id_barang = $(this).val().trim();

      if(id_barang != ''){

         $.ajax({
            url: 'ajaxcekkode-barang.php',
            type: 'post',
            data: {id_barang: id_barang},
            success: function(response){

                $('#uname_response').html(response);

             },
             
             
         });
      }else{
         $("#uname_response").html("");
      }

    });

 });
</script>

<!--End Ajax-->
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
              <li class="breadcrumb-item active">Form Barang Masuk</li>
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
            
           <a href="#" class="btn btn-success " data-toggle="modal" data-target="#ltmodal" > <i class="fas fa-calendar"></i></a>&nbsp;
           <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ltbarang1"><i class="fas fa-shopping-cart"></i></a>&nbsp;
           <a href="#" class="btn btn-info" data-toggle="modal" data-target="#ltsortir"><i class="fas fa-sort"></i></a>

          </br><hr>
            <!-- Input addon -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Input Masuk</h3>                
              </div>
              <div class="card-body">
          <div class="col-12 col-sm-12">
            <div class="card card-light card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Form Masuk</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Agen</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
  
                
                <h4></h4>
                
                <form method="post" action="../../proses/proses-masuk.php">
                <?php
                date_default_timezone_set("Asia/Jakarta");
                $id_transaksi = date("YmdHis");
                $tanggal = date("Y-m-d")
                ?>
                <input type="hidden" class="form-control" name="id_transaksi" value="<?= $id_transaksi?>" >
                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" value="<?=$tanggal?>" required >
                </div>
	
                                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
                  </div>
                  <input type="text" class="form-control" id="nm_barang" name ="nm_barang" placeholder="Nama Barang" required>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-cart-plus"></i></span>
                  </div>
                  <input type="text" class="form-control" id="id_barang" name="id_barang" onkeyup="autofill()" placeholder="Kode Barang" required autofocus>
                  <span class="input-group-text"><div id="uname_response" ></div></span>
                  
                </div>
              <!--<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sort"></i></span>
                  </div>-->
                  <input type="hidden" class="form-control" name="jenis_transaksi"  value="Masuk" >
                 <!-- <input type="text" class="form-control" placeholder="Jenis Transaksi">
                </div>-->

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                  </div>
                 
                  <select name ="nm_pembeli" class="form-control"  >
                  <option value="1">--Pilih Agen--</option>
                  <?php
                  include '../../koneksi.php';
                 $cari = mysqli_query($koneksi,"select *from tbl_agen");
                 while($e = mysqli_fetch_array($cari)){
                   ?>

                    <option value="<?=$e['nm_agen'];?>"><?=$e['nm_agen'];?></option>
                    <?php
                 }
                 ?>
                  </select>
                </div>

                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sort-amount-up"></i></span>
                  </div>
                  <input type="number" class="form-control" name ="qty" placeholder="Qty Barang" required>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                  </div>
                  <input type="number" class="form-control" name ="harga_beli" placeholder="Harga Beli" required>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                  </div>
                  <input type="number" class="form-control" name ="harga_jual" placeholder="Harga Jual" required>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-bell"> Keterangan</i></span>
                  </div>
                 
                  <select name ="keterangan" class="form-control"  >
                  <option value="Inventory">Inventory</option>
                  <option value="Pribadi">Pribadi</option>
                  <option value="1">--Pilih Keterangan--</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt">&nbsp;Exp</i></span>
                  </div>
                  <input type="date" class="form-control" name="exp" placeholder="Tanggal" value="<?=$tanggal?>" required >
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
                </form>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
 
                <h4></h4>
                
                <form method="post" action="../../proses/proses-agen.php">
                <?php
                date_default_timezone_set("Asia/Jakarta");
                $id_transaksi = date("YmdHis");
                $tanggal = date("Y-m-d")
                ?>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" value="<?=$tanggal?>" required >
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                  </div>
                  <input type="text" class="form-control" name ="nm_agen" placeholder="Nama Agen" >
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                  </div>
                  <textarea class="form-control" name ="alamat" placeholder="Alamat Agen" > </textarea>
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
                    <td>Rp. <?php echo number_format( $d['harga'], 0, ',', '.');?></td>
                    
                    <td>
                      <a href="edit.php?id=<?php echo $d['id_transaksi']; ?>" class="fas fa-check"></a>&nbsp;
                      <a href="../../proses/hapus-masuk.php?id=<?php echo $d['id_transaksi']; ?>" class="fas fa-trash" onclick="return confirm('Anda yakin mau menghapus item ini ?')"></a>
                    </td>
                  </tr>
                  <?php $total += $d['harga'];?>
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
 <div class="modal fade" id="ltbarang1" tabindex="-1" role="dialog" aria-labelledby="listbarang" aria-hidden="true">
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
<!-- auto fill nm_barang-->
<script type="text/javascript">
    function autofill(){
  var id_barang=$("#id_barang").val();
 $.ajax({
        url : 'autofill-ajax.php',
        data : 'id_barang='+id_barang,
 }).done(function(data){
 var json = data,
 obj = JSON.parse(json);
 $("#nm_barang").val(obj.nm_barang);

 });
 
 }
 </script>
 <!-- end auto fill -->
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- cek pesan notifikasi -->
<?php 
                  if(isset($_GET['pesan'])){
                    if($_GET['pesan'] == "success"){
                      echo "<script type='text/javascript'>
                      $(function() {
                       
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        });
                    
                       
                          Toast.fire({
                            type: 'success',
                            title: 'Mantap !! Data Berhasil Disimpan'
                          });
                        }); 
                          </script>";
                      
                    }else if($_GET['pesan'] == "fail"){
                      echo "<script type='text/javascript'>
                      $(function() {
                       
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        });
                    
                       
                          Toast.fire({
                            type: 'error',
                            title: 'Data Gagal Disimpan'
                          });
                        }); 
                          </script>";
                     
                    }else if($_GET['pesan'] == "unknown"){
                      echo "<script type='text/javascript'>
                      $(function() {
                       
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        });
                    
                       
                          Toast.fire({
                            type: 'error',
                            title: 'Kode Barang tidak tersedia'
                          });
                        }); 
                          </script>";
                    }else if($_GET['pesan'] == "overstock"){
                      echo "<script type='text/javascript'>
                      $(function() {
                       
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        });
                    
                       
                          Toast.fire({
                            type: 'warning',
                            title: 'Qty lebih besar dari inventory !! !!'
                          });
                        }); 
                          </script>";
                    }else if($_GET['pesan'] == "success-hapus"){
                      echo "<script type='text/javascript'>
                      $(function() {
                       
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        });
                    
                       
                          Toast.fire({
                            type: 'success',
                            title: 'Hapus data sukses'
                          });
                        }); 
                          </script>";
                    }else if($_GET['pesan'] == "gagal-hapus"){
                      echo "<script type='text/javascript'>
                      $(function() {
                       
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        });
                    
                       
                          Toast.fire({
                            type: 'error',
                            title: 'Gagal hapus data.'
                          });
                        }); 
                          </script>";
                    }
                  }
                  ?>
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
