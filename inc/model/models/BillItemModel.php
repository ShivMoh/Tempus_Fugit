<?php

// Extends the BaseModel to inherit common database operations.
class BillItemModel extends BaseModel {
    // Properties for BillItemModel
    private $id;
    private $name;
    private $price;
    private $total;
    private $amount;
    private $discount;
    private $bill_id;
    private $menu_item_id;

    // Constructor to establish a database connection.
    public function __construct() {
        $this->connect();
    }

    // Creates a new bill item record in the database.
    public function create() {
        // SQL query to insert a new bill item
        $sql = "INSERT INTO BillItem(name, price, total, amount, discount, bill_id, menu_item_id)
                VALUES (:name, :price, :total, :amount, :discount, :bill_id, :menu_item_id)";

        // Data for the new bill item
        $new_bill = [
            "name" => $this->name,
            "price" => $this->price,
            "total" => $this->total,
            "amount" => $this->amount,
            "discount" => $this->discount,
            "bill_id" => $this->bill_id,
            "menu_item_id" => $this->menu_item_id
        ];

        // Prepare and execute the SQL statement
        $statement = $this->connection->prepare($sql);
        $statement->execute($new_bill);

        // Retrieve the last inserted ID and set it to the instance variable
        $this->id = $this->connection->lastInsertId();
    }

    // Retrieves all bill item records from the database.
    public function findAll() {
        // SQL query to select all bill items
        $statement = $this->connection->query("SELECT * FROM BillItem");

        // Return all records as an array
        return $statement->fetchAll();
    }

    // Retrieves a specific bill item record by its unique identifier.
    public function findById() {
        // SQL query to select a bill item by ID
        $sql = "SELECT * FROM BillItem WHERE id = :id";

        // Prepare and execute the SQL statement
        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $this->id]);

        // Return the fetched record or null if not found
        return $statement->fetch();
    }

    // Retrieves all bill item records associated with a specific bill.
    public function findAllForBill() {
        // SQL query to select all bill items for a specific bill
        $sql = "SELECT * FROM BillItem WHERE bill_id = :bill_id";

        // Prepare and execute the SQL statement
        $statement = $this->connection->prepare($sql);
        $statement->execute(['bill_id' => $this->bill_id]);

        // Return all records as an array
        return $statement->fetchAll();
    }

    // Updates the bill item record in the database.
    public function update() {
        // SQL query to update a bill item
        $sql = "UPDATE BillItem SET name = :name, price = :price, total = :total, amount = :amount, 
                bill_id = :bill_id, menu_item_id = :menu_item_id WHERE id = :id";

        // Data for the updated bill item
        $updated_bill_item = [
            "id" => $this->id,
            "name" => $this->name,
            "price" => $this->price,
            "bill_id" => $this->bill_id,
            "menu_item_id" => $this->menu_item_id
        ];

        // Prepare and execute the SQL statement
        $statement = $this->connection->prepare($sql);
        $statement->execute($updated_bill_item);
    }

    // Deletes the bill item record from the database.
    public function delete() {
        // SQL query to delete a bill item by ID
        $sql = "DELETE FROM BillItem WHERE id = :id";

        // Data for the deleted bill item
        $deleted_bill = [
            "id" => $this->id
        ];

        // Prepare and execute the SQL statement
        $statement = $this->connection->prepare($sql);
        $statement->execute($deleted_bill);
    }

    // Getter method for the 'id' property.
    public function get_id() {
        return $this->id;
    }

    // Getter method for the 'name' property.
    public function get_name() {
        return $this->name;
    }

    // Getter method for the 'price' property.
    public function get_price() {
        return $this->price;
    }

    // Getter method for the 'total' property.
    public function get_total() {
        return $this->total;
    }

    // Getter method for the 'amount' property.
    public function get_amount() {
        return $this->amount;
    }

    // Getter method for the 'discount' property.
    public function get_discount() {
        return $this->discount;
    }

    // Getter method for the 'bill_id' property.
    public function get_bill_id() {
        return $this->bill_id;
    }

    // Getter method for the 'menu_item_id' property.
    public function get_menu_item_id() {
        return $this->menu_item_id;
    }

    // Setter method for the 'id' property.
    public function set_id($id) {
        $this->id = $id;
    }

    // Setter method for the 'name' property.
    public function set_name($name) {
        $this->name = $name;
    }

    // Setter method for the 'price' property.
    public function set_price($price) {
        $this->price = $price;
    }

    // Setter method for the 'total' property.
    public function set_total($total) {
        $this->total = $total;
    }

    // Setter method for the 'amount' property.
    public function set_amount($amount) {
        $this->amount = $amount;
    }

    // Setter method for the 'bill_id' property.
    public function set_bill_id($bill_id) {
        $this->bill_id = $bill_id;
    }

    // Setter method for the 'menu_item_id' property.
    public function set_menu_item_id($menu_item_id) {
        $this->menu_item_id = $menu_item_id;
    }

    // Setter method for the 'discount' property.
    public function set_discount($discount) {
        $this->discount = $discount;
    }
}
