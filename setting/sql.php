<?php
include "koneksi.php";
//sql profile
$q_profile = mysqli_query($koneksi,"select *from front_profile");
$f_profile = mysqli_fetch_array($q_profile);
//isi front_profile cuma 1 rows
$title_profile = $f_profile['title'];
$number_profile = $f_profile['number'];
$email_profile = $f_profile['email'];
//end sql profile

//sql category product
$q_category = mysqli_query($koneksi,"select *from category_product");
//end  category product


?>