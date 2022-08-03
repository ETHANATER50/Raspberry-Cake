<?php
include_once "MyUtil.php";
?>


<?php
require "MyHeader.php";
?>

<?php

# add vars

// Define variables
$myButtonValue = "";


// If the button value exists, get the value
if(array_key_exists('myButton', $_POST))
{
        echo "<br />"; // Display a line break

        // Get button value
        $myButtonValue = $_POST['myButton'];
        //
        switch ($myButtonValue)
		{
			case "1":
                echo "Button 1 clicked";
                break;
			case "2":
                echo "Button 2 clicked";
                break;
			default:
                echo "Unknown button";
                break;
		}
        echo "<br />"; // Display a line break
}

?>

<!-- Add table for calulator -->

<!-- Add form -->
<form method="post" action="PostSample.php">

    <!-- Add hidden number -->

    <input type="hidden" name="MyHiddenValue" value="<?php echo $myButtonValue ?>" />

    <?php WriteButton("myButton", "1", "Sample button 1");   ?>
    <br />
    <?php WriteButton("myButton", "2", "Sample button 2");   ?>


</form>


<?php
require "MyFooter.php"
?>

