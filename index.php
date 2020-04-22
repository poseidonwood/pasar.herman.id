<?php
include "setting/sql.php";
include "headside.php";
?>


											<!-- Countdown Hot deal -->

											<script>
												var countDownDate = new Date("2020-04-23 00:00:31".replace(/-/g,'/')).getTime();

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
														//window.location.href ='proses/expired.php';
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
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->
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
										echo"
											<div class='col-md-4 col-xs-6'>
												<div class='shop'>
													<div class='shop-img'>
														<img src='./img/$foto_category2' alt=''>
													</div>
													<div class='shop-body'>
														<h3>$nm_category2</h3>
														<a href='#' class='cta-btn'>Belanja sekarang <i class='fa fa-arrow-circle-right'></i></a>
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
									<!--<li><a href='#tab1' style='color: rgb(5, 238, 44);'>Lihat semua >></a></li>-->
									
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
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php
										//
										//sql promo
										$q_promo = mysqli_query($koneksi,"select *from tbl_promo where active ='Y' order by mulai_tanggal desc");
									  	//end sql promo

										while($f_promo = mysqli_fetch_array($q_promo)){

											$promo_id_promo = $f_promo['id_promo'];
											$promo_id_promo1 = $f_promo['id_promo'];	
											$promo_id_barang = $f_promo['id_barang'];	
											$promo_nm_barang = $f_promo['nm_barang'];	
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
											if($promo_jenis=="diskon"){
												echo"
												<div class='product-label'>
													<span class='sale'>-$promo_nilai%</span>
													<span class='promo'>PROMO</span>
												</div>";
											}else{
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
												<p class='product-price' id='demo<?=$promo_id_promo;?>'></p>
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
													<!--<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>-->
													<button onclick=\"window.location.href ='product.php?x=$promo_id_barang'\" class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></a>
												</div>
											</div>
											<div class='add-to-cart'>
												<button  onclick=\"window.location.href ='proses/cart.php?x=$promo_id_barang'\" class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
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
											<button  onclick=\"window.location.href ='proses/cart.php?x=$id_barang'\" class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
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
							<h3 class="title">Top selling</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab2">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab2">Accessories</a></li>
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
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product06.png" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product07.png" alt="">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product08.png" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product09.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product01.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
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
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-3">
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product07.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product08.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product09.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>

							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product01.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product02.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product03.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product04.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product05.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product06.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>

							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product07.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product08.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product09.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product01.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product02.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product03.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>

							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product04.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product05.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product06.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>
						</div>
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
