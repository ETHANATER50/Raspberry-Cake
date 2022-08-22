<?php
require "MyHeader.php";

$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);

$id = $params['id'];
?>

<body>
    <h1>Are you sure you want to delete this product?</h1><br /><br />
    <form action="Delete.php" method="post">
        <input type="hidden" id="Id" name="id" value="<?php echo $id?>" />
        <p>
            <input type="submit" value="Delete" class="button-85" />
        </p>
    </form>
    <button onclick="window.location.href='jsonMulti.php'" class="button-85">Back</button>
</body>

<?php
require "MyFooter.php";
?>