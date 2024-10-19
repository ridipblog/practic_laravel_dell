<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socket.IO Messaging</title>
    <script src="https://cdn.socket.io/4.0.1/socket.io.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <h1>Socket.IO Messaging</h1>
    <input type="text" id="messageInput" placeholder="Type your message">
    <button onclick="sendMessage()">Send</button>
    <div id="messages"></div>

    <script>
        const socket = io('http://localhost:3000'); // Node.js server URL

        socket.on('receiveMessage', (message) => {
            const messagesDiv = document.getElementById('messages');
            messagesDiv.innerHTML += `<p>${message}</p>`;
        });

        function sendMessage() {
            const messageInput = document.getElementById('messageInput');
            const message = messageInput.value;
            // ----------------- start if you want to send message from blade file then used it ------------------
            // socket.emit('sendMessage', message);
            // ----------------- end if you want to send message from blade file then used it ------------------
            // Send message to Laravel which will forward it to Socket.IO
            axios.post('/send-message', { message })
                .then(response => {
                    console.log(response.data);
                    messageInput.value = ''; // Clear input after sending
                })
                .catch(error => {
                    console.error(error);
                });
        }
    </script>
</body>
</html>
