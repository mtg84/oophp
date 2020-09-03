<?php

class Pages extends Controller{
    
    public function __construct(){
     
    }

    public function index(){

       
        $data = [
            'title' => 'Shareposts',
            'description' => 'Simple social network built on the Traversy MVC PHP framework.'
        ];

        
        $this->view('pages/index', $data);
    }

    public function about(){
        //echo 'this is about ' .$id;
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users.'
        ];
        $this->view('pages/about',$data);
    }
}