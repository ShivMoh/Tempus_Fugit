<?php

/*
 * Controller for handling menu item-related actions.
 */
class MenuItemController extends BaseController {

    private $model;

    /*
     * Constructor for MenuItemController.
     * Initializes the model instance.
     */
    public function __construct() {
        $this->model = new MenuItemModel();
    }

    /*
     * Displays all menu items.
     */
    public function index() {
        $menu = $this->model->findAll();
        $this->view("menu/MenuTab", $data = $menu);
    }

    /*
     * Creates a new menu item.
     */
    public function create() {
        // Extracting values from the POST request.
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $discount = $_POST['discount'];
        $tags = $_POST['tags'];
        $ingredients = $_POST['ingredients'];

        // Setting values in the model.
        $this->model->set_name($name);
        $this->model->set_price($price);
        $this->model->set_description($description);
        $this->model->set_image($image);
        $this->model->set_discount($discount);
        $this->model->set_tags($tags);
        $this->model->set_ingredients($ingredients);

        // Creating the new menu item.
        $this->model->create();
        $this->anchor("menuitem");
    }

    /*
     * Deletes a menu item.
     */
    public function delete($id) {
        $this->model->set_id($id);
        $this->model->delete();
        $this->anchor("menuitem");
    }

    /*
     * Updates a menu item.
     */
    public function update($id) {
        // Extracting values from the POST request.
        $name = $_POST['edit-item-name'];
        $price = $_POST['edit-item-price'];
        $description = $_POST['edit-item-description'];
        $image = $_POST['edit-item-image'];
        $discount = $_POST['edit-item-discount'];
        $tags = $_POST['edit-item-tags'];
        $ingredients = $_POST['edit-item-ingredients'];

        // Setting values in the model.
        $this->model->set_id($id);
        $this->model->set_name($name);
        $this->model->set_price($price);
        $this->model->set_description($description);
        $this->model->set_image($image);
        $this->model->set_discount($discount);
        $this->model->set_tags($tags);
        $this->model->set_ingredients($ingredients);

        // Updating the menu item.
        $this->model->update();
        $this->anchor("menuitem");
    }

    /*
     * Searches for a menu item by ID and displays the result.
     */
    public function searchById() {
        $this->model->set_id($_POST['search-query']);
        $data = $this->model->findById();
        $this->view("menu/MenuTab", $data = [$data]);
    }
}
