<?php

class BillItemModel extends BaseModel {
    private $id;
    private $name;
    private $price;
    private $amount;
    private $bill_id;
    private $menu_item_id;

   public function __construct() {
       $this->connect();
   }

   public function create() {

        $sql =  "INSERT INTO BillItem(name, price, amount, bill_id, menu_item_id)
            VALUES (:name, :price, :amount, :bill_id, :menu_item_id)";

        $new_bill = [
            "name"=> $this->name,
            "price"=> $this->price,
            "amount"=> $this->amount,
            "bill_id"=> $this->bill_id,
            "menu_item_id"=> $this->menu_item_id
        ];


        $statement = $this->connection->prepare($sql);
        $statement->execute($new_bill);

        $this->id = $this->connection->lastInsertId();
   }

   public function findAll() {
    $statement = $this->connection->query("SELECT * FROM BillItem");
    return $statement->fetchAll(PDO::FETCH_OBJ); //Similarly for this one
                                                //a manager may be necessary
                                                //for handling the return
    }

   public function findById() {
    $sql = "SELECT * FROM BillItem WHERE id = :id";

    $statement = $this->connection->prepare($sql);
    $statement->execute(['id' => $this->id]);

    return $statement->fetchObject();
   }

   public function update() {
    
    $sql = "UPDATE BillItem SET name = :name, price = :price, amount = :amount, bill_id = :bill_id, menu_item_id = :menu_item_id WHERE id = :id";
    
    $updated_menu_item = [
        "id"=> $this->id,
        "name"=> $this->name,
        "price"=> $this->price,
        "bill_id"=> $this->bill_id,
        "menu_item_id"=> $this->menu_item_id
    ];

    $statement = $this->connection->prepare($sql);
    $statement->execute($updated_menu_item);
}

   public function delete() {
    $sql = "DELETE FROM BillItem WHERE id = :id";
        
            $deleted_bill = [
                "id"=> $this->id
            ];
        
            $statement = $this->connection->prepare($sql);
            $statement->execute($deleted_bill);
   }

   public function get_id() {
    return $this->id;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_price() {
        return $this->price;
    }

    public function get_amount() {
        return $this->amount;
    }

    public function get_bill_id() {
        return $this->bill_id;
    }

    public function get_menu_item_id() {
        return $this->menu_item_id;
    }

    public function set_id($id) {
        return $this->id = $id;
    }

    public function set_name($name) {
        return $this->name = $name;
    }
    
    public function set_price($price) {
        return $this->price = $price;
    }

    public function set_amount($amount) {
        return $this->amount = $amount;
    }

    public function set_bill_id($bill_id) {
        return $this->bill_id = $bill_id;
    }

    public function set_menu_item_id($menu_item_id) {
        return $this->menu_item_id = $menu_item_id;
    }
}