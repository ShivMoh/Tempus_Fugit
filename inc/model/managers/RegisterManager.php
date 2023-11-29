<?php

class RegisterManager {
    private $menuItemModel;
    public function __construct() {
        $this->menuItemModel = new MenuItemModel();
    }
    public function queryDiscount($id) {
        $this->menuItemModel->set_id($id);
        $menuItem = $this->menuItemModel->findById();
        return $menuItem;
    }
}