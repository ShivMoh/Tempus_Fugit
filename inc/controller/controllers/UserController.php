<?php
    
    class UserController extends BaseController {

        private $user_manager;
        private $user_model;

        public function __construct() {
            $this->user_manager = new UserManager();
            $this->user_model = new UserRecord();
        }

        public function index() {
            $this->findUsers();
        }

        public function create() {
            if(METHOD === POST) {
                $this->user_model->set_first_name($_POST["fName"]);
                $this->user_model->set_last_name($_POST["lName"]);
                $this->user_model->set_passcode($_POST["passcode"]);
                $this->user_model->set_email($_POST["email"]);

                $this->user_manager->create_standard_user($this->user_model);
            
            }
        }

        public function findAll() {
            $user_record = new UserRecord();
            $users = $user_record->findAll();
        
            $this->view("UserTable", $data = $users);
        }
        public function findOne() {
            if (METHOD === POST) {
                if(isset($_POST['select-user'])) {
                    $id = $_POST['select-user'];
                    $user = $this->user_model->findById($id);
                    // this should use the view to select a single one
                    // like $this->view("SingleUserDisplay", $data = $user)
                    echo "A single user is selected";
                }
           }
        }

        public function delete() {
           if (METHOD === POST) {
                if(isset($_POST['delete-user'])) {
                    $id = $_POST['delete-user'];
                    $this->user_model->delete($id);
                    $this->findUsers();
                }
           }
        }
        public function update() {
            if (METHOD === POST) {
                if(isset($_POST['update-user'])) {
                    echo "Some";
                    $id = $_POST['update-user'];
                    $this->user_model->update($id);
                    $this->findUsers();
                }
           }
        }

        public function findUsers() {
        
            // if(METHOD != GET) return;

            $user_record = new UserRecord();
            $users = $user_record->findAll();
          
        
            $this->view("UserTable", $data = $users);
        }

    }

?>