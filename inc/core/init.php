<?php

/*
 * Include Configuration and Router Files
 */
require __DIR__."/config.php";  // Include configuration constants
require __DIR__."/Router.php";   // Include the Router class

/*
 * Include Model and Controller Initialization Files
 */

require __DIR__."/../model/initModel.php";         // Include model initialization
require __DIR__."/../controller/initControllers.php"; // Include controller initialization
