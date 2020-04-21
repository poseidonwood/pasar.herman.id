<?php
include "koneksi.php";
$q_category2 = mysqli_query($koneksi,"select *from category_product");
										while($f_category2 = mysqli_fetch_array($q_category2)){
											$nm_category2 = $f_category2['nm_category'];
											$foto_category2= $f_category2['foto'];
                                        echo $foto_category2;
                                        echo "<br>";
                                        }
?>