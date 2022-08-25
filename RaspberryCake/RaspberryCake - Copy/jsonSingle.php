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

    function shuffle(array) {
        let currentIndex = array.length, randomIndex;

        // While there remain elements to shuffle.
        while (currentIndex != 0) {

            // Pick a remaining element.
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex--;

            // And swap it with the current element.
            [array[currentIndex], array[randomIndex]] = [
                array[randomIndex], array[currentIndex]];
        }

        return array;
    }

    var correctAnswer;
    const answers = [];

    function checkAnswer(string) {
        if (string === correctAnswer) {
            /*add points*/
            console.log('you did it');
        }
        else {
            console.log('you FOOL');
        }
    }
}

        // Run when the data has been loaded
    function loadComplete(evt) {
        var myResponse;
        var myData;
        



        // create a table for display
        //var myReturn = "<table align='center'><tr><td><h1>Name &nbsp;  &nbsp; </h1></td><td><h1>Price &nbsp;  &nbsp; </h1></td></tr>";
        var myReturn = "<table align='center'><tr><td><h1>Question</h1></td></tr><tr><td><h2>What is...<h2></td></tr>"

        myResponse = request.responseText;
        //alert("A: " + myResponse); // Use for debug
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
        myData = JSON.parse(myResponse);

        // Loop through each json record and create the HTML
        for (let i = 4; i < 8; i++) {
            //myReturn += "<tr><td><h1>" + myData[index].Name + "</h1></td><td><h1> $" +
            //    myData[index].Price + "</h1></td></tr>";
            if (i = 4) {
                correctAnswer = myData[i];
            }
            answers.push(myData[i]);
        }

        shuffle(answers);

        myReturn += "<tr><td><button onclick='checkAnswer(this.value)'>" + answers[0] + "</button></td><td><button onclick='checkAnswer(this.value)'>" + answers[1] + "</button></td></tr><tr><td><button onclick='checkAnswer(this.value)'>" + answers[2] + "</button></td><td><button onclick='checkAnswer(this.value)'>" + answers[3] + "</button></td></tr></table > ";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
    }


</script>
</div>

<?php
include_once "MyFooter.php";
?>