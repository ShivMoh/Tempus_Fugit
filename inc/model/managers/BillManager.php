<?php

/*
 * Manages bill-related operations such as changing the bill state and retrieving bill information.
 */
class BillManager {
    private $billModel;
    private $billItemModel;

    /*
     * BillManager constructor.
     * Initializes the BillManager with instances of the BillModel and BillItemModel.
     */
    public function __construct() {
        $this->billModel = new BillModel();
        $this->billItemModel = new BillItemModel();
    }

    /*
     * Changes the state of a bill.
     */
    public function changeBillState($id, $status) {
        $this->billModel->set_id($id);
        $result = $this->billModel->findById($id);

        // Check if the current status is already the desired status
        if ($result['status'] === $status) {
            return;
        }

        $this->billModel->set_status($status);
        $this->billModel->updateStatus();
    }

    /*
     * Retrieves information about a bill.
     */
    public function getBillInfo($id) {
        $result = $this->billModel->findById($id);
        return $result;
    }

    /*
     * Retrieves items associated with a bill.
     */
    public function getItemsForBill($id) {
        $this->billItemModel->set_bill_id($id);
        return $this->billItemModel->findAllForBill();
    }
}

?>
