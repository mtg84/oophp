<?php

class Users extends Controller{

    public function __construct(){

    }

    
    public function register(){

        // Check for posts
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form
        }
        else{//laod form
          // Init data
          $data = [
              'name' => '',
              'email' => '',
              'password' => '',
              'confirm_password' => '',
              'name_error' => '',
              'email_error' => '',
              'password_error' => '',
              'confirm_password_error' => ''
          ];  

          //Load view
          $this->view('users/register', $data);
            
        }

    }



}