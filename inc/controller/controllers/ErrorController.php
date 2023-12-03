<?php 

class ErrorController extends BaseController {

    public function error($errorCode) {
        $this->view("errors/$errorCode");
    }

}

