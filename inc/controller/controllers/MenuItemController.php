<?php


class MenuItemController extends BaseController{

    public function index(){

        $MenuItem = new MenuItemModel();
        $Menu = $MenuItem->findAll();

        $this->view("/MenuTab", $data = $Menu);
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
            $this->index();

        } 
    }

    public function findBill($id){
        //id from where?
        $MenuItem = new MenuItemModel();
        $MenuItem-> set_id($id);
        $Menu = $MenuItem -> findById();

        // view logic pending

    }

    public function delete($id = 0){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id']; 
            $MenuItem = new MenuItemModel();
            $MenuItem->set_id($id);
            $MenuItem->delete();
            $this->index();
        }
    }

    public function update($id = 0){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id =$_POST['id'];
            $name = $_POST['edit-item-name'];
            $price = $_POST['edit-item-price'];
            $description = $_POST['edit-item-description'];
            $image = $_POST['edit-item-image'];
            $discount = $_POST['edit-item-discount'];
            $tags = $_POST['edit-item-tags'];
            $ingredients = $_POST['edit-item-ingredients'];

            $MenuItem = new MenuItemModel();
            
            $MenuItem-> set_id($id);
            $MenuItem->set_name($name);
            $MenuItem->set_price($price);
            $MenuItem->set_description($description);
            $MenuItem->set_image($image);
            $MenuItem->set_discount($discount);
            $MenuItem->set_tags($tags);
            $MenuItem->set_ingredients($ingredients);

            $MenuItem->update();
            $this->index();

        }   
    }
}