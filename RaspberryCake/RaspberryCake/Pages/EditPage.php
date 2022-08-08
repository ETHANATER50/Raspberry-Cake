<?php
include_once "MyHeader.php";
?>

<!DOCTYPE html>
<html>
<body>
    <form action="../Edit.php" method="post">
        <label id="nameLabel">Name: </label><br />
        <input type="text" name="name" id="Name" /><br />
        <label id="priceLabel">Price:</label><br />
        <input type="text" name="price" id="Price" />
        <p>
            <input type="submit" value="Submit" />
        </p>
    </form>
</body>
</html>


<?php
include_once "MyFooter.php";
?>