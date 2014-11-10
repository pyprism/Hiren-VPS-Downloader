/**
 * Created by prism on 10/27/14.
 */
var sys = require('sys');
var exec = require('child_process').exec;

exec("ufw app list", function(error, stdout, stderr) {
    sys.puts(stdout)
});

function Hiren(){
    
}

module.exports= Hiren;
