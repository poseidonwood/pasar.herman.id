<?php
include "../../../setting/koneksi.php";


$id_barang = $_GET['id_barang'];
$sql = mysqli_query ($koneksi,"select *from tbl_product where id_barang = '$id_barang'");

$rows = mysqli_num_rows($sql);
if($rows>0){
$barang = mysqli_fetch_array($sql);

$data = array(
    'nm_barang' => $barang['nm_barang'],
    'ket' => '<span class="badge bg-red">Kode Barang Sudah Di Pakai</span>'
);

echo json_encode($data);
}else{
    $data = array(
        'ket' => '<span class="badge bg-success">Kode Barang Tersedia</span>'
    );
    echo json_encode($data); 
}
?>