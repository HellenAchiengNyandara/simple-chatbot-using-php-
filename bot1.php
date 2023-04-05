<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chatbot</title>
    <link rel="stylesheet" href="bot.css">
    <marquee>Helenaz</marquee>
</head>

<body bgcolor="aquablue">
    <div id="bot">
        <div id="container">
            <div id="header">
                 CHATBOT
            </div>
            <div id="body">
                <!-- This section will be dynamically inserted from JavaScript -->
                <div class="userSection">
                    <div class="messages user-message">
                    </div>
                    <div class="seperator"></div>
                </div>
                <div class="botSection">
                    <div class="messages bot-reply">
                    </div>
                    <div class="seperator"></div>
                </div>
            </div>
            <div id="inputArea">
                <input type="text" name="messages" id="userInput" placeholder="Please enter your message here" required>
                <input type="submit" id="send" value="Send">
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.querySelector("#send").addEventListener("click", async () => {
            let xhr = new XMLHttpRequest();
            var userMessage = document.querySelector("#userInput").value
            let userHtml = '<div class="userSection">' + '<div class="messages user-message">' + userMessage + '</div>' +
                '<div class="seperator"></div>' + '</div>'
            document.querySelector('#body').innerHTML += userHtml;
            xhr.open("POST", "query.php");
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send(`messageValue=${userMessage}`);
            xhr.onload = function() {
                let botHtml = '<div class="botSection">' + '<div class="messages bot-reply">' + this.responseText + '</div>' +
                    '<div class="seperator"></div>' + '</div>'

                document.querySelector('#body').innerHTML += botHtml;
            }
        })
    </script>
    <?php

    /* Establishes a connection with the database. The first argument is the server name, the second is the username for the database, the third is the password (blank for me) and the final is the database name 
*/
    $conn = mysqli_connect("localhost", "root", "", "onlinechatbot");

    // If the connection is established successfully
    if ($conn) {
        // Get the user's message from the request object and escape characters
        $user_messages = mysql_real_escape_string($conn, $_POST['messageValue']);

        // create SQL query for retrieving the corresponding reply
        $query = "SELECT * FROM chatbot WHERE messages LIKE '%$user_messages%'";

        // Execute query on the connected database using the SQL query
        $makeQuery = mysql_query($conn, $query);

        if (mysql_num_rows($makeQuery) > 0) {

            // Get the result
            $result = mysql_fetch_assoc($makeQuery);

            // Echo only the response column
            echo $result['response'];
        } else {

            // Otherwise, echo this message
            echo "Sorry, I can't understand you.";
        }
    } else {

        // If the connection fails to establish, echo an error message
        echo "Connection failed" . mysql_connect_errno();
    }
    ?>
</body>

</html>