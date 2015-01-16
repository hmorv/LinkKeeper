<?php # Script 9.2 - mysqli_connect.php

// Set the database access information as constants:
DEFINE ('DB_USER', 'hmorv');
DEFINE ('DB_PASSWORD', 'Temporal1352');
DEFINE ('DB_HOST', 'hmorv.db');
DEFINE ('DB_NAME', 'LinkKeeperDB');

// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to
MySQL: ' . mysqli_connect_error( ) );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');
