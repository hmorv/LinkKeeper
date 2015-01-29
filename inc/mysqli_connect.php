<?php
DEFINE ('DB_USER', 'hmorv');
DEFINE ('DB_PASSWORD','Temporal1352');
DEFINE ('DB_HOST','hmorv.db');
DEFINE ('DB_NAME','LinkKeeperDB');
$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('Couldn\'t connect to MySQL: ' . mysqli_connect_error());

//encoding
mysqli_set_charset($dbc,'utf8');



?>