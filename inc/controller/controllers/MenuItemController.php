<?php
class MenuItemController extends BaseController{
    private $menuItem;

    public function __construct(){
        $this->menuItem = new MenuItemModel();
    }

    public function index(){
        $Menu = $this->menuItem->findAll();
        $this->view("/MenuTab", $data = $Menu);
    }

    public function create(){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $discount = $_POST['discount'];
        $tags = $_POST['tags'];
        $ingredients = $_POST['ingredients'];

        $this->menuItem->set_name($name);
        $this->menuItem->set_price($price);
        $this->menuItem->set_description($description);
        $this->menuItem->set_image($image);
        $this->menuItem->set_discount($discount);
        $this->menuItem->set_tags($tags);
        $this->menuItem->set_ingredients($ingredients);

        $this->menuItem->create();
        $this->index();
    }

    public function findBill($id){
        $this->menuItem->set_id($id);
        $Menu = $this->menuItem->findById();
        // view logic pending
    }

    public function delete($id = 0){
        $id = $_POST['id']; 
        $this->menuItem->set_id($id);
        $this->menuItem->delete();
        $this->index();
    }

    public function update($id = 0){
        $id =$_POST['id'];
        $name = $_POST['edit-item-name'];
        $price = $_POST['edit-item-price'];
        $description = $_POST['edit-item-description'];
        $image = $_POST['edit-item-image'];
        $discount = $_POST['edit-item-discount'];
        $tags = $_POST['edit-item-tags'];
        $ingredients = $_POST['edit-item-ingredients'];

        $this->menuItem->set_id($id);
        $this->menuItem->set_name($name);
        $this->menuItem->set_price($price);
        $this->menuItem->set_description($description);
        $this->menuItem->set_image($image);
        $this->menuItem->set_discount($discount);
        $this->menuItem->set_tags($tags);
        $this->menuItem->set_ingredients($ingredients);

        $this->menuItem->update();
        $this->index();
    }
}
?>
