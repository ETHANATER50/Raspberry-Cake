

<?php
session_start(); // Must be first, prior to any HTML. Session will expire
$myTitle = "Raspberry Bakery"
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>
<body>

<h1><?php echo $MyHeader ?></h1>

<br />
    
<?php
$url = "";
$text = "";
session_start();
if($_SESSION['valid'] == true){
    $url = "Logout.php";
    $text = "Logout";
}
else{
    $url = "Login.php";
    $text = "Login";
}

switch($_SESSION['stylesheet']) {
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
    <!--Yes the tons of &nbsp; is a joke we decided to keep in. We know there is a better way to do it.-->
<button onclick="window.location.href='Index.php'" class="button-85">Jeopardy Home</button> &nbsp; &nbsp;<button onclick="window.location.href='jsonMulti.php'" class="button-85">Game</button>
    <br />
    <br />