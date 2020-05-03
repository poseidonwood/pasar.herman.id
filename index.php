<?php
include "setting/sql.php";
include "headside.php";
?>
<?php

//count down promo carausel berdasarkan jenis promo = mingguan
$q_promo_mingguan = mysqli_query($koneksi,"select *from tbl_promo where jenis_promo = 'mingguan' and active_mingguan='Y'");
$f_promo_mingguan_rows = mysqli_num_rows($q_promo_mingguan);
if($f_promo_mingguan_rows>0){
	$f_promo_mingguan = mysqli_fetch_array($q_promo_mingguan);
	$tanggal_mulai = $f_promo_mingguan['mulai_tanggal'];

//end 	


?>

											<!-- Countdown Hot deal -->

											<script>
												var countDownDate = new Date("<?=$tanggal_mulai;?>".replace(/-/g,'/')).getTime();

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
														window.location.href ='proses/expired-banner.php?z=<?="mingguan";?>';
														document.getElementById("hari").innerHTML = "EXPIRED";
													}
												}, 1000);
												</script>





											<!-- End Countdown-->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
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
							<h2 class="text-uppercase">Promo Spesial Minggu Ini</h2>
							<p>Berbagai promo menarik diskon mulai 50%</p>
							<!--<a class="primary-btn cta-btn" href="#">Shop now</a>-->
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<?php
}else{

}
?>
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
										<?php
										$q_category2 = mysqli_query($koneksi,"select *from category_product");
										while($f_category2 = mysqli_fetch_array($q_category2)){
											$nm_category2 = $f_category2['nm_category'];
											$foto_category2= $f_category2['foto'];
											$link = $f_category2['link'];
										echo"
											<div class='col-md-4 col-xs-6'>
												<div class='shop'>
													<div class='shop-img'>
														<img src='./img/$foto_category2' alt=''>
													</div>
													<div class='shop-body'>
														<h3>$nm_category2</h3>
														<a href='$link' class='cta-btn'>Belanja sekarang <i class='fa fa-arrow-circle-right'></i></a>
													</div>
												</div>
											</div>
											";
										}	
										?>
					

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<?php
					//cek ada promo atau tidak
					$q_check = mysqli_query($koneksi,"select *from tbl_promo where active ='Y'");
					$f_check = mysqli_num_rows($q_check);
					if($f_check>0){
						echo "
						<!-- section title -->
					<div class='col-md-12'>
						<div class='section-title'>
							<h3 class='title'>Spesial Promo Hari Ini</h3>
							<p>Promo menarik dari Kami untuk kamu</p>
							<div class='section-nav'>
								<ul class='section-tab-nav tab-nav'>
									<!--<li><a href='#tab5' style='color: rgb(5, 238, 44);'>Lihat semua >></a></li>-->
									
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->
						";
					}else{
						
					}

					
					?>
					

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab5" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php
										//sql promo
										$q_promo = mysqli_query($koneksi,"select *from tbl_promo where active ='Y' order by mulai_tanggal desc");
									  	//end sql promo

										while($f_promo = mysqli_fetch_array($q_promo)){

											$promo_id_promo = $f_promo['id_promo'];
											$promo_id_promo1 = $f_promo['id_promo'];	
											$promo_id_barang = $f_promo['id_barang'];	
											$promo_nm_barang = $f_promo['nm_barang'];	
											$promo_qty = $f_promo['qty'];
											$promo_jenis = $f_promo['jenis_promo'];
											$promo_nilai = $f_promo['nilai_promo'];
											$rp_promo_nilai = number_format($promo_nilai,2,',','.');
											$promo_awal = $f_promo['harga_awal'];
											$promo_akhir = $f_promo['harga_akhir'];
											$rp_promo_awal = number_format($promo_awal,2,',','.');
											$rp_promo_akhir = number_format($promo_akhir,2,',','.');
											$promo_mulai = $f_promo['mulai_tanggal'];
											$promo_berakhir = $f_promo['sampai_tanggal'];

											//select product
											$q_pr = mysqli_query($koneksi,"select*from tbl_product where id_barang = '$promo_id_barang'");
											$f_pr = mysqli_fetch_array($q_pr);
											$promo_id_category = $f_pr['id_category'];
											$promo_id_satuan = $f_pr['id_satuan'];
											$promo_foto = $f_pr['foto'];
											$promo_rating = $f_pr['rating_akhir'];

											//end product search
											//ambil data category 
											$q_cp = mysqli_query($koneksi,"select*from category_product where id_category = '$promo_id_category'");
											$f_cp = mysqli_fetch_array($q_cp);
											$promo_nm_category = $f_cp['nm_category'];
											//end ambil nm category
											//ambil data satuan
											$q_st = mysqli_query($koneksi,"select*from tbl_satuan where id_satuan = '$promo_id_satuan'");
											$f_st = mysqli_fetch_array($q_st);
											$promo_nm_satuan = $f_st['nm_satuan'];
											//end ambil nm satuan					
											echo"
											<div class='product'>
											<div class='product-img'>
												<img src='./img/product/$promo_foto' alt=''>
												";
											if($promo_jenis=="diskon"||$promo_jenis=="mingguan"){
												echo"
												<div class='product-label'>
													<span class='sale'>-$promo_nilai%</span>
													<span class='promo'>PROMO</span>
												</div>";
											}elseif($promo_jenis=="potongan"){
												echo"
												<div class='product-label'>
													<span class='sale'>Rp -$rp_promo_nilai</span>
													<span class='promo'>PROMO</span>
												</div>";
											}
												
												
											echo
											"</div>
											<div class='product-body'>
											";
											?>
												<script>
												var countDownDate<?=$promo_id_promo;?> = new Date("<?=$promo_berakhir;?>".replace(/-/g,'/')).getTime();

												var x = setInterval(function() {

													var now<?=$promo_id_promo;?> = new Date().getTime();
													
													var distance = countDownDate<?=$promo_id_promo;?> - now<?=$promo_id_promo;?>;
													
													var days = Math.floor(distance / (1000 * 60 * 60 * 24));
													var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
													var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
													var seconds = Math.floor((distance % (1000 * 60)) / 1000);
													if (days==0&&hours>0){
													document.getElementById("demo<?=$promo_id_promo;?>").innerHTML = "Berakhir dalam : "+hours + " Jam ";
													}else if(hours==0 && days==0 ){
													document.getElementById("demo<?=$promo_id_promo;?>").innerHTML = "Berakhir dalam : "+minutes + "m "  + seconds + "s " ;
													}else if(days>0){
													document.getElementById("demo<?=$promo_id_promo;?>").innerHTML = "Berakhir dalam : "+ days + " Hari ";
													}else {
														document.getElementById("demo<?=$promo_id_promo;?>").innerHTML = "Berakhir dalam :"+ minutes + "m " + seconds + "s ";

													}
													
													if (distance < 0) {
														clearInterval(x);
														window.location.href ='proses/expired.php?z=<?=$promo_id_promo;?>';
														document.getElementById("demo<?=$promo_id_promo;?>").innerHTML = "EXPIRED";
													}
												}, 1000);
												</script>
												<?php
													$terjual = 0;
													$sisa = $promo_qty - $terjual;
													$qtypersen = $sisa/$promo_qty*100;
													?>
												<p class='product-price' id='demo<?=$promo_id_promo;?>'></p>
												<p>Sisa <?=$sisa;?> Barang Lagi</p>
												<div class="progress">
													
													<div class="progress-bar" role="progressbar" style="width: <?=$qtypersen;?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											<?php
											echo"
												<p class='product-category'>$promo_nm_category</p>
												<h3 class='product-name'><a href='#'>$promo_nm_barang</a></h3> 
												<h4 class='product-price'>Rp.$rp_promo_akhir<del class='product-old-price'>Rp.$rp_promo_awal</del> </h4>/ $promo_nm_satuan";
											if($promo_rating =='5'){
												echo"<div class='product-rating'>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
												</div>";
											}elseif($promo_rating =='4'){
												echo"<div class='product-rating'>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star-o'></i>
												</div>";
											}elseif($promo_rating =='3'){
												echo"<div class='product-rating'>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
												</div>";
											}elseif($promo_rating =='2'){
												echo"<div class='product-rating'>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
												</div>";
											}else{
												echo"<div class='product-rating'>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
												</div>";
											}
											echo"
												<div class='product-btns'>
													<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
													<!--<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
													<button onclick=\"window.location.href ='product.php?x=$promo_id_barang'\" class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></a>-->
												</div>
											</div>
											<div class='add-to-cart'>
												<button  onclick=\"window.location.href ='proses/cart.php?y=$promo_id_barang&z=$promo_id_promo&v=$promo_akhir'\" class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> ADD TO CART</button>
											</div>
										</div>
											";
											
										}
										?>
										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
	<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Buah - Buahan</h3>
							<p>Kumpulan dari Buah - Buahan Segar</p>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li><a href="#tab1" style="color: rgb(5, 238, 44);">Lihat semua >></a></li>
									
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-6">
										<?php
										//sql product
										$q_product = mysqli_query($koneksi,"select *from tbl_product where id_category ='2' and active ='Y' order by last_upt desc");
										//end sql product

										while($f_product = mysqli_fetch_array($q_product)){
											$nm_barang = $f_product['nm_barang'];
											$id_category = $f_product['id_category'];
											//ambil data category 
											$q_p = mysqli_query($koneksi,"select*from category_product where id_category = '$id_category'");
											$f_p = mysqli_fetch_array($q_p);
											$nm_category = $f_p['nm_category'];
											//end ambil nm category
											//ambil data satuan
											$id_satuan = $f_product['id_satuan'];
											$q_s = mysqli_query($koneksi,"select*from tbl_satuan where id_satuan = '$id_satuan'");
											$f_s = mysqli_fetch_array($q_s);
											$nm_satuan = $f_s['nm_satuan'];
											//end ambil nm satuan					
											$harga_jual = $f_product['harga_jual'];
											$rp = number_format($harga_jual,2,',','.');
											$id_barang = $f_product['id_barang'];
											$foto = $f_product['foto'];
											$rating = $f_product['rating_akhir'];
											echo"
										<div class='product'>
											<div class='product-img'>
												<img src='./img/product/$foto' alt=''>
												<div class='product-label'>
													<!--<span class='sale'>-30%</span>-->
													<span class='new'>NEW</span>
												</div>
											</div>
											<div class='product-body'>
												<p class='product-category'>$nm_category</p>
												<h3 class='product-name'><a href='#'>$nm_barang</a></h3> 
												<h4 class='product-price'>Rp. $rp</h4>/ $nm_satuan";
											if($rating =='5'){
												echo"<div class='product-rating'>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
												</div>";
											}elseif($rating =='4'){
												echo"<div class='product-rating'>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star-o'></i>
												</div>";
											}elseif($rating =='3'){
												echo"<div class='product-rating'>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
												</div>";
											}elseif($rating =='2'){
												echo"<div class='product-rating'>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
												</div>";
											}else{
												echo"<div class='product-rating'>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
												</div>";
											}
											echo"
												<div class='product-btns'>
													<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
													<!--<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>-->
													<button onclick=\"window.location.href ='product.php?x=$id_barang'\" class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></a>
												</div>
											</div>
											<div class='add-to-cart'>
											<button  onclick=\"window.location.href ='proses/cart.php?x=$id_barang&h=$harga_jual'\" class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> ADD TO CART</button>
											</div>
										</div>
											";
										}
										?>
										
									</div>
									<div id="slick-nav-6" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<!-- SECTION -->
	<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sayur - Sayuran</h3>
							<p>Beberapa Sayuran Segar</p>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li><a href="#tab2" style="color: rgb(5, 238, 44);">Lihat semua >></a></li>
									
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-7">
										<?php
										//sql product
										$q_product = mysqli_query($koneksi,"select *from tbl_product where id_category ='1' and active ='Y' order by last_upt desc");
										//end sql product

										while($f_product = mysqli_fetch_array($q_product)){
											$nm_barang = $f_product['nm_barang'];
											$id_category = $f_product['id_category'];
											//ambil data category 
											$q_p = mysqli_query($koneksi,"select*from category_product where id_category = '$id_category'");
											$f_p = mysqli_fetch_array($q_p);
											$nm_category = $f_p['nm_category'];
											//end ambil nm category
											//ambil data satuan
											$id_satuan = $f_product['id_satuan'];
											$q_s = mysqli_query($koneksi,"select*from tbl_satuan where id_satuan = '$id_satuan'");
											$f_s = mysqli_fetch_array($q_s);
											$nm_satuan = $f_s['nm_satuan'];
											//end ambil nm satuan					
											$harga_jual = $f_product['harga_jual'];
											$rp = number_format($harga_jual,2,',','.');
											$id_barang = $f_product['id_barang'];
											$foto = $f_product['foto'];
											$rating = $f_product['rating_akhir'];
											echo"
										<div class='product'>
											<div class='product-img'>
												<img src='./img/product/$foto' alt=''>
												<div class='product-label'>
													<!--<span class='sale'>-30%</span>-->
													<span class='new'>NEW</span>
												</div>
											</div>
											<div class='product-body'>
												<p class='product-category'>$nm_category</p>
												<h3 class='product-name'><a href='#'>$nm_barang</a></h3> 
												<h4 class='product-price'>Rp. $rp</h4>/ $nm_satuan";
											if($rating =='5'){
												echo"<div class='product-rating'>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
												</div>";
											}elseif($rating =='4'){
												echo"<div class='product-rating'>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star-o'></i>
												</div>";
											}elseif($rating =='3'){
												echo"<div class='product-rating'>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
												</div>";
											}elseif($rating =='2'){
												echo"<div class='product-rating'>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
												</div>";
											}else{
												echo"<div class='product-rating'>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
													<i class='fa fa-star-o'></i>
												</div>";
											}
											echo"
												<div class='product-btns'>
													<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
													<!--<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>-->
													<button onclick=\"window.location.href ='product.php?x=$id_barang'\" class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></a>
												</div>
											</div>
											<div class='add-to-cart'>
											<button  onclick=\"window.location.href ='proses/cart.php?x=$id_barang&h=$harga_jual'\" class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> ADD TO CART</button>
											</div>
										</div>
											";
										}
										?>
										
									</div>
									<div id="slick-nav-7" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
		<!-- 496 hapus section to section top sell -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Cari Status <strong>Orderan Anda</strong></p>
							<form action ="search.php" method="get">
								<input class="input" type="text" name="x" placeholder="Masukkan Id Order Anda">
								<button class="newsletter-btn"><i class="fa fa-search"></i> Search Order</button>
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
<?php
include "footer.php";

?>
