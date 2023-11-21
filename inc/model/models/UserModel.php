<?php

    // just leaving this here
    // will have to fix the naming conventions
    // for any records we make
    class UserRecord extends BaseModel {

        private $id;
        private $first_name;
        private $last_name;
        private $email;
        private $passcode;
        private $role;
        

        public function __construct() {
            $this->connect();
        }
        
        public function create() {

            $sql =  "INSERT INTO account(first_name, last_name, email, passcode, role)
                VALUES (:first_name,:last_name,:email,:passcode,:role)";

            $new_user = [
                "first_name"=> $this->first_name,
                "last_name"=> $this->last_name,
                "email"=> $this->email,
                "passcode"=> $this->passcode,
                "role"=> $this->role
            ];


            $statement = $this->connection->prepare($sql);
            $statement->execute($new_user);

            $this->id = $this->connection->lastInsertId();
            header("location: /personal/Practice/oop-mvc");
        }

        public function findAll() {
            $statement = $this->connection->query("SELECT * FROM account");
            return $statement->fetchAll(PDO::FETCH_CLASS, 'UserRecord');
        }

        public function findById() {
            $sql = "SELECT * FROM account WHERE id = :id";

            $statement = $this->connection->prepare($sql);
            $statement->execute(['id' => $this->id]);

            return $statement->fetchObject();
        }

        public function update() {}

        public function delete() {
            // now must delete
            echo "Object being deleted";
        }

        public function get_id() {
            return $this->id;
        }

        public function get_first_name() {
            return $this->first_name;
        }

        public function get_last_name() {
            return $this->last_name;
        }

        public function get_email() {
            return $this->email;
        }

        public function get_passcode() {
            return $this->passcode;
        }

        public function get_role() {
            return $this->role;
        }

        public function set_role($role) {
            return $this->role = $role;
        }

        public function set_first_name($first_name) {
            return $this->first_name = $first_name;
        }
        public function set_last_name($last_name) {
            return $this->last_name = $last_name;
        }

        public function set_email($email) {
            return $this->email = $email;
        }

        public function set_passcode($passcode) {
            return $this->passcode = $passcode;
        }


    }

