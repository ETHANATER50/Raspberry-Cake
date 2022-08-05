<!--<!DOCTYPE html>
<html lang="en">
<head>
  <meta content="text/html; charset=ISO-8859-1"  http-equiv="content-type">
  <title>My Title</title>-->
  <!-- link rel="stylesheet" type="text/css"  href="/MyStyle.css" -->
<!--</head>
<body>


<h1>Put site menus here</h1>
    <br />
    <a href="GetSample.php?MyParam1=12345&MyParam2=xyz">Get Sample</a> &nbsp; &nbsp;<a href="PostSample.php">Post Sample</a> &nbsp; &nbsp;<a href="ClassSample.php">Class Sample</a>
    <br />-->

<?php
session_start(); // Must be first, prior to any HTML. Session will expire
$myTitle = "Please Work"
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta content="text/html; charset=ISO-8859-1"  http-equiv="content-type">
  <title><?php echo $myTitle ?></title>

    <!--         -->

        <script src="/Scripts/jquery-ui-1.11.1.Redmond/jquery.js"></script>
        <script src="/Scripts/jquery-ui-1.11.1.Redmond/jquery-ui.js"></script>
        <link href="/Scripts/jquery-ui-1.11.1.Redmond/jquery-ui.css" rel="stylesheet" />

    <!-- 
  <link rel="stylesheet" type="text/css"  href="/MyStyle.php">
    -->
</head>
<body>

<h1><?php echo $MyHeader ?></h1>

<br />
<a href="Index.php">Home</a> &nbsp; &nbsp;<a href="jsonMulti.php">Multiple</a>  &nbsp; &nbsp;<a href="jsonSingle.php">Single</a>

<?php
if ($_SESSION["isAdmin"] == 1) {
    echo '  &nbsp; &nbsp;<a href="ManagePages.php">Manage Pages</a>';
}

?>
<br />
<br />


</body>
</html>
