<?php
include_once "MyHeader.php";
?>

<?php
$myVar = "food";
?>

<p id="A"></p>
<p id="B"></p>

<p id="jsonData"></p>

<script>

    var request = new XMLHttpRequest();

// Don't run until the page is loaded and ready
    $(document).ready(function () {
    // alert("Ready");

    loadJson();
    });

    // Call the microservice and get the data
    function loadJson() {
        request.open('GET', 'apiJsonQuery.php');
        request.onload = loadComplete;
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
            myReturn += "<tr><td>" + myData[index].jName + "</td><td>" +
                myData[index].jPrice + "</td><td>";

        }
        myReturn += "</table>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
}

</script>

<?php
include_once "MyFooter.php";
?>

