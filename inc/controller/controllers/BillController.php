<?php

//dir for the model here

class BillController extends BaseController{

    private $model;
    private $manager;

    public function __construct() {
        $this->model = new BillModel();
        $this->manager = new BillManager();
    }

    public function index(){
        $this->findAll();
    }

    public function findAll() {
        $bills = $this->model->findAllNonEmptyBills();
        $this->view("BillsTab", $data = $bills);
    }

    public function findOne($id) {
        $this->model->set_id($id);
        $bill = $this->model->findById();
        $billItems = $this->manager->getItemsForBill($bill['id']);

        $billData = [
            "bill"=>$bill,
            "billItems"=>$billItems
        ];

        $this->view("BillPreview", $data = $billData);
    }

    // doesn't actually delete the bill, simply changes its status to cancel
    public function delete($id) {

        $this->manager->changeBillState($id, "cancelled");
        $this->anchor("bill");
    }

    public function update($id) {
        $this->manager->changeBillState($id, "completed");
        $this->anchor("bill");
    }
}