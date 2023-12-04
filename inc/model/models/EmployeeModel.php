<?php

// EmployeeModel class extends BaseModel
class EmployeeModel extends BaseModel {
    // Private properties of the EmployeeModel class
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
    private $status;

    // Constructor method to establish a database connection
    public function __construct() {
        $this->connect();
    }

    // Method to create a new employee record
    public function create() {
        // SQL query to insert a new employee record
        $sql =  "INSERT INTO Employee(first_name, last_name, other_names, gender, age, dob, job_role, email, contact_number, status)
            VALUES (:first_name,:last_name, :other_names, :gender, :age, :dob, :job_role, :email, :contact_number, :status)";

        // Data for the new employee record
        $new_employee = [
            "first_name"=> $this->first_name,
            "last_name"=> $this->last_name,
            "other_names"=> $this->other_names,
            "gender"=> $this->gender,
            "age"=> $this->age,
            "dob"=> $this->dob,
            "job_role"=> $this->job_role,
            "email"=> $this->email,
            "contact_number"=> $this->contact_number,
            "status"=>$this->status
        ];

        $statement = $this->connection->prepare($sql);
        $statement->execute($new_employee);

        $this->id = $this->connection->lastInsertId();
    }

    // Method to retrieve all employee records
    public function findAll() {
        // SQL query to select all employee records
        $statement = $this->connection->query("SELECT * FROM Employee");
        return $statement->fetchAll();
    }

    // Method to find an employee record by ID
    public function findById() {
        // SQL query to select an employee record by ID
        $sql = "SELECT * FROM Employee WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $this->id]);

        return $statement->fetch();
    }

    // Method to update an employee record
    public function update() {
        // SQL query to update an employee record
        $sql = "UPDATE Employee SET first_name = :first_name, last_name = :last_name, other_names = :other_names, gender = :gender, age = :age, dob = :dob, job_role = :job_role, email = :email, contact_number = :contact_number, status = :status WHERE id = :id";
        
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
            "contact_number"=> $this->contact_number,
            "status"=>$this->status
        ];
    
        $statement = $this->connection->prepare($sql);
        $statement->execute($updated_employee);
    }

    // Method to delete an employee record
    public function delete() {
        // SQL query to delete an employee record by ID
        $sql = "DELETE FROM Employee WHERE id = :id";
    
        $deleted_employee = [
            "id"=> $this->id
        ];
    
        $statement = $this->connection->prepare($sql);
        $statement->execute($deleted_employee);
    }

    // Method to find an employee record by status
    public function findByStatus() {
        // SQL query to select an employee record by status
        $sql = "SELECT * FROM Employee WHERE status = :status";

        $statement = $this->connection->prepare($sql);
        $statement->execute(['status' => $this->status]);

        return $statement->fetch();
    }

    // Method to retrieve all employee records by status
    public function findAllByStatus() {
        // SQL query to select all employee records by status
        $sql = "SELECT * FROM Employee WHERE status = :status";
    
        $statement = $this->connection->prepare($sql);
        $statement->execute(['status' => $this->status]);
    
        return $statement->fetchAll();
    }

    // Getter method for retrieving the first name of the employee
    public function get_first_name() {
        return $this->first_name;
    }

    // Getter method for retrieving the last name of the employee
    public function get_last_name() {
        return $this->last_name;
    }

    // Getter method for retrieving other names of the employee
    public function get_other_names() {
        return $this->other_names;
    }

    // Getter method for retrieving the gender of the employee
    public function get_gender() {
        return $this->gender;
    }

    // Getter method for retrieving the age of the employee
    public function get_age() {
        return $this->age;
    }

    // Getter method for retrieving the date of birth of the employee
    public function get_dob() {
        return $this->dob;
    }

    // Getter method for retrieving the job role of the employee
    public function get_job_role() {
        return $this->job_role;
    }

    // Getter method for retrieving the email of the employee
    public function get_email() {
        return $this->email;
    }

    // Getter method for retrieving the contact number of the employee
    public function get_contact_number() {
        return $this->contact_number;
    }

    // Getter method for retrieving the status of the employee
    public function get_status() {
        return $this->status;
    }

    // Setter method for setting the ID of the employee
    public function set_id($id){
        $this->id = $id;
    }

    // Setter method for setting the first name of the employee
    public function set_first_name($first_name) {
        $this->first_name = $first_name;
    }

    // Setter method for setting the last name of the employee
    public function set_last_name($last_name) {
        $this->last_name = $last_name;
    }

    // Setter method for setting other names of the employee
    public function set_other_names($other_names) {
        $this->other_names = $other_names;
    }

    // Setter method for setting the gender of the employee
    public function set_gender($gender) {
        $this->gender = $gender;
    }

    // Setter method for setting the age of the employee
    public function set_age($age) {
        $this->age = $age;
    }

    // Setter method for setting the date of birth of the employee
    public function set_dob($dob) {
        $this->dob = $dob;
    }

    // Setter method for setting the job role of the employee
    public function set_job_role($job_role) {
        $this->job_role = $job_role;
    }

    // Setter method for setting the email of the employee
    public function set_email($email) {
        $this->email = $email;
    }

    // Setter method for setting the contact number of the employee
    public function set_contact_number($contact_number) {
        $this->contact_number = $contact_number;
    }

    // Setter method for setting the status of the employee
    public function set_status($status) {
        $this->status = $status;
    }
}
