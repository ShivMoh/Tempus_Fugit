<?php

session_start();

class RegisterController extends BaseController {

    private $registerManager;
    private $billItemModel;
    private $cacheData;
    private $menuItem;

    public function __construct() {
        $this->billItemModel = new BillItemModel();
        $this->registerManager = new RegisterManager();

        $this->cacheData = $this->billItemModel->findAllForBill(
            $this->registerManager->retrieveLastBillId()
        );

        echo "Cache Data is being printed";
        print_r($this->cacheData);

      

        // here's the strat
        // first create a bill, we'll update it later
        // everytime, we fill a row, submit it and add a billItem
        // at the end of it, we'll update the bill
        // $this->cacheData = [
        //     [
        //         "itemId" => 10,
        //         "name" => "some",
        //         "amount" => "123",
        //         "discount" => "some",
        //         "total" => "120",
        //     ],
        //     [
        //         "itemId" => 20,
        //         "name" => "something else",
        //         "amount" => "435",
        //         "discount" => 23,
        //         "total" => "134",
        //     ],
        //     [
        //         "itemId" => 0,
        //         "name" => "Select an item",
        //         "amount" => 0,
        //         "discount" => "",
        //         "total" => 0,
        //     ],
        //     [
        //         "itemId" => 0,
        //         "name" => "Select an item",
        //         "amount" => 0,
        //         "discount" => "",
        //         "total" => 0,
        //     ],
        //     [
        //         "itemId" => 0,
        //         "name" => "Select an item",
        //         "amount" => 0,
        //         "discount" => "",
        //         "total" => 0,
        //     ],
        //     [
        //         "itemId" => 0,
        //         "name" => "Select an item",
        //         "amount" => 0,
        //         "discount" => "",
        //         "total" => 0,
        //     ],
    
        // ];

        // session_start();
        // $_SESSION['test'] = $this->cacheData;
        // $this->cacheData = $_SESSION['test'];
    }



    public function index() {
        if (isset($_SESSION['start'])) {
            if($_SESSION['start'] === '') {
                echo "Init <br>";
                $this->registerManager->createEmptyBill();
                $_SESSION['start'] = 'start';
            }     
        }


   

        $this->view("CashRegisterTab", [$this->cacheData]);
    }

    public function test() {
        list($row, $id) = $this->getRow();
        $menuItem = $this->registerManager->queryDiscount($id);

        if (isset($_POST["total-$row"])) 
            $this->cacheData[$row]["total"] = $_POST["total-$row"];

        
        if (isset($_POST["amount-$row"])) 
            $this->cacheData[$row]["amount"] = $_POST["amount-$row"];

        if (isset($_POST["name-$row"])) {
            $this->cacheData[$row]["discount"] = $menuItem["discount"];
        }

        $this->view("CashRegisterTab", [$this->cacheData, $menuItem, $row]);
    }

    public function reset() {
        echo "Start resetted <br>";
        $_SESSION['start'] = '';
        echo "Start: ".$_SESSION['start'];
    }

    public function create() {
        list($row, $id) = $this->getRow();

        if(isset($_POST['bill'])) {

        } else if ($_POST["total-$row"] != 0) {
      
            $this->billItemModel->set_name($_POST["amount-$row"]);
            $this->billItemModel->set_price($_POST["total-$row"]);
            $this->billItemModel->set_amount($_POST["amount-$row"]);
            $this->billItemModel->set_bill_id($this->registerManager->retrieveLastBillId());
            $this->menuItem = $this->registerManager->queryDiscount($id);
            $this->billItemModel->set_menu_item_id($_SESSION['menu_item_id']);
            $this->billItemModel->create();
            $this->view("CashRegisterTab", [$this->cacheData, $this->menuItem, $row]);
        } else {
            $this->menuItem = $this->registerManager->queryDiscount($id);
            $_SESSION['menu_item_id'] = $this->menuItem['id'];

            echo "Hello Again";
            $this->view("CashRegisterTab", [$this->cacheData, $this->menuItem, $row]);
        }
    } 

 


    private function getRow() {
        for($x = 0; $x < 15; $x++) {
            $string = "name-$x";
            if (isset($_POST[$string])) {
                return [$x, explode("-", $_POST[$string])[0]];
            }
        }
        return [0,0];
    }
}