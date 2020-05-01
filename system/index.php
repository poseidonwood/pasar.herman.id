<?php
include "../setting/koneksi.php";
include "setting/session.php";

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title_profile;?> | Dashboard</title>
  <script type="text/javascript" src="chartjs/Chart.js"></script>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

  <!-- Main Sidebar Container -->
  <?php
  include "headside.php";
  include "mainside.php";
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    
    
    <!-- /.content-header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   <!--   <div class='alert alert-danger alert-dismissible'>
<marquee> <strong> (
<?php 
                $data_alert = mysqli_query($koneksi,"select * from tvl_product where qty < 5");
                while($d_habis = mysqli_fetch_array($data_alert)){
                  $da_nm_barang = $d_habis['nm_barang'];

                 echo $da_nm_barang.", ";
                }
    ?>
) </strong> stok nya sudah habis . Harap restock sebelum ada customer yang beli produk tersebut.   </marquee>
</div>
-->
     <?php 
                $data_alert1 = mysqli_query($koneksi,"select count(*)  as total from tbl_product where qty < 10");
                while($d_habis1 = mysqli_fetch_array($data_alert1)){
                  $da_total = $d_habis1['total'];
                  if($da_total>0){
                    echo" <div class='alert alert-warning alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h5><i class='icon fas fa-exclamation-triangle'></i> Alert!</h5>
                    Ada <strong>$da_total</strong> stok yang mau habis . Harap cek qty real sebelum ada customer yang beli produk tersebut.
      </div>
      </div>";
                  }else{
                    echo" <div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h5><i class='icon fas fa-exclamation-triangle'></i> Alert!</h5>
                   Semua barang masih dalam stock / Aman 
      </div>
      </div>";
                  }

                
                }
    ?>
   
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">      
            <!-- small box -->
            
            <div class="small-box bg-info">
              <div class="inner">
              <h3>
              <?Php 
                //include "setting/time_since.php";

                $query_trans = mysqli_query($koneksi,"select count(*) as total from transaksi where status_transaksi ='FINISH' and (MONTH(timestamps) = MONTH(CURRENT_DATE))");
                $tampil1 = mysqli_fetch_array($query_trans);
                $echo_tampil1=$tampil1['total'];
               // $target = $echo_tampil1/$target_penjualan*100;
                echo"$echo_tampil1";
                ?>
                </h3>
                <p>Total Transaksi Bulan Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fas "></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!--    <div class="col-lg-3 col-6">
          
         <div class="small-box bg-success">
              <div class="inner">
                <h3
                <?php 
                $date_now = date("Y-m-d");
                $q_peng = mysqli_query($koneksi,"select SUM(harga_total) AS total from transaksi where status_transaksi='FINISH' and tanggal = '2020-04-30'");
                $qp_tampil = mysqli_fetch_array($q_peng);
                $eqp = $qp_tampil['total'];
                if($eqp==''){
                  echo"Rp. 0";
                }else{
                echo "Rp.";
                echo number_format($eqp, 0, ',', '.');
                }
                ?></h3>

                <p>Total Pemasukan Hari Ini</p>
              </div>
              <div class="icon">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="#" class="small-box-footer"  data-toggle="modal" data-target="#rinciantransaksi">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>-->
         
        </div>
        <!-- /.row -->

        <!-- Info 2 -->
        <!-- =========================================================== -->
        
         


        

        <!--info 2 -->



        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Penjualan Tahun 2020
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
               <!--     <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>-->
                    
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" 
                       style="position: relative; height: 300px; margin: 0px; auto">
                       <canvas id="myChart"></canvas>                       
                   </div>
                  
                </div>
              </div><!-- /.card-body -->
              
            </div>
           
            <!-- /.card -->
            <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ["Januari", "Februari", "Maret", "April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$januari = mysqli_query($koneksi,"select * from transaksi where status_transaksi ='FINISHED' and tanggal between '2020-01-01' and '2020-01-31'");
					echo mysqli_num_rows($januari);
					?>, 
					<?php 
					$februari = mysqli_query($koneksi,"select * from transaksi where status_transaksi ='FINISHED' and tanggal between '2020-02-01' and '2020-02-31'");
					echo mysqli_num_rows($februari);
					?>, 
					<?php 
					$maret = mysqli_query($koneksi,"select * from transaksi where status_transaksi ='FINISHED' and tanggal between '2020-03-01' and '2020-03-31'");
					echo mysqli_num_rows($maret);
					?>, 
					<?php 
					$april = mysqli_query($koneksi,"select * from transaksi where status_transaksi ='FINISHED' and tanggal between '2020-04-01' and '2020-04-31'");
					echo mysqli_num_rows($april);
					?>, 
					<?php 
					$mei = mysqli_query($koneksi,"select * from transaksi where status_transaksi ='FINISHED' and tanggal between '2020-05-01' and '2020-05-31'");
					echo mysqli_num_rows($mei);
					?>, 
					<?php 
					$juni = mysqli_query($koneksi,"select * from transaksi where status_transaksi ='FINISHED' and tanggal between '2020-06-01' and '2020-06-31'");
					echo mysqli_num_rows($juni);
					?>, 
					<?php 
					$juli = mysqli_query($koneksi,"select * from transaksi where status_transaksi ='FINISHED' and tanggal between '2020-07-01' and '2020-07-31'");
					echo mysqli_num_rows($juli);
					?>, 
					<?php 
					$agustus = mysqli_query($koneksi,"select * from transaksi where status_transaksi ='FINISHED' and tanggal between '2020-08-01' and '2020-08-31'");
					echo mysqli_num_rows($agustus);
					?>, 
					<?php 
					$sempember = mysqli_query($koneksi,"select * from transaksi where status_transaksi ='FINISHED' and tanggal between '2020-09-01' and '2020-09-31'");
					echo mysqli_num_rows($sempember);
					?>, 
					<?php 
					$oktober = mysqli_query($koneksi,"select * from transaksi where status_transaksi ='FINISHED' and tanggal between '2020-10-01' and '2020-10-31'");
					echo mysqli_num_rows($oktober);
					?>, 
					<?php 
					$november = mysqli_query($koneksi,"select * from transaksi where status_transaksi ='FINISHED' and tanggal between '2020-11-01' and '2020-11-31'");
					echo mysqli_num_rows($november);
					?>, 
					<?php 
					$desember = mysqli_query($koneksi,"select * from transaksi where status_transaksi ='FINISHED' and tanggal between '2020-12-01' and '2020-12-31'");
					echo mysqli_num_rows($desember);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
  
            
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
 

           

           
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal Reward-->
  <div class="modal fade" id="rewardmodal" tabindex="-1" role="dialog" aria-labelledby="listtopglobal" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listtopglobal">Jumat Berkah|Putar sekarang</h5>
        <button class="btn btn-large btn-primary start" id='spin'> Putar !! </button>

      </div>
      <div class="modal-body">

<canvas id="canvas" width="500" height="500"></canvas>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <!-- <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>


  <!-- Modal Top Global-->
<div class="modal fade" id="topglobalmodal" tabindex="-1" role="dialog" aria-labelledby="listtopglobal" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listtopglobal">Top Global Pembeli Kedai Bu Puji</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
                  <th>Ranking</th>
                  <th>Nama </th>
                  <th>Transaksi </th>
                  <th>Nominal?</th>

                </tr>
                </thead>
                <tbody>
                <?php 
                include 'setting/koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"select nm_pembeli, count(nm_pembeli) as pembelian, sum(harga) from transaksi where jenis_transaksi ='Keluar' and tanggal between '$date_awal' and '$date_akhir' group by nm_pembeli ORDER BY sum(harga) desc ");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nm_pembeli']; ?></td>
                    <td><?php echo $d['pembelian']; ?></td>
                    <td>Rp. <?php echo $d['sum(harga)']; ?></td>
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <!-- <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
 <!-- Modal RincianTransaksi-->
 <div class="modal fade" id="rinciantransaksi" tabindex="-1" role="dialog" aria-labelledby="listtransaksi" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listtransaksi">Rincian Transaksi Kedai Bu Puji</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <section class="content">
      <div class="row">
        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">          
            <!-- /.card-header -->
            <div class="card-body">
              
                <?php 
                include "setting/koneksi.php";
                $kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
                $query_kemarin = mysqli_query($koneksi,"select SUM(harga) AS kemarin from transaksi where jenis_transaksi='Keluar' and tanggal ='$kemarin'");
                $ambil_kemarin = mysqli_fetch_array($query_kemarin);
                $tampil_kemarin = $ambil_kemarin['kemarin'];
                $query_12 = mysqli_query($koneksi,"select SUM(harga) AS total_harga from transaksi where jenis_transaksi='Keluar' and tanggal between '$date_awal' and '$date_akhir'");
                $ambil12 = mysqli_fetch_array($query_12);
                $tampil12 = $ambil12['total_harga'];
                $query = mysqli_query($koneksi,"select *from transaksi where jenis_transaksi = 'Keluar' and tanggal between '$date_awal' and '$date_akhir' ");
                $query1 = mysqli_query($koneksi,"select *from transaksi where jenis_transaksi = 'Masuk' and tanggal between '$date_awal' and '$date_akhir' ");
                $total = 0;
                $total1 = 0;
                $harga0 = 0;
                while($ambil = mysqli_fetch_array($query)){
                  
                  $id = $ambil['id_transaksi'];
                  $pembeli = $ambil['nm_pembeli'];
                  $id_barang = $ambil['id_barang'];
                  $nm_barang = $ambil['nm_barang'];
                  $harga = $ambil['harga'];
                  $qty = $ambil['qty'];
                  $untung = $ambil['untung'];
                  $total +=$untung;
                  $harga0 += $harga;
                }
                while($ambil1 = mysqli_fetch_array($query1)){
                    $harga1=$ambil1['harga'];
                    $total1 += $harga1;
                }
             //   $kulakan = $tampil12-$total;
             $selisih = ($total + $total1) - $harga0  ;
                echo "<h6>Pemasukan Hari Ini : </h6>";
                echo "<h2>Rp. <strong>";
                echo number_format($echo_tampil13, 0, ',', '.');
                echo"</strong></h2><hr></br>";
                echo "<h6>Pemasukan Kemarin : </h6>";
                echo "<h2>Rp. <strong>";
                echo number_format($tampil_kemarin, 0, ',', '.');
                echo"</strong></h2><hr></br>";
                echo "<h6>Kulakan Perbulan : </h6>";
                echo "<h2>Rp. <strong>";
                echo number_format($total1, 0, ',', '.');
                echo"</strong></h2><hr></br>";
                echo "<h6>Keuntungan Perbulan : </h6>";
                echo "<h2>Rp. <strong>";
                echo number_format($total, 0, ',', '.');
                echo"</strong></h2><hr></br>";
                echo "<h6>Total Omset Perbulan : </h6>";
                echo "<h2>Rp. <strong>";
                echo number_format($harga0, 0, ',', '.');
                echo"</strong></h2><hr></br>";
                echo "<h6>Selisih Omset Perbulan dengan Kulakan + Untung : </h6>";
                echo "<h2>Rp. <strong>";
                echo number_format($selisih, 0, ',', '.');
                echo"</strong></h2><hr></br>";
    
                  ?>
             
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <!-- <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
<!-- Modal Top Global Product-->
<div class="modal fade" id="topglobalproduct" tabindex="-1" role="dialog" aria-labelledby="listtopglobalproduct" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listtopglobalproduct">Top Global Product Kedai Bu Puji</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
                  <th>Ranking</th>
                  <th>Id Barang </th>
                  <th>Transaksi?</th>

                </tr>
                </thead>
                <tbody>
                <?php 
                include 'setting/koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"select id_barang, count(id_barang) as pembelian from transaksi where jenis_transaksi = 'Keluar' and tanggal between '$date_awal' and '$date_akhir' group by id_barang ORDER BY pembelian desc ");
                while($d = mysqli_fetch_array($data)){
                  ?>

                  <tr>
                    <td><?php echo $no++; ?></td>
                    <?php
                   $id_new = $d['id_barang'];
                   $query_tampil_inventory = mysqli_query($koneksi,"select id_barang,nm_barang from inventory where id_barang ='$id_new'");
                $tampil5 = mysqli_fetch_array($query_tampil_inventory);
                $echo_tampil4=$tampil5['nm_barang'];?>
                    <td><?php echo $d['id_barang']; ?> - <?=$echo_tampil4;?></td>
                  
                    <td><?php echo $d['pembelian']; ?></td>
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <!-- <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
<?php
include "footer.php";
?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
    //var options = ["Rp. 2000", "Kalah", "Rp. 4000", "Rp. 6000","Coba Lagi Guys", "Rp. 8000", "Kurang Beruntung", "Putar 1x", "Coba Lain Kali"];
        var options = ["Putar 1x","Voucher","Kentang 2k", "Pempek 1", "Teh Gelas x2", "Otak 2k","Makroni x2", "Pop Ice", "Govit x2", "Gorio x2", "Voucher","Sosis x2","Boyki x2","Kalah","Voucher","Voucher","Tempura 2k","Kentang 2k"];

        var startAngle = 0;
        var arc = Math.PI / (options.length / 2);
        var spinTimeout = null;
        
        var spinArcStart = 10;
        var spinTime = 0;
        var spinTimeTotal = 0;
        
        var ctx;
        
        document.getElementById("spin").addEventListener("click", spin);
        
        function byte2Hex(n) {
          var nybHexString = "0123456789ABCDEF";
          return String(nybHexString.substr((n >> 4) & 0x0F,1)) + nybHexString.substr(n & 0x0F,1);
        }
        
        function RGB2Color(r,g,b) {
            return '#' + byte2Hex(r) + byte2Hex(g) + byte2Hex(b);
        }
        
        function getColor(item, maxitem) {
          var phase = 0;
          var center = 128;
          var width = 127;
          var frequency = Math.PI*2/maxitem;
          
          red   = Math.sin(frequency*item+2+phase) * width + center;
          green = Math.sin(frequency*item+0+phase) * width + center;
          blue  = Math.sin(frequency*item+4+phase) * width + center;
          
          return RGB2Color(red,green,blue);
        }
        
        function drawRouletteWheel() {
          var canvas = document.getElementById("canvas");
          if (canvas.getContext) {
            var outsideRadius = 200;
            var textRadius = 160;
            var insideRadius = 125;
        
            ctx = canvas.getContext("2d");
            ctx.clearRect(0,0,500,500);
        
            ctx.strokeStyle = "black";
            ctx.lineWidth = 2;
        
            ctx.font = 'bold 12px Helvetica, Arial';
        
            for(var i = 0; i < options.length; i++) {
              var angle = startAngle + i * arc;
              //ctx.fillStyle = colors[i];
              ctx.fillStyle = getColor(i, options.length);
        
              ctx.beginPath();
              ctx.arc(250, 250, outsideRadius, angle, angle + arc, false);
              ctx.arc(250, 250, insideRadius, angle + arc, angle, true);
              ctx.stroke();
              ctx.fill();
        
              ctx.save();
              ctx.shadowOffsetX = -1;
              ctx.shadowOffsetY = -1;
              ctx.shadowBlur    = 0;
              ctx.shadowColor   = "rgb(220,220,220)";
              ctx.fillStyle = "black";
              ctx.translate(250 + Math.cos(angle + arc / 2) * textRadius, 
                            250 + Math.sin(angle + arc / 2) * textRadius);
              ctx.rotate(angle + arc / 2 + Math.PI / 2);
              var text = options[i];
              ctx.fillText(text, -ctx.measureText(text).width / 2, 0);
              ctx.restore();
            } 
        
            //Arrow
            ctx.fillStyle = "black";
            ctx.beginPath();
            ctx.moveTo(250 - 4, 250 - (outsideRadius + 5));
            ctx.lineTo(250 + 4, 250 - (outsideRadius + 5));
            ctx.lineTo(250 + 4, 250 - (outsideRadius - 5));
            ctx.lineTo(250 + 9, 250 - (outsideRadius - 5));
            ctx.lineTo(250 + 0, 250 - (outsideRadius - 13));
            ctx.lineTo(250 - 9, 250 - (outsideRadius - 5));
            ctx.lineTo(250 - 4, 250 - (outsideRadius - 5));
            ctx.lineTo(250 - 4, 250 - (outsideRadius + 5));
            ctx.fill();
          }
        }
        
        function spin() {
          spinAngleStart = Math.random() * 10 + 10;
          spinTime = 0;
          spinTimeTotal = Math.random() * 3 + 4 * 1000;
          rotateWheel();
        }
        
        function rotateWheel() {
          spinTime += 30;
          if(spinTime >= spinTimeTotal) {
            stopRotateWheel();
            return;
          }
          var spinAngle = spinAngleStart - easeOut(spinTime, 0, spinAngleStart, spinTimeTotal);
          startAngle += (spinAngle * Math.PI / 180);
          drawRouletteWheel();
          spinTimeout = setTimeout('rotateWheel()', 30);
        }
        
        function stopRotateWheel() {
          clearTimeout(spinTimeout);
          var degrees = startAngle * 180 / Math.PI + 90;
          var arcd = arc * 180 / Math.PI;
          var index = Math.floor((360 - degrees % 360) / arcd);
          ctx.save();
          ctx.font = 'bold 30px Helvetica, Arial';
          var text = options[index]
          ctx.fillText(text, 250 - ctx.measureText(text).width / 2, 250 + 10);
          ctx.restore();
        }
        
        function easeOut(t, b, c, d) {
          var ts = (t/=d)*t;
          var tc = ts*t;
          return b+c*(tc + -3*ts + 3*t);
        }
        
        drawRouletteWheel();</script>
</body>
</html>
