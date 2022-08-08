<?php

DEFINE ('DB_USER', 'phpa');
DEFINE ('DB_PSWD', 'Eivor19*');
DEFINE ('DB_SERVER', '10.10.15.39');
DEFINE ('DB_NAME', 'raspberryBakeryDB');


// $dbConn will contain a resource link to the database
// @ Don't display error
$dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3306)
OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

$Id = $_REQUEST['id'];


$query = "DELETE FROM `Products` WHERE `id`= $Id";
mysqli_query($dbConn, $query);

mysqli_close($dbConn);
?>