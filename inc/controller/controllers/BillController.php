<?php

class BillController extends BaseController {

    private $model;
    private $manager;

    public function __construct() {
        $this->model = new BillModel();
        $this->manager = new BillManager();
    }

    public function index() {
        $this->findAll();
    }

    public function findAll() {
        $bills = $this->model->findAllNonEmptyBills();
        $this->view("bill/BillsTab", $data = $bills);
    }

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

    public function delete($id) {
        $this->manager->changeBillState($id, "cancelled");
        $this->anchor("bill");
    }

    public function update($id) {
        $this->manager->changeBillState($id, "completed");
        $this->anchor("bill");
    }

    public function searchById() {
        $this->model->set_id($_POST['search-query']);
        $data = $this->model->findById();
        $this->view("BillsTab", $data = [$data]);
    }

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

    public function filterByStatus() {
        $this->model->set_status($_POST['status']);
        $data = $this->model->findAllByStatus();
        $this->view("bill/BillsTab", $data = $data);
    }
}
