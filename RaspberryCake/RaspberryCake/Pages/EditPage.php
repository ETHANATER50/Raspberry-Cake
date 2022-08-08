<?php
include_once "MyHeader.php";

$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);

$id = $params['id'];
$name = $params['name'];
$price = $params['price'];

?>

<!DOCTYPE html>
<html>
<body>
    <form action="../Edit.php" method="post">
        <input type="hidden" id="Id" name="id" value="<?php echo $id?>" />
        <label id="nameLabel">Name: </label><br />
        <input type="text" name="name" id="Name" value="<?php echo $name?>" /><br />
        <label id="priceLabel">Price:</label><br />
        <input type="text" name="price" id="Price" value="<?php echo $price ?> " />
        <p>
            <input type="submit" value="Submit" />
        </p>
    </form>
</body>
</html>


<?php
include_once "MyFooter.php";
?>