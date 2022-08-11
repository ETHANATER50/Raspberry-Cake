

<?php
session_start(); // Must be first, prior to any HTML. Session will expire
$myTitle = "Please Work"
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

<a href="Index.php">Home</a> &nbsp; &nbsp;<a href="jsonMulti.php">Multiple</a>  &nbsp; &nbsp;<a href="jsonSingle.php">Single</a> &nbsp; &nbsp; <a href="Session.php">Style</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href= <?php echo $url?>><?php echo $text?></a>
    <br />
    <br />