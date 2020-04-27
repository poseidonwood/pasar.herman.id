<?php
 include "../setting/koneksi.php";
?>
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Transaksi Laporan Harian</title>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<link rel='stylesheet' href='css/bootstrap.min.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
    <!-- JQuery -->
<script type='text/javascript'>
$(document).ready(function(){
$('#harga_sementara').val($('#selectdata option:selected').data('harga_sementara'));
$(function(){
    $('#selectdata').change(function(){
        $('#harga_sementara').val($('#selectdata option:selected').data('harga_sementara'));
    });
});
});
</script>
<script type='text/javascript'>
$(document).ready(function(){
$('#id_barang').val($('#selectdata option:selected').data('id_barang'));
$(function(){
    $('#selectdata').change(function(){
        $('#id_barang').val($('#selectdata option:selected').data('id_barang'));
    });
});
});
</script>
	</head>
	<body>
	    <div class='container'>
	    <!--	<form action='hasil.php' method='post' enctype='multipart/form-data'>
                <div class='form-group '>
                    <div>
                        <button type='submit' name='submit'  class='btn btn-primary' style='margin-top: 50px;'><strong>KIRIM</strong></button>
                        <a href='/pemenang.php' class='btn btn-success' style='margin-top: 50px;'><strong>PEMENANG</strong></a>
                    </div>
                </div>
            </form>-->
            <center><h3><a href="#" class='btn btn-success' style='margin-top: 50px;'><strong>Input Transaksi</strong></a></h3></center>
              <!-- cek pesan notifikasi -->
              <?php 
            

                  if(isset($_GET['pesan'])){
                    
                    if($_GET['pesan'] == "success"){   
                      $query_log = mysqli_query($koneksi,"SELECT * FROM tbl_log where keterangan = 'DATA SEMENTARA'  order by timestamps desc limit 1 ");
                      $ambil_data = mysqli_fetch_array($query_log);
                      $nm_pembeli1 = $ambil_data['nm_pembeli'];   
                      $nm_barang1 = $ambil_data['nm_barang'];                 
                      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>$nm_pembeli1</strong> Terimakasih telah beli <strong>$nm_barang1</strong> di Kedai Bu Puji.
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }else if($_GET['pesan'] == "fail"){
                      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                      <strong>Gagal !!</strong> Data Gagal Disimpan
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }else if($_GET['pesan'] == "unknown"){
                      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                      <strong>Kode Barang</strong> tidak di temukan !!
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }else if($_GET['pesan'] == "overstock"){
                      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                      <strong>Qty </strong> lebih besar dari inventory !! !!
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }else if($_GET['pesan'] == "success-hapus"){
                      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>Hapus </strong> data sukses !!
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }else if($_GET['pesan'] == "gagal-hapus"){
                      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                      <strong>Gagal  </strong> hapus data !!
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    }
                  }
                  ?>
                
            <form method='post' action='../proses/proses-keluarv2.php'>
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $id_transaksi = date('YmdHis');
                $tanggal = date('Y/m/d');
                ?>
                <input type='hidden' class='form-control' name='id_transaksi' value='<?= $id_transaksi?>' >
                <div class='input-group mb-3'>
                  
                  <input type='hidden' class='form-control' name='tanggal' placeholder='Tanggal' value='<?=$tanggal?>' required >
                </div>


              <!--<div class='input-group mb-3'>
                  <div class='input-group-prepend'>
                    <span class='input-group-text'><i class='fas fa-sort'></i></span>
                  </div>-->
                  <input type='hidden' class='form-control' name='jenis_transaksi'  value='Keluar' >
                 <!-- <input type='text' class='form-control' placeholder='Jenis Transaksi'>
                </div>-->

                <div class='input-group mb-3'>
                  
                  <input type='text' class='form-control' name ='nm_pembeli' placeholder='Nama Pembeli' autofocus>
                </div>

                <div class='input-group mb-3'>
                 
                 <!-- <input type='text' class='form-control' name ='nm_barang' placeholder='Kode Barang' required>-->
                  <select name='nm_barang' class='form-control' id ='selectdata'>
                  <option value='0'>--Pilih Barang--</option>
                 <?php 
                 include '../setting/koneksi.php';
                 $cari = mysqli_query($koneksi,'select id_barang,nm_barang,qty,harga_jual from inventory');
                 while($e = mysqli_fetch_array($cari)){
                   
                   ?>

                    <option value='<?=$e['nm_barang']; ?>' data-id_barang='<?=$e['id_barang'];?>' data-harga_sementara='<?=$e['harga_jual'];?>'><?=$e['nm_barang'];?> - <?=$e['qty'];?></option>
                    <?php
                 }
                 ?>
                  </select>   
                </div>

                
                <div class='input-group mb-3'>
                
                  <input type='number' class='form-control' id='qty' name ='qty' placeholder='Qty Barang' onkeyup="sum();"required>
                </div>

                <div class='input-group mb-3'>
                <input type='hidden' class='form-control' id='harga_sementara' name ='harga_sementara' onkeyup="sum();"readonly></br>
                <input type='hidden' class='form-control' id='id_barang' name ='id_barang'readonly></br>

                  <input type='number' class='form-control' id='total' name ='total' placeholder='Total Pembelian' readonly>
                </div>

                <center><button type='submit' class='btn btn-info'>Submit</button></center>
                </form>
            
	    </div>
      <script>
function sum() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('harga_sementara').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('total').value = result;
      }else{
        document.getElementById('total').value = '';
      }
}
</script>

	</body>
</html>

