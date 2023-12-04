<?php

class EmployeeController extends BaseController{
    private $model;

    public function __construct() {
        $this->model = new EmployeeModel();
    }

    public function index(){
       $this->findAll();
    }

    public function findAll() {
        $employees = $this->model->findAll();
        $this->view("employee/EmployeesTab", $data = $employees);
    }

    public function create(){

        $firstName = $_POST['first-name'];
        $lastName = $_POST['last-name'];
        $otherNames = $_POST['other-names'];
        $age = $_POST['gender'];
        $gender = $_POST['age'];
        $dob = $_POST['dob'];
        $jobRole = $_POST['job-role'];
        $email = $_POST['email'];
        $contactNumber = $_POST['contact-number'];

        $this->model->set_first_name($firstName);
        $this->model->set_last_name($lastName);
        $this->model->set_other_names($otherNames);
        $this->model->set_gender($gender);
        $this->model->set_age($age);
        $this->model->set_dob($dob);
        $this->model->set_job_role($jobRole);
        $this->model->set_email($email);
        $this->model->set_contact_number($contactNumber);
        $this->model->set_status("active");

        $this->model->create();
        $this->anchor("employee");
    }


    public function findOne($id) {
        $this->model->set_id($id);
        $data = $this->model->findById();
        $this->view("employee/Employee", $data);
    }

    public function searchById() {
        $this->model->set_id($_POST['search-query']);
        $data = $this->model->findById();
        $this->view("employee/EmployeesTab", $data = [$data]);
    }

    public function filterByStatus() {
        $this->model->set_status($_POST['status']);
        $data = $this->model->findAllByStatus();
        $this->view("employee/EmployeesTab", $data = $data);
    }

}