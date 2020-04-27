<?php
// deteksi IP pribadi
$ip_pribadi=$_SERVER['REMOTE_ADDR'];
// deteksi IP utama
$ip_utama = gethostbyaddr($_SERVER['REMOTE_ADDR']);
// deteksi perangkat
$deteksi_perangkat = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
if($deteksi_perangkat) {
    $perangkat = "Handphone, Tablet atau sejenisnya";
}
else {
    $perangkat = "Komputer atau Notebook";
}
// deteksi browser
if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape')) {
    $browser = 'Netscape';
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox')) {
    $browser = 'Mozilla Firefox';
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome')) {
    $browser = 'Google Chrome';
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera')) {
    $browser = 'Opera';
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
    $browser = 'Internet Explorer';
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari')) {
    $browser = 'Safari';
}
else {
    $browser = 'Lainnya';
}  
?>
	
<footer class="main-footer">
<a  href='#'  data-toggle='modal' data-target='#cek-ip'><strong><?php
if($perangkat=="Komputer atau Notebook"){
  echo " <i class='fas fa-laptop'></i> :</strong> ".$ip_utama;
}else{
  echo " <i class='fas fa-mobile'></i> :</strong> ".$ip_utama;
}

?></strong></a>

    <strong>| Copyright &copy; 2020 <a href="#">Febri Kukuh</a>.</strong>&nbsp;
    <div class='modal fade' id='cek-ip' data-backdrop='static'>
                                            <div class='modal-dialog modal-dialog-centered'>
                                                <div class='modal-content'>
                                                    <div class='modal-body' style='text-align:left;'>
                                                    <strong><?php echo "<br>Perangkat :</strong> ".$ip_utama;?>
                                                    <strong><?php echo "<br>IP address anda :</strong> ".$ip_pribadi;?>
                                                    <strong><?php echo "<br>Jenis Perangkat :</strong> ".$perangkat;?>
                                                    <strong><?php echo "<br>Browser :</strong> ".$browser;?>      
                                                    <div class='modal-body' style='text-align:right;'>
                                                    <button type='button' class='btn btn-warning' data-dismiss='modal'>Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    <div class="float-right d-none d-sm-inline-block">

   <b>Version</b> 1.0.0 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                     
    </div>
    
  </footer>
<!-- Modal Barang-->
<div class="modal fade" id="ltbarang" tabindex="-1" role="dialog" aria-labelledby="listbarang" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h3 class="card-title">Stok Barang Mau Habis / Habis</h3>

      </div>
      
      <section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                  <tr>
                  <th>No</th>
                  <th>Id</th>
                  <th>Nama Barang</th>
                  <th>Qty</th>
                  <th>Last Updt</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php 
                include 'setting/koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"select * from inventory where ket ='MAU HABIS' or ket ='HABIS'");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['id_barang']; ?></td>
                    <td><?php echo $d['nm_barang']; ?></td>
                    <td><?php echo $d['qty']; ?></td>
                    <td><?php echo $d['last_upt']; ?></td>
                    <td><?php 
                    $ket = $d['ket'];
                    if($ket=="AMAN")
                    {
                     echo "<span class='badge bg-success'>$ket</span>";
                    }elseif($ket=="HABIS"){
                      echo "<span class='badge bg-danger'>$ket</span>";
                    }else{
                      echo "<span class='badge bg-warning'>$ket</span>";
                    }
                     ?></td>
                  
                  <td>
                      <a href="pages/forms/inventory-update.php?id=<?php echo $d['id_barang']; ?>" class="btn btn-success btn-sm">
                              <i class="fas fa-pencil-alt">
                              </i>
                          </a>
                      <a href="proses/hapus-inventory.php?id=<?php echo $d['id_barang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                              <i class="fas fa-trash">
                              </i>
                          </a>
                    </td>
                  </tr>
                  <?php 
                }
                ?>
               
                
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <!--  <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->