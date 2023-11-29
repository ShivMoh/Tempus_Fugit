<?php

class RegisterManager {
    private $menuItemModel;
    private $billModel;
    private $billItemModel;

    public function __construct() {
        $this->menuItemModel = new MenuItemModel();
        $this->billModel = new BillModel();
        $this->billItemModel = new BillItemModel();
    }
    public function queryDiscount($id) {
        $this->menuItemModel->set_id($id);
        $menuItem = $this->menuItemModel->findById();
        return $menuItem;
    }

    public function createEmptyBill() {
        $this->billModel->set_customer("");
        $this->billModel->set_number_of_items(0);
        $this->billModel->set_total_cost(0);
        $this->billModel->set_order_date("");
        $this->billModel->set_status("Empty");
        $this->billModel->create();
    }

    public function retrieveLastBillId() {
        $this->billModel->set_status("Empty");
        return $this->billModel->findByStatus()['id'];
    }

}