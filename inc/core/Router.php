<?php

class Router {
    private $controller = '';
    private $method = '';
    private $params = [];

    // you can use get requests to call these methods
    private $validGetPaths = [
        "index",
        "test",
        "test2"
    ];

    // you can use post requests to call these methods
    private $validPostPaths = [
        "findAll",
        "view",
        "create",
        "update",
        "delete",
        "findOne"
    ];

    public function __construct() {
        $this->loadController();
    }

    private function loadController() {


        $path = $_SERVER["REQUEST_URI"];
        $url = $this->getUrl($path);

        if(count($url) === 0) { 
            // set default controller and method for when app starts
            $this->controller = $this->getControllerName("MenuItem");
            $this->getController($this->controller);
            $this->method = "index";
        } else {
            $this->controller = $this->getControllerName($url[0]);
        
            if($this->controllerExists($this->controller)) {
              
                $this->getController($this->controller);
    
                if(count($url) === 1) {
                    $this->method = "index";
                } else {
                    if(method_exists($this->controller, $url[1])) {
                        $this->method = $url[1];
                    } else {
                        $this->method = "";
                    }
                }
            } else {
                // set default controller for when App starts
                $this->controller = "";
            }
        } 
        

        if($this->controller !== "" && $this->method !== "") {

            if(!empty($url[2])) $this->params = [$url[2]];
            
            // decisions based on HTTP requests

            // if the request is post but is not a valid post request path, then return
            // if (METHOD === POST && !in_array($this->method, $this->validPostPaths)) {
            //     echo "INVALID REQUEST ON METHOD: $this->method";
            //     return;
            // }
            
            // // if the request is get but is not a valid get request path, then return
            // if (METHOD === GET && !in_array($this->method, $this->validGetPaths)) {
            //     echo "INVALID REQUEST ON METHOD: $this->method";
            //     return;
            // }
            
    
            // calls the assigned controller and method
            call_user_func_array(
                [$this->controller,$this->method], 
                $this->params
            );

    
         
            
            // reset attributes
            $this->controller = "";
            $this->method = "";
            $this->params = [];
        } else {
            // redirect to 404 page
            echo "404 Page Not available";
            $this->controller = "";
            $this->method = "";
        }
      
    }

    // gets the url relative to the BASE_URL
    private function getUrl($url)
	{
        $url = explode("/", trim(explode("?", trim($url))[0], "/"));
        $base_url = explode("/", trim(BASE_URL,"/"));
		return array_slice($url, count($base_url));	
	}

    // requires the controller so that we can use it 
    private function getController($controller_name = "") {
        require __DIR__."/../controller/controllers/".$controller_name.".php";
        $this->controller = new $this->controller;
    }

    // returns the name of the controllet
    private function getControllerName($path) {
        return ucfirst($path)."Controller";
    }

    // checks if controller exists
    private function controllerExists($filename) {
        $filename = __DIR__."/../controller/controllers/".$filename.".php";
		if(file_exists($filename)) return true;
        return false;
    }
}