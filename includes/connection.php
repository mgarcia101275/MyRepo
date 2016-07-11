<?php

DEFINE('DB_SERVER','localhost');
DEFINE('DB_USER','mano');
DEFINE('DB_PASSW','Gaman@2003');
DEFINE('DB_DATA','test');

$dbc = @mysqli_connect(DB_SERVER,DB_USER,DB_PASSW,DB_DATA) or die('Could not connect to MySQL'.mysqli_error());
mysqli_set_charset($dbc,"utf8");

?>