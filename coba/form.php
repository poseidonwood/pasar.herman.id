<html>
<head>
	<title>Multiple Insert</title>
	<script src="jquery.min.js" type="text/javascript"></script>
</head>
<body>
	<a href="index.php"><h1>Multiple Insert</h1></a>
	
	<form method="post" action="proses.php" enctype="multipart/form-data">
		<!-- Buat tombol untuk menabah form data -->
		<button type="button" id="btn-tambah-form">Tambah Data Form</button>
		<button type="button" id="btn-reset-form">Reset Form</button><br><br>
		
		<b>Upload Foto  1 :</b>
		<table>
			
			<tr>
				<td>Id Barang</td>
				<td><input type="text" name="id_barang[]" value ="mln" required readonly></td>
			</tr>
			<tr>
				<td>Foto</td>
				<td> <input type="file" name="foto[]"></td>
			</tr>
		</table>
		<br><br>

		<div id="insert-form"></div>
		
		<hr>
		<input type="submit" value="Simpan">
	</form>
	
	<!-- Kita buat textbox untuk menampung jumlah data form -->
	<input type="hidden" id="jumlah-form" value="1">
	
	<script>
	$(document).ready(function(){ // Ketika halaman sudah diload dan siap
		$("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
			var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
			
			// Kita akan menambahkan form dengan menggunakan append
			// pada sebuah tag div yg kita beri id insert-form
			$("#insert-form").append("<b>Upload Foto  " + nextform + " :</b>" +
				"<table>" +
				
				"<tr>" +
				"<td>Id Barang</td>" +
				"<td><input type='text' name='id_barang[]' value ='mln' required readonly></td>" +
				"</tr>" +
				"<tr>" +
				"<td>Foto</td>" +
				"<td><input type='file' name='foto[]' required</td>" +
				"</tr>" +
				"</table>" +
				"<br><br>");
			
			$("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
		});
		
		// Buat fungsi untuk mereset form ke semula
		$("#btn-reset-form").click(function(){
			$("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
			$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
		});
	});
	</script>
</body>
</html>
