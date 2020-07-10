var http = require('http'); 
var url = require('url')
var request = require("request"); 
const witAccessToken = "FN6YO6EGONKH4IZKKL3MVANZ57A4QOLV"; 
const placeAPI= "https://api.wit.ai/message?access_token=" + witAccessToken + "&q=" ;


http.createServer(function (req, res) { 
    let q = url.parse(req.url, true); // returns an urlobject 
    let qinput= q.query.input; // qinputnow has user input 
    request(placeAPI+qinput, function(error, response, body){ 
        // construct the JSON response to send back to client 
        
    
        res.writeHead(200, {'Content-Type': 'text/html', "Access-Control-Allow-Origin": "*"}); 
        res.write(JSON.stringify(body)); //write a response to the client in JSON 
        res.end(); //end the response 
    }); 
    
}).listen(8081)
