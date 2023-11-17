<?php

require __DIR__."/init.php";

class App extends Database{
  

    public function __construct() {
        $this->init();
        new Router();
    }
}