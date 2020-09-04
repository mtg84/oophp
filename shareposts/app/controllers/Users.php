<?php

class Users extends Controller{

    public function __construct(){
        $this->userModel = $this->model('User');
    }

    
    public function register(){

        // Check for posts
        if($_SERVER['REQUEST_METHOD'] == 'POST'){//Process form
            
            //Sanitize POST data
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            //Init data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];  

            //Validate name
            if(empty($data['name'])){
                $data['name_error'] = 'Please enter name';
            }

            //Validate email
            if(empty($data['email'])){
                $data['email_error'] = 'Please enter email';
            }
            else{
                //Check email
              
                if($this->userModel->findUserByEmail($data['email'])){
                  
                    $data['email_error'] = 'Email is already taken';
                }
            }

             //Validate password
             if(empty($data['password'])){
                $data['password_error'] = 'Please enter password';
            }elseif ( strlen($data['password']) < 6){
                $data['password_error'] = 'Password must be at least 6 characters';
            }

            
             //Validate password
             if(empty($data['confirm_password'])){
                $data['confirm_password_error'] = 'Please confirm password';
            }elseif($data['password']!=$data['confirm_password']){
                $data['confirm_password_error'] = 'Passwords do not match';
            }

            // Make sure errors are empty
            if(empty($data['name_error']) && empty($data['email_error'])  && empty($data['password_error'])
            && empty($data['confirm_password_error'])){
                //Validated
                
                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register uuser
                if($this->userModel->register($data)){
                    flash('register_success', 'You are registered and can log in');
                  redirect('users/login');
                }else{
                    die ('something went wrong'); 
                }

            }else{
                //Display the view with errors
                $this->view('users/register',$data);
            }


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

    public function login(){

        // Check for posts
        if($_SERVER['REQUEST_METHOD'] == 'POST'){ //Process form
           
              //Sanitize POST data
              $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
              //Init data
              $data = [
                  'email' => trim($_POST['email']),
                  'password' => trim($_POST['password']),
                  'email_error' => '',
                  'password_error' => '',
              ];  

              //Validate email
            if(empty($data['email'])){
                $data['email_error'] = 'Please enter email';
            }

             //Validate password
             if(empty($data['password'])){
                $data['password_error'] = 'Please enter password';
            }

            //Make sure errors are empty
            if( empty($data['email_error'])  && empty($data['password_error'])){
                //Validated
                die('Success');
            }else{
                //Display the view with errors
                $this->view('users/login',$data);
            }



        }
        else{//laod form
          // Init data
          $data = [
              'email' => '',
              'password' => '',
              'email_error' => '',
              'password_error' => '',
          ];  

          //Load view
          $this->view('users/login', $data);
            
        }

    }



}