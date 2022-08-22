<?php
require "MyHeader.php";
?>

<?php
include_once "SamplePersonClass.php";
include_once "SampleStudentClass.php";

$Person1 = new SamplePersonClass();
$Person1->FirstName = "Arch";
$Person1->LastName= "Stanton";
echo "<br /> Person current age is: " . $Person1->HaveBirthday();

// Note Age is not available

var_dump($Person1);
echo "<br />";
echo "<br />";

$Student1 = new SampleStudentClass();
$Student1->FirstName = "Dave";
$Student1->LastName = "Bowman";
$Student1->GPA = "3.99";

var_dump($Student1);

?>


<?php
require "MyFooter.php>"
?>