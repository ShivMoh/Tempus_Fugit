<?php

//dir for the this->model here

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
        $this->view("/EmployeesTab", $data = $employees);
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

    public function findBill($id){
        //id from where?
        $this->model = new EmployeeModel();
        $this->model-> set_id($id);
        $employee = $this->model -> findById();

        // view logic pending

    }

    public function delete($id = 0){
        //id from where?
        $this->model = new EmployeeModel();
        //$this->model-> delete();

        // view logic pending
    }

    public function update($id = 0){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $other_names = $_POST['other_names'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $dob = $_POST['dob'];
            $job_role = $_POST['job_role'];
            $email = $_POST['email'];
            $contact_number = $_POST['contact_number'];

            $this->model = new EmployeeModel();
            //$this->model-> set_id();
            $employee = $this->model -> findById();

            $this->model->set_first_name($first_name);
            $this->model->set_last_name($last_name);
            $this->model->set_other_names($other_names);
            $this->model->set_gender($gender);
            $this->model->set_age($age);
            $this->model->set_dob($dob);
            $this->model->set_job_role($job_role);
            $this->model->set_email($email);
            $this->model->set_contact_number($contact_number);

            $this->model->update();
            
            // view logic pending
        }   
    }

    public function findOne($id) {
        $this->model->set_id($id);
        $data = $this->model->findById();
        $this->view("Employee", $data);
    }

    public function searchById() {
        $this->model->set_id($_POST['search-query']);
        $data = $this->model->findById();
        $this->view("EmployeesTab", $data = [$data]);
    }

    public function filterByStatus() {
        $this->model->set_status($_POST['status']);
        $data = $this->model->findByStatus();
        if (empty($data)) $data = [
            
        ];
        $this->view("EmployeesTab", $data = [$data]);
    }
}