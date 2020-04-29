<?php
include "setting/sql.php";
if(isset($_GET['x'])){
	if($_GET['x']==''){
		echo"<script>
		window.alert('Anda Tidak Diperbolehkan Masuk');
		window.location.href='$domain';</script>";
	}else{
		session_start();
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
	<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="og:image" content="./img/product/<?=$foto;?>"/>  
		<meta property="og:title" content="<?=$title_profile;?> | <?=$nm_barang;?>"/>  
		<meta property="og:description" content="<?=$nm_barang;?> dengan harga murah hanya di <?=$domain;?>"/> 
		
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title><?=$title_profile."|$nm_barang";?></title>


		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
    </head>
<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="tel:<?=$number_profile;?>"><i class="fa fa-phone"></i><?=$number_profile;?></a></li>
						<li><a href="mailto:<?=$email_profile;?>"><i class="fa fa-envelope-o"></i> <?=$email_profile;?></a></li>
						<!--<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>-->
					</ul>
					<ul class="header-links pull-right">
					<?php
					if(empty($_SESSION['role'])){
						echo"<li><a href='$domain\system/auth/registrasi'><i class='fa fa-user-o'></i> Register</a></li>
						<li><a href='$domain\system/auth'><i class='fa fa-sign-in'></i> Login</a></li>";
						
					}else{
						$session=$_SESSION['name'];
						echo"<li><a href='#'><i class='fa fa-user-o'></i> Selamat datang, $session </a></li>
						<li><a href='$domain\system/pages/logout/'><i class='fa fa-sign-in'></i> Logout</a></li>
						<li><a href='#'><i class='fa fa-cog'></i>Pengaturan</a></li>
						<!--<li><a href='#'><i class='fa fa-heart-o'></i>Your Wishlist (0)</a></li>-->";
					}
					?>

						<!-- 
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div>
								 -->

					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="<?=$domain;?>" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<center><div class="col-md-6">
							<div class="header-search">
								<form>
									
									<input class="input-select" placeholder="Mau belanja apa?">
									<button class="search-btn"><i class="fa fa-search"></i></button>
								</form>
							</div>
						</div></center>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								
								
								<!-- Order -->
								<div>
									<a href="#" data-toggle="modal" data-target="#modalorder">
										<i class="fa fa-shopping-bag"></i>
										<span>My Order</span>
										<?php
										if($f_not_order>0){
											echo"<div class='qty'>New</div>";
										}else{

										}
										?>
									</a>
								</div>
								<!-- /Order -->
								<!-- coba -->
								<div>
									<a href="#" data-toggle="modal" data-target="#modalsaya">
										<i class="fa fa-shopping-cart"></i>
										<span>My Cart</span>
										<?php
										if($total_cart>0){
											echo"
											<div class='qty'>$total_cart</div>
											";
										}
										?>
										
									</a>
								</div>
								<!-- akhir coba-->
								<!-- Cart matikan dulu karena di hp tidak bisa di click-->
								<!--<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty"><?=$total_cart;?></div>
									</a>
									
								</div>-->
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
									
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="<?=$domain;?>">Home</a></li>
						<li><a href="#">Spesial Promo</a></li>
						<li><a href="#">Terlaris</a></li>

						<?php
										$q_category1 = mysqli_query($koneksi,"select *from category_product");
										while($f_category1 = mysqli_fetch_array($q_category1)){
											$nm_category1 = $f_category1['nm_category'];
											$id_category1 = $f_category1['id_category'];
										echo"
											<li><a href='#'>$nm_category1</a></li>
											";
										}	
										?>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->





		<!-- Contoh Modal -->

		<div class="modal fade" id="modalsaya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">
          Your Shopping Cart
		</h5>
		<small><?=$total_cart;?> Item(s) selected</small>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <?php
			if($total_cart==0){
				echo "<center><h5>Kelihatannya keranjang masih kosong.. Silahkan belanja!!</h5></center>";
			}else{
		  ?>
        <table class="table table-image">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Product</th>
              <th scope="col">Qty</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
		  <?php
		 									$total_cart_harga = 0;
											while($f_cart=mysqli_fetch_array($q_cart)){
												$cart_id_cart = $f_cart['id_cart'];
												$cart_id_barang = $f_cart['id_barang'];
												$cart_qty=$f_cart['qty'];
												$cart_harga = $f_cart['harga_total'];
												$cart_harga_product = $f_cart['harga'];
												$cart_nm_barang = $f_cart['nm_barang'];
												//$rp_cart_harga = number_format($cart_harga,0,',','.');
												$rp_cart_harga = $cart_harga;
												//select product
												$q_cart_product = mysqli_query($koneksi,"select *from tbl_product where id_barang = '$cart_id_barang'");
												$f_cart_product = mysqli_fetch_array($q_cart_product);
												$cart_foto = $f_cart_product['foto'];
												
												$cart_satuan = $f_cart_product['id_satuan'];
												//select nm satuan 
												$q_cart_satuan = mysqli_query($koneksi,"select *from tbl_satuan where id_satuan = '$cart_satuan'");
												$f_cart_satuan = mysqli_fetch_array($q_cart_satuan);
												$cart_nm_satuan = $f_cart_satuan['nm_satuan'];

												//end product												
											
											?>
            <tr>
              <td class="w-25">
                <img src="img/product/<?=$cart_foto;?>" class="img-thumbnail" alt="Sheep" height="100" width="100">
			  </td>
              <td><?=$cart_nm_barang;?> / (<?=$cart_nm_satuan;?>)</td>
              <td class="qty">
			  <div class="input-number">
										<input type="number" id="qty<?=$cart_id_cart;?>" value="<?=$cart_qty;?>" name="qty" onchange="myFunction<?=$cart_id_cart;?>()" >
										<input type="hidden" id="harga<?=$cart_id_cart;?>" value="<?=$cart_harga_product;?>" name="harga" readonly>
										<input type="hidden" id="id_cart<?=$cart_id_cart;?>" value="<?=$cart_id_cart;?>" name="harga" readonly>
		
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
										
									</div>
									</td>
              <td ><h5 id ="hasil<?=$cart_id_cart;?>"> <?="Rp. ".$rp_cart_harga;?> </h5></td>
              <td>
                <button onclick="hapuscart<?=$cart_id_cart;?>()" class="btn btn-danger btn-sm">
                  <i class="fa fa-times"></i>
                </button>
              </td>
			</tr>
			<script>
			function myFunction<?=$cart_id_cart;?>() {
			var x = document.getElementById("qty<?=$cart_id_cart;?>").value;
			var y = document.getElementById("harga<?=$cart_id_cart;?>").value;
			var z<?=$cart_id_cart;?> = x * y;
			document.getElementById("hasil<?=$cart_id_cart;?>").innerHTML ="Rp. " 	+ z<?=$cart_id_cart;?>;

			var qty<?=$cart_id_cart;?>=$("#qty<?=$cart_id_cart;?>").val();
			var id_cart<?=$cart_id_cart;?> = $("#id_cart<?=$cart_id_cart;?>").val();
			$.ajax({
					url : 'proses/update-qty-cart.php',
					data : 'id_cart='+id_cart<?=$cart_id_cart;?>+'&qty='+qty<?=$cart_id_cart;?>,
			}).done(function(data){
				var json = data,
				obj = JSON.parse(json);
				$("#qty<?=$cart_id_cart;?>").val(obj.qty);
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
						title: 'Data Berhasil Di Ubah.'
						})
 

			});	

			}
			

			</script>
			<!--hapus cart dengan sweat alert -->
			<script>
			function hapuscart<?=$cart_id_cart;?>(){
				Swal.fire({
			title: 'Hapus <?=$cart_nm_barang;?> dari Keranjang ini?',
			text: "",
			icon: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yakin ?!'
			}).then((result) => {
			if (result.value) {
				window.location.href='proses/delete-cart.php?x=<?=$cart_id_cart;?>';
			}
			})



			}


			</script>
			<!--end hapus cart-->
			<?php
			$total_cart_harga += $f_cart['total'];
			}?>
		  </tbody>
		  <thead>
          <!--  <tr>
			  <th></th>
              <th colspan="2"><h5>Total:</h5></th>
			  <th><h5><span class="price text-success" id="subtotal">Rp. <?=number_format($total_cart_harga,0,',','.');?></span></h5></th>
			  <th></th>
            </tr>-->
          </thead>

		</table> 
		<?php
			}
			?>        
      </div>
      <div class="modal-footer border-top-0 d-flex justify-content-between">
		  <button type="button" class="btn btn-warning" data-dismiss="modal">Lanjut Belanja</button>
		  <?php
			if($total_cart==0){

			}else{
		  ?>
		<a href="checkout.php"  class="btn btn-danger">&nbsp;Checkout<i class="fa fa-arrow-circle-right"></i></a>
		<?php
		}?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Order -->
<div class="modal fade" id="modalorder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <h3> <span aria-hidden="true">&times;</span></h3>
        </button>

		<center><h3 class="modal-title" id="exampleModalLabel">My Order <i class="fa fa-shopping-bag"></i></h3></center>
	<!--	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
      </div>
      <div class="modal-body">
		  <?php
		  if($transaksi_status_transaksi=="FINISH"){
			echo "Nampak nya anda belum belanja... Silahkan Belanja!";
			
		  }elseif($transaksi_status_transaksi==''){
			echo "Nampak nya anda belum belanja... Silahkan Belanja!";
			
		  }else{
			  ?>
	<div class="input-checkbox">
	
<label for="order_id">
<h5>Order Id : &nbsp;<span class="badge progress-bar-primary"><?=$order_id_transaksi;?></span>	</h5>
<p style="font-size:80%;">(Klik untuk lihat selengkapnya)</p>
	</label>			
	<input type="checkbox" id="order_id">			
									<div class="caption">
									<hr>
	<h5>Total Tagihan</h5>
	<p><?= "Rp ".number_format($transaksi_harga,2,',','.');?></p>
	<hr>
	<h5>Status Pemesanan</h5>
	<?php
		  if($transaksi_status_transaksi=="MENUNGGU PEMBAYARAN"){
			  echo"<p><span class='badge progress-bar-danger'>$transaksi_status_transaksi</span></p>";
		  }else{
			echo"<p><span class='badge progress-bar-success'>$transaksi_status_transaksi</span></p>";
		}
		  ?>
	<hr>
	<center><h5>Alamat Pengiriman</h5></center>
	<p><strong><?=$transaksi_nm_pembeli;?></strong></p>
	<p><?=$transaksi_hp;?></p>
	<p><?=$transaksi_alamat;?></p>
	<hr>
	<div class="input-checkbox">
	<center><label for="ringkasan">
									<span class="badge progress-bar-primary">	<i class="fa fa-sort"></i>&nbsp;Ringkasan Belanja</span>
	</label>	</center>				
	<input type="checkbox" id="ringkasan">			
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
	$q_order1 = mysqli_query($koneksi,"select *from tbl_cart where device_ip = '$device_ip' and id_transaksi ='$order_id_transaksi'");  
	while($f_detail = mysqli_fetch_array($q_order1)){

	  ?>
    <tr>
      <td><?= $f_detail['nm_barang'];?></td>
      <td><?= $f_detail['qty'];?></td>
      <td>Rp <?= $f_detail['harga_total'];?></td>
	</tr>
	<?php
	}?>
	<th colspan="2">Total</th>
	<td>Rp <?= $transaksi_harga;?></td>

  </tbody>
</table>
</div>	
		
									</div>
									
								</div>
								</div>
	
									<?php
		  }
		  ?>	
								
								</div>
	
      <div class="modal-footer">
		  <?php
		  if($transaksi_status_transaksi=="MENUNGGU PEMBAYARAN"){
			  echo"<button type='button' class='btn btn-success'><i class='fa fa-whatsapp'></i> KONFIRMASI</button><button type='button' onclick=\"window.location.href ='confirm.php?x=$order_id_transaksi&jenis=$transaksi_jenis'\" class='btn btn-danger'>TRANSFER</button>";
		  }elseif($transaksi_status_transaksi=="FINISH"){
			echo"<button type='button' class='btn btn-primary' data-dismiss='modal' aria-label='Close'>Close</button>";
		}else{
			  echo"<button type='button' onclick=\"window.location.href ='https://wa.me/$number_profile'\" class='btn btn-success'><i class='fa fa-whatsapp'></i> &nbsp;Ada Kesulitan ? Hubungi Kami.</button>";
		  }
		  ?>
      </div>
    </div>
  </div>
</div>


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
								<button onclick="myalert()" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
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
								<!--<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>-->
								<li><a href="whatsapp://send?text=Wahh ada <?=$nm_barang;?> Murah di <?=$domain."product.php?x=$id_barang";?>. Buruan cek segera!!" data-action="share/whatsapp/share""><i class="fa fa-whatsapp"></i></a></li>
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
								<li><a data-toggle="tab" href="#" onclick="myalert()">Reviews (3)</a></li>
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
