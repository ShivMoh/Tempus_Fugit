<?php

// just leaving this here
// will have to fix the naming conventions
// for any records we make
class EmployeeModel extends BaseModel {
    private $id;
    private $first_name;
    private $last_name;
    private $other_names;
    private $gender;
    private $age;
    private $dob;
    private $job_role;
    private $email;
    private $contact_number;
    

    public function __construct() {
        $this->connect();
    }
    
    public function create() {

        $sql =  "INSERT INTO Employee(first_name, last_name, other_names, gender, age, dob, job_role, email, contact_number)
            VALUES (:first_name,:last_name, :other_names, :gender, :age, :dob, :job_role, :email, :contact_number)";

        $new_employee = [
            "first_name"=> $this->first_name,
            "last_name"=> $this->last_name,
            "other_names"=> $this->other_names,
            "gender"=> $this->gender,
            "age"=> $this->age,
            "dob"=> $this->dob,
            "job_role"=> $this->job_role,
            "email"=> $this->email,
            "contact_number"=> $this->contact_number
        ];

        $statement = $this->connection->prepare($sql);
        $statement->execute($new_employee);

        $this->id = $this->connection->lastInsertId();
    }

    public function findAll() {
        $statement = $this->connection->query("SELECT * FROM Employee");
        return $statement->fetchAll(); //Similarly for this one
                                                    //a manager may be necessary
                                                    //for handling the return
    }

    public function findById() {
        $sql = "SELECT * FROM Employee WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $this->id]);

        return $statement->fetchObject();
    }

    public function update() {

        $sql = "UPDATE Employee SET first_name = :first_name, last_name = :last_name, other_names = :other_names, gender = :gender, age = :age, dob = :dob, job_role = :job_role, email = :email, contact_number = :contact_number WHERE id = :id";
        
        $updated_employee = [
            "id"=> $this->id,
            "first_name"=> $this->first_name,
            "last_name"=> $this->last_name,
            "other_names"=> $this->other_names,
            "gender"=> $this->gender,
            "age"=> $this->age,
            "dob"=> $this->dob,
            "job_role"=> $this->job_role,
            "email"=> $this->email,
            "contact_number"=> $this->contact_number
        ];
    
        $statement = $this->connection->prepare($sql);
        $statement->execute($updated_employee);
    }
        public function delete() {
    
        $sql = "DELETE FROM Employee WHERE id = :id";
    
        $deleted_employee = [
            "id"=> $this->id
        ];
    
        $statement = $this->connection->prepare($sql);
        $statement->execute($deleted_employee);
    }

    public function get_first_name() {
        return $this->first_name;
    }

    public function get_last_name() {
        return $this->last_name;
    }

    public function get_other_names() {
        return $this->other_names;
    }

    public function get_gender() {
        return $this->gender;
    }

    public function get_age() {
        return $this->age;
    }

    public function get_dob() {
        return $this->dob;
    }

    public function get_job_role() {
        return $this->job_role;
    }

    public function get_email() {
        return $this->email;
    }

    public function get_contact_number() {
        return $this->contact_number;
    }

    public function set_id($id){
        $this->id = $id;
    }

    public function set_first_name($first_name) {
        $this->first_name = $first_name;
    }
    public function set_last_name($last_name) {
        $this->last_name = $last_name;
    }

    public function set_other_names($other_names) {
        $this->other_names = $other_names;
    }

    public function set_gender($gender) {
        $this->gender = $gender;
    }

    public function set_age($age) {
        $this->age = $age;
    }

    public function set_dob($dob) {
        $this->dob = $dob;
    }

    public function set_job_role($job_role) {
        $this->job_role = $job_role;
    }

    public function set_email($email) {
        $this->email = $email;
    }

    public function set_contact_number($contact_number) {
        $this->contact_number = $contact_number;
    }
}
