<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="bot">
        <div id="container">
            <div id="header">
                Online Chatbot manenoz
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
</body>

</html>