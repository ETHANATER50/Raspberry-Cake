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
        console.log("Hit load json");
        // alert("id: " + id); // Use for debugging
        request.open('GET', 'apiSqlQuery.php?id=' + id);
        request.onload=loadComplete;
        request.send();
    }

    function shuffle(array) {
        console.log("Shuffled Array");
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
        console.log("Correct Answer: " + correctAnswer);
        console.log("Given Answer: " + string);
        if (string === correctAnswer) {
            /*add points*/
            console.log('you did it');
            location.href = "jsonMulti.php";
        }
        else {
            console.log('you FOOL');
        }
    }

        // Run when the data has been loaded
    function loadComplete(evt) {
        console.log("Hit load complete");
        var myResponse;
        var myData;
        



        // create a table for display
        //var myReturn = "<table align='center'><tr><td><h1>Name &nbsp;  &nbsp; </h1></td><td><h1>Price &nbsp;  &nbsp; </h1></td></tr>";
        var myReturn = "<table align='center'><tr><td><h1>Question</h1></td></tr><tr><td><h2>What is...<h2></td></tr>"

        myResponse = request.responseText;
        console.log("After setting my response");
        //alert("A: " + myResponse); // Use for debug
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
        myData = JSON.parse(myResponse);
        console.log("After setting my data");
        correctAnswer = myData[0].CorrectAnswer;
        answers.push(myData[0].CorrectAnswer);
        answers.push(myData[0].IncorrectAnswer1);
        answers.push(myData[0].IncorrectAnswer2);
        answers.push(myData[0].IncorrectAnswer3);
        shuffle(answers);

        myReturn += "<tr><td><button value='" + answers[0] + "' onclick='checkAnswer(this.value)'>" + answers[0] + "</button></td><td><button value='" + answers[1] + "' onclick='checkAnswer(this.value)'>" + answers[1] + "</button></td></tr><tr><td><button value='" + answers[2] + "' onclick='checkAnswer(this.value)'>" + answers[2] + "</button></td><td><button value='" + answers[3] + "' onclick='checkAnswer(this.value)'>" + answers[3] + "</button></td></tr></table > ";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
    }


</script>
</div>

<?php
include_once "MyFooter.php";
?>