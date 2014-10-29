/**
 * Created by prism on 10/27/14.
 */
var express = require('express'),
    app = express();

var PORT = 3000;

app
    .use(express.static('./public'))
    .get('*', function(req, res){
        res.sendfile('./public/main.html');
    })
    .listen(PORT);
console.log('Server running on port:', PORT);