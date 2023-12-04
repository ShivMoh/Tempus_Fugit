<?php

/*
 * Database Configuration
 */
define("DB_DRIVER", 'mysql');        // Database driver 
define("DB_HOST", "127.0.0.1");       // Database host 
define("DB_NAME", "karens_diner");   // Database name
define("DB_USER", "root");            // Database username
define("DB_USER_PASSWORD", '');       // Database password

/*
 * Base URL Configuration
 */
define("BASE_URL", "/Tempus_Fugit");          // Base URL for the application

/*
 * Resource URLs Configuration
 */
define("CSS_URL", "http://localhost/Tempus_Fugit/public/css/");        // URL for CSS files
define("RESOURCE_URL", "http://localhost/Tempus_Fugit/public/images/");// URL for resource files (images, etc.)

/*
 * Request Method Constants
 */
define("POST", "POST");   // Constant for POST request method
define("GET", "GET");     // Constant for GET request method
define("METHOD", $_SERVER["REQUEST_METHOD"]); // Constant for the current request method
