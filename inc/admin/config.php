<?php

DEFINE ('DB_USER', 'db487456606');
DEFINE ('DB_PASSWORD', 'hjvlk69a');
DEFINE ('DB_HOST', 'db487456606.db.1and1.com');
DEFINE ('DB_NAME', 'dbo487456606');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to server ' . mysqli_connect_error());
?>