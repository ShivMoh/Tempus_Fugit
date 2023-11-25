<?php

// define db constants
define("DB_DRIVER", 'mysql');
define("DB_HOST", "127.0.0.1");
define("DB_NAME", "test");
define("DB_USER", "root");
define("DB_USER_PASSWORD", '');

// change this to match your base directory 
define("BASE_URL", "/proj");

// define constants
// to get some intellisense
// and prevent typoes
define("POST", "POST");
define("GET", "GET");
define("METHOD", $_SERVER["REQUEST_METHOD"]);