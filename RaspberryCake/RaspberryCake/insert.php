<?php

include_once "MyHeader.php";

DEFINE ('DB_USER', 'phpa');
DEFINE ('DB_PSWD', 'Eivor19*');
DEFINE ('DB_SERVER', '10.0.115.12');
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


<h1>Product Successfully Created!</h1>
<button onclick="window.location.href='/jsonMulti.php'">Return To Main Page</button>

<?php
include_once "MyFooter.php";
?>