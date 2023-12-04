<?php


// Database Configuration
define("DB_DRIVER", 'mysql');        
define("DB_HOST", "127.0.0.1");        
define("DB_NAME", "karens_kitchen");   
define("DB_USER", "root");            
define("DB_USER_PASSWORD", '');       

// change this to match your project directory
define("BASE_URL", "/Tempus_Fugit");         

// change this to match your project directory 
define("CSS_URL", "http://localhost/Tempus_Fugit/public/css/");        // URL for CSS files
define("RESOURCE_URL", "http://localhost/Tempus_Fugit/public/images/");// URL for resource files (images, etc.)

// for intellisense
define("POST", "POST");   
define("GET", "GET");     
define("METHOD", $_SERVER["REQUEST_METHOD"]); 
