<?php
class EmployeeModel {
    private $db;

    function __construct($db) {
        $this->db = $db;
    }

    function createUser($userParams) {
        // Code to create an employee
        // This method will probably reference a creation form
    }

    function viewUsers($items) {
        // Code to view all employees currently in the database
    }

}

?>