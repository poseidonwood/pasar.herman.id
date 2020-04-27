<?php
include "../../setting/koneksi.php";


$id_barang = $_GET['id_barang'];
$sql = mysqli_query ($koneksi,"select *from inventory where id_barang = '$id_barang'");
$barang = mysqli_fetch_array($sql);
$data = array(
    'nm_barang' => $barang['nm_barang']
);
echo json_encode($data);

?>