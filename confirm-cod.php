<?php
//search data di database
$q_p_b = mysqli_query($koneksi,"select *from transaksi where id_transaksi = '$id_transaksi' and status_transaksi='MENUNGGU PEMBAYARAN'");
$f_q_r = mysqli_num_rows($q_p_b);
if($f_q_r>0){
    $f_q_r = mysqli_fetch_array($q_p_b);
    $tempo_bayar = $f_q_r['tempo_bayar'];
    $harga_total = $f_q_r['harga_total'];
    $jenis_pembayaran1 = $f_q_r['jenis_pembayaran'];
    //fungsi hari
    function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }//end fungsi hari
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
	<h3 class="card-title">Kami Akan Segera Menghubungi Anda</h3>
	<h5 class="card-title">Mohon menunggu selama jeda di bawah ini selagi kami meproses orderan anda dan segera menghubungi anda. Terima kasih.</h5>

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
														document.getElementById("hari").innerHTML = "EXPIRED";
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
  (Sebelum <?=tgl_indo("$tempo_bayar")." Pukul : 00:00 WIB";?>)
</div>

  <!--<div class="card-footer text-muted">
  Transfer pembayaran ke rekening :
  </div><br>
  	<div class="panel panel-default">

	<div class="panel-body">	

  <img src="img/bank/<?=$foto;?>" alt="" width="90"> <strong><?=$no_rekening;?> a/n <?=$nm_rekening;?></strong
  </div><br>
  <div class="card-footer text-muted ">
  Jumlah yang harus di bayarkan :
  </div><br>
  
  <h3>Rp <?=number_format($harga_total,2,',','.');?></h3>-->
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
		window.alert('Anda Tidak Diperbolehkan Masuk');</script>";
}

	?>