<?php
class BillManager { 
   private $billModel;

   public function __construct() {
       $this->billModel = new BillModel();
   }

    public function changeBillState($id,$status) {

        $result = $this->billModel->findById($id);
        if ($result['status'] === $status) return;

        $this->billModel->set_status($status);
        $this->billModel->update();

        $sql = "UPDATE Bill set status = :status, where id = :id";
        
        $change_bill_state = [
            "status" => $status,
            "bill_id" => $id
        ];

        $statement = $this->billModel->$this->connection->prepare($sql);
        $statement->execute($change_bill_state);
    }

    #logic to find bill information to be outputted when the view is called
    public function getBillInfo($id) {
        $result = $this->billModel->findById($id);
        return $result;
    }
}
?>