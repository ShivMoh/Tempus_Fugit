<?php

class RegisterController extends BaseController {

    private $registerManager;
    private $billItemModel;

    public function __construct() {
        $this->registerManager = new RegisterManager();
        $this->billItemModel = new BillItemModel();
    }

    public function index() {
        $this->registerManager->createEmptyBill();
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

        $this->view("CashRegisterTab", $data);
    }

    public function create() {
        list($menu_id, $name) = explode(",", $_POST['name']);
        $amount = $_POST['amount'];

        $discount = $this->registerManager->queryDiscountForMenuItem($menu_id);
        $price = ($amount * $this->registerManager->queryPriceForMenuItem($menu_id)) - $discount;
        $bill_id = $this->registerManager->retrieveLastBillId();

        $this->billItemModel->set_name($name);
        $this->billItemModel->set_price($price);
        $this->billItemModel->set_amount($amount);
        $this->billItemModel->set_bill_id($bill_id);
        $this->billItemModel->set_discount($discount);
        $this->billItemModel->set_menu_item_id($menu_id);
        $this->billItemModel->create();
        $this->findAll();
    }

    public function delete($id) {
        $this->billItemModel->set_id($id);
        $this->billItemModel->delete();
        $this->findAll();
    }

    public function updateBill() {
        $bill_id = $this->registerManager->retrieveLastBillId();
        
        $bill = [
            "id"=>$bill_id,
            "number_of_items"=>10,
            "total_cost"=>$_POST['total']
        ];

        $this->registerManager->submitBill($bill);

        $this->index();

    }
    

    
}