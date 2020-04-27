<?php
session_start();
include "../../../setting/koneksi.php";
//include "../../../setting/sql.php";


if(!empty($_POST['email'])){
       
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $q_check_login = mysqli_query($koneksi,"select *from tbl_user where email ='$email' and password ='$password'");
    $q_rows = mysqli_num_rows($q_check_login);
    if($q_rows>0){
        $f_check_login = mysqli_fetch_assoc($q_check_login);
        $role = $f_check_login['role'];
        $name = $f_check_login['name'];
        if($role=='admin'){
        $_SESSION['email']=$email;
        $_SESSION['status']='login';
        $_SESSION['role']=$role;
        $_SESSION['name']='name';
        echo"<script>window.location.href='$domain\system/';</script>";
        //check Y belum 
        }else{
            $_SESSION['status']='login';
            $_SESSION['role']=$role;
            $_SESSION['name']=$name;
            echo"<script>window.location.href='$domain\?user';</script>";

        }
    }else{
        echo "<script>alert('password  $password')</script>";
        echo"<script>window.location.href='$domain\system/auth/';</script>";

    }
    
    
}else{
    echo"<script>window.location.href='$domain\system/auth/';</script>";
}

?>