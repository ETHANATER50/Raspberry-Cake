

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
<a href="Index.php">Home</a> &nbsp; &nbsp;<a href="jsonMulti.php">Multiple</a>  &nbsp; &nbsp;<a href="jsonSingle.php">Single</a>
    <a href="/Pages/DeletePage.php">dleete</a>
<?php
if ($_SESSION["isAdmin"] == 1) {
    echo '  &nbsp; &nbsp;<a href="ManagePages.php">Manage Pages</a>';
}

?>
<br />
<br />


</body>
</html>
