<?php 
class Posts extends Controller {
   

    public function __construct(){
        if(!isLoggedIn()){
            //not logged in
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function index(){

        //Get posts
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts
        
        ];
        $this->view('posts/index',$data);
    }

    public function add(){

        //Check if it is a post request
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Sanitize POST array
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_error' => '',
                'body_error' => ''
            ];

            //Validation title
            if(empty($data['title'])){
                $data['title_error'] = "Please enter title";
            }

             //Validation body
             if(empty($data['body'])){
                $data['body_error'] = "Please enter text";
            }

            //Make sure there are no errors
            if(empty($data['title_error']) && empty($data['body_error'])){
               //Validated
               if($this->postModel->addPost($data)){
                    flash('post_message','Post successfully added');
                    redirect('posts');
               }else{
                   die('Something went wrong');
               }
            }
            else{
                //Load view with errors
                $this->view('posts/add', $data);
            }

        }else{
            
            $data = [
                'title' => '',
                'body' => ''
            ];
        
            $this->view('posts/add',$data);
        }

        

    }

    public function edit($id){

        //Check if it is a post request
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Sanitize POST array
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'id' => $id,
                'title_error' => '',
                'body_error' => ''
            ];

            //Validation title
            if(empty($data['title'])){
                $data['title_error'] = "Please enter title";
            }

             //Validation body
             if(empty($data['body'])){
                $data['body_error'] = "Please enter text";
            }

            //Make sure there are no errors
            if(empty($data['title_error']) && empty($data['body_error'])){
               //Validated
               if($this->postModel->updatePost($data)){
                    flash('post_message','Post successfully updated');
                    redirect('posts');
               }else{
                   die('Something went wrong');
               }
            }
            else{
                //Load view with errors
                $this->view('posts/edit', $data);
            }

        }else{

            //Fetch the post from model
            $post =$this->postModel->getPostById($id);

            // Check for owner
            if($post->user_id != $_SESSION['user_id']){
                redirect('posts');
            }

            $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body
            ];
        
            $this->view('posts/edit',$data);
        }

        

    }

    public function show($id){
        //example -> posts/show/3
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);
        $data=[
            'post' => $post,
            'user' => $user
        ];
        $this->view('posts/show',$data);
    }

    public function delete($id){
        //It should always be a post request
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Fetch the post from model
            $post =$this->postModel->getPostById($id);

            // Check for owner
            if($post->user_id != $_SESSION['user_id']){
                redirect('posts');
            }

            if($this->postModel->deletePost($id)){
                flash('post_message', 'Post correctly removed');
                redirect('posts');
            }else{
                die('Something went wrong');
            }
        }else{
            redirect('posts');
        }
    }

}