<?php

    include_once __DIR__."/BaseController.php";
    
    class UserController extends BaseController {

        private $user_model;

        public function __construct() {
            $this->user_model = new UserManager();
        }

        public function index() {
            $this->findUsers();
        }

        public function createUser() {
            $method = $_SERVER["REQUEST_METHOD"];
            if($method == "GET") {
                
                $this->view("UserRegistration");
            }
            else {
                $new_user = new UserRecord();
                $new_user->set_first_name($_POST["fName"]);
                $new_user->set_last_name($_POST["lName"]);
                $new_user->set_passcode($_POST["passcode"]);
                $new_user->set_email($_POST["email"]);

                $this->user_model->create_standard_user($new_user);
            }
     
        }

        public function findUsers() {
            $method = $_SERVER["REQUEST_METHOD"];
            if($method != "GET") return;

            $user_record = new UserRecord();
            $users = $user_record->find_all();
        
            $this->view("UserTable", $data = $users);
        }

        public function create() {}
        public function findAll() {}
        public function findOne() {}
        public function delete() {}
        public function update() {}

    }

?>