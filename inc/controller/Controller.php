<?php

interface Controller {
    // these are GET requests
    public function index();
    public function view($path, $data = []);

    // these are html POST requests

    // POST
    public function create();

    // GET
    public function findAll();
    public function findOne($id);

    // DELETE
    public function delete($id);

    // PUT/PATCH
    public function update($id);
}