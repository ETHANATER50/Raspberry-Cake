<?php
include_once "MyHeader.php";
session_start();
?>

<?php
$myVar = "food";
?>
<br />
<br />
<p id="CreateId"></p>
<script>
        <?php
        session_start();
        ?>
    var isAdmin = "<?php echo $_SESSION['valid'] ? true : false?>";
    var Return = "";
    if (isAdmin) {
        Return = "<a href='CreatePage.php' class='button-85'>Create New Product</a> &nbsp; &nbsp";
        document.getElementById("CreateId").innerHTML = Return;
    }
</script>
<br />

<div id="body">
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
        var myReturn = "<table align='center'><tr><td><h1>Name</h1> &nbsp;  &nbsp; </td><td><h1>Price</h1> &nbsp;  &nbsp; </td></tr>";


        myResponse = request.responseText;   
        //alert("A: " + myResponse); // Use for debug
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
        myData = JSON.parse(myResponse);

        // Loop through each json record and create the HTML
        

        if (isAdmin == true)
        {
            for (index in myData) {
                console.log(myData[index]);
                myReturn += "<tr><td><h1>" + myData[index].jName + "</h1></td><td><h1>$" +
                    myData[index].jPrice + "</h1></td> <td><h1>&nbsp;  &nbsp;</h1></td> <td> <a href='EditPage.php?id=" +
                    myData[index].jId + "&name=" + myData[index].jName + "&price=" + myData[index].jPrice + "' class='button-85'>Edit</a> </td> <td> <a href='DeletePage.php?id=" +
                    myData[index].jId + "' class='button-85'>Delete</a> </td> <td> <a href='jsonSingle.php?id=" +
                    myData[index].jId + "' class='button-85'>View</a> <br /> <br /> </td>  </tr>";


            }
        }
        else
        {
            for (index in myData) {
            console.log(myData[index]);
            myReturn += "<tr><td><h1>" + myData[index].jName + "</h1></td><td><h1>$" +
                myData[index].jPrice + "</h1></td> <td><h1>&nbsp;  &nbsp;</h1></td> <td><a href='jsonSingle.php?id=" +
                myData[index].jId + "' class='button-85'>View</a> <br /> <br /> </td>  </tr>";

            }
        }
        myReturn += "</table>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
}

</script>
</div>

<?php
include_once "MyFooter.php";
?>

