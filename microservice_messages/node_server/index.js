// const express = require('express');
// const http = require('http');
// const socketIo = require('socket.io');
// const cors = require('cors');

// const passport_api=require('./routes/passport_apis/dashboard');
// const app = express();
// const server = http.createServer(app);
// const io = socketIo(server, {
//     cors: {
//         origin: '*', // Allow all origins for simplicity (modify for production)
//         methods: ['GET', 'POST'],
//     },
// });

// app.use(cors());

// app.use(express.json()); // Middleware to parse JSON bodies

// app.use('/',passport_api);

// // Handle POST request to /sendMessage
// app.post('/sendMessage', (req, res) => {
//     const message = req.body.message;
//     console.log('HTTP message received:', message);
//     io.emit('receiveMessage', message); // Emit to all connected clients
//     res.json({ status: 'Message received!' });
// });

// // Handle Socket.IO connections
// io.on('connection', (socket) => {
//     console.log('A user connected');

//     // // Listen for incoming messages

//     // ----------------- if you want to send message from blade file then used it ------------------
//     // socket.on('sendMessage', (message) => {
//     //     console.log('Message received:', message);
//     //     // Emit the message to all connected clients
//     //     io.emit('receiveMessage', message);
//     // });

//     // socket.on('disconnect', () => {
//     //     console.log('User disconnected');
//     // });
// });

// // Start the server
// const PORT = process.env.PORT || 3000;
// server.listen(PORT, () => {
//     console.log(`Socket.IO server running on port ${PORT}`);
// });



// ------------------ verify passport generated token ------------------- 
const passport = require('passport');
const fs = require('fs');


// Express server example
const express = require('express');
const app = express();
app.use(passport.initialize());

const passport_dashboard=require('./routes/passport_apis/dashboard');
const jwt_dashboard=require('./routes/jwt_apis/dashboard');
app.use('/passport',passport_dashboard);
app.use('/jwt',jwt_dashboard);


// Protect your routes using the 'authtoken' strategy
// app.get('/protected', passport.authenticate('authtoken', { session: false }), (req, res) => {
//     res.json({ message: 'Protected content', user: req.user });
// });

app.listen(3000, () => {
    console.log('Server running on port 3000');
});
