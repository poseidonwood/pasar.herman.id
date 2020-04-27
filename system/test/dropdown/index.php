<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Day 2</title>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
<!-- JQuery -->
<script type='text/javascript'>
$(document).ready(function(){
$('#softwares').val($('#selectdata option:selected').data('softwares'));
$(function(){
    $('#selectdata').change(function(){
        $('#softwares').val($('#selectdata option:selected').data('softwares'));
    });
});
});
</script>


  </head>
  <body>
    <div class="container">
	
	<!-- Panel -->
	<div class="panel panel-primary">
	<div class="panel-heading">Get data from drop down list into textbox</div>
	<div class="panel-body">
    
	<!-- Dropdown -->
	<div class="form-group">
	<label>Softwares List :</label>
	<select class="form-control" id="selectdata">
	<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db   = "json";
	$koneksi = mysqli_connect($host, $user, $pass, $db);
	if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
	}
	echo "<option>-Select One-</option>";
	$query = mysqli_query($koneksi, "SELECT * FROM software order by id_software asc") or die (mysqli_error());
	while ( $row=mysqli_fetch_assoc($query)) {
	echo "<option value='".$row['id_software']."' data-softwares='".$row['software_name']."'>".$row['id_software']."</option>";
	}
	?>
	</select>
	</div>
	
	<!-- Textbox -->
	<div class="form-group">
	<label>Softwares :</label>
	<input type="text" class="form-control" id="softwares">
	</div>
	
	</div>
	<div class="panel-footer"></div>
	</div>
	
	</div>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>