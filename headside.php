<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title><?=$title_profile;?></title>

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
						<!--<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>-->
						<li><a href="#"><i class="fa fa-user-o"></i> Register</a></li>
						<li><a href="#"><i class="fa fa-sign-in"></i> Login</a></li>

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
								
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->
								<!-- coba -->
								<div>
									<a href="#" data-toggle="modal" data-target="#modalsaya">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
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
                <a href="#" class="btn btn-danger btn-sm">
                  <i class="fa fa-times"></i>
                </a>
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

			});	

			}
			

			</script>
			
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
