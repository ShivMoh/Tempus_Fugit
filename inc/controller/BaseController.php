<?php

class BaseController implements Controller {
    public function view($view_path, $data = [])
    {
        include_once __DIR__."/../view/".$view_path."View.php";
    }
    
    public function index() {}

    public function anchor($path) {
        $url = BASE_URL."/".$path;
        header("Location: ".$url);
    }

    public function create() {}
    public function findAll() {}
    public function findOne($id) {}
    public function delete($id) {}
    public function update($id) {}
} 