<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/**
 * Class RegisterController
 * Controller for handling cash register-related actions.
 */
class RegisterController extends BaseController {

    private $registerManager;
    private $billItemModel;

    /**
     * Constructor for RegisterController.
     * Initializes the register manager and bill item model instances.
     */
    public function __construct() {
        $this->registerManager = new RegisterManager();
        $this->billItemModel = new BillItemModel();
    }

    /**
     * Default action for displaying the cash register.
     */
    public function index() {
        if (!isset($_SESSION['empty_bill_created'])) {
            $this->registerManager->createEmptyBill();
            $_SESSION['empty_bill_created'] = true;
        }
        $this->findAll();
    }

    /**
     * Displays all bill items and menu items for the current bill.
     */
    public function findAll() {
        $this->billItemModel->set_bill_id(
            $this->registerManager->retrieveLastBillId()
        );

        $data = [
            "billItems" => $this->billItemModel->findAllForBill(),
            "menuList" => $this->registerManager->getMenuItemsList()
        ];

        $this->view("register/CashRegisterTab", $data);
    }

    /**
     * Creates a new bill item.
     */
    public function create() {
        list($menu_id, $name) = explode(",", $_POST['name']);
        $amount = $_POST['amount'];

        $discount = $this->registerManager->queryDiscountForMenuItem($menu_id);
        $price = $this->registerManager->queryPriceForMenuItem($menu_id);
        $total = ($amount * $price) - ($discount * ($price * $amount));
        $bill_id = $this->registerManager->retrieveLastBillId();

        $this->billItemModel->set_name($name);
        $this->billItemModel->set_price($price);
        $this->billItemModel->set_total($total);
        $this->billItemModel->set_amount($amount);
        $this->billItemModel->set_bill_id($bill_id);
        $this->billItemModel->set_discount($discount);
        $this->billItemModel->set_menu_item_id($menu_id);
        $this->billItemModel->create();
        $this->anchor("register");
    }

    /**
     * Deletes a bill item.
     */
    public function delete($id) {
        $this->billItemModel->set_id($id);
        $this->billItemModel->delete();
        $this->anchor("register");
    }

    /**
     * Submits and updates the bill.
     */
    public function update($id = 0) {
        $id = $this->registerManager->retrieveLastBillId();
        
        $bill = [
            "id" => $id,
            "number_of_items" => $_POST['number-of-items'],
            "total_cost" => $_POST['total']
        ];

        $this->registerManager->submitBill($bill);
        unset($_SESSION['empty_bill_created']);
        $this->anchor("register");
    }
}
