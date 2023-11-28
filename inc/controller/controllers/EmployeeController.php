<?php

//dir for the this->model here

class EmployeeController extends BaseController{
    private $model;

    public function __construct() {
        $this->model = new EmployeeModel();
    }

    public function index(){

        $employee = $this->model->findAll();
        echo "I am on Employee Tab";

        // view logic pending
    }

    public function create(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

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
            $this->model->set_first_name($first_name);
            $this->model->set_last_name($last_name);
            $this->model->set_other_names($other_names);
            $this->model->set_gender($gender);
            $this->model->set_age($age);
            $this->model->set_dob($dob);
            $this->model->set_job_role($job_role);
            $this->model->set_email($email);
            $this->model->set_contact_number($contact_number);

            $this->model->create();

        // view logic pending 
        // back to index
        }
    }

    public function findBill($id){
        //id from where?
        $this->model = new EmployeeModel();
        $this->model-> set_id($id);
        $employee = $this->model -> findById();

        // view logic pending

    }

    public function delete($id){
        //id from where?
        $this->model = new EmployeeModel();
        $this->model->set_id($id);
        $this->model-> delete();

        // view logic pending
    }

    public function update($id){

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
            $this->model-> set_id($id);
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
}