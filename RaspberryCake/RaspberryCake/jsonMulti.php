<?php
include_once "MyHeader.php";
session_start();
?>

<?php
$myVar = "food";
?>

<p id="CreateId"></p>
<script>
        <?php
        session_start();
        ?>
    var isAdmin = "<?php echo $_SESSION['valid'] ? true : false?>";
    var Return = "";
    if (isAdmin) {
        Return = "<a href='Pages/CreatePage.php'>Create New Product</a> &nbsp; &nbsp";
        document.getElementById("CreateId").innerHTML = Return;
    }
</script>


<p id="A"></p>
<p id="B"></p>

<p id="jsonData"></p>

<script>


    var request = new XMLHttpRequest();
    loadJson();
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
        

        if (isAdmin == true)
        {
            for (index in myData) {
                console.log(myData[index]);
                myReturn += "<tr><td>" + myData[index].jName + "</td><td>" +
                    myData[index].jPrice + "</td> <td> <a href='Pages/EditPage.php?id=" +
                    myData[index].jId + "&name=" + myData[index].jName + "&price=" + myData[index].jPrice + "'>Edit</a> </td> <td> <a href='Pages/DeletePage.php?id=" +
                    myData[index].jId + "'>Delete</a> </td> <td> <a href='jsonSingle.php?id=" +
                    myData[index].jId + "'>View</a></td>  </tr>";

            }
        }
        else
        {
            for (index in myData) {
            console.log(myData[index]);
            myReturn += "<tr><td>" + myData[index].jName + "</td><td>" +
                myData[index].jPrice + "</td> <td> <a href='Pages/EditPage.php?id=" +
                myData[index].jId + "&name=" + myData[index].jName + "&price=" + myData[index].jPrice + "'> </td> <td> <a href='jsonSingle.php?id=" +
                myData[index].jId + "'>View</a></td>  </tr>";

            }
        }
        myReturn += "</table>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
}

</script>

<?php
include_once "MyFooter.php";
?>

