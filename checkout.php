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
							<form action="setting/ihi.php" method="post" id="transaksi_form">
							<div class="form-group">
								<input class="input" type="text" name="first-name" placeholder="Nama Lengkap Pembeli" required>
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Nomor Handphone" required>
							</div>
							<div class="form-group">
								<textarea class="input" name="address" placeholder="Alamat Lengkap Pembeli" required></textarea>
							</div>							
							<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="create-account">
									<label for="create-account">
										<span></span>
										Mau Buat Akun Sekalian? Biar dapat promo menarik.
									</label>
									<div class="caption">
										<p>Hanya masukkan password dan email yang mau di daftarkan!</p>
										<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Masukkan Email">
										</div>
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
								$qi_cart = mysqli_query($koneksi,"select id_cart,id_transaksi,id_barang,nm_barang,qty,id_satuan,harga,harga_total,SUM(harga_total)  as total from tbl_cart GROUP BY 	
								id_cart,id_transaksi,id_barang,nm_barang,qty,id_satuan,harga,harga_total DESC");
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
										<input type="text" class="form-control" onkeyup="myFunction()" placeholder="Masukkan Kode Voucher" id="nm_voucher" name="coupon" required>
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
							<div class="input-checkbox">
								<input type="checkbox" name="cod" id="payment-1" >
								<label for="payment-1">
									<span></span>
									COD (Bayar Di Tempat)
								</label>
							<!--	<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>-->
							</div>
							<div class="input-checkbox">
								<input type="checkbox" name="transfer" id="payment-2">
								<label for="payment-2">
									<span></span>
									Transfer Bank
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" name="dompet" id="payment-3" >
								<label for="payment-3">
									<span></span>
									Dompet Digital
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
										
	</body>
</html>
<?php
}else{
	echo"<script>
	window.alert('Tampaknya anda belum belanja?.. Yuk belanja dulu!');
	window.location.href='$domain';</script>";
}
?>