<?php

/**
 * App Core class
 * Creates URL and loads core controller
 * URL FORMAT - /controller/method/params
 */

 class Core {

     protected $currentController = 'Pages';
     protected $currentMethod = 'index';
     protected $params = [];

     public function __construct(){
        
        //print_r($this->getUrl());
        
        $url = $this->getUrl();

        // Look in controllers for fist value
        // controllers first letter will be capital so ucwords is for capitalizing the first param
        if(file_exists('../app/controllers/' .ucwords($url[0]) .'.php')){
            
            //if exists we set it as the current controller
            $this->currentController = ucwords($url[0]);

            //unset 0 index
            unset($url[0]);
        }

        // Require the controller
        require_once '../app/controllers/' .$this->currentController . '.php';

        // Instantiate controller class
        $this->currentController = new $this->currentController;

     }

     public function getUrl(){
         if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
         }
        
        
     }

 }