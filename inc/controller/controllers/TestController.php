<?php

// this should be removed
// its just here for previewing the views
class TestController extends BaseController{

    public function index() {
        $this->view("/test/TestRegister");
    }

    public function test() {
        $this->view("/test/Test");
    }

    public function create() {}
    public function findAll() {}
    public function findOne() {}
    public function delete() {}
    public function update() {}

}