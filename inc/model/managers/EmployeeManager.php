<?php
//Manager responsible for querying employee age
class EmployeeManager {
    private $employeeModel;

    public function __construct() {
        $this->employeeModel = new EmployeeModel();
    }

    public function verifyEmployeeAge($employeeId) {
        $this->employeeModel->set_id($employeeId);
        $employee = $this->employeeModel->findById();

        if ($employee && $employee['age'] >= 18) {
            return true;
        }
        return false;
    }
}