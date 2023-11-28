<?php


class MenuItemController extends BaseController{

    public function index(){

        $MenuItem = new MenuItemModel();
        $Menu = $MenuItem->findAll();

        $this->view("/MenuTab");
    }

    public function create(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $discount = $_POST['discount'];
            $tags = $_POST['tags'];
            $ingredients = $_POST['ingredients'];

            $MenuItem = new MenuItemModel();
            $MenuItem->set_name($name);
            $MenuItem->set_price($price);
            $MenuItem->set_description($description);
            $MenuItem->set_image($image);
            $MenuItem->set_discount($discount);
            $MenuItem->set_tags($tags);
            $MenuItem->set_ingredients($ingredients);

            $MenuItem->create();
        }
    }

    public function findBill($id){
        //id from where?
        $MenuItem = new MenuItemModel();
        $MenuItem-> set_id($id);
        $Menu = $MenuItem -> findById();

        // view logic pending

    }

    public function delete($id){
        //id from where?
        $MenuItem = new MenuItemModel();
        $MenuItem->set_id($id);
        $MenuItem-> delete();

        // view logic pending

    }

    public function update($id){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $discount = $_POST['discount'];
            $tags = $_POST['tags'];
            $ingredients = $_POST['ingredients'];

            $MenuItem = new MenuItemModel();
            $MenuItem-> set_id($id);
            $Menu = $MenuItem -> findById();

            $MenuItem->set_name($name);
            $MenuItem->set_price($price);
            $MenuItem->set_description($description);
            $MenuItem->set_image($image);
            $MenuItem->set_discount($discount);
            $MenuItem->set_tags($tags);
            $MenuItem->set_ingredients($ingredients);

            $MenuItem->update();
            
            // view logic pending
        }   
    }
}