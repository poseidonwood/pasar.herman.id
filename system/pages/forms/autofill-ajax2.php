
<?php
include "../../../setting/koneksi.php";


$id_barang = $_GET['id_barang'];
$sql = mysqli_query ($koneksi,"select *from tbl_product where id_barang = '$id_barang'");
if($id_barang!==''){
    $rows = mysqli_num_rows($sql);
    if($rows>0){
    $barang = mysqli_fetch_array($sql);
    
    $data = array(
        'nm_barang' => $barang['nm_barang'],
        'notif' => ''
    );
    
    echo json_encode($data);
    }else{
        $data = array(
            'notif' => '<span class="badge bg-warning">Kode Tidak Ada Di Database</span>'
        );
        echo json_encode($data); 
    }
}else{
    $data = array(
        'notif' => ''
    );
    
    echo json_encode($data);
}

?>