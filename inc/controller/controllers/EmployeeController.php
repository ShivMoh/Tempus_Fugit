<?php

/**
 * Class EmployeeController
 * Controller for handling employee-related actions.
 */
class EmployeeController extends BaseController {

    private $model;

    /**
     * Constructor for EmployeeController.
     * Initializes the model instance.
     */
    public function __construct() {
        $this->model = new EmployeeModel();
    }

    /**
     * Default action for displaying all employees.
     */
    public function index() {
       $this->findAll();
    }

    /**
     * Retrieves and displays all employees.
     */
    public function findAll() {
        $employees = $this->model->findAll();
        $this->view("employee/EmployeesTab", $data = $employees);
    }

    /**
     * Creates a new employee.
     */
    public function create() {
        // Extracting values from the POST request.
        $firstName = $_POST['first-name'];
        $lastName = $_POST['last-name'];
        $otherNames = $_POST['other-names'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $dob = $_POST['dob'];
        $jobRole = $_POST['job-role'];
        $email = $_POST['email'];
        $contactNumber = $_POST['contact-number'];

        // Setting values in the model.
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

        // Creating the new employee.
        $this->model->create();
        $this->anchor("employee");
    }

    /**
     * Retrieves and displays details for a specific employee.
     */
    public function findOne($id) {
        $this->model->set_id($id);
        $data = $this->model->findById();
        $this->view("employee/Employee", $data);
    }

    /**
     * Searches for an employee by ID and displays the result.
     */
    public function searchById() {
        $this->model->set_id($_POST['search-query']);
        $data = $this->model->findById();
        $this->view("employee/EmployeesTab", $data = [$data]);
    }

    /**
     * Filters employees by status based on user selection.
     */
    public function filterByStatus() {
        $this->model->set_status($_POST['status']);
        $data = $this->model->findAllByStatus();
        $this->view("employee/EmployeesTab", $data = $data);
    }
}
