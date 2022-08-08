<?php
include_once "MyHeader.php";
?>

<?php
$myVar = "food";
?>

<button name="a" onclick="myClickEvent()">Submit</button>

<a href="Pages/CreatePage.php">Create</a> &nbsp; &nbsp;

<p id="A"></p>
<p id="B"></p>

<p id="jsonData"></p>

<script>


    var request = new XMLHttpRequest();

    function myClickEvent() {
        // alert("my click"); // Use for debugging
        // alert("data: " + document.getElementById("personId").value); // Use for debugging

        loadJson();
    }
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
            console.log(myData[index]);
            myReturn += "<tr><td>" + myData[index].jName + "</td><td>" +
                myData[index].jPrice + "</td> <td> <a href='Pages/EditPage.php?id=" +
                myData[index].jId + "'>Edit</a> </td> <td> <a href='Pages/DeletePage.php?id=" +
                myData[index].jId + "'>Delete</a> </td>  </tr>";

        }
        myReturn += "</table>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
}

</script>

<?php
include_once "MyFooter.php";
?>

