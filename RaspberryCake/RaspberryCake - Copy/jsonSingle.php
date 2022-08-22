<?php
include_once "MyHeader.php";
?>
<div id="body">
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
        var myReturn = "<table align='center'><tr><td><h1>Name &nbsp;  &nbsp; </h1></td><td><h1>Price &nbsp;  &nbsp; </h1></td></tr>";

        myResponse = request.responseText;
        //alert("A: " + myResponse); // Use for debug
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
        myData = JSON.parse(myResponse);

        // Loop through each json record and create the HTML
        for (index in myData) {
            myReturn += "<tr><td><h1>" + myData[index].Name + "</h1></td><td><h1> $" +
                myData[index].Price + "</h1></td></tr>";

        }
        myReturn += "</table>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
    }


</script>
</div>
<h1>"Want to purchase this product? Check out our contact page and place an order with us!"</h1>

<?php
include_once "MyFooter.php";
?>