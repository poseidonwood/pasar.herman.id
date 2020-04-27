<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kedai Bu Puji | Timeline</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- AdminLTE css -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<?php
  include "../pages-headside.php";
  include "../pages-mainside.php";
  include "../../setting/koneksi.php";
  //include "../../setting/time_since.php";
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Timeline</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Timeline</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
          <div class='timeline'>
            <?php
            include "../../setting/waktu_sekarang.php";
            $q_log = mysqli_query($koneksi,"select tanggal, count(tanggal) as pembelian from tbl_log where jenis_transaksi ='Keluar' or jenis_transaksi='Masuk' or jenis_transaksi='Edit' or jenis_transaksi ='Hapus' group by tanggal ORDER BY tanggal desc");
            while($f_log=mysqli_fetch_array($q_log)){
                $f_tanggal0 = $f_log['tanggal'];
                $f_tanggal = date_create($f_log['tanggal']);
                $tanggal_t = date_format($f_tanggal,"d M, yy");
              //  $f_timestamps = $f_log['timestamps'];
              //  $timestamps_t = waktu_sekarang(strtotime($f_timestamps));
               // $nm_pembeli = $f_log['nm_pembeli'];
              //  $nm_barang = $f_log['nm_barang'];
              //  $f_harga = $f_log['harga'];
              echo"
              <!-- The time line -->
                      
                           <!-- timeline time label -->
                           <div class='time-label'>
                             <span class='bg-blue'>$tanggal_t</span>
                           </div>
                           <!-- /.timeline-label -->
                           <!-- timeline item -->
                           ";
                
                $q_log1 = mysqli_query($koneksi,"select *from tbl_log where tanggal ='$f_tanggal0' order by timestamps desc");
                while($f_log1 = mysqli_fetch_array($q_log1)){
                    $f_log = $f_log1['id_log'];
                 $f_timestamps = $f_log1['timestamps'];
              $timestamps_t = waktu_sekarang(strtotime($f_timestamps));
              $nm_pembeli = $f_log1['nm_pembeli'];
             $nm_barang = $f_log1['nm_barang'];
             $f_harga = $f_log1['harga'];
             $f_jenis = $f_log1['jenis_transaksi'];
             $f_qty = $f_log1['qty'];
             
                if($f_jenis=="Masuk"){
                    echo"
                    <div>
                        <i class='fas fa-dollar-sign bg-red'></i>
                        <div class='timeline-item'>
                            <span class='time'><i class='fas fa-clock'></i>  $timestamps_t</span>
                            <h3 class='timeline-header'><a href='#'>Agen $nm_pembeli </a> sudah restock barang $nm_barang seharga <strong>Rp.  $f_harga</strong> sejumlah $f_qty pcs.</h3>
                            <div class='timeline-body'>
                            Cek barang apa saja yang sudah di restock dari Agen $nm_pembeli pada tanggal $tanggal_t
                            </div>
                            <div class='timeline-footer'>
                            <a class='btn btn-danger btn-sm'>Lihat Transaksi</a>
                            </div>
                        </div>
                        </div>
                   
                    <!-- END timeline item -->
       
                    
       ";
                }elseif($f_jenis=="Keluar"){
                    echo"         
                    <div>
                      <i class='fas fa-dollar-sign bg-green'></i>
                      <div class='timeline-item'>
                        <span class='time'><i class='fas fa-clock'></i> $timestamps_t</span>
                        <h3 class='timeline-header no-border'><a href='#'>$nm_pembeli</a> telah membeli  $nm_barang seharga <strong>Rp.  $f_harga</strong> </h3>
                      </div>
                    </div>    
                    <!-- END timeline item -->
       
                    
       ";
                }elseif($f_jenis=="Hapus"){
                    echo"         
                    <div>
                      <i class='fas fa-trash bg-orange'></i>
                      <div class='timeline-item'>
                        <span class='time'><i class='fas fa-clock'></i> $timestamps_t</span>
                        <h3 class='timeline-header no-border'>Data <a href='#'>#$f_log</a> telah dihapus dari database.</h3>
                      </div>
                    </div>    
                    <!-- END timeline item -->
       
       ";
                }elseif($f_jenis=="Edit"){
                    echo"         
                    <div>
                      <i class='fas fa-edit bg-yellow'></i>
                      <div class='timeline-item'>
                        <span class='time'><i class='fas fa-clock'></i> $timestamps_t</span>
                        <h3 class='timeline-header no-border'>Data <a href='#'>#$f_log</a> dengan barang $nm_barang telah diupdate/diedit.</h3>
                      </div>
                    </div>    
                    <!-- END timeline item -->
       
                    
       ";
                }else{

                    echo"         
                    <div>
                      <i class='fas fa-dollar-sign bg-green'></i>
                      <div class='timeline-item'>
                        <span class='time'><i class='fas fa-clock'></i> $timestamps_t</span>
                        <h3 class='timeline-header no-border'><a href='#'>$nm_pembeli</a> telah membeli jajan  $nm_barang seharga <strong>Rp.  $f_harga</strong> </h3>
                      </div>
                    </div>    
                    <!-- END timeline item -->
       
                    
       ";
                }

            
echo "
<!-- timeline item 
             <div>
               <i class='fas fa-comments bg-yellow'></i>
               <div class='timeline-item'>
                 <span class='time'><i class='fas fa-clock'></i> 27 mins ago</span>
                 <h3 class='timeline-header'><a href='#'>Jay White</a> commented on your post</h3>
                 <div class='timeline-body'>
                   Take me to your leader!
                   Switzerland is small and neutral!
                   We are more like Germany, ambitious and misunderstood!
                 </div>
                 <div class='timeline-footer'>
                   <a class='btn btn-warning btn-sm'>View comment</a>
                 </div>
               </div>
             </div>
              END timeline item -->
            
             <!-- timeline item 
             <div>
               <i class='fas fa-trash bg-maroon'></i>

               <div class='timeline-item'>
                 <span class='time'><i class='fas fa-clock'></i> 5 days ago</span>

                 <h3 class='timeline-header'><a href='#'>Mr. Doe</a> shared a video</h3>

                 <div class='timeline-body'>
                   <div class='embed-responsive embed-responsive-16by9'>
                     <iframe class='embed-responsive-item' src='https://www.youtube.com/embed/tMWkeBIohBs' frameborder='0' allowfullscreen=''></iframe>
                   </div>
                 </div>
                 <div class='timeline-footer'>
                   <a href='#' class='btn btn-sm bg-maroon'>See comments</a>
                 </div>
               </div>
             </div>
             END timeline item -->
             
        
";

                }
                
            }
            ?>
            <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
              </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->

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
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
