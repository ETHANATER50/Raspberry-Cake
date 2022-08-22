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
        
        var randomFacts;
        var lifeFacts;
        var whyBrysonIsShort;
        var splatoonLore;
        var jeopardy;

        for (index in myData) {
            console.log(myData[index]);
            switch (myData[index].Category) {
                case "Random Facts":
                    randomFacts.push(myData[index]);
                    break;
                case "Life Facts":
                    lifeFacts.push(myData[index]);
                    break;
                case "Why Bryson Is Short":
                    whyBrysonIsShort.push(myData[index]);
                    break;
                case "Splatoon Lore":
                    splatoonLore.push(myData[index]);
                    break;
                case "Jeopardy":
                    jeopardy.push(myData[index]);
                    break;
            }
        }

        for (index in randomFacts) {
            myReturn += "<tr><td><h1>" + randomFacts[index].Category + "</h1></td><td><h1>" +
            randomFacts[index].Score + "</h1></td></tr>";
        }
        for (index in lifeFacts) {
            myReturn += "<tr><td><h1>" + lifeFacts[index].Category + "</h1></td><td><h1>" +
            lifeFacts[index].Score + "</h1></td></tr>";
        }
        for (index in whyBrysonIsShort) {
            myReturn += "<tr><td><h1>" + whyBrysonIsShort[index].Category + "</h1></td><td><h1>" +
            whyBrysonIsShort[index].Score + "</h1></td></tr>";
        }
        for (index in splatoonLore) {
            myReturn += "<tr><td><h1>" + splatoonLore[index].Category + "</h1></td><td><h1>" +
            splatoonLore[index].Score + "</h1></td></tr>";
        }
        for (index in jeopardy) {
            myReturn += "<tr><td><h1>" + jeopardy[index].Category + "</h1></td><td><h1>" +
            jeopardy[index].Score + "</h1></td></tr>";
        }
        myReturn += "</table>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
}

</script>
</div>

<?php
include_once "MyFooter.php";
?>

