<?php

interface Controller {
    
    public function index();
    public function view($path, $data = []); 
    public function create();  
    public function findAll();
    public function findOne($id);
    public function delete($id);
    public function update($id);
}