<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "pasar@herman.id";
$to = "santosofebrikukuh@gmail.com";
$subject = "Checking PHP mail";
$message = "PHP mail berjalan dengan baik";
$headers = "From:" . $from;
$mailto = mail($to,$subject,$message, $headers);
if($mailto){
    echo "Pesan email sudah terkirim.";
}else{
    echo "Pesan anda Gagal terkirim.";

}
?>