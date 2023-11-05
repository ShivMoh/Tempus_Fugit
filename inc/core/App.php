<?php

require __DIR__."/init.php";

class App {
    use Database;

    public function __construct() {
        $this->init();
        new Router();
    }
}