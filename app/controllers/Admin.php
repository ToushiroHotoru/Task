<?php

    Class Admin extends Controller
    {
        function index() 
        {
            $user = $this->loadModel('user');

            if($user->check_is_admin())
            {   
                if(isset($_POST['title']) && isset($_FILES['file']))
                {
                    $uploader = $this->loadModel('upload_game');
                    $result = $uploader->upload($_POST, $_FILES);
                }

                $data['users'] = $user->get_all_users();
                $data['page_title'] = 'Admin panel';
                $this->view("admin", $data);
            } else {
                header("Location:". ROOT . "home");
                $_SESSION['error'] = "access has been denied";
            }
            
        }

        function make_admin()
        {
            $user = $this->loadModel('user');
            $user->make_admin($_POST);
        }

        function delete_user()
        {
            $user = $this->loadModel('user');
            $user->delete_user($_POST);
        }

    }

?>