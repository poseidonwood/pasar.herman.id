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
    // memulai seesion pada halaman simpan.php
    session_start();
    // melakukan cek bahwa halaman simpan.php dijalankan karena user melakukan klik tombol SIMPAN yang ada di halaman hasil.php
    if (!isset($_POST['submit'])) {
        header("location:/");
    }
    // melakukan cek bahwa nama pemenang yang ada di halaman hasil.php sudah di isi
    if (!isset($_POST['nama_penerima'])) {
        header("location:javascript://history.go(-1)");
    }
    else {
        // mengambil nama pemenang yang telah diinput pada halaman hasil.php
        $nama_penerima = ucwords(strtolower($_POST['nama_penerima']));
        // membuat status nama pemenang menjadi #N/A apabila sudah dipanggil namun tidak ada konfirmasi dan keterangan menjadi hangus apabila user input simbol minus (-) di form nama pemenang        
        if ($nama_penerima == "-") {
            $nama_pemenang = "#N/A";
            $keterangan = "Hangus";
        }
        else {
            $nama_pemenang = $nama_penerima;
            $keterangan = "";
        }
        // menyimpan nama pemenang kedalam database
        $simpan_pemenang = mysqli_query($koneksi,"UPDATE undian SET nama_penerima = '$nama_penerima', status = 'YES', keterangan = '$keterangan' WHERE nomor_kupon = $_SESSION[hasil_undian] AND status = 'NO'");
        // kembali ke halaman index.php
        header("location:../test");
        mysqli_close($koneksi);
        echo "
    </body>
</html>
        ";
    }
?>