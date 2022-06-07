<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '10.0.0.24');
define('DB_USERNAME', 'reader');
define('DB_PASSWORD', 'Notr00t1');
define('DB_NAME', 'ContainerDemo');
$site_title = "Happy Cars";
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>