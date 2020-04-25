<?php
include "setting/sql.php";
include "headside.php";
if(isset($_GET['x'])){
	if($_GET['x']==''){
		echo"<script>
		window.alert('Anda Tidak Diperbolehkan Masuk');
		window.location.href='$domain';</script>";
	}else{
/*	$id_barang = $_GET['x'];
	//search data di database
	$q_p_b = mysqli_query($koneksi,"select *from tbl_product where id_barang = '$id_barang'");
	$f_q_r = mysqli_num_rows($q_p_b);
	if($f_q_r>0){
		$f_q_r = mysqli_fetch_array($q_p_b);
		$nm_barang = $f_q_r['nm_barang'];
		$detail = $f_q_r['detail'];
		$harga_jual = $f_q_r['harga_jual'];
		$rating = $f_q_r['rating_akhir'];
		$foto = $f_q_r['foto'];

		//select satuan
		$id_satuan = $f_q_r['id_satuan'];
		$q_p_s = mysqli_query($koneksi,"select *from tbl_satuan where id_satuan = '$id_satuan'");
		$f_p_s = mysqli_fetch_array($q_p_s);
		$nm_satuan = $f_p_s['nm_satuan'];
		//end satuan

		//select category
		$id_category = $f_q_r['id_category'];
		$q_p_c = mysqli_query($koneksi,"select *from category_product where id_category = '$id_category'");
		$f_p_c = mysqli_fetch_array($q_p_c);
		$nm_category = $f_p_c['nm_category'];
		//end select category
*/
		
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
				<div class="card text-center">
  <div class="card-body">
	<h3 class="card-title">Segera selesaikan pembayaran Anda sebelum stok habis.</h3>
	<p class="card-text">Sisa waktu pembayaran Anda</p>

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
  <h5>(Sebelum Minggu 26 April 2020 pukul 16:10 WIB)</h5>

  <div class="card-footer text-muted">
  Transfer pembayaran ke nomor Virtual Account :
  </div>
  <div class="card-footer text-muted ">
  <img src="https://ecs7.tokopedia.net/img/toppay/thanks/bca.png" alt="" width="90"> <strong>12345667 a/n Suherman</strong
  </div><br>
  <div class="card-footer text-muted ">
  Jumlah yang harus di bayarkan :
  </div><br>
  
  <h3> Rp 321.123 </h3>
		</div>
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
	
}
}
?>