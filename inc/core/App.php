<?php

require __DIR__."/../model/dbcontext/Database.php";
require __DIR__."/Router.php";

class App {
    use Database;

    public function __construct() {
        $this->init();
        new Router();
    }
}