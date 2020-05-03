<html>
<head>
	<title>Multiple Insert</title>
</head>
<body>
	<h1>Multiple Insert</h1>
	<a href="form.php">Tambah Data</a><br><br>
	
	<table border="1" cellpadding="5">
		<tr>
			<th>No</th>
			<th>Id Foto</th>
			<th>Id Barang</th>
			<th>Foto</th>
		</tr>
		<?php
		// Load file koneksi.php
		include "koneksi.php";
		
		// Buat query untuk menampilkan semua data siswa
		$sql = mysqli_query($koneksi, "SELECT * FROM siswa");

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
			echo "<tr>";
			echo "<td>".$no."</td>";
			echo "<td>".$data['id_foto']."</td>";
			echo "<td>".$data['id_barang']."</td>";
			echo "<td>".$data['foto']."</td>";
			echo "</tr>";
			
			$no++; // Tambah 1 setiap kali looping
		}
		?>
	</table>
</body>
</html>
