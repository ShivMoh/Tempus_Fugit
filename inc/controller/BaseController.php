<?php

/**
 * Class BaseController
 * Base controller providing common functionality for controllers.
 */
class BaseController implements Controller {

    /**
     * Renders a view by including the corresponding view file.
     */
    public function view($view_path, $data = []) {
        $path = implode("/", explode("=", trim($view_path, "=")));
        include_once __DIR__."/../view/".$path."View.php";
    }
    
    /**
     * Default action placeholder for controllers.
     */
    public function index() {}

    /**
     * Redirects to a specified path.
     */
    public function anchor($path) {
        $url = BASE_URL."/".$path;
        header("Location: ".$url);
    }

    /**
     * Placeholder for the create operation.
     */
    public function create() {}

    /**
     * Placeholder for the find all operation.
     */
    public function findAll() {}

    /**
     * Placeholder for the find one operation.
     */
    public function findOne($id) {}

    /**
     * Placeholder for the delete operation.
     */
    public function delete($id) {}

    /**
     * Placeholder for the update operation.
     */
    public function update($id) {}
} 
