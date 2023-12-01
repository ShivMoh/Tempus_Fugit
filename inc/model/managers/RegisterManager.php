<?php

class RegisterManager {
    private $menuItemModel;
    private $billModel;

    public function __construct() {
        $this->menuItemModel = new MenuItemModel();
        $this->billModel = new BillModel();
    }
    public function queryDiscountForMenuItem($id) {
        $this->menuItemModel->set_id($id);
        $menuItem = $this->menuItemModel->findById();
        return $menuItem['discount'];
    }

    public function queryPriceForMenuItem($id) {
        $this->menuItemModel->set_id($id);
        $menuItem = $this->menuItemModel->findById();
        return $menuItem['price'];
    }

    public function getMenuItemsList() {
        $menuItem = $this->menuItemModel->findAll();
        return $menuItem;
    }

    public function createEmptyBill() {
        $this->billModel->set_customer("");
        $this->billModel->set_number_of_items(0);
        $this->billModel->set_total_cost(0);
        $this->billModel->set_order_date("");
        $this->billModel->set_status("empty");
        $this->billModel->create();
    }

    public function retrieveLastBillId() {
        $this->billModel->set_status("empty");
        return $this->billModel->findByStatus()['id'];
    }

    public function submitBill($bill) {
        $this->billModel->set_id($bill['id']);
        $this->billModel->set_number_of_items($bill['number_of_items']);
        $this->billModel->set_total_cost($bill['total_cost']);
        $this->billModel->set_order_date(date("Y/m/d"));
        $this->billModel->set_status("Pending");
        $this->billModel->update();
    }

}