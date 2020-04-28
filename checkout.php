<?php
include "setting/sql.php";
include "headside.php";
if($f_check_rows>0){
//check apakah transaksi is null ?

?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="<?=$domain;?>">Home</a></li>
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Alamat Kirim</h3>
							</div>
							<form action="proses/checkout.php" method="post" id="transaksi_form">
							<div class="form-group">
								<input class="input" type="text" name="name" placeholder="Nama Lengkap Pembeli" required>
							</div>
							<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Masukkan Email" required>
							</div>
							<div class="form-group">
								<input class="input" type="number" name="hp" placeholder="Nomor Handphone" required>
							</div>
							<div class="form-group">
								<textarea class="input" name="alamat" placeholder="Alamat Lengkap Pembeli" required></textarea>
							</div>							
							<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="create-account">
									<label for="create-account">
										<span></span>
										Mau Buat Akun Sekalian? Biar dapat promo menarik.
									</label>
									<div class="caption">
										<p>Hanya masukkan password yang mau di daftarkan!</p>
										<div class="form-group">
										<input class="input" type="password" name="password" placeholder="Password Anda">
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Billing Details -->

						<!-- Shiping Details -->
						<!--<div class="shiping-details">
							<div class="section-title">
								<h3 class="title">Shiping address</h3>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="shiping-address">
								<label for="shiping-address">
									<span></span>
									Ship to a diffrent address?
								</label>
								<div class="caption">
									<div class="form-group">
										<input class="input" type="text" name="first-name" placeholder="First Name">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="last-name" placeholder="Last Name">
									</div>
									<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="address" placeholder="Address">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="city" placeholder="City">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="country" placeholder="Country">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
									</div>
									<div class="form-group">
										<input class="input" type="tel" name="tel" placeholder="Telephone">
									</div>
								</div>
							</div>
						</div>-->
						<!-- /Shiping Details -->

						<!-- Order notes 
						<div class="order-notes">
							<textarea class="input" placeholder="Order Notes"></textarea>
						</div>
						Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Orderan Anda</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>SUB TOTAL</strong></div>
							</div>
							<div class="order-products">
								<?php
								//ambil data cart
								$qi_cart = mysqli_query($koneksi,"select id_cart,id_transaksi,id_barang,nm_barang,qty,id_satuan,harga,harga_total,status,SUM(harga_total)  as total from tbl_cart where device_ip='$device_ip' and id_transaksi is null and status='' GROUP BY 	
								id_cart,id_transaksi,id_barang,nm_barang,qty,id_satuan,harga,harga_total,status DESC");
								$total_belanja=0;
								while($fi_cart = mysqli_fetch_array($qi_cart)){
								$qty=$fi_cart['qty'];
								$nm_barang = $fi_cart['nm_barang'];
								$harga = $fi_cart['harga_total'];
								?>
								<div class="order-col">
									<div><?=$qty;?>x <?=$nm_barang;?></div>
									<div>Rp. <?=$harga;?></div>
								</div>
								<?php 
								$total_belanja +=$fi_cart['harga_total'];
								}?>
							</div>
							<div class="order-col">
								<div>Ongkos Kirim</div>
								<div><strong>FREE</strong></div>
							</div>
							
								<div class="input-checkbox">
									<input type="checkbox" id="create">
									<label for="create">
										<span></span>
										Punya Voucher?
									</label>
									<div class="caption">
										<h5 id="notif_voucher" ></h5>
										<div class="input-group">
										<div class="input-group-addon">
										<i class= "fa fa-tags"></i>
										</div>
										<input type="text" class="form-control" onkeyup="myFunction()" placeholder="Masukkan Kode Voucher" id="nm_voucher" name="nm_voucher">
										</div><br>
										<!-- ajax mengambil kode promo-->
									<script>
									function myFunction(){
									var voucher=$("#nm_voucher").val();
										$.ajax({
												url : 'proses/check-promo.php',
												data : 'voucher='+voucher,
										}).done(function(data){
											var json = data,
											obj = JSON.parse(json);
											$("#notif_voucher").html(obj.ket);
										});	
									}
									</script>	
									</div>
								</div>
							
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">Rp. <?=$total_belanja;?></strong></div>
							</div>
							
						</div>
						<div class="payment-method">
						<p><strong>PILIH CARA PEMBAYARAN</strong></p>
						<div class="panel panel-default">

						<div class="panel-body">

							<div class="form-check">
								<label class="radio-button">
									<input class="form-check-input" value="COD" type="radio" checked="checked"
										name="jenis_pembayaran" required>&nbsp;COD (Bayar Ditempat)
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="form-check">
								<label class="radio-button">
									<input class="form-check-input" value="BCA" type="radio" checked="checked"
										name="jenis_pembayaran" required>&nbsp;Transfer Bank BCA
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="form-check">
								<label class="radio-button">
									<input class="form-check-input" value="MANDIRI" type="radio" checked="checked"
										name="jenis_pembayaran" required>&nbsp;Transfer Bank MANDIRI
									<span class="checkmark"></span>
								</label>
							</div>

						</div>
						</div>

						</div>
						
						<button type="submit" class="primary-btn order-submit col-md-12">Lanjutkan Pembayaran</button>
					</div>
					<!-- /Order Details -->
				</form>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		
		
<?php
include "footer.php";
}else{
	echo"<script>
	window.alert('Tampaknya anda belum belanja?.. Yuk belanja dulu!');
	window.location.href='$domain';</script>";
}
?>