

<?php
require "MyHeader.php"
?>

<?php
// Call this program like: http://your.path.com?MyParam1=asdf&MyParam2=zxcv

$MyValue = "abcdefg";			// Define a variable
echo "<br />" . $MyValue;	// Display variable value

$MyValue = 1 + 2;
echo "<br />" . $MyValue; // Display variable value. Note variable "type" changes

$Param1 = "";
$Param2 = "";
// Is there a "Get" value
if(array_key_exists('MyParam1', $_GET))
{
	// If param exist, get the value
	$Param1 = $_GET['MyParam1'];
	echo "<br /> <br /> Param1 = " . $Param1;
}

// Is there a "Get" value
if(array_key_exists('MyParam2', $_GET))
{
	// If param exist, get the value
	$Param2 = $_GET['MyParam2'];
	echo "<br /> <br /> Param2 = " . $Param2;
}


?>

<br />
<br />
Sample html


<?php
require "MyFooter.php"
?>

