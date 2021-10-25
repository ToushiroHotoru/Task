<?php

    Class Login extends Controller
    {
        function index() 
        {
            $user = $this->loadModel('user');
            $user->login($_POST);
            

            $data["page_title"] = "Login";
            $this->view("login", $data);
        }

    }    

?>