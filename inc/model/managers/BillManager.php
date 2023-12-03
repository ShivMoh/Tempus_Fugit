<?php
class BillManager { 
   private $billModel;
   private $billItemModel;

   public function __construct() {
       $this->billModel = new BillModel();
       $this->billItemModel = new BillItemModel();
   }

    public function changeBillState($id,$status) {
        $this->billModel->set_id($id);
        $result = $this->billModel->findById($id);
        
        if ($result['status'] === $status) return;

        $this->billModel->set_status($status);
        $this->billModel->updateStatus();

        
    }

    #logic to find bill information to be outputted when the view is called
    public function getBillInfo($id) {
        $result = $this->billModel->findById($id);
        return $result;
    }

    public function getItemsForBill($id) {
        $this->billItemModel->set_bill_id($id);
        return $this->billItemModel->findAllForBill();
    }
}
?>