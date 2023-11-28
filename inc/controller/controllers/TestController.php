<?php

// this should be removed
// its just here for previewing the views
class TestController extends BaseController{

    public function index() {
        $this->view("/test/TestRegister");
    }

    public function test() {
        $this->view("EmployeesTab");
    }

    public function test2() {
        $this->view("CashRegisterTab");
    }

    public function test3() {
        $this->view("Employee");
    }
    // public function NavBar() {
    //     $this->view("Navbar");
    // }

    // public function create() {}
    // public function findAll() {}
    // public function findOne() {}
    // public function delete() {}
    // public function update() {}

}