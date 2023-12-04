<?php

// Represents a menu item with properties such as name, price, description, etc.
class MenuItemModel extends BaseModel {
    private $id;
    private $name;
    private $price;
    private $description;
    private $image;
    private $discount;
    private $tags;
    private $ingredients;

    // Constructor to establish a database connection.
    public function __construct() {
        $this->connect();
    }

    // Method to create a new menu item record in the database.
    public function create() {
        $sql =  "INSERT INTO MenuItem(name, price, description, image, discount, tags, ingredients)
            VALUES (:name, :price, :description, :image, :discount, :tags, :ingredients)";

        $new_menu_item = [
            "name"=> $this->name,
            "price"=> $this->price,
            "description"=> $this->description,
            "image"=> $this->image,
            "discount"=> $this->discount,
            "tags"=> $this->tags,
            "ingredients"=> $this->ingredients
        ];

        $statement = $this->connection->prepare($sql);
        $statement->execute($new_menu_item);

        $this->id = $this->connection->lastInsertId();
    }

    // Method to retrieve all menu item records from the database.
    public function findAll() {
        $statement = $this->connection->query("SELECT * FROM MenuItem");
        return $statement->fetchAll(); 
    }

    // Method to find a menu item by its ID in the database.
    public function findById() {
        $sql = "SELECT * FROM MenuItem WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $this->id]);

        return $statement->fetch();
    }

    // Method to update a menu item record in the database.
    public function update() {
        $sql = "UPDATE MenuItem SET name = :name, price = :price, description = :description, image = :image, discount = :discount, tags = :tags, ingredients = :ingredients WHERE id = :id";
    
        $updated_menu_item = [
            "id"=> $this->id,
            "name"=> $this->name,
            "price"=> $this->price,
            "description"=> $this->description,
            "image"=> $this->image,
            "discount"=> $this->discount,
            "tags"=> $this->tags,
            "ingredients"=>$this->ingredients
        ];

        $statement = $this->connection->prepare($sql);
        $statement->execute($updated_menu_item);
    }

    // Method to delete a menu item record from the database.
    public function delete() {
        $sql = "DELETE FROM MenuItem WHERE id = :id";

        $deleted_menu_item = [
            "id"=> $this->id
        ];

        $statement = $this->connection->prepare($sql);
        $statement->execute($deleted_menu_item);
    }

    // Getter method for retrieving the ID of the menu item.
    public function get_id() {
        return $this->id;
    }

    // Getter method for retrieving the name of the menu item.
    public function get_name() {
        return $this->name;
    }

    // Getter method for retrieving the price of the menu item.
    public function get_price() {
        return $this->price;
    }

    // Getter method for retrieving the description of the menu item.
    public function get_description() {
        return $this->description;
    }

    // Getter method for retrieving the image of the menu item.
    public function get_image() {
        return $this->image;
    }

    // Getter method for retrieving the discount of the menu item.
    public function get_discount() {
        return $this->discount;
    }

    // Getter method for retrieving the tags of the menu item.
    public function get_tags() {
        return $this->tags;
    }

    // Getter method for retrieving the ingredients of the menu item.
    public function get_ingredients() {
        return $this->ingredients;
    }

    // Setter method for setting the ID of the menu item.
    public function set_id($id) {
        $this->id = $id;
    }

    // Setter method for setting the name of the menu item.
    public function set_name($name) {
        $this->name = $name;
    }

    // Setter method for setting the price of the menu item.
    public function set_price($price) {
        $this->price = $price;
    }

    // Setter method for setting the description of the menu item.
    public function set_description($description) {
        $this->description = $description;
    }

    // Setter method for setting the image of the menu item.
    public function set_image($image) {
        $this->image = $image;
    }

    // Setter method for setting the discount of the menu item.
    public function set_discount($discount) {
        $this->discount = $discount;
    }

    // Setter method for setting the tags of the menu item.
    public function set_tags($tags) {
        $this->tags = $tags;
    }

    // Setter method for setting the ingredients of the menu item.
    public function set_ingredients($ingredients) {
        $this->ingredients = $ingredients;
    }
}
