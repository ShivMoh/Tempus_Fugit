<?php

require __DIR__."/../core/interfaces/Controller.php";

class BaseController implements Controller {



    public function view($view_path, $data = [])
    {
        include_once __DIR__."/../view/".$view_path.".php";
    }
    
    public function index() {}
    public function create() {}
    public function findAll() {}
    public function findOne() {}
    public function delete() {}
    public function update() {}
} 