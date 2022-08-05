<?php
include_once "MyHeader.php";


DEFINE ('DB_USER', 'phpa');
DEFINE ('DB_PSWD', 'Eivor19*');
DEFINE ('DB_SERVER', 'localhost');
DEFINE ('DB_NAME', 'raspberryBakeryDB');

function ConnGet() {
    // $dbConn will contain a resource link to the database
    // @ Don't display error
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3308)
    OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

    return $dbConn;
}

// Return number of records changed
function EditProduct($dbConn, $Id, $Name) {

    $query = "update product = '" . $Name . "' where id=" . $Id;

    $result = mysqli_query($dbConn, $query);
    $rows = $dbConn->affected_rows;

    if ($result == true) {
        return $rows;
    }
    else  {
        echo mysqli_error($dbConn);
        return false;
    }

}
?>


<?php
include_once "MyFooter.php";
?>