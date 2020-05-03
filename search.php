<?php
include "setting/sql.php";
include "headside.php";
if(isset($_GET['x'])){
	if($_GET['x']==''){
		echo"<script>
		window.alert('Anda Tidak Diperbolehkan Masuk');
		window.location.href='$domain';</script>";
	}else{
	$id_transaksi = $_GET['x'];
	
	
		
	//search data di database
	$q_p_b = mysqli_query($koneksi,"select *from transaksi where id_transaksi = '$id_transaksi'");
	$f_q_r = mysqli_num_rows($q_p_b);
	if($f_q_r>0){
        $f_q_r = mysqli_fetch_array($q_p_b);
        $tanggal = $f_q_r['tanggal'];
        $nm_pembeli = $f_q_r['nm_pembeli'];
        $status_transaksi = $f_q_r['status_transaksi'];
		$tempo_bayar = $f_q_r['tempo_bayar'];
		$harga_total = $f_q_r['harga_total'];
		$jenis_pembayaran1 = $f_q_r['jenis_pembayaran'];
		$tanggal = $tempo_bayar;


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
    <!-- Start Content-->
    <div class="card">
            <div class="card-header">
              <h3 class="card-title">Transaksi Orderan <?=$id_transaksi;?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center">Tanggal Order</th>
                  <th style="text-align:center">Nama Pembeli</th>
                  <th style="text-align:center">Status Transaksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td><?=$tanggal;?></td>
                  <td><?=$nm_pembeli;?></td>
                  <td><?=$status_transaksi;?></td>
                </tr>
                </tbody>
              </table>
              <button type='button' onclick="window.location.href ='https://wa.me/<?=$number_profile;?>?text=Halo saya <?=$nm_pembeli;?> , Saya mau tanya untuk orderan <?=$id_transaksi;?>'" class='btn btn-success'><i class='fa fa-whatsapp'></i> &nbsp;Ada Kesulitan ? Hubungi Kami.</button>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->   





    <!-- End Content-->
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