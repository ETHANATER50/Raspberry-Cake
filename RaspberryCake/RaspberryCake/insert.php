<?php


DEFINE ('DB_USER', 'phpa');
DEFINE ('DB_PSWD', 'Eivor19*');
DEFINE ('DB_SERVER', '10.0.0.12');
DEFINE ('DB_NAME', 'raspberryBakeryDB');


// $dbConn will contain a resource link to the database
// @ Don't display error
$dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3306)
OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

$name = $_REQUEST['name'];
$price = $_REQUEST['price'];

$query = "INSERT INTO Products (Name, Price) VALUES ('$name', '$price')";
mysqli_query($dbConn, $query);

mysqli_close($dbConn);
?>