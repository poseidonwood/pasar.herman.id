<?php
include "setting/sql.php";
include "headside.php";
if(isset($_GET['x'])){
	if($_GET['x']==''){
		echo"<script>
		window.alert('Anda Tidak Diperbolehkan Masuk');
		window.location.href='$domain';</script>";
	}else{
	$id_barang = $_GET['x'];
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

		
	?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="<?=$domain;?>">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li><a href="#"><?=$nm_category;?></a></li>
							<li class="active"><?=$nm_barang;?></li>
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
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="./img/product/<?=$foto;?>" alt="">
							</div>

							
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="./img/product/<?=$foto;?>" alt="">
							</div>

						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?=$nm_barang;?></h2>
							<div>
								<?php
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
								?>
								
								<a class="review-link" href="#"><?=$rating;?> / 5 Rating</a>
							</div>
							<div>
								<h3 class="product-price">Rp. <?=number_format($harga_jual,0,',','.');?> <!--<del class="product-old-price">$990.00</del>--></h3> / <?=$nm_satuan;?>
								<span class="product-available">In Stock</span>
							</div>
							<!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	-->
							<!--<div class="product-options">
								<label>
									Size
									<select class="input-select">
										<option value="0">X</option>
									</select>
								</label>
								<label>
									Color
									<select class="input-select">
										<option value="0">Red</option>
									</select>
								</label>
							</div>-->

							<div class="add-to-cart">
								<div class="qty-label">
									Qty
									<div class="input-number">
										<input type="number" value="1" name="qty">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>

							<ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
							</ul>

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#"><?=$nm_category;?></a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<!--<li><a data-toggle="tab" href="#tab2">Details</a></li>-->
								<li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?=$detail;?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span>4.5</span>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 60%;"></div>
														</div>
														<span class="sum">2</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
													<li>
														<div class="review-heading">
															<h5 class="name">John</h5>
															<p class="date">27 DEC 2018, 8:0 PM</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
														</div>
													</li>
													<li>
														<div class="review-heading">
															<h5 class="name">John</h5>
															<p class="date">27 DEC 2018, 8:0 PM</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
														</div>
													</li>
													<li>
														<div class="review-heading">
															<h5 class="name">John</h5>
															<p class="date">27 DEC 2018, 8:0 PM</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
														</div>
													</li>
												</ul>
												<ul class="reviews-pagination">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
												</ul>
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form">
													<input class="input" type="text" placeholder="Your Name">
													<input class="input" type="email" placeholder="Your Email">
													<textarea class="input" placeholder="Your Review"></textarea>
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn">Submit</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>

					<!-- product -->
					
					<?php
										//sql product
										$q_product = mysqli_query($koneksi,"select *from tbl_product where id_category ='$id_category' and active ='Y' order by last_upt desc limit 4");
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
									<div class='col-md-3 col-xs-6'>
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
												<button class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
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
		<!-- /Section -->

<?php
include "footer.php";
	}else{
		echo"<script>
		window.alert('Anda Tidak Diperbolehkan Masuk');
		window.location.href='$domain';</script>";
	}
}
}else{

	echo"<script>
	window.alert('Anda Tidak Diperbolehkan Masuk');
	window.location.href='$domain';</script>";
	
}

?>