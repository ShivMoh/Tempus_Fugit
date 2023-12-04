<?php

/*
 * Controller for handling bill-related actions.
 */
class BillController extends BaseController {

    private $model;
    private $manager;

    /*
     * Constructor for BillController.
     * Initializes the model and manager instances.
     */
    public function __construct() {
        $this->model = new BillModel();
        $this->manager = new BillManager();
    }

    /*
     * Default action for displaying all non-empty bills.
     */
    public function index() {
        $this->findAll();
    }

    /*
     * Retrieves and displays all non-empty bills.
     */
    public function findAll() {
        $bills = $this->model->findAllNonEmptyBills();
        $this->view("bill/BillsTab", $data = $bills);
    }

    /*
     * Retrieves and displays details for a specific bill.
     */
    public function findOne($id) {
        $this->model->set_id($id);
        $bill = $this->model->findById();
        $billItems = $this->manager->getItemsForBill($bill['id']);

        $billData = [
            "bill" => $bill,
            "billItems" => $billItems
        ];

        $this->view("bill/BillPreview", $data = $billData);
    }

    /*
     * Cancels a bill by changing its status to "cancelled".
     */
    public function delete($id) {
        $this->manager->changeBillState($id, "cancelled");
        $this->anchor("bill");
    }

    /*
     * Updates a bill by changing its status to "completed".
     */
    public function update($id) {
        $this->manager->changeBillState($id, "completed");
        $this->anchor("bill");
    }

    /*
     * Searches for a bill by its ID and displays the result.
     */
    public function searchById() {
        $this->model->set_id($_POST['search-query']);
        $data = $this->model->findById();
        $this->view("BillsTab", $data = [$data]);
    }

    /*
     * Filters bills by date based on user selection.
     */
    public function filterByDate() {
        $date = date('Y-m-d');

        switch ($_POST['date']) {
            case 'last-week':
                $date = date('Y-m-d', strtotime('-1 week', strtotime($date)));
                break;

            case 'last-month':
                $date = date('Y-m-d', strtotime('-4 weeks', strtotime($date))); 
                break;

            case 'last-six-months':
                $date = date('Y-m-d', strtotime('-24 weeks', strtotime($date)));
                break;

            default:
                break;
        }

        $this->model->set_order_date($date);
        $data = $this->model->findAllWhereDateGreaterThan();
        $this->view("bill/BillsTab", $data);
    }

    /*
     * Filters bills by status based on user selection.
     */
    public function filterByStatus() {
        $this->model->set_status($_POST['status']);
        $data = $this->model->findAllByStatus();
        $this->view("bill/BillsTab", $data = $data);
    }
}
