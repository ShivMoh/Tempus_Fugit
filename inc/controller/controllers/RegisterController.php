<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

class RegisterController extends BaseController {

    private $registerManager;
    private $billItemModel;

    public function __construct() {
        $this->registerManager = new RegisterManager();
        $this->billItemModel = new BillItemModel();
    }

    public function index() {
        if (!isset($_SESSION['empty_bill_created'])) {
            $this->registerManager->createEmptyBill();
            $_SESSION['empty_bill_created'] = true;
        }
        $this->findAll();
    }

    public function findAll() {
        $this->billItemModel->set_bill_id(
            $this->registerManager->retrieveLastBillId()
        );

        $data = [
            "billItems"=>$this->billItemModel->findAllForBill(),
            "menuList"=>$this->registerManager->getMenuItemsList()
        ];

        $this->view("register/CashRegisterTab", $data);
    }

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

    public function delete($id) {
        $this->billItemModel->set_id($id);
        $this->billItemModel->delete();
        $this->anchor("register");
    }

    public function update($id = 0) {
        $id = $this->registerManager->retrieveLastBillId();
        
        $bill = [
            "id"=>$id,
            "number_of_items"=>$_POST['number-of-items'],
            "total_cost"=>$_POST['total']
        ];

        $this->registerManager->submitBill($bill);
        unset($_SESSION['empty_bill_created']);
        $this->anchor("register");
    }
    
}