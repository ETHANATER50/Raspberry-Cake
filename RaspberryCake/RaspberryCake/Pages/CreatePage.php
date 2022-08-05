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

function AddProduct($dbConn, $Name, $Price) {
    $query = "INSERT INTO products (Name, Price) VALUES (?, ?)";
    $prep = mysqli_prepare($dbConn, $query);

    // Data format
    //    i Integers
    //    d Doubles
    //    b Blobs
    //    s Everything Else
    mysqli_stmt_bind_param($prep, "ss", $Name, $Price);

    mysqli_stmt_execute($prep);

    $affected_rows = mysqli_stmt_affected_rows($prep);
    mysqli_stmt_close($prep);

    return $affected_rows;
}
?>


<?php
include_once "MyFooter.php";
?>