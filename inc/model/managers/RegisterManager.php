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
        $this->billModel->set_status("Empty");
        $this->billModel->create();
    }

    public function retrieveLastBillId() {
        $this->billModel->set_status("Empty");
        return $this->billModel->findByStatus()['id'];
    }



}