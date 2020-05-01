<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <style>
    </style>
  </head>
  <body>
    <select id="cardtype" name="cards" onchange='Validate()'>
      <option value="selectcard">--- Please select ---
      </option>
      <option value="diskon">Diskon
      </option>
      <option value="mingguan">Mingguan
      </option>
      <option value="potongan">Potongan
      </option>
    </select>
    <p id ="notif1"></p>
    <input type="number" max="100" name ="nilai placeholder="masukkan nilai">
    <script>
      function Validate()
      {
        var x = document.getElementById("cardtype").value;
        if(x == "diskon")
        {
            document.getElementById("notif1").innerHTML ="Masukkan Diskon 1 - 100 %";
        }else{
            document.getElementById("notif1").innerHTML = "";

        }
      }
    </script>

<script>
      function Validate()
      {
        var x = document.getElementById("jenis_promo").value;
        if(x == "diskon"){
            document.getElementById("notif_promo").innerHTML = "<span class='badge bg-danger'>Masukkan Diskon 1 - 100 %</span>";
        }elseif(x == "potongan"){
            document.getElementById("notif_promo").innerHTML = "<span class='badge bg-danger'>Masukkan Potongan Harga Yang Diinginkan</span>";

        }elseif(x == "mingguan"){
          document.getElementById("notif_promo").innerHTML = "<span class='badge bg-danger'>Promo Untuk Mingguan (Potongan Harga)</span>";
        }else{
          document.getElementById("notif_promo").innerHTML = "";

        }
      }
    </script>
  </body>
</html>
