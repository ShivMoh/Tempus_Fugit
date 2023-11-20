<?php

// this should be removed
// its just here for previewing the views
class TestController extends BaseController{

    public function index() {
        $this->view("Register");
    }

    public function test() {
        $this->view("Test");
    }

}