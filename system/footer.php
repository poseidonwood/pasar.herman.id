<?php
// deteksi IP pribadi
$ip_pribadi=$_SERVER['REMOTE_ADDR'];
// deteksi IP utama
$ip_utama = gethostbyaddr($_SERVER['REMOTE_ADDR']);
// deteksi perangkat
$deteksi_perangkat = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
if($deteksi_perangkat) {
    $perangkat = "Handphone, Tablet atau sejenisnya";
}
else {
    $perangkat = "Komputer atau Notebook";
}
// deteksi browser
if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape')) {
    $browser = 'Netscape';
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox')) {
    $browser = 'Mozilla Firefox';
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome')) {
    $browser = 'Google Chrome';
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera')) {
    $browser = 'Opera';
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
    $browser = 'Internet Explorer';
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari')) {
    $browser = 'Safari';
}
else {
    $browser = 'Lainnya';
}  
?>
	
<footer class="main-footer">
<a  href='#'  data-toggle='modal' data-target='#cek-ip'><strong><?php
if($perangkat=="Komputer atau Notebook"){
  echo " <i class='fas fa-laptop'></i> :</strong> ".$ip_utama;
}else{
  echo " <i class='fas fa-mobile'></i> :</strong> ".$ip_utama;
}

?></strong></a>

    <strong>| Copyright &copy; 2020 <a href="#">Febri Kukuh</a>.</strong>&nbsp;
    <div class='modal fade' id='cek-ip' data-backdrop='static'>
                                            <div class='modal-dialog modal-dialog-centered'>
                                                <div class='modal-content'>
                                                    <div class='modal-body' style='text-align:left;'>
                                                    <strong><?= "<br>Perangkat :</strong> ".$ip_utama;?>
                                                    <strong><?= "<br>IP address anda :</strong> ".$ip_pribadi;?>
                                                    <strong><?= "<br>Jenis Perangkat :</strong> ".$perangkat;?>
                                                    <strong><?= "<br>Browser :</strong> ".$browser;?>      
                                                    <div class='modal-body' style='text-align:right;'>
                                                    <button type='button' class='btn btn-warning' data-dismiss='modal'>Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    <div class="float-right d-none d-sm-inline-block">

   <b>Version</b> 1.0.0 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                     
    </div>
    
  </footer>
<!-- Modal Barang-->
<div class="modal fade" id="ltbarang" tabindex="-1" role="dialog" aria-labelledby="listbarang" aria-hidden="true">
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
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                  <tr>
                  <th>No</th>
                  <th>Id</th>
                  <th>Nama Barang</th>
                  <th>Qty</th>
                  <th>Last Updt</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php 
                $no = 1;
                $data = mysqli_query($koneksi,"select * from inventory where ket ='MAU HABIS' or ket ='HABIS'");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['id_barang']; ?></td>
                    <td><?= $d['nm_barang']; ?></td>
                    <td><?= $d['qty']; ?></td>
                    <td><?= $d['last_upt']; ?></td>
                    <td><?php 
                    $ket = $d['ket'];
                    if($ket=="AMAN")
                    {
                     echo "<span class='badge bg-success'>$ket</span>";
                    }elseif($ket=="HABIS"){
                      echo "<span class='badge bg-danger'>$ket</span>";
                    }else{
                      echo "<span class='badge bg-warning'>$ket</span>";
                    }
                     ?></td>
                  
                  <td>
                      <a href="pages/forms/inventory-update.php?id=<?= $d['id_barang']; ?>" class="btn btn-success btn-sm">
                              <i class="fas fa-pencil-alt">
                              </i>
                          </a>
                      <a href="proses/hapus-inventory.php?id=<?= $d['id_barang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                              <i class="fas fa-trash">
                              </i>
                          </a>
                    </td>
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
<!-- Modal Orderan-->
<div class="modal fade" id="ltorder" tabindex="-1" role="dialog" aria-labelledby="listbarang" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
     <center> <h3 class="card-title">Orderan Masuk</h3></center>

      </div>
      <div class="modal-body">

      <!-- modal baru -->
      <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Order Active &nbsp;
										<?php
										if($f_not_order>0){
											echo"<span class='badge progress-bar-danger'>New</span>";
										}else{

										}
										?></a></li>
    <li><a data-toggle="tab" href="#menu1"><i class="fa fa-history"></i> History Order</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <br>
	  <?php
		  $rows_transaksi1 = mysqli_num_rows($q_transaksi1);

		  if($rows_transaksi1>0){
			while($f_transaksi = mysqli_fetch_array($q_transaksi1)){
			$transaksi1_nm_voucher = $f_transaksi['nm_voucher'];
			$transaksi1_harga_awal = $f_transaksi['harga_awal'];
			$transaksi1_id_transaksi = $f_transaksi['id_transaksi'];	
			$transaksi1_nm_pembeli = $f_transaksi['nm_pembeli'];
			$transaksi1_alamat = $f_transaksi['alamat'];
			$transaksi1_hp = $f_transaksi['hp'];
			$transaksi1_jenis=$f_transaksi['jenis_pembayaran'];
			$transaksi1_harga = $f_transaksi['harga_total'];
			$transaksi1_status_transaksi = $f_transaksi['status_transaksi'];
			$transaksi1_device_ip = $f_transaksi['device_ip'];		 
			  ?>
	
	<div class="input-checkbox">
	<label for="order_id(<?=$transaksi1_id_transaksi;?>)">
	<h5>Order Id : &nbsp;<span class="badge progress-bar-primary"><?=$transaksi1_id_transaksi;?></span>
	<?php
		  if($transaksi1_jenis=="BCA"){
			  if($transaksi1_status_transaksi=="MENUNGGU PEMBAYARAN"){
				echo"&nbsp;<span class='badge progress-bar-danger'>Pending</span>";
				}elseif($transaksi1_status_transaksi=="CANCELED"){
			  echo"&nbsp;<span class='badge progress-bar-danger'>$transaksi1_status_transaksi</span>";
		 		 }
		  }elseif($transaksi1_jenis=="MANDIRI"){
			if($transaksi1_status_transaksi=="MENUNGGU PEMBAYARAN"){
				echo"&nbsp;<span class='badge progress-bar-danger'>Pending</span>";
				}elseif($transaksi1_status_transaksi=="CANCELED"){
			  echo"&nbsp;<span class='badge progress-bar-danger'>$transaksi1_status_transaksi</span>";
		 		 }
		}elseif($transaksi1_jenis=="COD"){
			if($transaksi1_status_transaksi=="COD"){
				echo"&nbsp;<span class='badge progress-bar-success'>SEGERA DI HUBUNGI</span>";
				}elseif($transaksi1_status_transaksi=="CANCELED"){
			  echo"&nbsp;<span class='badge progress-bar-danger'>$transaksi1_status_transaksi</span>";
		 		 }
		}
		  ?>
	</h5>
	<p style="font-size:80%;">(Klik untuk lihat selengkapnya)</p>
	</label>			
	<input type="checkbox" id="order_id(<?=$transaksi1_id_transaksi;?>)">			
									<div class="caption">
									<hr>
	<label>
	<h5>Total Tagihan</h5>
	<p><?= "Rp ".number_format($transaksi1_harga,2,',','.');?></p>
	</label>

	<hr>
	<label>
	<h5>Status Pemesanan</h5>
	<?php
		  if($transaksi1_status_transaksi=="MENUNGGU PEMBAYARAN"){
			  echo"<p><span class='badge progress-bar-danger'>$transaksi1_status_transaksi</span></p><br> <button type='button' onclick=\"window.location.href ='https://wa.me/$number_profile'\"class='btn btn-success'><i class='fa fa-whatsapp'></i> KONFIRMASI</button>&nbsp;<button type='button' onclick=\"window.location.href ='confirm.php?x=$transaksi1_id_transaksi&jenis=$transaksi1_status_transaksi'\" class='btn btn-danger'><i class='fa fa-dollar'></i> TRANSFER</button>";
		  }elseif($transaksi1_status_transaksi=="CANCELED"){
			echo"<p><span class='badge progress-bar-danger'>$transaksi1_status_transaksi</span></p>";
		}else{
			echo"<p><span class='badge progress-bar-success'>$transaksi1_status_transaksi</span></p>";
		}
		  ?>
		  </label>
	<hr>
	<label>
	<strong><h5>Alamat Pengiriman</h5></strong>
	<p><?=$transaksi1_nm_pembeli;?></p>
	<p>(<?=$transaksi1_hp;?>)</p>
	<p><?=$transaksi1_alamat;?></p>
	</label>
	<hr>
	<div class="input-checkbox">
	<center><label for="ringkasan(<?=$transaksi1_id_transaksi;?>)">
									<span class="badge progress-bar-primary">	<i class="fa fa-sort"></i>&nbsp;Ringkasan Belanja</span>
	</label>	</center>				
	<input type="checkbox" id="ringkasan(<?=$transaksi1_id_transaksi;?>)">			
									<div class="caption">

										<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Barang</th>
      <th scope="col">Qty</th>
      <th scope="col">Harga</th>
    </tr>
  </thead>
  <tbody>
	  <?php
	$q_order1 = mysqli_query($koneksi,"select *from tbl_cart where device_ip = '$device_ip' and id_transaksi ='$transaksi1_id_transaksi'");  
	while($f_detail = mysqli_fetch_array($q_order1)){
	
	  ?>
    <tr>
      <td><?= $f_detail['nm_barang'];?></td>
      <td><?= $f_detail['qty'];?></td>
      <td>Rp <?= $f_detail['harga_total'];?></td>
	</tr>
	<?php
	}?>
	<?php
	$voucher = $transaksi1_harga_awal - $transaksi1_harga;
	
	if(isset($transaksi1_nm_voucher)){
		echo"<tr>
		<td colspan='2'>Diskon ($transaksi1_nm_voucher)</td>
		<td>- Rp. $voucher</td>

		</tr>";
	}else{
		echo"<tr>
		<td colspan='2'></td>
		<td></td>

		</tr>";
	}
	?>
	
	<th colspan="2">Total</th>
	<td>Rp <?= $transaksi1_harga;?></td>

  </tbody>
</table>
</div>	
		
									</div>
									
								</div>
								</div>
	<hr>
									<?php
			
		}}else{
				?>
<div class="input-checkbox">
	<label for="order_id">
	<h5>Anda Belum Belanja Sepertinya</h5>
	</label>			
	
</div>	

		<?php
			
			}
		  
		
		  ?>	
    </div>
    <div id="menu1" class="tab-pane fade">
	  <br>
	  <?php
		  $rows_transaksi = mysqli_num_rows($q_transaksi2);

		  if($rows_transaksi>0){
			while($f_transaksi = mysqli_fetch_array($q_transaksi2)){
			 $transaksi2_nm_voucher = $f_transaksi['nm_voucher'];
			 $transaksi2_harga_awal = $f_transaksi['harga_awal'];
			$transaksi2_id_transaksi = $f_transaksi['id_transaksi'];	
			$transaksi2_nm_pembeli = $f_transaksi['nm_pembeli'];
			$transaksi2_alamat = $f_transaksi['alamat'];
			$transaksi2_hp = $f_transaksi['hp'];
			$transaksi2_jenis=$f_transaksi['jenis_pembayaran'];
			$transaksi2_harga = $f_transaksi['harga_total'];
			$transaksi2_status_transaksi = $f_transaksi['status_transaksi'];
			$transaksi2_device_ip = $f_transaksi['device_ip'];		 
			  ?>
	
	<div class="input-checkbox">
	<label for="order_id(<?=$transaksi2_id_transaksi;?>)">
	<h5>Order Id : &nbsp;<span class="badge progress-bar-primary"><?=$transaksi2_id_transaksi;?></span>
	<?php
		  if($transaksi2_jenis=="BCA"){
			  echo"<span class='badge progress-bar-info'>$transaksi2_jenis</span>";
			  if($transaksi2_status_transaksi=="MENUNGGU PEMBAYARAN"){
				echo"&nbsp;<span class='badge progress-bar-danger'>$transaksi2_status_transaksi</span>";
				}elseif($transaksi2_status_transaksi=="CANCELED"){
			  echo"&nbsp;<span class='badge progress-bar-danger'>$transaksi2_status_transaksi</span>";
		 		 }
		  }elseif($transaksi2_jenis=="MANDIRI"){
			echo"<span class='badge progress-bar-warning'>$transaksi2_jenis</span>";
			if($transaksi2_status_transaksi=="MENUNGGU PEMBAYARAN"){
				echo"&nbsp;<span class='badge progress-bar-danger'>$transaksi2_status_transaksi</span>";
				}elseif($transaksi2_status_transaksi=="CANCELED"){
			  echo"&nbsp;<span class='badge progress-bar-danger'>$transaksi2_status_transaksi</span>";
		 		 }
		}else{
			echo"<span class='badge progress-bar-success'>$transaksi2_jenis</span>";
			if($transaksi2_status_transaksi=="MENUNGGU PEMBAYARAN"){
				echo"&nbsp;<span class='badge progress-bar-danger'>$transaksi2_status_transaksi</span>";
				}elseif($transaksi2_status_transaksi=="CANCELED"){
			  echo"&nbsp;<span class='badge progress-bar-danger'>$transaksi2_status_transaksi</span>";
		 		 }
		}
		  ?>
	</h5>
	<p style="font-size:80%;">(Klik untuk lihat selengkapnya)</p>
	</label>			
	<input type="checkbox" id="order_id(<?=$transaksi2_id_transaksi;?>)">			
									<div class="caption">
									<hr>
	<label>
	<h5>Total Tagihan</h5>
	<p><?= "Rp ".number_format($transaksi2_harga,2,',','.');?></p>
	</label>

	<hr>
	<label>
	<h5>Status Pemesanan</h5>
	<?php
		  if($transaksi2_status_transaksi=="MENUNGGU PEMBAYARAN"){
			  echo"<p><span class='badge progress-bar-danger'>$transaksi2_status_transaksi</span></p> <button type='button' class='btn btn-warning'><i class='fa fa-whatsapp'></i> KONFIRMASI</button><button type='button' onclick=\"window.location.href ='confirm.php?x=$transaksi2_id_transaksi&jenis=$transaksi2_status_transaksi'\" class='btn btn-danger'>TRANSFER</button>";
		  }elseif($transaksi2_status_transaksi=="CANCELED"){
			echo"<p><span class='badge progress-bar-danger'>$transaksi2_status_transaksi</span></p>";
		}else{
			echo"<p><span class='badge progress-bar-success'>$transaksi2_status_transaksi</span></p>";
		}
		  ?>
		  </label>
	<hr>
	<label>
	<strong><h5>Alamat Pengiriman</h5></strong>
	<p><?=$transaksi2_nm_pembeli;?></p>
	<p>(<?=$transaksi2_hp;?>)</p>
	<p><?=$transaksi2_alamat;?></p>
	</label>
	<hr>
	<div class="input-checkbox">
	<center><label for="ringkasan(<?=$transaksi2_id_transaksi;?>)">
									<span class="badge progress-bar-primary">	<i class="fa fa-sort"></i>&nbsp;Ringkasan Belanja</span>
	</label>	</center>				
	<input type="checkbox" id="ringkasan(<?=$transaksi2_id_transaksi;?>)">			
									<div class="caption">

										<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Barang</th>
      <th scope="col">Qty</th>
      <th scope="col">Harga</th>
    </tr>
  </thead>
  <tbody>
	  <?php
	$q_order2 = mysqli_query($koneksi,"select *from tbl_cart where device_ip = '$device_ip' and id_transaksi ='$transaksi2_id_transaksi'");  
	while($f_detail1 = mysqli_fetch_array($q_order2)){

	  ?>
    <tr>
      <td><?= $f_detail1['nm_barang'];?></td>
      <td><?= $f_detail1['qty'];?></td>
      <td>Rp <?= $f_detail1['harga_total'];?></td>
	</tr>
	
	<?php
	}?>
	<?php
	$voucher = $transaksi2_harga_awal - $transaksi2_harga;
	
	
	if(isset($transaksi2_nm_voucher)){
		echo"<tr>
		<td colspan='2'>Diskon ($transaksi2_nm_voucher)</td>
		<td>- Rp. $voucher</td>

		</tr>";
	}else{
		echo"<tr>
		<td colspan='2'></td>
		<td></td>

		</tr>";
	}
	
	?>
	
	<th colspan="2">Total</th>
	<td>Rp <?= $transaksi2_harga;?></td>

  </tbody>
</table>
</div>	
		
									</div>
									
								</div>
								</div>
	<hr>
									<?php
			
		}}else{
				?>
<div class="input-checkbox">
	<label for="order_id">
	<h5>Anda Belum Belanja Sepertinya</h5>
	</label>			
	
</div>	

		<?php
			
			}
		  
		
		  ?>    </div>
  </div>



      <!-- Modal body lama -->
        <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">A</div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">B</div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">C</div>
</div>
      <section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <?php
              if($count_notif==0){
                echo "<span class='badge bg-danger'><center><h3>Orderan Masih Kosong</h3></center></span>";
              }else{
                ?>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead >
                  <tr>
                  <th>No</th>
                  <th>Id Transaksi</th>
                  
                  <th>Action</th>

                  </tr>
                  </thead>
               
                  <tbody>
                  <?php 
                $no = 1;
                $data = mysqli_query($koneksi,"select * from transaksi where status_transaksi='MENUNGGU PEMBAYARAN' or status_transaksi ='COD'");
                while($d = mysqli_fetch_array($data)){
                  $id_transaksi_detail = $d['id_transaksi'];

                  ?>
               <tr>
                    <td><?= $no++; ?></td>
                 <td><a href="#" data-toggle="modal" data-target="#detail<?= $d['id_transaksi']; ?>"><strong><?= $d['id_transaksi']; ?></strong><h6><span class="badge bg-primary">(Klik Untuk Detail)</span></h6></a></td>

                  <!--  <td><?php 
                   /* $ket = $d['ket'];
                    if($ket=="AMAN")
                    {
                     echo "<span class='badge bg-success'>$ket</span>";
                    }elseif($ket=="HABIS"){
                      echo "<span class='badge bg-danger'>$ket</span>";
                    }else{
                      echo "<span class='badge bg-warning'>$ket</span>";
                    }*/
                     ?></td>-->
                  
                  <td>
                      <a href="#" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#confirm<?= $d['id_transaksi']; ?>">
                      <i class="fas fa-pencil-alt">
                              </i>
                      </a>    
                      <a href="proses/hapus-inventory.php?id=<?= $d['id_transaksi']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                              <i class="fas fa-trash">
                              </i>
                          </a>
                    </td>
            
                  </tr>
                   


<!-- Modal detail-->
<div class="modal fade" id="detail<?= $d['id_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="detail<?= $d['id_transaksi']; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detail<?= $d['id_transaksi']; ?>">Detail Order #<?= $d['id_transaksi']; ?></h5>
      </div>
      <div class="modal-body">
                       <div class='info-box bg-default'>
                      <div class='info-box-content'>
                      <p style='color:black;'><strong>Detail Pembeli : </strong></p>
                      <p style='color:black;'><?= $d['nm_pembeli']; ?> - <?= $d['hp']; ?> - <?= $d['alamat']; ?></p>
                      <hr>
                      <p style='color:black;'><strong>Jenis Pembayaran - </strong>  <?= $d['jenis_pembayaran']; ?> </p>
                      <p style='color:black;'><strong>Status Transaksi - </strong> <span class ="badge bg-warning"><?= $d['status_transaksi']; ?></span></p>
                      <p style='color:black;'>
                      <a class="btn btn-primary" >
                      Detail Order
                      </a></p>
  <div class="card card-body">
  <?php
  $ringkasan_id = $d['id_transaksi'];
  // echo "<pre>";
  // echo var_dump($ringkasan_id);
  // echo "</pre>";
    
	$q_order10 = mysqli_query($koneksi,"select *from tbl_cart where id_transaksi ='$ringkasan_id'");  
	while($f_detail10 = mysqli_fetch_array($q_order10)){
   $ringkasan_nm = $f_detail10['nm_barang'];
   $ringkasan_qty = $f_detail10['qty'];
   $ringkasan_harga_total =  $f_detail10['harga_total'];


	?>
  <p style='color:black;'><strong>Nama Barang :   </strong> <?=$ringkasan_nm;?></p>
  <p style='color:black;'><strong>Qty         :   </strong> <?=$ringkasan_qty;?></p>
  <p style='color:black;'><strong>Harga Total :   </strong> Rp <?=$ringkasan_harga_total;?></p>
  <?php
  }?>
  </div>


                     </div>
                     </div> 
      </div>
    </div>
  </div>
</div>
<!-- End Modal detail-->
        <!-- Modal Confirmasi-->
              <div class="modal fade" id="confirm<?= $d['id_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="confirm<?= $d['id_transaksi']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                    <div class='info-box bg-default'>
                      <div class='info-box-content'>
                      <form action="#" method="post">

                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Status Pembayaran</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01">
                        <?php
                        $status_pem = $d['jenis_pembayaran'];
                        if($status_pem='N'){
                          echo" <option selected>Belum Bayar</option>
                          <option value='Y'>Lunas</option>";
                        }else{
                          echo" <option selected>Lunas</option>
                          <option value='N'>Belum Bayar</option>";
                        }
                        ?>
                        </select>
                      </div>
                      <div class="input-group mb-3 pull-right">
                        <button type ="submit" class ="btn bg-success">Proses </button
                      </div>
                      </form>
                    </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>

              <style>
              #confirm<?= $d['id_transaksi']; ?> {
              top:25%;
              right:50%;
              outline: none;
              overflow:hidden;
              }
              #detail<?= $d['id_transaksi']; ?> {
              top:5%;
              right:50%;
              outline: none;
              overflow:hidden;
              }
              </style>
              
              <?php
                }?>                
               
                
                </tbody>
   
                </table>
              </div>
             
              
              <?php
              }?>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
    </section>
    </div>
    <!-- /.content -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <!--  <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
<!-- Modal transaksi-->



<div class="modal fade" id="lttransaksi<?= $d['id_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="lttransaksi" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h3 class="card-title">Barang</h3>

      </div>
      <div class="modal-body">
    <section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                  <tr>
                  <th>No</th>
                  <th>Id</th>
                  <th>Nama Barang</th>
                  <th>Harga Total</th>
                  <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>
                <?php 
                $id_transaksi = $d['id_transaksi'];
                $no = 1;
                $data1 = mysqli_query($koneksi,"select * from tbl_cart where id_transaksi='$id_transaksi'");
                while($e = mysqli_fetch_array($data1)){
                  ?>
                  <tr>
                    <td><?= $no++; ?></td>
                   <a href="#" data-toggle="modal" data-target="#ltidtransaksi"> <td><?= $d['id_transaksi']; ?></td></a>
                    <td><?= $e['id_transaksi']; ?></td>
                    <td><?= $e['nm_barang']; ?></td>
                    <td><?= $e['harga_total']; ?></td>
                  

                  <!--  <td><?php 
                   /* $ket = $d['ket'];
                    if($ket=="AMAN")
                    {
                     echo "<span class='badge bg-success'>$ket</span>";
                    }elseif($ket=="HABIS"){
                      echo "<span class='badge bg-danger'>$ket</span>";
                    }else{
                      echo "<span class='badge bg-warning'>$ket</span>";
                    }*/
                     ?></td>-->
                  
                  <td>
                      <a href="pages/forms/inventory-update.php?id=<?= $d['id_transaksi']; ?>" class="btn btn-success btn-sm">
                              <i class="fas fa-pencil-alt">
                              </i>
                          </a>
                      <a href="proses/hapus-inventory.php?id=<?= $d['id_transaksi']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                              <i class="fas fa-trash">
                              </i>
                          </a>
                    </td>
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
        </div>
        <!-- /.row -->
    </section>
    </div>
    <!-- /.content -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <!--  <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
<script>
function myalert() {
  //window.history.back();
  alert("Maaf Tombol Ini Rusak , Masih di perbaiki dan segera berfungsi lagi.");
 
}
</script>