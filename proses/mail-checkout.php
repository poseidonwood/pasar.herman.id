<?php
//Email Confirmasi 
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $to = "$email";
    $subject = "Menunggu Pembayaran $jenis_pembayaran | Pasar Herman.id";
    
    $message="<!DOCTYPE html>
    <html>
    
    <head>
        <title>Lakukan Pembayaran Segera</title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge' />
        <style type='text/css'>
            body,
            table,
            td,
            a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }
    
            table,
            td {
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
            }
    
            img {
                -ms-interpolation-mode: bicubic;
            }
    
            img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
            }
    
            table {
                border-collapse: collapse !important;
            }
    
            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
    
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }
    
            @media screen and (max-width: 480px) {
                .mobile-hide {
                    display: none !important;
                }
    
                .mobile-center {
                    text-align: center !important;
                }
            }
    
            div[style*='margin: 16px 0;'] {
                margin: 0 !important;
            }
        </style>
    
    <body style='margin: 0 !important; padding: 0 !important; background-color: #eeeeee;' bgcolor='#eeeeee'>
        <div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'>
            For what reason would it be advisable for me to think about business content? That might be little bit risky to have crew member like them.
        </div>
        <table border='0' cellpadding='0' cellspacing='0' width='100%'>
            <tr>
                <td align='center' style='background-color: #eeeeee;' bgcolor='#eeeeee'>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:600px;'>
                        <tr>
                            <td align='center' valign='top' style='font-size:0; padding: 35px;' bgcolor='#007DFA'>
                                <div style='display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;'>
                                    <table align='left' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:300px;'>
                                        <tr>
                                            <td align='left' valign='top' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;' class='mobile-center'>
                                                <h1 style='font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;'>Pasar Herman</h1>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div style='display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;' class='mobile-hide'>
                                    <table align='left' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:300px;'>
                                        <tr>
                                            <td align='right' valign='top' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;'>
                                                <table cellspacing='0' cellpadding='0' border='0' align='right'>
                                                    <tr>
                                                        <td style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400;'>
                                                        </td>
                                                        <td style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px;'> <a href='#' target='_blank' style='color: #ffffff; text-decoration: none;'><img src='$domain/img/logo1.png' width='150' height='150' style='display: block; border: 0px;' /></a> </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align='center' style='padding: 35px 35px 20px 35px; background-color: #ffffff;' bgcolor='#ffffff'>
                                <table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:600px;'>
                                    <tr>
                                        <td align='center' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;'> <img src='https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png' width='125' height='120' style='display: block; border: 0px;' /><br>
                                            <h2 style='font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;'> Terimakasih Sudah Berbelanja </h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;'>
                                            <p style='font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;'> Kepada Yth. Bpk/Ibu <strong> $nm_pembeli</strong>. Terimakasih telah berbelanja di Pasar Herman.id. Segera lakukan pembayaran dengan rincian sebagai berikut :</p>
                                        </td>
                                    </tr>
                                    <tr>";
                                          
                                            if($jenis_pembayaran=='COD'){
                                             $message .= "<td align='center' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;'> <img alt='$foto_bank' src='$domain/img/bank/cod.png' width='125' height='120' style='display: block; border: 0px;' /><br>";
                                             $message .= "<h4 style='font-size: 20px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;'>(Akan kami hubungi segera untuk proses lebih lanjut) </h4> ";
                                            }else{
                                             $message .="<td align='center' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;'> <img src='$domain/img/bank/$foto_bank alt='$foto_bank' width='125' height='120' style='display: block; border: 0px;' /><br>";
                                             $message .="<h4 style='font-size: 20px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;'> $jenis_pembayaran - $no_rekening a/n $nm_rekening </h4>
                                                ";
                                            }
    
                                            $message .="</td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td align='left' style='padding-top: 20px;'>
                                            <table cellspacing='0' cellpadding='0' border='0' width='100%'>
                                                <tr>
                                                    <td width='75%' align='left' bgcolor='#eeeeee' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;'> Order Id # </td>
                                                    <td width='25%' align='left' bgcolor='#eeeeee' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;'> $id_transaksi </td>
                                                </tr>";
                                                include "../setting/koneksi.php";
                                                $q_item = $koneksi->query("select *from tbl_cart where id_transaksi = '$id_transaksi'");
                                                while($f_item=mysqli_fetch_array($q_item)){
                                                   $nm_barang_f_item =  $f_item['nm_barang'];
                                                   $qty_f_item = $f_item['qty'];
                                                   $harga_total_f_item = $f_item['harga_total'];
                                                    $message .="<tr>
                                                    <td width='75%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;'> $nm_barang_f_item ($qty_f_item) </td>
                                                    <td width='25%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;'> Rp.  $harga_total_f_item </td>
                                                </tr>";
                                                }
                                                $q_voucher = $koneksi->query("select *from transaksi where id_transaksi = '$id_transaksi'");
                                                $cek_voucher = mysqli_fetch_array($q_voucher);
                                                $h_nm_voucher = $cek_voucher['nm_voucher'];
                                                $h_harga_awal = $cek_voucher['harga_awal'];
                                                
                                                if(isset($h_nm_voucher)){
                                                    $voucher =  $h_harga_awal - $harga_total_voucher;
                                                    $message .="<tr>
                                                    <td colspan='1' width='75%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;'>Diskon ($h_nm_voucher)</td>
                                                    <td width='75%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;'>- Rp. $voucher</td>
    
                                                    </tr>
                                                    
                                                <tr>
                                                <td width='75%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;'> Ongkos Kirim </td>
                                                <td width='25%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;'> Rp. 0 </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align='left' style='padding-top: 20px;'>
                                        <table cellspacing='0' cellpadding='0' border='0' width='100%'>
                                            <tr>
                                                <td width='75%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;'> TOTAL </td>
                                                <td width='25%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;'> Rp $harga_total_voucher </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>";
                                                }else{
                                                    $message .="<tr>
                                                    <td colspan='1'></td>
                                                    <td></td>
    
                                                    </tr>
                                                    
                                                <tr>
                                                <td width='75%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;'> Ongkos Kirim </td>
                                                <td width='25%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;'> Rp. 0 </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align='left' style='padding-top: 20px;'>
                                        <table cellspacing='0' cellpadding='0' border='0' width='100%'>
                                            <tr>
                                                <td width='75%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;'> TOTAL </td>
                                                <td width='25%' align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;'> Rp $harga_total1 </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
    
                                                    ";
                                                }
                                                $message .="                
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align='center' height='100%' valign='top' width='100%' style='padding: 0 35px 35px 35px; background-color: #ffffff;' bgcolor='#ffffff'>
                                <table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:660px;'>
                                    <tr>
                                        <td align='center' valign='top' style='font-size:0;'>
                                            <div style='display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;'>
                                                <table align='left' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:300px;'>
                                                    <tr>
                                                        <td align='left' valign='top' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;'>
                                                            <p style='font-weight: 800;'>Detail Pembeli</p>
                                                            <p><i><strong>Bpk/Ibu ($nm_pembeli)</strong></i><br>Nomor HP : <a href='tel:$hp'>$hp</a><br>Email: $email</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div style='display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;'>
                                                <table align='left' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:300px;'>
                                                    <tr>
                                                        <td align='left' valign='top' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;'>
                                                            <p style='font-weight: 800;'>Alamat Pembeli</p>
                                                            <p>$alamat</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                           
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td align='center' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;'>
                                            <p align='left' style='padding: 0 0 0 0; font-size: 14px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #aaaaaa; font-style: italic;'> * Apabila Anda belum menyelesaikan pembayaran sampai batas waktu yang di berikan, maka transaksi ini akan kami batalkan secara otomatis.  </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                          <!--  <td align='center' style=' padding: 35px; background-color: #ff7361;' bgcolor='#1b9ba3'>
                                <table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:600px;'>
                                    <tr>
                                        <td align='center' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;'>
                                            <h2 style='font-size: 24px; font-weight: 800; line-height: 30px; color: #ffffff; margin: 0;'> Get 30% off your next order. </h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='center' style='padding: 25px 0 15px 0;'>
                                            <table border='0' cellspacing='0' cellpadding='0'>
                                                <tr>
                                                    <td align='center' style='border-radius: 5px;' bgcolor='#66b3b7'> <a href='#' target='_blank' style='font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #007DFA; padding: 15px 30px; border: 1px solid #007DFA; display: block;'>Shop Again</a> </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>-->
                        </tr>
                        <tr>
                            <td align='center' style='padding: 35px; background-color: #ffffff;' bgcolor='#ffffff'>
                                <table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width:600px;'>
                                
                                    <tr>
                                        <td align='center'> <img src='$domain/img/logo1.png' width='200' height='200' style='display: block; border: 0px;' /> </td>
                                    </tr>
                                    <tr>
                                        <td align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;'>
                                        <br>
                                        <hr>
                                            <p align='center' style='padding: 0 0 0 0; font-size: 14px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #aaaaaa; font-style: italic;'> Email dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini. </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
    
    </html>";
    
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
         echo $message;
            //echo "<script>window.location.href='../confirm.php?x=$id_transaksi&jenis=$status_transaksi';</script>";

        }
        ?>