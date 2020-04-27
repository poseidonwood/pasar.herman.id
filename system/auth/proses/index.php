<?php

include "../../../setting/koneksi.php";
//include "../../../setting/sql.php";

if(!empty($_POST['email'])){
  $password = md5($_POST['password']);
  $password1 = md5($_POST['password1']);
  if($password!==$password1){
    echo"<script>
    window.alert('Konfirmasi Password Tidak Cocok, Ulangi Lagi');
    window.location.href='../registrasi/';</script>";
  }else{
    function generateRandomString($length = 5) {
        return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    
    $id_user= generateRandomString();  // OR: generateRandomString(24
    date_default_timezone_set("Asia/Jakarta");
    $created = date("Y-m-d H:i:s");
  $name = $_POST['name'];
  $email = $_POST['email'];
  //cek apa ada email sama di database
  $q_s = mysqli_query($koneksi,"select *from tbl_user where email = '$email'");
  $q_n = mysqli_num_rows($q_s);
  if($q_n>0){
    echo"<script>
    window.alert('email sudah terdaftar di database');
    window.location.href='../registrasi/';</script>";
  }else{

      $q_i = mysqli_query($koneksi,"insert into tbl_user values ('$id_user','$name','$email','$password','user','$created','Y')");
      if($q_i){
        echo"<script>
        window.alert('Data Berhasil Di Tambah');
        window.location.href='$domain';</script>";
      }else{
        echo"<script>
        window.alert('Data GAGAL DI TAMBAH : $id_user,$name,$email,$password,user,$created,Y');
        window.location.href='$domain';</script>";
      }
     

  }
  }
    
}else{
    echo"<script>window.location.href='$domain';</script>";
}

?>