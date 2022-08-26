<?php

// Create constants
//DEFINE ('DB_USER', 'MyUser');
//DEFINE ('DB_PSWD', 'talasIV');
DEFINE ('DB_USER', 'phpa');
DEFINE ('DB_PSWD', 'Eivor19*');
DEFINE ('DB_SERVER', '10.0.0.12');
DEFINE ('DB_NAME', 'raspberryJeopardy');

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

    $query = "SELECT que.Category, que.Question, que.Score,
             que.CorrectAnswer, que.IncorrectAnswer1, que.IncorrectAnswer2,
             que.IncorrectAnswer3
   FROM Question que
    where que.id = " . $id . " limit 1;";

    return @mysqli_query($dbConn, $query);
}
// ///////////////////////////////////////////////////
// Get all the records as a json objects
function MyJoinJsonGet($dbConn) {

    $query = "SELECT JSON_OBJECT(
        'jId', que.Id,
        'jCategory', que.Category,
        'jScore', que.Score,
        'jCorrectAnswer', que.CorrectAnswer,
        'jIncorrectAnswer1', que.IncorrectAnswer1,
        'jIncorrectAnswer2', que.IncorrectAnswer2,
        'jIncorrectAnswer3', que.IncorrectAnswer3,
        'jImageLink', que.imageLink) as Json1
        FROM Question que;";

    return @mysqli_query($dbConn, $query);
}

?>


