<?php
include_once "MyHeader.php";

$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);

$id = $params['id'];
?>

<!DOCTYPE html>
<html>
<body>
    <h1>Are you sure you want to delete this product?</h1>
    <form action="../Delete.php" method="post">
        <input type="hidden" id="Id" name="id" value="<?php echo $id?>" />
        <p>
            <input type="submit" value="Delete" />
        </p>
    </form>
    <button onclick="window.location.href='/jsonMulti.php'">Back</button>
</body>
</html>

<?php
include_once "MyFooter.php";
?>