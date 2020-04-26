
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
								<p>Kami ada disaat anda membutuhkan. Semua jenis kebutuhan makan anda ada disini "Pasar Herman Id"</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Cikarang</a></li>
									<li><a href="tel:<?=$number_profile;?>"><i class="fa fa-phone"></i><?=$number_profile;?></a></li>
									<li><a href="mailto:<?=$email_profile;?>"><i class="fa fa-envelope-o"></i><?=$email_profile;?></a></li>
								</ul>
							</div>
						</div>

					<!--	<div class="col-md-3 col-xs-6">
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
						</div>-->
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
								Device : <?=$device_ip;?>&nbsp;|Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
				<?php 

				
                  if(isset($_GET['pesan'])){
					
                    if($_GET['pesan'] == "success"){
					$nm_barang12 = $_GET['brg'];
					//cek apakah inject sql atau tidak
					$q_b = mysqli_query($koneksi,"select *from tbl_product where nm_barang = '$nm_barang12'");
					$f_b = mysqli_num_rows($q_b);
					if($f_b>0){
						echo "<script type='text/javascript'>
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
						  })
				  
						  Toast.fire({
						  icon: 'success',
						  title: '$nm_barang12 Berhasil Di Tambahkan Ke Keranjang!!'
						  })
							</script>";
					}else{
						echo "<script type='text/javascript'>
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
						  })
				  
						  Toast.fire({
						  icon: 'error',
						  title: 'Anda mau macam macam dengan web ini ?'
						  })
							</script>";
					}
					
                      
                    }else if($_GET['pesan'] == "delete-success"){
						$nm_barang12 = $_GET['brg'];
						//cek apakah inject sql atau tidak
						$q_b = mysqli_query($koneksi,"select *from tbl_product where nm_barang = '$nm_barang12'");
						$f_b = mysqli_num_rows($q_b);
						if($f_b>0){
							echo "<script type='text/javascript'>
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
							  })
					  
							  Toast.fire({
							  icon: 'warning',
							  title: '$nm_barang12 Berhasil Di Hapus Dari Keranjang!!'
							  })
								</script>";
						}else{
							echo "<script type='text/javascript'>
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
							  })
					  
							  Toast.fire({
							  icon: 'error',
							  title: 'Anda mau macam macam dengan web ini ?'
							  })
								</script>";
						}
					}
                  }
                  ?>


		<script>
		
		</script>
		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
	<?php

//validasi cart jika created > jam sekarang maka update created - 15 menit dan status='canceled'
$q_cart_validasi = mysqli_query($koneksi,"select *from tbl_cart where device_ip = '$device_ip' and status='' and id_transaksi is null");
while($f_cart_array = mysqli_fetch_array($q_cart_validasi)){
	date_default_timezone_set("Asia/Jakarta");
	$created = $f_cart_array['created'];
	$nm_barang_validasi = $f_cart_array['nm_barang'];
    $compare_date = date("Y-m-d H:i:s");
    if($created < $compare_date){
		//-15 menit created 
		$endTime = strtotime("-30 minutes", strtotime($created));
		$created_update = date('Y-m-d H:i:s', $endTime);
		//jatuh tempo 
		$q_u_validasi = mysqli_query($koneksi,"update tbl_cart set status ='CANCELED',created='$created_update' where nm_barang='$nm_barang_validasi' and device_ip='$device_ip' and id_transaksi is null ");
       // echo"<script>window.alert('$created_update Jatuh tempo')</script>";
    }
}


	


	?>
	</body>
</html>