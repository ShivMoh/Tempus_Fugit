<?php

class RegisterController extends BaseController {
    private $billModel;
    private $registerManager;
    private $cacheData;

    public function __construct() {
        $this->billModel = new BillModel();
        $this->registerManager = new RegisterManager();

        $this->cacheData = [
            [
                "itemId" => 10,
                "name" => "some",
                "amount" => "123",
                "discount" => "some",
                "total" => "120",
            ],
            [
                "itemId" => 20,
                "name" => "something else",
                "amount" => "435",
                "discount" => 23,
                "total" => "134",
            ],
            [
                "itemId" => 0,
                "name" => "Select an item",
                "amount" => 0,
                "discount" => "",
                "total" => 0,
            ],
            [
                "itemId" => 0,
                "name" => "Select an item",
                "amount" => 0,
                "discount" => "",
                "total" => 0,
            ],
            [
                "itemId" => 0,
                "name" => "Select an item",
                "amount" => 0,
                "discount" => "",
                "total" => 0,
            ],
            [
                "itemId" => 0,
                "name" => "Select an item",
                "amount" => 0,
                "discount" => "",
                "total" => 0,
            ],
    
        ];

        session_start();
        $_SESSION['test'] = $this->cacheData;
        $this->cacheData = $_SESSION['test']
    }

    public function index() {
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

    private function getRow() {
        for($x = 0; $x < 15; $x++) {
            $string = "name-$x";
            if (isset($_POST[$string])) {
                return [$x, explode("-", $_POST[$string])[0]];
            }
        }

        echo "Default";
        return [0,0];
    }
}