<?php

    Class Signup extends Controller
    {
        function index() 
        {   
            $DB = new Database();


            $errors = array('email' => '', 'username' => '', 'password' => '');
        
            if(isset($_POST['submit'])){
                
                if(empty($_POST['email'])){
                    $errors['email'] = 'An email is required';
                } else{
                    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                        $errors['email'] = 'Email must be a valid email address';
                    }
                }
        
                if(empty($_POST['username'])){
                    $errors['username'] = 'A username is required';
                } else{
                    if(!preg_match('/^[a-zA-Z\d]{4,12}$/i', $_POST['username'])){
                        $errors['username'] = 'Username must be valid';
                    }
                }
        
                if(empty($_POST['password'])){
                    $errors['password'] = 'A password is required';
                } else{
                    if(!preg_match('/^[a-zA-Z\d]{6,20}$/', $_POST['password'])){
                        $errors['password'] = 'Password must have at least 6 characters and no more 20 ';
                    }
                }
            }

            if(array_filter($errors)){
                $data['errors'] = $errors;
            } else {
                $user = $this->loadModel('user');
                $result = $user->signup($_POST);
            }

            $data['page_title'] = "Signup";
            $this->view("signup", $data);
        }

    }    

?>