<?php
include "../setting/koneksi.php";
//include "../setting/sql.php";
date_default_timezone_set("Asia/Jakarta");
$tempo        = date('Y-m-d H:i:s', time() + (60 * 60 * 24 * 2));
$timestamps = date("Y-m-d H:i:s");
$trx = date("mds");
$id_transaksi = 'TRX'.$trx;
$tanggal = date("Y-m-d");
$nm_pembeli = $_POST['name'];
$email = $_POST['email'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$jenis_pembayaran = $_POST['jenis_pembayaran'];
if($jenis_pembayaran=='COD'){
    $status_transaksi = 'COD';
}else{
    $status_transaksi = 'MENUNGGU PEMBAYARAN';
}
$nm_voucher = $_POST['nm_voucher'];
// cek total pembelian
$sql_c = "select sum(harga_total) as harga_total from tbl_cart where device_ip='$device_ip' and id_transaksi is null and status='' ";
$q_cart = mysqli_query($koneksi,$sql_c);
$f_cart = mysqli_fetch_array($q_cart);
$harga_total1 = $f_cart['harga_total'];
if($nm_voucher==''){
//input ke transaksi 
$sql_t = "insert into transaksi values ('$timestamps','$id_transaksi','$tanggal','$nm_pembeli','$hp','$alamat',null,null,'$harga_total1','$jenis_pembayaran','N','$status_transaksi','$tempo','$device_ip')";
$q_transaksi = mysqli_query($koneksi,$sql_t);
if($q_transaksi){
    $u_cart = mysqli_query($koneksi,"update tbl_cart set id_transaksi = '$id_transaksi' where device_ip = '$device_ip' and id_transaksi is null and status=''");
    //transaksi berhasil -> link ATM 
    //ambil rekening
		$que_rek = mysqli_query($koneksi,"select *from tbl_rekening where active ='Y' and nm_bank ='$jenis_pembayaran'");
        $g_rekening = mysqli_fetch_array($que_rek);
		$nm_rekening = $g_rekening['nm_rekening'];
		$no_rekening = $g_rekening['no_rekening'];
		$foto_bank = $g_rekening['foto'];
    //select jika transfer email jenis pembayran - Tranfer -bank
    if($jenis_pembayaran=='MANDIRI'){
        $method = 'TRANSFER - BANK ';
    }elseif($jenis_pembayaran=='BCA'){
        $method = 'TRANSFER - BANK ';
    }else{
        $method = "BAYAR DI TEMPAT - ";
    }
    //Email Confirmasi 
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $to = "$email";
    $subject = "Menunggu Pembayaran $jenis_pembayaran | Pasar Herman.id";
    
    $message = "
    <!DOCTYPE html>
    <html>
    <head>
    <title>Lakukan Pembayaran Segera</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <style type='text/css'>
        /* CLIENT-SPECIFIC STYLES */
        body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
        table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
        img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */
    
        /* RESET STYLES */
        img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
        table{border-collapse: collapse !important;}
        body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
    
        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
    
        /* MOBILE STYLES */
        @media screen and (max-width: 525px) {
    
            /* ALLOWS FOR FLUID TABLES */
            .wrapper {
              width: 100% !important;
                max-width: 100% !important;
            }
    
            /* ADJUSTS LAYOUT OF LOGO IMAGE */
            .logo img {
              margin: 0 auto !important;
            }
    
            /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
            .mobile-hide {
              display: none !important;
            }
    
            .img-max {
              max-width: 100% !important;
              width: 100% !important;
              height: auto !important;
            }
    
            /* FULL-WIDTH TABLES */
            .responsive-table {
              width: 100% !important;
            }
    
            /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
            .padding {
              padding: 10px 5% 15px 5% !important;
            }
    
            .padding-meta {
              padding: 30px 5% 0px 5% !important;
              text-align: center;
            }
    
            .padding-copy {
                 padding: 10px 5% 10px 5% !important;
              text-align: center;
            }
    
            .no-padding {
              padding: 0 !important;
            }
    
            .section-padding {
              padding: 50px 15px 50px 15px !important;
            }
    
            /* ADJUST BUTTONS ON MOBILE */
            .mobile-button-container {
                margin: 0 auto;
                width: 100% !important;
            }
    
            .mobile-button {
                padding: 15px !important;
                border: 0 !important;
                font-size: 16px !important;
                display: block !important;
            }
    
        }
    
        /* ANDROID CENTER FIX */
        div[style*='margin: 16px 0;'] { margin: 0 !important; }
    </style>
    </head>
    <body style='margin: 0 !important; padding: 0 !important;'>
    
    <!-- HIDDEN PREHEADER TEXT -->
    <div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'>
     <!--   Entice the open with some amazing preheader text. Use a little mystery and get those subscribers to read through... -->
    </div>
    
    <!-- HEADER -->
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
        <tr>
            <td bgcolor='#ffffff' align='center'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
                <tr>
                <td align='center' valign='top' width='500'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='wrapper'>
                    <tr>
                        <td align='center' valign='top' style='padding: 15px 0;' class='logo'>
                            <a href='$domain' target='_blank'>
                                <img src='$domain/img/logo1.png'  style='display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;' border='0'>
                            </a>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <tr>
            <td bgcolor='#ffffff' align='center' style='padding: 15px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
                <tr>
                <td align='center' valign='top' width='500'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
                    <tr>
                        <td>
                            <!-- COPY -->
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td align='center' style='font-size: 32px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;' class='padding-copy'>Order Id #$id_transaksi</td>
                                </tr>
                                <tr>
                                    <td align='left' style='padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;' class='padding-copy'>Kepada pelanggan YTH Bpk/Ibu $nm_pembeli. Terimakasih telah berbelanja di Pasar Herman.id. Segera lakukan pembayaran dengan rincian sebagai berikut : </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <tr>
            <td bgcolor='#ffffff' align='center' style='padding: 15px;' class='padding'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
                <tr>
                <td align='center' valign='top' width='500'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
                <tr>
                                <img alt='Logo' src='$domain/img/bank/$foto_bank'  style='display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;' border='0'></tr>
                                <tr> <strong><h6 style='float:center;font-family: Helvetica, Arial, sans-serif; font-size: 16px;'>$jenis_pembayaran - $no_rekening a/n $nm_rekening</h6></strong>
                                </tr>
    <br>
                    <tr>
                        <td style='padding: 10px 0 0 0; border-top: 1px dashed #aaaaaa;'>
                            <!-- TWO COLUMNS -->
                            <table cellspacing='0' cellpadding='0' border='0' width='100%'>
                                <tr>
                                    <td valign='top' class='mobile-wrapper'>
                                        <!-- LEFT COLUMN -->
                                        <table cellpadding='0' cellspacing='0' border='0' width='47%' style='width: 47%;' align='left'>
                                            <tr>
                                                <td style='padding: 0 0 10px 0;'>
                                                    <table cellpadding='0' cellspacing='0' border='0' width='100%'>
                                                        
                                                        <tr>
                                                            <td align='left' style='font-family: Arial, sans-serif; color: #333333; font-size: 16px;'>Metode Pembayaran</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- RIGHT COLUMN -->
                                        <table cellpadding='0' cellspacing='0' border='0' width='47%' style='width: 47%;' align='right'>
                                            <tr>
                                                <td style='padding: 0 0 10px 0;'>
                                                    <table cellpadding='0' cellspacing='0' border='0' width='100%'>
                                                        <tr>
                                                            <td align='right' style='font-family: Arial, sans-serif; color: #333333; font-size: 16px;'>$method $jenis_pembayaran - $no_rekening</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- TWO COLUMNS -->
                            <table cellspacing='0' cellpadding='0' border='0' width='100%'>
                                <tr>
                                    <td valign='top' style='padding: 0;' class='mobile-wrapper'>
                                        <!-- LEFT COLUMN -->
                                        <table cellpadding='0' cellspacing='0' border='0' width='47%' style='width: 47%;' align='left'>
                                            <tr>
                                                <td style='padding: 0 0 10px 0;'>
                                                    <table cellpadding='0' cellspacing='0' border='0' width='100%'>
                                                        <tr>
                                                            <td align='left' style='font-family: Arial, sans-serif; color: #333333; font-size: 16px;'>Batas Waktu Pembayaran</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- RIGHT COLUMN -->
                                        <table cellpadding='0' cellspacing='0' border='0' width='47%' style='width: 47%;' align='right'>
                                            <tr>
                                                <td style='padding: 0 0 10px 0;'>
                                                    <table cellpadding='0' cellspacing='0' border='0' width='100%'>
                                                        <tr>
                                                            <td align='right' style='font-family: Arial, sans-serif; color: #333333; font-size: 16px;'>$tempo</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style='padding: 10px 0 0px 0; border-top: 1px solid #eaeaea; border-bottom: 1px dashed #aaaaaa;'>
                            <!-- TWO COLUMNS -->
                            <table cellspacing='0' cellpadding='0' border='0' width='100%'>
                                <tr>
                                    <td valign='top' class='mobile-wrapper'>
                                        <!-- LEFT COLUMN -->
                                        <table cellpadding='0' cellspacing='0' border='0' width='47%' style='width: 47%;' align='left'>
                                            <tr>
                                                <td style='padding: 0 0 10px 0;'>
                                                    <table cellpadding='0' cellspacing='0' border='0' width='100%'>
                                                        <tr>
                                                            <td align='left' style='font-family: Arial, sans-serif; color: #333333; font-size: 16px; font-weight: bold;'>Total Pembayaran</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- RIGHT COLUMN -->
                                        <table cellpadding='0' cellspacing='0' border='0' width='47%' style='width: 47%;' align='right'>
                                            <tr>
                                                <td>
                                                    <table cellpadding='0' cellspacing='0' border='0' width='100%'>
                                                        <tr>
                                                            <td align='right' style='font-family: Arial, sans-serif; color: #7ca230; font-size: 16px; font-weight: bold;'>Rp $harga_total1</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        <tr>
            <td bgcolor='#ffffff' align='center' style='padding: 15px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
                <tr>
                <td align='center' valign='top' width='500'>
                <![endif]-->
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
                    <tr>
                        <td>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td>
                                        <!-- COPY -->
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <td align='left' style='padding: 0 0 0 0; font-size: 14px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #aaaaaa; font-style: italic;' class='padding-copy'>* Apabila Anda belum menyelesaikan pembayaran sampai batas waktu yang di berikan, maka transaksi ini akan kami batalkan secara otomatis.</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
        
        <tr>
            <td bgcolor='#ffffff' align='center' style='padding: 20px 0px;'>
                <!--[if (gte mso 9)|(IE)]>
                <table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
                <tr>
                <td align='center' valign='top' width='500'>
                <![endif]-->
                <!-- UNSUBSCRIBE COPY -->
                <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' style='max-width: 500px;' class='responsive-table'>
                    <tr>
                        <td align='center' style='font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;'>
                        <img alt='Logo' src='$domain/img/logo1.png'  style='display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;' border='0'>
                            <br>
                            <hr>
                            Email dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini.
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </td>
        </tr>
    </table>
    
    </body>
    </html>
    






    ";
    // Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Pasar Herman.Id<info@pasar.herman.id>' . "\r\n";
$headers .= 'Cc: pt.simultan@gmail.com' . "\r\n";
//echo $message;

        $mailto = mail($to,$subject,$message,$headers);
            //Ending Email Confirmasi
        if($mailto){
            //berhasil
           
                echo "<script>window.location.href='../confirm.php?x=$id_transaksi&jenis=$status_transaksi';</script>";

        }else{
            echo "gagal kirim email";
           
                echo "<script>window.location.href='../confirm.php?x=$id_transaksi&jenis=$status_transaksi';</script>";

        }
}else{

    echo "gagal $harga_total ";
   // window.location.href='$domain';</script>";
    //transaksi gagal masuk ke link -> gagal
}

}else{
    $q_transaksi = mysqli_query($koneksi,"insert into transaksi values ('$timestamps','$id_transaksi','$tanggal','$nm_pembeli'
    ,'$hp','$alamat','$nm_voucher',null,'','$jenis_pembayaran','N','$status_transaksi','$tempo','$device_ip'");
    if($q_transaksi){
        echo "<script>window.location.href='$domain';</script>";
        //transaksi berhasil -> link ATM 
    }else{
        echo "<script>window.location.href='$domain';</script>";
        //transaksi gagal masuk ke link -> gagal
    }
}



?>