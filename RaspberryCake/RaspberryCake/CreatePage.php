<?php
include_once "MyHeader.php";
?>

<body>
    <form action="insert.php" method="post"><br /><br />
        <label id="nameLabel"><h1>Name: </h1></label><br />
        <input type="text" name="name" id="Name" /><br /><br />
        <label id="priceLabel"><h1>Price:</h1></label><br />
        <input type="text" name="price" id="Price" /><br /><br /><br /><br /><br />
        <p>
            <input type="submit" value="Submit" class="button-85" />
        </p>
    </form>
</body>


<?php
include_once "MyFooter.php";
?>