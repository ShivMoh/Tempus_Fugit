<?php

class BaseController implements Controller {

    // for rendering views
    public function view($view_path, $data = []) {
        $path = implode("/", explode("=", trim($view_path, "=")));
        include_once __DIR__."/../view/".$path."View.php";
    }

    public function index() {}

    // achors the url
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
