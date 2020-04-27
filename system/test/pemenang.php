<?php
echo"
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Membuat undian Doorprize dengan PHP</title>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<link rel='stylesheet' href='css/bootstrap.min.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
	</head>
	<body>
";
    // menghubungkan ke file koneksi.php
	include 'koneksi.php';
	// membuka database hasil undian dengan status YES
	$doorprize = mysqli_query($koneksi,"SELECT * FROM undian WHERE status = 'YES' ORDER BY id ASC");
		// membuat tabel pemenang doorprize
        echo "
		<div class='container'>
			<a href='../test' class='btn btn-success' role='button' style='margin-top: 50px; margin-bottom: 50px;'><strong>KEMBALI</strong></a>
			<div class='table-responsive'>          
				<table class='table table-hover'>
					<thead class='table thead-dark'>
						<tr>
							<th style='text-align: center;'>Nomor Kupon</th>
							<th>Nama Pemenang</th>
							<th style='text-align: center;'>Tanggal</th>
							<th style='text-align: center;'>Jam</th>
							<th style='text-align: center;'>Keterangan</th>
						</tr>
					</thead>
					<tbody>
";
					// melakukan perulangan untuk data yang ditemukan
					while ($tampil_pemenang = mysqli_fetch_array($doorprize)) {
						// menampilkan data yang ditemukan
						echo "
						<tr>
							<td style='text-align: center;'>" . $tampil_pemenang['nomor_kupon'] . "</td>
							<td>" . $tampil_pemenang['nama_penerima'] . "</td>
							<td style='text-align: center;'>" . date('d F Y', strtotime($tampil_pemenang['waktu'])) . "</td>
							<td style='text-align: center;'>" . date('H:i:s', strtotime($tampil_pemenang['waktu'])) . "</td>
							<td style='text-align: center;'>" . $tampil_pemenang['keterangan'] . "</td>
						</tr>
						";
					}
					mysqli_close($koneksi);
echo "						
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
";
?>