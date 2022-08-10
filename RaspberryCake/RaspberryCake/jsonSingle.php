<?php
include_once "MyHeader.php";
?>

    Input a person index (int): &nbsp;
    <input type="text" id="id" value="1"/>
    <button name="a" onclick="myClickEvent()">Submit</button>
<input type="submit" name="sgs" value="Click me" />
<p id="A"></p>
<p id="jsonData"></p>

<script>
   var request = new XMLHttpRequest();
    // ---------------------------------
    // Click event
    function myClickEvent() {
         // alert("my click"); // Use for debugging
        // alert("data: " + document.getElementById("personId").value); // Use for debugging

        loadJson(document.getElementById("id").value);
    }
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
include_once "MyFooter.php";
?>