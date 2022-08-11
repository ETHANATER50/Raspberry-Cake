<?php
session_start();

if(array_key_exists("style", $_GET)==true)
{
    $style = $_GET["style"];
    switch($style)
    {
        case "Dark":
            $_SESSION['stylesheet'] = "Dark";
            break;
        case "Light":
            $_SESSION['stylesheet'] = "Light";
            break;
        case "Bright":
            $_SESSION['stylesheet'] = "Bright";
            break;
        default:
            $_SESSION['stylesheet'] = "Light";
            break;
    }
}
require "MyHeader.php";
?>
<a href="Session.php?style=Dark">Dark</a>
<br />
<a href="Session.php?style=Light">Light</a>
<br />
<a href="Session.php?style=Bright">Bright</a>
<br />

<?php
require "MyFooter.php";
?>
