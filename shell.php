<?php
/**
function execInBackground($cmd) { 
    if (substr(php_uname(), 0, 7) == "Windows"){ 
        pclose(popen("start /B ". $cmd, "r"));  
    } 
    else { 
        exec($cmd . " > /dev/null &");   
    } 
}

execInBackground("php artisan queue:work --daemon");
**/

 //echo exec("cd c:/wamp64/www/dpr_new");
 echo exec("php artisan queue:work --daemon");