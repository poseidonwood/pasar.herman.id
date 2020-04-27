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
    // melakukan cek bahwa halaman hasil.php dijalankan karena user melakukan klik tombol KIRIM yang ada di halaman index.php
    if (!isset($_POST['submit'])) {
        header("location:../test");
    }
    else {
        // proses acak nomor undian berdasarkan kupon doorprize yang telah disebarkan yaitu sebanyak 5 kupon (1 s/d 5) - silahkan disesuaikan dengan kebutuhan anda
        $doorprize = (rand(1, 100));
        // melihat database dengan nomor undian yang keluar apakah sudah pernah keluar atau belum
        $cek_doorprize = mysqli_query($koneksi,"SELECT * FROM undian WHERE nomor_kupon = '$doorprize' AND status = 'YES'");
        // jika sudah pernah keluar maka kembali kehalaman utama (index.php)
        if (mysqli_num_rows($cek_doorprize) > 0) {
            header("location:/");
        }
        // jika belum pernah keluar maka menyimpan kedatabase dan membuat session yang akan di kirim ke halaman simpan.php
        else {
            $simpan = mysqli_query($koneksi,"INSERT INTO undian (nomor_kupon, status) VALUES ('$doorprize', 'NO')");
            mysqli_close($koneksi);
            session_start();
            $_SESSION['hasil_undian'] = $doorprize;
        }
        // menampilkan halaman konfirmasi ke peserta undian dan menyerahkan hadian undian doorprize kemudian menyimpan data pemenang undian ke database
        echo "
        <div class='container'>
            <form action='simpan.php' method='post' enctype='multipart/form-data'>
                <div class='col-sm-2'>
                    <div class='form-group'>
                        <h1><strong> $doorprize </strong></h1>
                    </div>
                    <div class='form-group'>
                        <input type='text' class='form-control' placeholder='Nama Pemenang' name='nama_penerima' autofocus required>
                    </div>
                    <div class='form-group'>
                        <button type='submit' name='submit' class='btn btn-primary'><strong>SIMPAN</strong></button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
        ";
    }
?>