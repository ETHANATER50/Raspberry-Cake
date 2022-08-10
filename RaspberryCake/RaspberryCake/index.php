<?php
require "MyHeader.php";
?>


<br />
<!DOCTYPE html>
<html>

<?php
$stylesheet =  'Light';

function ClickDark() {
    echo $stylesheet = 'Dark';
}
function ClickLight() {
    echo $stylesheet = 'Light';
}
function ClickBright() {
    echo $stylesheet = 'Bright';
}

switch($stylesheet) {
    case 'Bright':
        $style = "Styles/HighlighterMode.css";
        break;
    case 'Dark':
        $style = "Styles/DarkMode.css";
        break;
    case 'Light':
        $style = "Styles/LightMode.css";
        break;
    default:
        $style = "Styles/LightMode.css";
        break;
}
echo '<link rel="stylesheet" type="text/css" href="'.$style.'">';
?>
    <head>
        <!--<link rel="stylesheet" href=/>-->
    </head>
    <body>
        <div>
            <input type="button" value="Dark" onclick="ClickDark()" />
            <input type="button" value="Light" onclick="ClickLight()" />
            <input type="button" value="Pain" onclick="ClickBright()" />
        </div>
        <div id="body">
            <h1>This is sample text untill I get creative and figure out what I want to actutally write but untill then here is Cave Johnson''s lemon rant.</h1>
            <img src="Images/1.png" alt="2" id="image"/>
            <p>
                All right, I've been thinking, when life gives you lemons, don't make lemonade! Make life take the lemons back! Get mad! I don't want your damn lemons! What am I supposed to do with these? Demand to see life's manager!
                Make life rue the day it thought it could give Cave Johnson lemons! Do you know who I am? I'm the man whose gonna burn your house down - with the lemons!
            </p>
    </div>
    </body>
</html>

<?php
require "MyFooter.php";
?>
