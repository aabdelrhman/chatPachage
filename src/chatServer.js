const express = require('express');
const axios = require('axios');
const fs = require('fs');
const app = express();
const baseUrl = '127.0.0.1:8000/api/';
// ---------- for https in server ---------------
// const certUrl = '{{certification path }}';
// const CertKey = '{{ certification key path }}';
// var privateKey  = fs.readFileSync(CertKey, 'utf8');
// var certificate = fs.readFileSync(certUrl, 'utf8');
// var credentials = {
//     key: privateKey,
//     cert: certificate
// };
// var server = require('https').createServer(credentials, app);
var server = require('http').createServer(app);
const io = require('socket.io')(server, {
    cors: { origin: "*"}
});
io.on('connection', (socket) => {
    socket.on('channel-'+socket.handshake.query.chat_id, (message) => {
        var token = socket.handshake.headers.authorization;
        const headers = {
          'Content-Type': 'application/json',
          'Authorization': token,
        };


        if(token !== undefined){
            axios.post(baseUrl+'/send-message' , message , {headers})
            .then(response => {
                console.log(response.data);
                socket.emit('sendChatToClient', response.data);
                socket.broadcast.emit('sendChatToClient', response.data);
            })
            .catch(error => {
                console.log(error.response.data);
             });
        }else{
            console.log('Token is required')
        }

    });
    socket.on('disconnect', (socket) => {
        console.log(socket);
        console.log('Disconnect');
    });
});

server.listen(3000, () => {
    console.log('Server is running');
});
