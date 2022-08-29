<?php
include_once "MyHeader.php";
session_start();
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
</script>
<br />

<div id="body">
<p id="A"></p>
<p id="B"></p>

<!--Player score goes here-->
<h1>
    Score: <?php echo $_SESSION['score']?>
</h1>

<p id="jsonData"></p>
<!--<button onclick='resetScore(true)'>Reset</button>-->


<script>


    var request = new XMLHttpRequest();
    loadJson();
    // Call the microservice and get the data
    function loadJson() {
        request.open('GET', 'apiJsonQuery.php');
        request.onload = loadComplete;
        request.send();
    }

    function resetScore(bool) {
        //$_SESSION['score'] = 0;
        //location.href = "jsonMulti.php";
    }

    // Run when the data has been loaded
    function loadComplete(evt) {

        var myResponse;
        var myData;
        // create a table for display
        var myReturn = "<table align='center'><tr>";


        myResponse = request.responseText;   
        //alert("A: " + myResponse); // Use for debug
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
        myData = JSON.parse(myResponse);

        // Loop through each json record and create the HTML
        
        var randomFacts = [];
        var lifeFacts = [];
        var whyBrysonIsShort = [];
        var splatoonLore = [];
        var jeopardy = [];

        for (index in myData) {
            switch (myData[index].jCategory) {
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

        myReturn += "<tr><td><h1>Random Facts</h1></td>";
        myReturn += "<td><h1>Life Facts</h1></td>";
        myReturn += "<td><h1>Why Bryson Is Short</h1></td>";
        myReturn += "<td><h1>Splatoon Lore</h1></td>";
        myReturn += "<td><h1>Jeopardy</h1></td></tr>";
        for (var i = 0; i < randomFacts.length; i++) {
            myReturn += "<tr><td><h1><a href='jsonSingle.php?id=" + randomFacts[i].jId + "&score=" + randomFacts[i].jScore + "'>" + randomFacts[i].jScore + "</a></h1></td>";
            myReturn += "<td><h1><a href='jsonSingle.php?id=" + lifeFacts[i].jId + "&score=" + lifeFacts[i].jScore + "'>" + lifeFacts[i].jScore + "</a></h1></td>";
            myReturn += "<td><h1><a href='jsonSingle.php?id=" + whyBrysonIsShort[i].jId + "&score=" + whyBrysonIsShort[i].jScore + "'>" + whyBrysonIsShort[i].jScore + "</a></h1></td>";
            myReturn += "<td><h1><a href='jsonSingle.php?id=" + splatoonLore[i].jId + "&score=" + splatoonLore[i].jScore + "'>" + splatoonLore[i].jScore + "</a></h1></td>";
                myReturn += "<td><h1><a href='jsonSingle.php?id=" + myData[i].jId + "&score=" + jeopardy[i].jScore +  "'>" + jeopardy[i].jScore + "</a></h1></td></tr>";
        }
        //for (index in randomFacts) {
        //    myReturn += "<td><h1><a href='jsonSingle.php?id=" + randomFacts[index].jId + "&score=" + randomFacts[index].jScore + "'>" + randomFacts[index].jScore + "</a></h1></td>";
        //}
        //for (index in lifeFacts) {
        //    myReturn += "<tr><td><h1><a href='jsonSingle.php?id=" + lifeFacts[index].jId + "&score=" + lifeFacts[index].jScore + "'>" + lifeFacts[index].jScore + "</a></h1></td>";
        //}
        //for (index in whyBrysonIsShort) {
        //    myReturn += "<td><h1><a href='jsonSingle.php?id=" + whyBrysonIsShort[index].jId + "&score=" + whyBrysonIsShort[index].jScore + "'>" + whyBrysonIsShort[index].jScore + "</a></h1></td>";
        //}
        //for (index in splatoonLore) {
        //    myReturn += "<td><h1><a href='jsonSingle.php?id=" + splatoonLore[index].jId + "&score=" + splatoonLore[index].jScore + "'>" + splatoonLore[index].jScore + "</a></h1></td>";
        //}
        //for (index in jeopardy) {
        //    myReturn += "<td><h1><a href='jsonSingle.php?id=" + myData[index].jId + "&score=" + jeopardy[index].jScore +  "'>" + jeopardy[index].jScore + "</a></h1></td>";
        //}
        myReturn += "</tr></table>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
        console.log(document.getElementById("jsonData").innerHTML);
}

</script>
</div>

<?php
include_once "MyFooter.php";
?>

