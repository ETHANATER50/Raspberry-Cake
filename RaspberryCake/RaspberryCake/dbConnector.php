<?php

// Create constants
//DEFINE ('DB_USER', 'MyUser');
//DEFINE ('DB_PSWD', 'talasIV');
DEFINE ('DB_USER', 'phpa');
DEFINE ('DB_PSWD', 'Eivor19*');
DEFINE ('DB_SERVER', '10.10.15.44');
DEFINE ('DB_NAME', 'raspberryBakeryDB');

// ///////////////////////////////////////////////////
// Get db connection
function ConnGet() {
    // $dbConn will contain a resource link to the database
    // @ Don't display error
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3306)
    OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

    return $dbConn;
}
// ///////////////////////////////////////////////////
// Get one record
function MyJoinWhereGet($dbConn, $id) {

    $query = "SELECT pro.Name, pro.Price
   FROM Products pro
    where pro.id = " . $id . " limit 1;";

    return @mysqli_query($dbConn, $query);
}
// ///////////////////////////////////////////////////
// Get all the records as a json objects
function MyJoinJsonGet($dbConn) {

    $query = "SELECT JSON_OBJECT(
        'jId', pro.Id,
        'jName', pro.Name,
        'jPrice', pro.Price) as Json1
        FROM Products pro;";

    return @mysqli_query($dbConn, $query);
}

?>


