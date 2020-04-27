<?php

$date = date("Y-m-d");
$kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
echo  $kemarin;
?>