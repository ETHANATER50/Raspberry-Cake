

<?php
include_once "dbConnector.php";

header('Content-Type: application/json');

$myJSON = "";
$row = null;
$myGet = "";

// Process if there is a parameter (id)
if (array_key_exists("id", $_GET) == TRUE)
{
    // Get the db connection
    // Get the data
    $myDbConn = ConnGet();
    $myGet = $_GET["id"];
    // Get the records
    $dataSet = MyJoinWhereGet($myDbConn, $myGet);

    // If the data exists, format the values
    if ($dataSet){
        // $myJSON = "[";
        if($row = mysqli_fetch_array($dataSet)) {
            $myJSON = '[{"Id":"' . $row['id'] . '","Name":"' . $row['Name'] . '","Price":"' . $row['Price'] . '"]}';
        }
    }
    mysqli_close($myDbConn);
}

echo $myJSON;

?>


