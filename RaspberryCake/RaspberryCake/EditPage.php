<?php
require "MyHeader.php";

$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);

$id = $params['id'];
$name = $params['name'];
$price = $params['price'];

?>

<body>
    <form action="Edit.php" method="post">
        <input type="hidden" id="Id" name="id" value="<?php echo $id?>" /><br /><br />
        <label id="nameLabel"><h1>Name: </h1></label><br />
        <input type="text" name="name" id="Name" value="<?php echo $name?>" /><br /><br />
        <label id="priceLabel"><h1>Price: </h1></label><br />
        <input type="text" name="price" id="Price" value="<?php echo $price ?> " /><br /><br /><br /><br /><br />
        <p>
            <input type="submit" value="Submit" class="button-85" />
        </p>
    </form>
</body>


<?php
require "MyFooter.php";
?>