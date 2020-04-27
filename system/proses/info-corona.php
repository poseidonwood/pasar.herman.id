<?php

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://api.kawalcorona.com/indonesia/provinsi/?fbclid=IwAR2gP-Ly_iZZw4_3EgLIHTVuZTomkFNlwnzcchlfTgm_stjjPCzwkH6wTzU');

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  $content = curl_exec($ch);

  curl_close($ch);

  //mengubah data json menjadi data array asosiatif
  $result=json_decode($content,true);

  //looping data menggunakan foreach
  foreach ($result['attributes'] as $MK) {
   echo "Profinsi : ".$MK['Provinsi']."<br>";
   echo "Positif : ".$MK['Kasus_Pos']."<br>";
   echo "Sembuh : ".$MK['Kasus_Semb']."<br>";
   echo "Meninggal : ".$MK['Kasus_Meni']."<br>";

   
  }
?>
