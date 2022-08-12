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
<br />
<br />
<button onclick="window.location.href='Session.php?style=Dark'" class="button-85">Dark Mode</button>
<br />
<br />
<button onclick="window.location.href='Session.php?style=Light'" class="button-85">Light Mode</button>
<br />
<br />
<button onclick="window.location.href='Session.php?style=Bright'" class="button-85">Bright Mode</button>
<br />
<br />

<?php
require "MyFooter.php";
?>
