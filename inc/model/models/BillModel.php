<?php

// Represents the model for the Bill entity, extends the BaseModel.
class BillModel extends BaseModel {
    // Properties for the Bill entity
    private $id;
    private $customer;
    private $number_of_items;
    private $total_cost;
    private $order_date;
    private $status;

    // Constructor for the BillModel class. Calls the connect method from the parent class.
    public function __construct() {
        $this->connect();
    }

    // Creates a new bill record in the database.
    public function create() {
        $sql = "INSERT INTO Bill(number_of_items, total_cost, order_date, status)
                VALUES (:number_of_items, :total_cost, :order_date, :status)";

        $new_bill = [
            "number_of_items" => $this->number_of_items,
            "total_cost" => $this->total_cost,
            "order_date" => $this->order_date,
            "status" => $this->status
        ];

        $statement = $this->connection->prepare($sql);
        $statement->execute($new_bill);

        $this->id = $this->connection->lastInsertId();
    }

    // Retrieves all bill records from the database.
    public function findAll() {
        $statement = $this->connection->query("SELECT * FROM Bill");
        return $statement->fetchAll();
    }

    // Retrieves a bill record by its ID from the database.
    public function findById() {
        $sql = "SELECT * FROM Bill WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $this->id]);

        return $statement->fetch();
    }

    // Updates an existing bill record in the database.
    public function update() {
        $sql = "UPDATE Bill SET number_of_items = :number_of_items, total_cost = :total_cost, 
                order_date = :order_date, status = :status WHERE id = :id";

        $updated_bill = [
            "id" => $this->id,
            "number_of_items" => $this->number_of_items,
            "total_cost" => $this->total_cost,
            "order_date" => $this->order_date,
            "status" => $this->status
        ];

        $statement = $this->connection->prepare($sql);
        $statement->execute($updated_bill);
    }

    // Deletes a bill record from the database.
    public function delete() {
        $sql = "DELETE FROM Bill WHERE id = :id";

        $deleted_bill = [
            "id" => $this->id
        ];

        $statement = $this->connection->prepare($sql);
        $statement->execute($deleted_bill);
    }

    // Retrieves a bill record by its status from the database.
    public function findByStatus() {
        $sql = "SELECT * FROM Bill WHERE status = :status LIMIT 1";

        $statement = $this->connection->prepare($sql);
        $statement->execute(['status' => $this->status]);

        return $statement->fetch();
    }

    // Retrieves all bill records by their status from the database.
    public function findAllByStatus() {
        $sql = "SELECT * FROM Bill WHERE status = :status";

        $statement = $this->connection->prepare($sql);
        $statement->execute(['status' => $this->status]);

        return $statement->fetchAll();
    }

    // Retrieves all bill records with order date greater than or equal to the specified date.
    public function findAllWhereDateGreaterThan() {
        $sql = "SELECT * FROM Bill WHERE order_date >= :order_date";

        $statement = $this->connection->prepare($sql);
        $statement->execute(['order_date' => $this->order_date]);

        return $statement->fetchAll();
    }

    // Updates the status of a bill record in the database.
    public function updateStatus() {
        $sql = "UPDATE Bill SET status = :status WHERE id = :id";

        $change_bill_state = [
            "status" => $this->status,
            "id" => $this->id
        ];

        $statement = $this->connection->prepare($sql);
        $statement->execute($change_bill_state);
    }

    // Retrieves all non-empty bill records from the database.
    public function findAllNonEmptyBills() {
        $statement = $this->connection->query("SELECT * FROM Bill WHERE status != 'empty'");
        return $statement->fetchAll();
    }
    
    // Getter method for the 'id' property.
    public function get_id() {
        return $this->id;
    }

    // Getter method for the 'customer' property.
    public function get_customer() {
        return $this->customer;
    }

    // Getter method for the 'number_of_items' property.
    public function get_number_of_items() {
        return $this->number_of_items;
    }

    // Getter method for the 'total_cost' property.
    public function get_total_cost() {
        return $this->total_cost;
    }

    // Getter method for the 'order_date' property.
    public function get_order_date() {
        return $this->order_date;
    }

    // Getter method for the 'status' property.
    public function get_status() {
        return $this->status;
    }

    // Setter method for the 'id' property.
    public function set_id($id) {
        $this->id = $id;
    }

    // Setter method for the 'customer' property.
    public function set_customer($customer) {
        $this->customer = $customer;
    }

    // Setter method for the 'number_of_items' property.
    public function set_number_of_items($number_of_items) {
        $this->number_of_items = $number_of_items;
    }

    // Setter method for the 'total_cost' property.
    public function set_total_cost($total_cost) {
        $this->total_cost = $total_cost;
    }

    // Setter method for the 'order_date' property.
    public function set_order_date($order_date) {
        $this->order_date = $order_date;
    }

    // Setter method for the 'status' property.
    public function set_status($status) {
        $this->status = $status;
    }
}
