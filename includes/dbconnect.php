
<?php
//connection to database
//LOCAL
define ('DB_HOST', 'localhost');
define ('DB_USER', 'root');
define ('DB_PASS', '');
define ('DB_NAME', 'ewt');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) OR die('SQL Connection Error: '.mysqli_connect_error());

?>
