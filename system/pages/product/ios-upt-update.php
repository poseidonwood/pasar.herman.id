<?php
include "../../../setting/koneksi.php";
include "../../setting/session.php";

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title_profile;?> | Posting Product</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- SweetAlert2 -->
      <link rel="stylesheet" href="<?=$domain."system/plugins";?>/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?=$domain."system/plugins";?>/datatables-bs4/css/dataTables.bootstrap4.css">
  <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=$domain."system/plugins";?>/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<?php
  include "../../headside.php";
  include "../../mainside.php";
  if(isset($_GET)){
    $get_lb_id_barang = $_GET['id'];
    $lb_q_barang = $koneksi->query("select *from tbl_product where id_barang = '$get_lb_id_barang'");
    $f_list_barang = mysqli_fetch_array($lb_q_barang);
    $lb_id_barang = $f_list_barang['id_barang'];
    $lb_nm_barang = $f_list_barang['nm_barang'];
    $lb_detail = $f_list_barang['detail'];
    $lb_qty = $f_list_barang['qty'];
    $lb_harga_jual = $f_list_barang['harga_jual'];
    $lb_last_upt = $f_list_barang['last_upt'];
    $lb_id_satuan = $f_list_barang['id_satuan'];
    $lb_harga_beli = $f_list_barang['harga_beli'];
    $lb_expired = $f_list_barang['expired'];
    $lb_foto= $f_list_barang['foto'];


  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <!-- <h1>
              Navbar & Tabs 
              <small>new</small>
            </h1>-->
          </div>
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../">Home</a></li>
              <li class="breadcrumb-item active">Update Ios Only Form Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-apple-alt"></i>
                  &nbsp;Edit Product in Ios
                </h3>
              </div>
              <div class="card-body">
       <div class="row">
                
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true"><i class ="fas fa-pencil-alt"></i>&nbsp;Edit <?=$lb_nm_barang;?></a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
  
                    <h4></h4>

                    <form method="post" action="<?=$domain."system/proses/herman-update-product.php?id=".$lb_id_barang;?>" enctype="multipart/form-data">
                    <?php
                    date_default_timezone_set("Asia/Jakarta");
                    $tanggal = date("Y-m-d")
                    ?>
                    
                 <!--   <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      </div>
                      <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" value="<?=$tanggal?>" required >
                    </div>
      -->
                                    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
                      </div>
                      <input type="text" class="form-control" id="nm_barang" name ="nm_barang" value="<?=$lb_nm_barang;?>" required>
                    </div>
    
                   <!-- <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-cart-plus"></i></span>
                      </div>
                      <input type="text" class="form-control" id="id_barang" name="id_barang"  value="<?=$lb_id_barang;?>" required autofocus>
                    </div>-->
                  <!--<div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-sort"></i></span>
                      </div>-->
                     <!-- <input type="text" class="form-control" placeholder="Jenis Transaksi">
                    </div>-->
    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-info-circle"></i>&nbsp;Detail</span>
                      </div>
                      <textarea class="form-control" name ="detail"  required><?=$lb_detail;?></textarea>
                    </div>
    
                    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-sort-amount-up"></i></span>
                      </div>
                      <input type="number" class="form-control" name ="qty" placeholder="Qty Product" value="<?=$lb_qty;?>" required>
                    </div>
    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="">SATUAN</i></span>
                      </div>
                     
                      <select name ="id_satuan" class="form-control" required >
                      <option value="<?=$lb_id_satuan;?>"><?=$lb_id_satuan;?></option>
                      <?php
                      $q_s_select = mysqli_query($koneksi,"Select *from tbl_satuan where id_satuan!='$lb_id_satuan'");
                      while($f_s_select = mysqli_fetch_array($q_s_select)){
                          $select_id_satuan = $f_s_select['id_satuan'];
                          $select_nm_satuan = $f_s_select['nm_satuan'];
                          echo "<option value='$select_id_satuan'>$select_nm_satuan</option>";
                      }
    
                      ?>
                      
                      </select>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class=""><strong>Rp. </strong></i></span>
                      </div>
                      <input type="text" class="form-control" name ="harga_beli" value="<?=$lb_harga_beli;?>" placeholder="Harga Beli" required>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class=""><strong>Rp. </strong></i></span>
                      </div>
                      <input type="number" class="form-control" name ="harga_jual" value="<?=$lb_harga_jual;?>" placeholder="Harga Jual" required>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt">&nbsp;Exp</i></span>
                      </div>
                      <input type="date" class="form-control" name="expired" placeholder="Tanggal" value="<?=$lb_expired;?>" required >
                    </div>
                    <p><span class="badge bg-danger"> Abaikan jika tidak merubah gambar produk</span></p>

                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><img src="<?=$domain."img/product/".$lb_foto;?>" width ="25px" height="25px">&nbsp;</span>
                      </div>
    
                          <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile"><?=$lb_foto;?></label>
                          </div>
                        </div>
                        <div class="input-group-append">
                            <p><span class="badge bg-danger">*Ukuran foto 600px*600px atau 1:1</span></p>
                          </div>
              <!--      <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-bell"> Active?</i></span>
                      </div>
                      <select name ="active" class="form-control" required >
                      <option value="1">--Tampilkan Ke Web ?--</option>
                      <option value="Y">YA</option>
                      <option value="N">TIDAK</option>
                      </select>
                    </div>-->
                    <button type="submit" class="btn btn-info">Save changes</button>
                    </form> 
      
                   </div>
                
                <!-- /.card-tools -->
                    </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
 include "../../footer.php";
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
        url : '../forms/autofill-ajax.php',
        data : 'id_barang='+id_barang,
 }).done(function(data){
 var json = data,
 obj = JSON.parse(json);
 $("#nm_barang").val(obj.nm_barang);
 $('#uname_response').html(obj.ket);
 });
 
 }
 </script>
 <script type="text/javascript">
    function autofill1(){
  var id_barang1=$("#id_barang1").val();
 $.ajax({
        url : '../forms/autofill-ajax2.php',
        data : 'id_barang='+id_barang1,
 }).done(function(data){
 var json1 = data,
 obj = JSON.parse(json1);
 $("#nm_barang1").val(obj.nm_barang);
 $("#notif").html(obj.notif);

 });
 
 }
 </script>
<script>
      function Validasi()
      {
        var x = document.getElementById("jenis_promo1").value;
        if(x == "diskon"){
            document.getElementById("notif_promo").innerHTML = "<span class='badge bg-danger'>Masukkan Diskon 1 - 100 %</span>";
        }else if(x == "potongan"){
            document.getElementById("notif_promo").innerHTML = "<span class='badge bg-danger'>Masukkan Potongan Harga Yang Diinginkan</span>";

        }else if(x == "mingguan"){
          document.getElementById("notif_promo").innerHTML = "<span class='badge bg-danger'>Promo Untuk Mingguan (Potongan Harga)</span>";
        }else{
          document.getElementById("notif_promo").innerHTML = "";

        }
      }
      function hitung(){
        var a = document.getElementById("jenis_promo1").value;
        var b = document.getElementById("nilai_promo").value;
        var c = document.getElementById("harga_awal1").value;
        var d =  document.getElementById("harga_akhir").value;

        if(a == "diskon"){
         document.getElementById("harga_akhir").value = c - (c / 100 * b);
         d = document.getElementById("harga_akhir").value;
          if (d < 0){
            alert('Nilai promo yang anda masukkan terlalu banyak');
            document.getElementById("harga_akhir").value = "Harga Promo";
          }
        }else if(a == "potongan"){
          document.getElementById("harga_akhir").value = c - b;
          d = document.getElementById("harga_akhir").value;
          if (d < 0){
            alert('Nilai promo yang anda masukkan terlalu banyak');
            document.getElementById("harga_akhir").value = "Harga Promo";
          }
        }else if(a == "mingguan"){
          document.getElementById("harga_akhir").value = c - b;
          d = document.getElementById("harga_akhir").value;
          if (d < 0){
            alert('Nilai promo yang anda masukkan terlalu banyak');
            document.getElementById("harga_akhir").value = "Harga Promo";
          }
        }else if(a == "0"){
          document.getElementById("harga_akhir").value = "Harga Promo";

        }
      }
    </script>
 
 <!-- end auto fill -->
<!-- DataTables -->
<script src="<?=$domain."system/plugins";?>/datatables/jquery.dataTables.js"></script>
<script src="<?=$domain."system/plugins";?>/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- jQuery -->
<script src="<?=$domain."system/plugins";?>/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=$domain."system/plugins";?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?=$domain."system/plugins";?>/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?=$domain."system/plugins";?>/sweetalert2/sweetalert2.min.js"></script>
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

<!-- Modal Barang-->
<div class="modal fade" id="choosebarang" tabindex="-1" role="dialog" aria-labelledby="listbarang" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h3 class="card-title">Stok Barang Mau Habis / Habis</h3>

      </div>
      
      <section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap" id="table1">
                  <thead>
                  <tr>
                <th>Id Barang</th>
                <th>Nama Barang</th>
                <th>Harga Jual</th>
                </tr>
                  </thead>
                  <tbody>
                  <?php
            include "../../../setting/koneksi.php";
            $q_user = mysqli_query($koneksi,"select *from tbl_product");
            while($f_fetch = mysqli_fetch_array($q_user)){

            ?>
            <tr href="#" data-dismiss="modal">
                <td><?=$f_fetch['id_barang'];?></td>
                <td><?=$f_fetch['nm_barang'];?></td>
                <td><?=$f_fetch['harga_jual'];?></td>
            </tr>
            <?php
            }?>
               
                
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
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
<!-- Detect Jika Ios -->

        <script>
    
                var table = document.getElementById('table1');
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                         document.getElementById("id_barang1").value = this.cells[0].innerHTML;
                         document.getElementById("nm_barang1").value = this.cells[1].innerHTML;
                         document.getElementById("harga_awal1").value = this.cells[2].innerHTML;
                    };
                }
    
         </script>
      
</body>
</html>
<?php
  }else{
    echo "<script>alert('Hei anda sudah terlalu jauh')</script>";
  }
  ?>