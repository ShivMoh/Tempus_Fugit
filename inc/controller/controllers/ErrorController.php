<?php

class ErrorController extends BaseController {

    // displays respective error page based on code
    public function error($errorCode) {
        $this->view("errors/$errorCode");
    }

}
