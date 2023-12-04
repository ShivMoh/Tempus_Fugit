<?php

/**
 * Manages operations related to the cash register, including querying menu item details,
 * creating an empty bill, and handling bill submissions.
 */
class RegisterManager {
    private $menuItemModel;
    private $billModel;

    /*
     * Constructor for RegisterManager.
     * Initializes instances of MenuItemModel and BillModel.
     */
    public function __construct() {
        $this->menuItemModel = new MenuItemModel();
        $this->billModel = new BillModel();
    }

    /*
     * Query the discount for a menu item based on its ID.
     */
    public function queryDiscountForMenuItem($id) {
        $this->menuItemModel->set_id($id);
        $menuItem = $this->menuItemModel->findById();
        return $menuItem['discount'];
    }

    /*
     * Query the price for a menu item based on its ID.
     */
    public function queryPriceForMenuItem($id) {
        $this->menuItemModel->set_id($id);
        $menuItem = $this->menuItemModel->findById();
        return $menuItem['price'];
    }

    /*
     * Get a list of all menu items.
     */
    public function getMenuItemsList() {
        $menuItem = $this->menuItemModel->findAll();
        return $menuItem;
    }

    /*
     * Create an empty bill.
     * Initializes a bill with default values and sets its status to "empty".
     */
    public function createEmptyBill() {
        $this->billModel->set_customer("");
        $this->billModel->set_number_of_items(0);
        $this->billModel->set_total_cost(0);
        $this->billModel->set_order_date("");
        $this->billModel->set_status("empty");
        $this->billModel->create();
    }

    /*
     * Retrieve the ID of the last empty bill.
     */
    public function retrieveLastBillId() {
        $this->billModel->set_status("empty");
        return $this->billModel->findByStatus()['id'];
    }

    /*
     * Submit a bill with the provided information.
     */
    public function submitBill($bill) {
        $this->billModel->set_id($bill['id']);
        $this->billModel->set_number_of_items($bill['number_of_items']);
        $this->billModel->set_total_cost($bill['total_cost']);
        $this->billModel->set_order_date(date("Y/m/d"));
        $this->billModel->set_status("Pending");
        $this->billModel->update();
    }
}
