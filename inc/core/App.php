<?php

// Include the initialization file
require __DIR__."/init.php";

/*
 * Main application class responsible for initialization.
 * Extends the Database class
 */
class App extends Database {

    /*
     * Constructor for the App class.
     * Initializes the application by calling the 'init' method and creating a Router instance.
     */
    public function __construct() {
        $this->init(); // Initialize the Database connection
        new Router(); // Create a new instance of the Router class to handle routing.
    }
}
