<?php

class MenuItemModel extends BaseModel {
    private $id;
    private $name;
    private $price;
    private $description;
    private $image;
    private $discount;
    private $tags;
    private $ingredients;

    public function __construct() {
        $this->connect();
    }

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

    public function findAll() {
        $statement = $this->connection->query("SELECT * FROM MenuItem");
        return $statement->fetchAll(); 
    }

    public function findById() {
        $sql = "SELECT * FROM MenuItem WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $this->id]);

        return $statement->fetch();
    }

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

    public function delete() {
        $sql = "DELETE FROM MenuItem WHERE id = :id";

        $deleted_menu_item = [
            "id"=> $this->id
        ];

        $statement = $this->connection->prepare($sql);
        $statement->execute($deleted_menu_item);
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

    public function get_description() {
        return $this->description;
    }

    public function get_image() {
        return $this->image;
    }

    public function get_discount() {
        return $this->discount;
    }

    public function get_tags() {
        return $this->tags;
    }

    public function get_ingredients() {
        return $this->ingredients;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_name($name) {
        $this->name = $name;
    }

    public function set_price($price) {
        $this->price = $price;
    }

    public function set_description($description) {
        $this->description = $description;
    }

    public function set_image($image) {
        $this->image = $image;
    }

    public function set_discount($discount) {
        $this->discount = $discount;
    }

    public function set_tags($tags) {
        $this->tags = $tags;
    }

    public function set_ingredients($ingredients) {
        $this->ingredients = $ingredients;
    }
}
