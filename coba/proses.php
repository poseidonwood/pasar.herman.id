<?php
// Include / load file koneksi.php
include "koneksi.php";

// Ambil data yang dikirim dari form
$id_barang = $_POST['id_barang']; // Ambil data id_barang dan masukkan ke variabel id_barang
$foto =  $_FILES['foto']['tmp_name']; // Ambil data foto dan masukkan ke variabel foto



// echo "<pre>";
// echo print_r($foto);
// echo "</pre>";
//cek dulu jika ada gambar produk jalankan coding ini
  $file_tmp = $_FILES['foto']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$foto;
  
  echo "<pre>";
echo print_r($nama_gambar_baru);
echo "</pre>";
  					move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);					// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
					// Proses simpan ke Database
					$query = "INSERT INTO siswa VALUES";

					$index = 0; // Set index array awal dengan 0
					foreach($id_barang as $dataid_barang){ // Kita buat perulangan berdasarkan id_foto sampai data terakhir
						$query .= "('','".$dataid_barang."','".$foto[$index]."'),";
						$index++;
					}

					// Kita hilangkan tanda koma di akhir query
					// sehingga kalau di echo $query nya akan sepert ini : (contoh ada 2 data siswa)
					// INSERT INTO siswa VALUES('1011001','Rizaldi','Laki-laki','089288277372','Bandung'),('1011002','Siska','Perempuan','085266255121','Jakarta');
					$query = substr($query, 0, strlen($query) - 1).";";

					// Eksekusi $query
					$result = mysqli_query($koneksi, $query);
					// periska query apakah ada error
					if(!$result){
						die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
							 " - ".mysqli_error($koneksi));
					} else {
					  //tampil alert dan akan redirect ke halaman index.php
					  //silahkan ganti index.php sesuai halaman yang akan dituju
					  echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
					}
	
?>

