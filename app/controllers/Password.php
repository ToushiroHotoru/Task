<?php

    Class Password extends Controller
    {
        function index($link = '') 
        {

            $error = null;

            if(isset($_POST['password'])){
                
                if(empty($_POST['password'])){
                    $errors['password'] = 'A password is required';
                } else{
                    if(!preg_match('/^[a-zA-Z\d]{6,20}$/', $_POST['password'])){
                        $errors['password'] = 'Password must have at least 6 characters and no more 20 ';
                    }
                }
            }

            if(isset($_POST['password'])){
                if($error){
                    $data['error'] = $error;
                } else {
                    $user = $this->loadModel('user');
                    $user->change_password($_POST, $_COOKIE['email']);
                    unset($_COOKIE['restore_key']);
                    unset($_COOKIE['email']);
                    header("Location:". ROOT . "login");
                }
            }
            
              
            $data['page_title'] = "Password";;
            $this->view("password");
        }

    }    

?>