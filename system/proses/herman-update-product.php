<?php
include '../../setting/koneksi.php';
$id = $_GET['id'];
$nm_barang = $_POST['nm_barang'];
$detail = $_POST['detail'];
$qty = $_POST['qty'];
$id_satuan = $_POST['id_satuan'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$expired = $_POST['expired'];
$last_upt = date("Y-m-d H:i:s");
$foto = $_FILES['foto']['name'];
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
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE tbl_product SET nm_barang = '$nm_barang', detail = '$detail',qty = '$qty',id_satuan = '$id_satuan', harga_beli = '$harga_beli', harga_jual = '$harga_jual', expired = '$expired',last_upt = '$last_upt',active = '$active', foto = '$nama_gambar_baru'";
                    $query .= "WHERE id_barang= '$id'";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      header("location:$domain/system/pages/product/?pesan=success");
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE tbl_product SET nm_barang = '$nm_barang', detail = '$detail',qty = '$qty',id_satuan = '$id_satuan', harga_beli = '$harga_beli', harga_jual = '$harga_jual', expired = '$expired',last_upt = '$last_upt',active = '$active'";
      $query .= "WHERE id_barang= '$id'";
      $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          header("location:$domain/system/pages/product/?pesan=success");
      }
    }
?>