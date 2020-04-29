<?php
include "setting/sql.php";
include "headside.php";
if(isset($_GET['x'])){
	if($_GET['x']==''){
		echo"<script>
		window.alert('Anda Tidak Diperbolehkan Masuk');
		window.location.href='$domain';</script>";
	}else{
	$id_transaksi = $_GET['x'];
	$jenis = $_GET['jenis'];
	
		
	//search data di database
	$q_p_b = mysqli_query($koneksi,"select *from transaksi where id_transaksi = '$id_transaksi' and status_transaksi='$jenis'");
	$f_q_r = mysqli_num_rows($q_p_b);
	if($f_q_r>0){
		$f_q_r = mysqli_fetch_array($q_p_b);
		$tempo_bayar = $f_q_r['tempo_bayar'];
		$harga_total = $f_q_r['harga_total'];
		$jenis_pembayaran1 = $f_q_r['jenis_pembayaran'];
		$tanggal = $tempo_bayar;

//pisahkan tanggal
$array1=explode("-",$tanggal);
$tahun=$array1[0];
$bulan=$array1[1];
$sisa1=$array1[2];
$array2=explode(" ",$sisa1);
$tanggal=$array2[0];
$sisa2=$array2[1];
$array3=explode(":",$sisa2);
$jam=$array3[0];
$menit=$array3[1];
$detik=$array3[2];
//ubah nama bulan menjadi bahasa indonesia
switch($bulan)
{
case"01";
$bulan="Januari";
break;
case"02";
$bulan="Februari";
break;
case"03";
$bulan="Maret";
break;
case"04";
$bulan="April";
break;
case"05";
$bulan="Mei";
break;
case"06";
$bulan="Juni";
break;
case"07";
$bulan="Juli";
break;
case"08";
$bulan="Agustus";
break;
case"09";
$bulan="September";
break;
case"10";
$bulan="Oktober";
break;
case"11";
$bulan="November";
break;
case"12";
$bulan="Desember";
break;
}

		//ambil rekening
		$que_rek = mysqli_query($koneksi,"select *from tbl_rekening where active ='Y' and nm_bank ='$jenis_pembayaran1'");
		$g_rekening = mysqli_fetch_array($que_rek);
		$nm_rekening = $g_rekening['nm_rekening'];
		$no_rekening = $g_rekening['no_rekening'];
		$foto = $g_rekening['foto'];

		
	?>

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				<div class="col-md-5 order-details" style="width:100%; margin:0 auto;">
				<div class="card text-center">
  <div class="card-body">
  <?php
  if($jenis_pembayaran1=='COD'){
	  echo "<h3 class='card-title'>Kami Akan Segera Menghubungi Anda</h3>
	  <h5 class='card-title'>Mohon menunggu selama jeda di bawah ini selagi kami meproses orderan anda dan segera menghubungi anda. Terima kasih.</h5>
  ";
  }else{
	  echo "<h3 class='card-title'>Segera Selesaikan Pembayaran</h3>
	  <p class='card-text'>Sisa waktu pembayaran Anda</p>";
  }
  ?>
	
	<div class="panel panel-default">
<!-- Countdown Hot deal -->

<script>
												var countDownDate = new Date("<?=$tempo_bayar;?>".replace(/-/g,'/')).getTime();

												var x = setInterval(function() {
													

													var now = new Date().getTime();
													
													var distance = countDownDate - now;
													
													var days = Math.floor(distance / (1000 * 60 * 60 * 24));
													var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
													var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
													var seconds = Math.floor((distance % (1000 * 60)) / 1000);
												
													document.getElementById("hari").innerHTML = days;
													document.getElementById("jam").innerHTML = hours;
													document.getElementById("menit").innerHTML = minutes;
													document.getElementById("detik").innerHTML = seconds;
													
													if (distance < 0) {
														clearInterval(x);
														window.location.href ='proses/expired-pembayaran.php?z=<?=$id_transaksi;?>';
														document.getElementById("hari").innerHTML ="";
													document.getElementById("jam").innerHTML = "";
													document.getElementById("menit").innerHTML = "";
													document.getElementById("detik").innerHTML = "";
													}
												}, 1000);
												</script>





											<!-- End Countdown-->
	<div class="panel-body">	
	<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3 id="hari"></h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3 id="jam"></h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3 id="menit"></h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3 id="detik"></h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							
							<!--<a class="primary-btn cta-btn" href="#">Shop now</a>-->
						</div>
  </div>
  <div class="alert alert-warning" role="alert">
  (Sebelum <?="$tanggal $bulan $tahun"." Pukul : $jam:$menit WIB";?>)
</div>


<?php
  if($jenis_pembayaran1=='COD'){
	  echo "<div class='card-footer text-muted'>
	  </div><br>
		  <div class='panel panel-default'>
	
		<div class='panel-body'>	
	
	  </div><br>
	  <div class='card-footer text-muted '>
	  </div><br>
	  
	  <h3></h3>
  ";
  }else{
	  echo "<div class='card-footer text-muted'>
	  Transfer pembayaran ke rekening :
	  </div><br>
		  <div class='panel panel-default'>
	
		<div class='panel-body'>	
	
	  <img src='img/bank/$foto' alt='' width='90'> <strong>$no_rekening a/n $nm_rekening</strong
	  </div><br>
	  <div class='card-footer text-muted '>
	  Jumlah yang harus di bayarkan :
	  </div><br>
	  
	  <h3>Rp. ".number_format($harga_total,2,',','.')."</h3>";
  }
  ?>
  
		</div>
	</div>
				</div>
				</div>
	</div>	</div>

				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

<?php
	include "footer.php";
	
}else{
	echo"<script>
		window.alert('Anda Tidak Diperbolehkan Masuk');
		window.location.href='$domain';</script>";
}
}
}
?>