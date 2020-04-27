<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kedai Bu Puji | Form Barang Keluar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!--Sweet Alert-->
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
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
              <li class="breadcrumb-item active">Form Barang Keluar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-10">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            
            <!-- /.card -->

            <!-- Form Element sizes -->
            
           <a href="#" class="btn btn-success " data-toggle="modal" data-target="#ltmodal" > <i class="fas fa-calendar"></i></a>&nbsp;
           <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ltbarang1"><i class="fas fa-shopping-cart"></i></a>&nbsp;
           <a href="#" class="btn btn-info" data-toggle="modal" data-target="#ltsortir"><i class="fas fa-sort"></i></a>

          <hr>
            <!-- Input addon -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Form Multiple Transaksi</h3>                
              </div>
              <div class="card-body">

              
                <h4></h4>
                
                <div class="card-body table-responsive style="height: 350px;">
                
                <form method="post" action="../../proses/proses-sementara1.php">
                <?php
                date_default_timezone_set("Asia/Jakarta");
                $id_transaksi = date("YmdHis");
                $tanggal = date("Y-m-d");
                ?>
                <input type="hidden" class="form-control" name="id_transaksi" value="<?= $id_transaksi?>" >
                <div class="input-group mb-3">
                  <!--<div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>-->
                  <input type="hidden" class="form-control" name="tanggal" placeholder="Tanggal" value="<?=$tanggal?>" required >
               <!-- </div>-->


              <!--<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sort"></i></span>
                  </div>-->
                  <input type="hidden" class="form-control" name="jenis_transaksi"  value="Keluar" >
                 <!-- <input type="text" class="form-control" placeholder="Jenis Transaksi">
                </div>-->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                  </div>
                  <input type="text" class="form-control" id="id_barang" name ="id_barang" placeholder="Kode Barang" autofocus required>
                  <button type="submit" name="tambah" class="input-group-text btn bg-info"><i class="fa fa-arrow-circle-right fa-lg"></i></button>
                 <!-- <span class="input-group-text bg-success"><button type="submit" name="tambah" class="btn btn-success"></button></span>-->
                </div>
             
              <!--  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>-->
                  <input type="hidden" class="form-control" value="Null" name ="nm_pembeli" placeholder="Nama Pembeli" >
              <!--  </div>-->

            <!--     <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
                  </div>
                 <select name="nm_barang" class="form-control" required>
                  <option value="1">--Pilih Barang--</option>
                 <?php 
                 include '../../koneksi.php';
                 $cari = mysqli_query($koneksi,"select id_barang,nm_barang,qty from inventory");
                 while($e = mysqli_fetch_array($cari)){
                   ?>

                    <option value="<?=$e['id_barang'];?>"><?=$e['nm_barang'];?> - <?=$e['qty'];?></option>
                    <?php
                 }
                 ?>
                  </select>   
                </div>
                -->
                
              <!--  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sort-amount-up"></i></span>
                  </div>
                  <input type="number" class="form-control" name ="qty" placeholder="Qty Barang" required>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                  </div>
                  <input type="number" class="form-control" name ="harga" placeholder="Harga" required>
                </div>-->
                </form>
                  
                 <!-- <button type="submit" name="tambah" class="btn btn-success"><span class="fas fa-plus"></span></button>&nbsp;-->
                
                 <form method="post" action="../../proses/proses-sementara-final.php" >
                <div class="input-group mb-3 ">
                  <div class="input-group-prepend">
                    <span class="input-group-text "><i class="fas fa-users"></i></span>
                  </div>
                  <input type="text" class="form-control" id="id_barang" name ="nm_pembeli1" placeholder="Nama Pembeli" required>
                  <button type="submit" name="save" class="input-group-text btn bg-success"><i class="fas fa-save"></i>&nbsp;FINISH </button>
                 <!-- <span class="input-group-text bg-success"><button type="submit" name="tambah" class="btn btn-success"></button></span>-->
                </div>
               </form>        
                </div>
              
              <table id="example1" class="table table-bordered table-striped  text-nowrap">
                <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Subtotal</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                <?php 
                include '../../koneksi.php';
                $data = mysqli_query($koneksi,"select * from sementara");
                $s_total=0;
                while($d = mysqli_fetch_array($data)){
                    $id_transaksi = $d['id_transaksi'];
                    if ($id_transaksi!==0){

                        $s_id = $d['id_barang'];
                        $s_nm = $d['nm_barang'];
                        $s_qty = $d['qty'];
                        $s_harga = $d['harga'];
                        $s_sub = $s_harga;
                        $s_total += $s_sub;
                        $q_harga = mysqli_query($koneksi,"select * from inventory where id_barang='$s_id' or barcode ='$s_id'");
                        $f_harga = mysqli_fetch_array($q_harga);
                        $f_harga_1 = $f_harga['harga_jual'];
                        echo "
                    <tr>
                    <td>$s_id</td>
                    <td>$s_nm </td>
                    <td >
                    <input type='number' class='form-control' id='$id_transaksi' name ='$s_id' value='$s_qty'>
                    </td>
                    <td width='5%'>Rp. ".number_format($f_harga_1,0,',','.')."</td>

                    <td>Rp. ".number_format($s_sub,0,',','.')."</td>";?>
                     <td>
                          <a href="../../proses/update-sementara.php?id=<?php echo $d['id_transaksi']; ?>&id_barang=<?=$s_id;?>&qty_update=" onclick="window.location=this.href+document.getElementById('<?=$id_transaksi;?>').value;return false;" class="btn btn-success btn-sm">
                              <i class="fas fa-edit">
                              </i>
                          </a>
                          <a href="../../proses/hapus-sementara.php?id=<?php echo $d['id_transaksi']; ?>&id_barang=<?=$s_id;?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                              <i class="fas fa-trash">
                              </i>
                          </a>
                    </td>
                    </tr>
                    <?php
                    }else{
                        echo "Data tidak ada";
                    }
                }
                  ?>
               <tr>
                  <td colspan="4"><strong>TOTAL BELANJA</strong>
                  <p><?php
                 if (isset($_GET['result'])){
                  if ($_GET['result']=="fail"){
                  echo"<h5 class='text-danger'>Kupon tidak valid!</h5>";
                 }elseif($_GET['result']=="expired"){
                  echo"<h5 class='text-danger'>Maaf Kupon Anda Tidak Berlaku</h5>";
                 }elseif($_GET['result']=="success"){
                   //cari nilai
                   $kode = $_GET['coupon'];
                  $q_coupon = mysqli_query($koneksi,"select *from coupon where nm_coupon = '$kode'");
                  $f_coupon = mysqli_fetch_array($q_coupon);
                  $nilai = $f_coupon['nilai'];

                  echo"<h5 class='text-info'>Anda mendapatkan potongan sebesar $nilai %</h5>";
                 }
                }
                 ?>   </p></td>
                  <td colspan ="2"><h3><strong>
                  <?php
                  if (isset($_GET['result'])){
                    if ($_GET['result']=="success"){
                      $coupon = $_GET['coupon'];
                      $s_new_total = $s_total - ($s_total / 100 * $nilai);
                      echo "<strike>";
                      echo "Rp. "; 
                    echo number_format($s_total,0,',','.');
                    echo "</strike>";
                    echo "</strong></h3>";

                    echo "<p>"; 
                    echo "<h2><strong>";
                    echo "Rp. ";
                    echo number_format($s_new_total,0,',','.');
                    echo "</h2></strong>";
                    echo "</p>";


  
                    }else{
                      echo "Rp. ";
                     echo number_format($s_total,0,',','.');
                     echo "</strong></h2>";
                    }
                   }else{
                    echo "Rp. ";
                   echo number_format($s_total,0,',','.');
                   echo "</strong></h2>";
                  }
                    
                  ?>
                  
                  
                  </td>
                  </tr>
                
                </tbody>    
             </table><br>
              
             
             <a  id="coupon_form_button" role="button" onclick="showCouponForm()">Punya kode kupon? Klik disini</a>
                 <div class="input-group mb-3">
                
                 <div id="coupon_form" style="display:none;">
                 <form method="post" action="<?=$domain;?>proses/check-coupon.php" role="form">
                  
                                <div class="input-group">    
                                            <input type="text" class="form-control" placeholder="Masukkan kupon" name="coupon" required>
                                            <div class="input-group-append">
                                            <button type="submit" name="save" class="input-group-text btn bg-primary"><i class="fas fa-tags"></i>&nbsp;Gunakan </button>
                                            </div>
                                </div>        
                                    </div>
                                    </form>
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
                  <th>Pembeli?</th>
                  <th>Barang?</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Laba</th>
                  <th>Action</th>



                </tr>
                </thead>
                <tbody>
                <?php 
                include '../../koneksi.php';
                $date=date("Y-m-d");
                $no = 1;
                $data = mysqli_query($koneksi,"select id_transaksi,tanggal,nm_pembeli,id_barang,nm_barang,qty,harga,untung,SUM(harga) AS total from transaksi where jenis_transaksi='Keluar' and tanggal='$date' GROUP BY id_transaksi,tanggal,nm_pembeli,id_barang,nm_barang,qty,harga DESC");
                $total = 0;
                $laba = 0;
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nm_pembeli']; ?></td>
                    <td><?php echo $d['nm_barang']; ?></td>
                    <td><?php echo $d['qty']; ?></td>
                    <td>Rp. <?php echo number_format($d['harga'], 0, ',', '.');?></td>
                    <td>Rp. <?php echo number_format($d['untung'], 0, ',', '.');?></td>

                    
                    <td>
                      <a href="../../pages/forms/keluar-update.php?id=<?php echo $d['id_transaksi']; ?>" class="btn btn-info"><i  class ="fas fa-check"></i></a>
                      <a href="../../proses/hapus-keluar.php?id=<?php echo $d['id_transaksi']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php $total += $d['total'];?>
                  <?php $laba += $d['untung'];?>
                  <?php 
                }
                ?>
               
               <tr>
                  <td colspan="4">TOTAL</td>
                  <td>Rp. <?= number_format($total,0,',','.');?></td>
                  <td>Rp. <?= number_format($laba,0,',','.');?></td>
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
 <div class="modal fade" id="ltbarang1" tabindex="-1" role="dialog" aria-labelledby="listbarang1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listbarang1">List Barang</h5>
        
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
<!--Sweet Alert2 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
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
                          position: 'top-end',
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
                          position: 'top-end',
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
                          position: 'top-end',
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
                          position: 'top-end',
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
                          position: 'top-end',
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
                          position: 'top-end',
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
<script type="text/javascript">
    function showCouponForm() {
        document.getElementById('coupon_form').style.display = "inline";
        document.getElementById('coupon_form_button').style.display = "none";
    }
</script>
</body>
</html>
