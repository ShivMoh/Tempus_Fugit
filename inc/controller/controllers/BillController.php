<?php

//dir for the model here

class BillController extends BaseController{

    public function index(){
        $billModel = new BillModel();
        $bill = $billModel->findAll();
        $this->view("/BillsTab", $data = $bill);
    }

    public function create(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $customer = $_POST['customer'];
            $number_of_items = $_POST['number_of_items'];
            $total_cost = $_POST['total_cost'];
            $order_date = $_POST['order_date'];
            $status = $_POST['status'];

            $billModel = new BillModel();
            $billModel->set_customer($customer);
            $billModel->set_number_of_items($number_of_items);
            $billModel->set_total_cost($total_cost);
            $billModel->set_order_date($order_date);
            $billModel->set_status($status);

            $billModel->create();   
            
            
        // view logic pending 
        // back to index
        }

    }

    public function findBill($id){
        //id from where?
        $billModel = new BillModel();
        $billModel-> set_id($id);
        $bill = $billModel -> findById();

        // view logic pending
        $this->view("Whatever", $bill);

    }

    public function delete(){
        //id from where?
        $billModel = new BillModel();
        //$billModel->set_id();
        $billModel-> delete();

        // view logic pending

    }

    public function update($id){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $customer = $_POST['customer'];
            $number_of_items = $_POST['number_of_items'];
            $total_cost = $_POST['total_cost'];
            $order_date = $_POST['order_date'];
            $status = $_POST['status'];

            $billModel = new BillModel();
            $billModel->set_id($id);
            $existingBill = $billModel->findById();

            $existingBill->set_customer($customer);
            $existingBill->set_number_of_items($number_of_items);
            $existingBill->set_total_cost($total_cost);
            $existingBill->set_order_date($order_date);
            $existingBill->set_status($status);

            $existingBill->update();
            
            // view logic pending
        }   
    }
}