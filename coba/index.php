<?php

$selectedTime = "2016-02-13 07:44:00";
$endTime = strtotime("-15 minutes", strtotime($selectedTime));
echo date('Y-m-d H:i:s', $endTime);
?>