<?php

/*
 * Controller for handling errors.
 */
class ErrorController extends BaseController {

    /*
     * Displays the error page based on the provided error code.
     */
    public function error($errorCode) {
        $this->view("errors/$errorCode");
    }

}
