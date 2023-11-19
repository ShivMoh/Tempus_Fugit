<?php

class BillModel extends Database implements Model {
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
        return $statement->fetchAll(PDO::FETCH_OBJ); //specifies the return as an array of objects
                                                     //a manager will probably need to be implemented
                                                    //to accept this return
   }

   public function findById($id) {
    $sql = "SELECT * FROM MenuItem WHERE id = :id";

    $statement = $this->connection->prepare($sql);
    $statement->execute(['id' => $id]);

    return $statement->fetchObject();
   }

   public function update() {
    
    $sql = "UPDATE MenuItem SET name = :name, price = :price, amount = :amount, description = :description, image = :image, discount = :discount tags = :tags, ingredients = :ingredients WHERE id = :id";
    
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
        return $this->id = $id;
    }
    public function set_last_name($name) {
        return $this->name = $name;
    }

    public function set_other_names($price) {
        return $this->price = $price;
    }

    public function set_gender($description) {
        return $this->description = $description;
    }

    public function set_age($image) {
        return $this->image = $image;
    }

    public function set_dob($discount) {
        return $this->discount = $discount;
    }

    public function set_job_role($tags) {
        return $this->tags = $tags;
    }

    public function set_email($ingredients) {
        return $this->ingredients = $ingredients;
    }
}
?>
   
