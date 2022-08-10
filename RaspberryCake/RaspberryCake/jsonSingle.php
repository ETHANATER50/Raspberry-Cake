<?php
include_once "MyHeader.php";
?>

<p id="A"></p>
<p id="jsonData"></p>

<script>
    <?php
    $url = $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);

    $id = $params['id'];
    ?>

   var request = new XMLHttpRequest();
    // ---------------------------------
    // Click event
         // alert("my click"); // Use for debugging
        // alert("data: " + document.getElementById("personId").value); // Use for debugging

    loadJson(<?php echo $id ?>);
    // ---------------------------------
            // Call the microservice and get the data
    function loadJson(id) {
        // alert("id: " + id); // Use for debugging
        request.open('GET', 'apiSqlQuery.php?id=' + id);
        request.onload=loadComplete;
        request.send();
    }

        // Run when the data has been loaded
    function loadComplete(evt) {
        var myResponse;
        var myData;
        // create a table for display
        var myReturn = "<table><tr><td>Name &nbsp;  &nbsp; </td><td>Price &nbsp;  &nbsp; </td></tr>";

        myResponse = request.responseText;
        //alert("A: " + myResponse); // Use for debug
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
        myData = JSON.parse(myResponse);

        // Loop through each json record and create the HTML
        for (index in myData) {
            myReturn += "<tr><td>" + myData[index].Name + "</td><td> $" +
                myData[index].Price + "</td></tr>";

        }
        myReturn += "</table>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
    }


</script>

<?php
echo "Want to purchase this product? Check out our contact page and place an order with us!";
include_once "MyFooter.php";
?>