<?php

//dir for the model here

class EmployeeController extends BaseController{

    public function index(){

        $employeeModel = new EmployeeModel();
        $employee = $employeeModel->findAll();

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

            $employeeModel = new EmployeeModel();
            $employeeModel->set_first_name($first_name);
            $employeeModel->set_last_name($last_name);
            $employeeModel->set_other_names($other_names);
            $employeeModel->set_gender($gender);
            $employeeModel->set_age($age);
            $employeeModel->set_dob($dob);
            $employeeModel->set_job_role($job_role);
            $employeeModel->set_email($email);
            $employeeModel->set_contact_number($contact_number);

            $employeeModel->create();

        // view logic pending 
        // back to index
        }
    }

    public function findBill($id){
        //id from where?
        $employeeModel = new EmployeeModel();
        $employeeModel-> set_id($id);
        $employee = $employeeModel -> findById();

        // view logic pending

    }

    public function delete($id){
        //id from where?
        $employeeModel = new EmployeeModel();
        $employeeModel->set_id($id);
        $employeeModel-> delete();

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

            $employeeModel = new EmployeeModel();
            $employeeModel-> set_id($id);
            $employee = $employeeModel -> findById();

            $employeeModel->set_first_name($first_name);
            $employeeModel->set_last_name($last_name);
            $employeeModel->set_other_names($other_names);
            $employeeModel->set_gender($gender);
            $employeeModel->set_age($age);
            $employeeModel->set_dob($dob);
            $employeeModel->set_job_role($job_role);
            $employeeModel->set_email($email);
            $employeeModel->set_contact_number($contact_number);

            $employeeModel->update();
            
            // view logic pending
        }   
    }
}