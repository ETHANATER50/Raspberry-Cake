<?php
session_start();
$_SESSION["valid"] = false;

header("Refresh: 0; url=index.php");
?>