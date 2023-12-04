<?php

/*
 * Defines the common methods expected in controllers.
 */
interface Controller {
    
    /*
     * Default action placeholder for controllers.
     */
    public function index();

    /*
     * Renders a view by including the corresponding view file.
     */
    public function view($path, $data = []); 

    /*
     * Redirects to a specified path.
     */
    public function anchor($path);

    /*
     * Placeholder for the create operation.
     */
    public function create();  

    /*
     * Placeholder for the find all operation.
     */
    public function findAll();

    /*
     * Placeholder for the find one operation.
     */
    public function findOne($id);

    /*
     * Placeholder for the delete operation.
     */
    public function delete($id);

    /*
     * Placeholder for the update operation.
     */
    public function update($id);
} 
