<?php 
// koneksi database
include '../../setting/koneksi.php';
// menangkap data yang di kirim dari form
date_default_timezone_set("Asia/Jakarta");
$id_barang = $_POST['id_barang'];
$nm_barang = $_POST['nm_barang'];
$detail = $_POST['detail'];
$qty = $_POST['qty'];
$id_satuan = $_POST['id_satuan'];
$id_category = $_POST['id_category'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$harga_beli_satuan = $harga_beli / $qty;
$expired = $_POST['expired'];
$last_upt = date("Y-m-d H:i:s");
$foto = $_FILES['foto']['name'];
$rating_akhir = 0;
$active = "Y";


if($foto != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
          if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                  move_uploaded_file($file_tmp, '../../img/product/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                    // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)

                    // menyeleksi data inventory berdasarkan id / kode product
            $data_product = mysqli_query($koneksi,"select * from tbl_product where id_barang='$id_barang'");
            //mengambil kode product ada atau tidak
            $cek = mysqli_num_rows($data_product);
            $sto0 = mysqli_fetch_array($data_product);
            if($cek > 0){
            
            $stok1 = $sto0['qty'];
            $qtyfix= $stok1+$qty;

            $upstok= mysqli_query($koneksi, "UPDATE tbl_product SET qty ='$qtyfix', nm_barang='$nm_barang',expired= '$expired',harga_jual = '$harga_jual'
            ,harga_beli_satuan='$harga_beli_satuan',detail ='$detail', id_satuan='$id_satuan',id_category='$id_category',harga_beli = '$harga_beli',last_upt='$last_upt',foto='$nama_gambar_baru' WHERE id_barang='$id_barang'");                
            header("location:$domain/system/pages/product/?pesan=success");
       
   //$simpan0 = mysqli_query($koneksi,"insert into transaksi values(
     //  '$id_barang','$nm_barang','$detail','$qty','$id_satuan','$id_category','$harga_beli_satuan','$harga_beli','$harga_jual','$expired','$last_upt','$nama_gambar_baru','$rating_akhir','$active')");
      
  /*  //cek saldo 
    $query_saldo = mysqli_query($koneksi,"select *from tbl_saldo");
    $fetch_saldo = mysqli_fetch_array($query_saldo);
    $saldo_awal = $fetch_saldo['total_saldo'];
    $saldo_akhir = $saldo_awal-$harga_beli;        
    //simpan transaksi di log saldo
    $simpan_saldo = mysqli_query($koneksi,"insert into log_saldo values(
     '$id_transaksi','$tanggal','$nm_product','$qty','$harga_beli','$saldo_awal','$saldo_akhir','Transaksi $jenis_transaksi')");
    
     //update saldo baru
     $update_saldo = mysqli_query($koneksi,"update tbl_saldo set total_saldo = '$saldo_akhir' where id_saldo = '1'");
  //simpan ke tbl_log
  $simpan_log = mysqli_query($koneksi,"insert into tbl_log values(
   '$timestamps','$id_transaksi','$tanggal','$jenis_transaksi','$nm_pembeli','$id_product','$nm_product','$qty','$harga_beli','','')");
*/
     // menginput data ke database mengurangi stok 
   /*$data_stok = mysqli_query($koneksi,"select * from tbl_product where id_barang='$id_barang'");
   $sto    =mysqli_fetch_array($data_stok);
   $stok = $sto['qty'];
   if($stok<=5){
   $upstok1= mysqli_query($koneksi, "UPDATE  tbl_product SET ket ='MAU HABIS'  WHERE id_product='$id_product'");       
   header("location:$domain/system/pages/product/?pesan=success");
        
   }elseif($stok>=5){
       $upstok2= mysqli_query($koneksi, "UPDATE  tbl_product SET ket ='AMAN'  WHERE id_product='$id_product'");                
       header("location:$domain/system/pages/product/?pesan=success");

   }else{
       $upstok2= mysqli_query($koneksi, "UPDATE  tbl_product SET ket ='HABIS'  WHERE id_product='$id_product'");                
       header("location:$domain/system/pages/product/?pesan=success");

   }
   */
            }else{

                $simpan0 = mysqli_query($koneksi,"insert into tbl_product values(
                    '$id_barang','$nm_barang','$detail','$qty','$id_satuan','$id_category','$harga_beli_satuan','$harga_beli','$harga_jual','$expired','$last_upt','$nama_gambar_baru','$rating_akhir','$active')");
                    header("location:$domain/system/pages/product/?pesan=success");
                
     /*      //cek saldo 
        $query_saldo = mysqli_query($koneksi,"select *from tbl_saldo");
        $fetch_saldo = mysqli_fetch_array($query_saldo);
        $saldo_awal = $fetch_saldo['total_saldo'];
        $saldo_akhir = $saldo_awal-$harga_beli;        
        //simpan transaksi di log saldo
        $simpan_saldo = mysqli_query($koneksi,"insert into log_saldo values(
         '$id_transaksi','$tanggal','$nm_product','$qty','$harga_beli','$saldo_awal','$saldo_akhir','Transaksi $jenis_transaksi')");
        
         //update saldo baru
         $update_saldo = mysqli_query($koneksi,"update tbl_saldo set total_saldo = '$saldo_akhir' where id_saldo = '1'");   
       if($simpan){
           $data_stok1 = mysqli_query($koneksi,"select * from inventory where id_product='$id_product'");
           $sto1    =mysqli_fetch_array($data_stok1);
           $stok1 = $sto1['qty'];
           if($stok1<=5){
           $upstok1= mysqli_query($koneksi, "UPDATE  tbl_product SET ket ='MAU HABIS'  WHERE id_product='$id_product'");       
           header("location:$domain/system/pages/product/?pesan=success");
                
           }elseif($stok1>=5){
               $upstok3= mysqli_query($koneksi, "UPDATE  tbl_product SET ket ='AMAN'  WHERE id_product='$id_product'");                
               header("location:$domain/system/pages/product/?pesan=success");
       
           }else{
               $upstok3= mysqli_query($koneksi, "UPDATE  tbl_product SET ket ='HABIS'  WHERE id_product='$id_product'");                
               header("location:$domain/system/pages/product/?pesan=success");
       
           }*/
            

             
            }
        }
    }


?>

 
